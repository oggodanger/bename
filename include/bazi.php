<?php
class Bazi {
	/**
	 * 此处的日期均为阳历
	 */
	private $y;	// 年
	private $m;	// 月,从0开始
	private $d; // 日,1-31
	private $hour;
	private $minute;
	private $second;
	private $Gan = array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
	private $Zhi = array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
	private $shiGanZhi =array(
		0 =>array('甲子','乙丑','丙寅','丁卯','戊辰','己巳','庚午','辛未','壬申','癸酉','甲戌','乙亥'),
		1 =>array('丙子','丁丑','戊寅','己卯','庚辰','辛巳','壬午','癸未','甲申','乙酉','丙戌','丁亥'),
		2 =>array('戊子','己丑','庚寅','辛卯','壬辰','癸巳','甲午','乙未','丙申','丁酉','戊戌','己亥'),
		3 =>array('庚子','辛丑','壬寅','癸卯','甲辰','乙巳','丙午','丁未','戊申','己酉','庚戌','辛亥'),
		4 =>array('壬子','癸丑','甲寅','乙卯','丙辰','丁巳','戊午','己未','庚申','辛酉','壬戌','癸亥'),
		5 =>array('甲子','乙丑','丙寅','丁卯','戊辰','己巳','庚午','辛未','壬申','癸酉','甲戌','乙亥'),
		6 =>array('丙子','丁丑','戊寅','己卯','庚辰','辛巳','壬午','癸未','甲申','乙酉','丙戌','丁亥'),
		7 =>array('戊子','己丑','庚寅','辛卯','壬辰','癸巳','甲午','乙未','丙申','丁酉','戊戌','己亥'),
		8 =>array('庚子','辛丑','壬寅','癸卯','甲辰','乙巳','丙午','丁未','戊申','己酉','庚戌','辛亥'),
		9 =>array('壬子','癸丑','甲寅','乙卯','丙辰','丁巳','戊午','己未','庚申','辛酉','壬戌','癸亥')
    );
	private $solarMonth=array(31,28,31,30,31,30,31,31,30,31,30,31);	// 每月天数
	private $sTermInfo = array(0,21208,42467,63836,85337,107014,128867,150921,173149,195551,218072,240693,263343,285989,308563,331033,353350,375494,397447,419210,440795,462224,483532,504758);
	private $bazi=array();
	private $use_amend; // 修正年柱与月柱标识(当处于立春前一天23时当立春来临之前的时间段内，年柱和月柱必须修正为立春前一天的年柱月柱)

	public function __construct($year=NULL,$month=NULL,$day=NULL,$hour=0,$use_amend=false){
		$this->y = empty($year) ? (int)date("Y") : (int)$year;
		$this->m = empty($month) ? (int)date("n")-1 : (int)$month-1;	// 在类中使用的月份是从0开始的
		$this->d = empty($day) ? (int)date("j") : (int)$day;
		$this->hour = $hour;
		$this->use_amend = $use_amend;	// 默认为false(不修正),当传了true时才修正
	//	var_dump($this->y);var_dump($this->m);var_dump($this->d);
	}
	
	public function calendar(){
		$y = $this->y;
		$m = $this->m;
		$d = $this->d;
		$h = $this->hour;
		$bazi = array();
	//	$firstday 		= mktime(0,0,0,$m+1,1,$y);
		$this_length    = $this->solarDays($y,$m);    //公历当月天数
	//	$this_firstWeek = date("w",$firstday);    //公历当月1日星期几

		////////年柱 1900年立春后为庚子年(60进制36)
		if($m<2) 
			$cY=$this->cyclical($y-1900+36-1);
		else 
			$cY=$this->cyclical($y-1900+36);
		$term2=(int)$this->sTerm($y,2); //立春日期
		
		////////月柱 1900年1月小寒以前为 丙子月(60进制12)
		$firstNode = (int)$this->sTerm($y,$m*2); //返回当月「节」为几日开始
		
		$cM = $this->cyclical(($y-1900)*12+$m+12);
		
		//当月一日与 1900/1/1 相差天数
		//1900/1/1与 1970/1/1 相差25567日, 1900/1/1 日柱为甲戌日(60进制10)
		$dtz = new DateTimeZone("UTC");
		$date_str = sprintf("%s-%s-01",$y,$m+1,1);
		$datetime = new DateTime($date_str, $dtz);
		$timestamp = (float)$datetime->format("U");
		$dayCyclical = $timestamp/86400+25567+10;
	    //$dayCyclical = gmmktime(0,0,0,($m+1),1,$y)/86400+25567+10;	//gmmktime得出来的时间戳不能超过2038年，所有还是改为使用DateTime类处理时间

		// 如果拿出来单独算某一天的，需要注意$cY、$cM的变量作用域问题，也不太好处理，不如还是把整个月都算出来
		for($i=0;$i<$this_length;$i++) {		
			//依节气调整二月分的年柱, 以立春为界
			if($m==1 && ($i+1)==$term2) $cY=$this->cyclical($y-1900+36);
			//依节气月柱, 以「节」为界
			if(($i+1)==$firstNode) $cM = $this->cyclical(($y-1900)*12+$m+13);
			//日柱
            $cD = $this->cyclical($dayCyclical+$i);  

            //huangwei patch bug by 2019.11.21
            if($h >= 23){
                $cD = $this->cyclical($dayCyclical+$i+1);
            }

            //huangwei patch bug by 2018.12.06
            //根据每月第一个节气发生时间进行修正，偏移59个单位
            if($d == $firstNode){
                if($this->hour <= intval($next_jieqi['hour'])){
                    $cM = $this -> cyclical(($y - 1900) * 12 + $m + 13 + 59);
                }
            }

			//时柱
			$cH = $this->shizhu($dayCyclical+$i);
					
			$bazi[$i]['cY'] = $cY;
			$bazi[$i]['cM'] = $cM;
			$bazi[$i]['cD'] = $cD;	
			$bazi[$i]['cH'] = $cH;	
		}
		$this->bazi = $bazi;
		// var_dump($bazi);
		// 修正年柱与月柱
		if($this->use_amend){
			$r['cY'] = $bazi[$d-3]['cY'];
			$r['cM'] = $bazi[$d-3]['cM'];
			$r['cD'] = $bazi[$d-1]['cD'];
			$r['cH'] = $bazi[$d-1]['cH'];
		}else{
			$r = $bazi[$d-1];
		}
		
		return $r;
	}
	
	public function getAll(){
		return $this->bazi;
	}
	
	//============================== 传入 offset 返回干支, 0=甲子
	private function cyclical($num) {
		$ganIndex = $num%10;
		$zhiIndex = $num%12;
		return $this->Gan[$ganIndex] . $this->Zhi[$zhiIndex];
	}

	//===== 某年的第n个节气为几日(从0小寒起算)
	private function sTerm($y,$n) {
		$dtz = new DateTimeZone("UTC");
		$datetime = new DateTime("1900-01-06 02:05:00", $dtz);
		$time3 = (float)$datetime->format("U");
		$timestamp = ( 31556925974.7*($y-1900) + $this->sTermInfo[$n]*60000  ) + $time3*1000;
		return gmdate("j",$timestamp/1000);		
	}

	//==============================返回公历 y年某m+1月的天数
	private function solarDays($y,$m) {
		if($m==1)
			return((($y%4 == 0) && ($y%100 != 0) || ($y%400 == 0))? 29: 28);
		else
			return($this->solarMonth[$m]);
	}
	
	//==============================计算时柱
    private function shizhu($num){
        //修正时柱，fixbug by shizhu
		$ganIndex = $num%10;
		$iHour = $this->hour;
		$zhiIndex = 0;
        if ($iHour >= 1) $zhiIndex = (($iHour / 2) + ($iHour % 2)) % 12;
//		$ganIndex = $ganIndex-2;
//		$ganIndex = ($ganIndex < 0) ? $ganIndex+10 : $ganIndex;
//		return $this->Gan[$ganIndex] . $this->Zhi[$zhiIndex];
		return $this->shiGanZhi[$ganIndex][$zhiIndex];
	}
}

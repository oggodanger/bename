<?php
global $xsHzMap,$xsJi;
// 1,2,3,4,5 对应 金木水火土
$xsHzMap = array(
	1 => array(
		1 => array(
			'xishen' => '金',
			'hanzi' => '金',
			'guanxi' => '相合',
			'jixiong' => '大吉',
			'jifen' => 10,
		),
		2 => array(
			'xishen' => '金',
			'hanzi' => '木',
			'guanxi' => '相安',
			'jixiong' => '小吉',
			'jifen' => 2,
		),
		3 => array(
			'xishen' => '金',
			'hanzi' => '水',
			'guanxi' => '相泄',
			'jixiong' => '小凶',
			'jifen' => -5,
		),
		4 => array(
			'xishen' => '金',
			'hanzi' => '火',
			'guanxi' => '相克',
			'jixiong' => '大凶',
			'jifen' => -8,
		),
		5 => array(
			'xishen' => '金',
			'hanzi' => '土',
			'guanxi' => '相生',
			'jixiong' => '中吉',
			'jifen' => 7,
		),
	),
	2 => array(
		1 => array(
			'xishen' => '木',
			'hanzi' => '金',
			'guanxi' => '相克',
			'jixiong' => '大凶',
			'jifen' => -8,
		),
		2 => array(
			'xishen' => '木',
			'hanzi' => '木',
			'guanxi' => '相合',
			'jixiong' => '大吉',
			'jifen' => 10,
		),
		3 => array(
			'xishen' => '木',
			'hanzi' => '水',
			'guanxi' => '相生',
			'jixiong' => '中吉',
			'jifen' => 7,
		),
		4 => array(
			'xishen' => '木',
			'hanzi' => '火',
			'guanxi' => '相泄',
			'jixiong' => '小凶',
			'jifen' => -5,
		),
		5 => array(
			'xishen' => '木',
			'hanzi' => '土',
			'guanxi' => '相安',
			'jixiong' => '小吉',
			'jifen' => 2,
		),
	),
	3 => array(
		1 => array(
			'xishen' => '水',
			'hanzi' => '金',
			'guanxi' => '相生',
			'jixiong' => '中吉',
			'jifen' => 7,
		),
		2 => array(
			'xishen' => '水',
			'hanzi' => '木',
			'guanxi' => '相泄',
			'jixiong' => '小凶',
			'jifen' => -5,
		),
		3 => array(
			'xishen' => '水',
			'hanzi' => '水',
			'guanxi' => '相合',
			'jixiong' => '大吉',
			'jifen' => 10,
		),
		4 => array(
			'xishen' => '水',
			'hanzi' => '火',
			'guanxi' => '相安',
			'jixiong' => '小吉',
			'jifen' => 2,
		),
		5 => array(
			'xishen' => '水',
			'hanzi' => '土',
			'guanxi' => '相克',
			'jixiong' => '大凶',
			'jifen' => -8,
		),
	),
	4 => array(
		1 => array(
			'xishen' => '火',
			'hanzi' => '金',
			'guanxi' => '相安',
			'jixiong' => '小吉',
			'jifen' => 2,
		),
		2 => array(
			'xishen' => '火',
			'hanzi' => '木',
			'guanxi' => '相生',
			'jixiong' => '中吉',
			'jifen' => 7,
		),
		3 => array(
			'xishen' => '火',
			'hanzi' => '水',
			'guanxi' => '相克',
			'jixiong' => '大凶',
			'jifen' => -8,
		),
		4 => array(
			'xishen' => '火',
			'hanzi' => '火',
			'guanxi' => '相合',
			'jixiong' => '大吉',
			'jifen' => 10,
		),
		5 => array(
			'xishen' => '火',
			'hanzi' => '土',
			'guanxi' => '相泄',
			'jixiong' => '小凶',
			'jifen' => -5,
		),
	),
	5 => array(
		1 => array(
			'xishen' => '土',
			'hanzi' => '金',
			'guanxi' => '相泄',
			'jixiong' => '小凶',
			'jifen' => -5,
		),
		2 => array(
			'xishen' => '土',
			'hanzi' => '木',
			'guanxi' => '相克',
			'jixiong' => '大凶',
			'jifen' => -8,
		),
		3 => array(
			'xishen' => '土',
			'hanzi' => '水',
			'guanxi' => '相安',
			'jixiong' => '小吉',
			'jifen' => 2,
		),
		4 => array(
			'xishen' => '土',
			'hanzi' => '火',
			'guanxi' => '相生',
			'jixiong' => '中吉',
			'jifen' => 7,
		),
		5 => array(
			'xishen' => '土',
			'hanzi' => '土',
			'guanxi' => '相合',
			'jixiong' => '大吉',
			'jifen' => 10,
		),
	),
);

// 姓名中忌用
$xsJi = array(
	'1' => array(
		'ke' => '火',
		'xie' => '水'
	),
	'2' => array(
		'ke' => '金',
		'xie' => '火'
	),
	'3' => array(
		'ke' => '土',
		'xie' => '木'
	),
	'4' => array(
		'ke' => '水',
		'xie' => '土'
	),
	'5' => array(
		'ke' => '木',
		'xie' => '金'
	),
);

function getXsHzMap($xishen,$wuxing){
	global $xsHzMap;
	$wx = array(1=>'金','木','水','火','土');
	$r = array();
	$wxIndex = array_keys($wx, $wuxing);
	$wxIndex = $wxIndex[0];
	$curr = $xsHzMap[$xishen['wuxing']];
	return $curr[$wxIndex];
}

// 获取五行打分，根据姓名中字的五行和八字喜神获取
function getWxScore($xishen, $xingmingData){
	$score = 80;
	$jx = array();
	foreach(array('xing','ming') as $index){
		foreach($xingmingData[$index] as $key=>$value){ 
			$jx[] = getXsHzMap($xishen, $value['wuxing']);
		}
	}
	
	foreach($jx as $jixiong){
		$score += $jixiong['jifen'];
	}
	
	if($score > 100) $score = 100;
	if($score < 50) $score = 50;
//	echo '<pre>';var_dump($score);print_r($jx);echo '</pre>';
	return $score;
}

// 五行类
class Wuxing {
	private $baziWuxing = array();
	private $wuxingFactor = array(1=>0,0,0,0,0); // 五行强度
	private $fateFactor = NULL;
	private $fateFactorKey = NULL;
	private $tonglei;	// 同类属性
	private $yilei;	// 异类属性
	private $tongleiWuxing = array();	//同类五行
	private $yileiWuxing = array();	// 异类五行
	private $xishen = array(); 	// 八字喜神
	private $baziQiangruo = NULL;
	private $Gan = array("甲","乙","丙","丁","戊","己","庚","辛","壬","癸");
	private $Zhi = array("子","丑","寅","卯","辰","巳","午","未","申","酉","戌","亥");
	private $wx = array('','金','木','水','火','土');	// '1'=>金, '2'=>'木', '3'=>'水', '4'=>'火', '5'=>'土'
	private $ganWuxing = array(2,2,4,4,5,5,1,1,3,3);	// 天干五行属性
	private $zhiWuxing = array(3,5,2,2,5,4,4,5,1,1,5,3);	// 地支五行属性
	private $wxXiangsheng = array(1=>3,3=>2,2=>4,4=>5,5=>1); // 五行相生关系：金生水，水生木，木生火，火生土，土生金
	// 天干强度(每个天干对应之后,查月支对应的值)
	private $ganFactor = array(
		array(1.2, 1.06, 1.14, 1.2, 1.1, 1.0, 1.0, 1.04, 1.06, 1.0, 1.0, 1.2),	// 甲
		array(1.2, 1.06, 1.14, 1.2, 1.1, 1.0, 1.0, 1.04, 1.06, 1.0, 1.0, 1.2),	// 乙
		array(1.0, 1.0, 1.2, 1.2, 1.06, 1.14, 1.2, 1.1, 1.0, 1.0, 1.04, 1.0),	// 丙
		array(1.0, 1.0, 1.2, 1.2, 1.06, 1.14, 1.2, 1.1, 1.0, 1.0, 1.04, 1.0),	// 丁
		array(1.0, 1.1, 1.06, 1.0, 1.1, 1.14, 1.2, 1.16, 1.0, 1.0, 1.14, 1.0),	// 戊
		array(1.0, 1.1, 1.06, 1.0, 1.1, 1.14, 1.2, 1.16, 1.0, 1.0, 1.14, 1.0),	// 己
		array(1.0, 1.14, 1.0, 1.0, 1.1, 1.06, 1.0, 1.1, 1.14, 1.2, 1.16, 1.0),	// 庚
		array(1.0, 1.14, 1.0, 1.0, 1.1, 1.06, 1.0, 1.1, 1.14, 1.2, 1.16, 1.0),	// 辛
		array(1.2, 1.1, 1.0, 1.0, 1.04, 1.06, 1.0, 1.0, 1.2, 1.2, 1.06, 1.14),	// 壬
		array(1.2, 1.1, 1.0, 1.0, 1.04, 1.06, 1.0, 1.0, 1.2, 1.2, 1.06, 1.14),	// 癸
	);
	// 地支强度(支里藏干),找到地支之后,先看藏了哪几个干,然后根据月支获取相应的强度系数
	private $zhiFactor = array(
		// 子
		array(
			'cang' => array('癸'),
			'0' => array(1.2,1.1,1.0,1.0,1.04,1.06,1.0,1.0,1.2,1.2,1.06,1.14)
		),
		// 丑
		array(
			'cang' => array('癸','辛','己'),
			'0' => array(0.36,0.33,0.3,0.3,0.312,0.318,0.3,0.3,0.36,0.36,0.318,0.342),
			'1' => array(0.2,0.228,0.2,0.2,0.23,0.212,0.2,0.22,0.228,0.248,0.232,0.2),
			'2' => array(0.5,0.55,0.53,0.5,0.55,0.57,0.6,0.58,0.5,0.5,0.57,0.5),
		),
		// 寅
		array(
			'cang' => array('丙','甲'),
			'0' => array(0.3,0.3,0.36,0.36,0.318,0.342,0.36,0.33,0.3,0.3,0.342,0.318),
			'1' => array(0.84,0.742,0.798,0.84,0.77,0.7,0.7,0.728,0.742,0.7,0.7,0.84)
		),
		// 卯
		array(
			'cang' => array('乙'),
			'0' => array(1.2,1.06,1.14,1.2,1.1,1.0,1.0,1.04,1.06,1.0,1.0,1.2)
		),
		// 辰
		array(
			'cang' => array('乙','癸','戊'),
			'0' => array(0.36,0.318,0.342,0.36,0.33,0.3,0.3,0.312,0.318,0.3,0.3,0.36),
			'1' => array(0.24,0.22,0.2,0.2,0.208,0.2,0.2,0.2,0.24,0.24,0.212,0.228),
			'2' => array(0.5,0.55,0.53,0.5,0.55,0.6,0.6,0.58,0.5,0.5,0.57,0.5)
		),
		// 巳
		array(
			'cang' => array('庚','丙'),
			'0' => array(0.3,0.342,0.3,0.33,0.3,0.3,0.33,0.342,0.36,0.348,0.3),
			'1' => array(0.7,0.7,0.84,0.84,0.742,0.84,0.84,0.798,0.7,0.7,0.728,0.742)
		),
		// 午
		array(
			'cang' => array('丁'),
			'0' => array(1.0,1.0,1.2,1.2,1.06,1.14,1.2,1.1,1.0,1.0,1.04,1.06)
		),
		// 未
		array(
			'cang' => array('丁','乙','己'),
			'0' => array(0.3,0.3,0.36,0.36,0.318,0.342,0.36,0.33,0.3,0.3,0.312,0.318),
			'1' => array(0.24,0.212,0.228,0.24,0.22,0.2,0.2,0.208,0.212,0.2,0.2,0.24),
			'2' => array(0.5,0.55,0.53,0.5,0.55,0.57,0.6,0.58,0.5,0.5,0.57,0.5)
		),
		// 申
		array(
			'cang' => array('壬','庚'),
			'0' => array(0.36,0.33,0.3,0.3,0.312,0.318,0.3,0.3,0.36,0.36,0.318,0.342),
			'1' => array(0.7,0.798,0.7,0.7,0.77,0.742,0.7,0.77,0.798,0.84,0.812,0.7),
		),
		// 酉
		array(
			'cang' => array('辛'),
			'0' => array(1.0,1.14,1.0,1.0,1.1,1.06,1.0,1.1,1.14,1.2,1.16,1.0)
		),
		// 戌
		array(
			'cang' => array('辛','丁','戊'),
			'0' => array(0.3,0.342,0.3,0.3,0.33,0.318,0.3,0.33,0.342,0.36,0.348,0.3),
			'1' => array(0.2,0.2,0.24,0.24,0.212,0.228,0.24,0.22,0.2,0.2,0.208,0.212),
			'2' => array(0.5,0.55,0.53,0.5,0.55,0.57,0.6,0.58,0.5,0.5,0.57,0.5)
		),
		// 亥
		array(
			'cang' => array('甲','壬'),
			'0' => array(0.36,0.318,0.342,0.36,0.33,0.3,0.3,0.312,0.318,0.3,0.3,0.36),
			'1' => array(0.84,0.77,0.7,0.7,0.728,0.742,0.7,0.7,0.84,0.84,0.724,0.798)
		)
	);
	
	public function __construct($bazi){
		$this->setBaziWuxingFactor($bazi); 	// 设置八字五行强度值
		$this->setBaziXishen();
	}
	
	// 获取八字五行
	public function getBaziWuxing(){
		return $this->baziWuxing;
	}
	
	// 获取八字五行强度
	public function getBaziWuxingFactor(){
		return $this->wuxingFactor;
	}
	
	// 获取命里属性
	public function getFateFactor(){
		return $this->fateFactor;
	}
	
	// 获取同类
	public function getTonglei(){
		return $this->tonglei;
	}
	
	// 获取异类
	public function getYilei(){
		return $this->yilei;
	}
	
	// 获取同类五行
	public function getTongleiWuxing(){
		return $this->tongleiWuxing;
	}
	
	// 获取异类五行
	public function getYileiWuxing(){
		return $this->yileiWuxing;
	}
	
	// 获取八字喜神
	public function getBaziXishen(){
		$xishen = $this->xishen;
		$xishen['qiangruo'] = $this->baziQiangruo;
		return $xishen;
	}
	
	// 获取同类得分描述
	public function getTongleiDesc(){
		$tongleiWuxing = $this->tongleiWuxing;
		return sprintf("%s%.2f，%s%.2f，共计%.2f分；", $tongleiWuxing[0]['wuxingText'], $tongleiWuxing[0]['defen'], $tongleiWuxing[1]['wuxingText'], $tongleiWuxing[1]['defen'], $this->tonglei);
	}
	
	// 获取异类得分描述
	public function getYileiDesc(){
		$yileiWuxing = $this->yileiWuxing;
		return sprintf("%s%.2f，%s%.2f，%s%.2f，共计%.2f分；", $yileiWuxing[0]['wuxingText'], $yileiWuxing[0]['defen'], $yileiWuxing[1]['wuxingText'], $yileiWuxing[1]['defen'], $yileiWuxing[2]['wuxingText'], $yileiWuxing[2]['defen'], $this->yilei);
	}
	
	/**
	 * 计算并设置八字五行
	 * @param array $bazi 已经分离我八个字的八字
	 * @return array 八字的五行,包含4个值
	 */
	private function setBaziWuxing($bazi){
		$j = 0;
		$baziWuxing = array();
		for($i=0;$i<8;$i=$i+2,$j++){
			$ganKeyArr = array_keys($this->Gan,$bazi[$i]);
			$ganKey = $ganKeyArr[0];
			$zhiKeyArr = array_keys($this->Zhi,$bazi[$i+1]);
			$zhiKey = $zhiKeyArr[0];
			$baziWuxing[$j] = $this->wx[$this->ganWuxing[$ganKey]].$this->wx[$this->zhiWuxing[$zhiKey]];
		}
	//	echo '<pre>';print_r($baziWuxing);echo '</pre>';
		$this->baziWuxing = $baziWuxing;
	}
	
	/**
	 * 计算并设置八字五行强度
	 * @param array $bazi array('cY'=>'戊申','cM'=>'辛酉','cD'=>'壬寅','cH'=>'甲辰');
	 * @return array $wuxing array(3.24,2.0,1.8,0.3,1.5); // 对应金木水火土的强度值
	 */
	private function setBaziWuxingFactor($bazi){
		$bazi = $this->separateBazi($bazi);
		$this->setBaziWuxing($bazi);
		
		$this->setFateFactor($bazi[4]); // 传入日干，设置八字命里属性
		if(is_null($this->fateFactor)) die('命里属性设置失败，请检查传入的八字格式是否正确！');
		
		// 计算天干五行强度
		for($i=0;$i<8;$i=$i+2){
			$this->setFactorByGan($bazi[$i],$bazi[3]);	// 根据天干和月支获取天干五行强度
		}
		// 计算地支五行强度
		for($i=1;$i<8;$i=$i+2){
			$this->setFactorByZhi($bazi[$i],$bazi[3]);
		}
		$this->setTongleiYilei();	// 设置同类和异类属性
	}
	
	/**
	 * 将八字的八个字分离
	 * @param array $bazi array('cY'=>'','cM'=>'','cD'=>'','cH'=>'');
	 * @return array $sepBazi array('戊','申','辛','酉','壬','寅','甲','辰'); // 对应金木水火土的强度值
	 */
	private function separateBazi($bazi){
		$seqBazi = array();
	
		$seqBazi = $this->mbStringToArray(implode('',$bazi));
		return $seqBazi;
	}
	
	// 计算天干五行强度
	private function setFactorByGan($gan,$yZhi){
		$ganKeyArr = array_keys($this->Gan,$gan);
		$ganKey = $ganKeyArr[0];
		$yZhiKeyArr = array_keys($this->Zhi,$yZhi);
		$yZhiKey = $yZhiKeyArr[0];
		$wuxingKey =$this->ganWuxing[$ganKey];	// 获得五行索引
		$this->wuxingFactor[$wuxingKey] += $this->ganFactor[$ganKey][$yZhiKey];
	}
	
	// 计算地支五行强度
	private function setFactorByZhi($zhi,$yZhi){
		$zhiKeyArr = array_keys($this->Zhi,$zhi);
		$zhiKey = $zhiKeyArr[0];
		$yZhiKeyArr = array_keys($this->Zhi,$yZhi);
		$yZhiKey = $yZhiKeyArr[0];
		$curZhiFactor = $this->zhiFactor[$zhiKey];
		foreach($curZhiFactor['cang'] as $k=>$z){
			$zGanKeyArr = array_keys($this->Gan,$z);
			$zGanKey = $zGanKeyArr[0];
			$zWuxingKey = $this->ganWuxing[$zGanKey];	//获得支里藏干的五行索引
			$this->wuxingFactor[$zWuxingKey] += $curZhiFactor[$k][$yZhiKey];
		}
	}
	
	// 设置八字的命里属性
	private function setFateFactor($rGan){
		$rGanKeyArr = array_keys($this->Gan,$rGan);
		$rGanKey = $rGanKeyArr[0];
		$this->fateFactorKey = $this->ganWuxing[$rGanKey];
		$this->fateFactor = $this->wx[$this->fateFactorKey];
	}
	
	// 设置同类和异类属性
	private function setTongleiYilei(){
		$tlKeyArr = array_keys($this->wxXiangsheng,$this->fateFactorKey);
		$tlKey2 = $tlKeyArr[0];
	//	$tlKey2 = $this->wxXiangsheng[$this->fateFactorKey];
		$this->tonglei = $this->wuxingFactor[$this->fateFactorKey] + $this->wuxingFactor[$tlKey2];	//同类
		// 同类五行
		$this->tongleiWuxing = array(
			0 => array(
				'wuxing' => $this->fateFactorKey,
				'wuxingText' =>$this->wx[$this->fateFactorKey],
				'defen' => $this->wuxingFactor[$this->fateFactorKey]
			),
			1 => array(
				'wuxing' => $tlKey2,
				'wuxingText' =>$this->wx[$tlKey2],
				'defen' => $this->wuxingFactor[$tlKey2]
			),
		);
		$tempWxFactor = $this->wuxingFactor;
		unset($tempWxFactor[$this->fateFactorKey]);
		unset($tempWxFactor[$tlKey2]);
		$this->yilei = array_sum($tempWxFactor);	// 异类
		// 异类五行
		$yileiWuxing = array();
		foreach($tempWxFactor as $ylKey => $ylValue){
			$yileiWuxing[] = array(
				'wuxing' => $ylKey,
				'wuxingText' =>$this->wx[$ylKey],
				'defen' => $ylValue
			);
		}
		$this->yileiWuxing = $yileiWuxing;
	}
	
	// 计算八字喜神
	private function setBaziXishen(){
		$tonglei = $this->tonglei;
		$yilei = $this->yilei;
		$defen = 100;
		$xishen = array();
		// 若出现同分，按金木水火土的顺序取较前者。(就是取较低者的时候发现有同分)
		if( ($tonglei - $yilei > 0) && (float)($tonglei - $yilei) / $yilei >= 0.15 ){
			$this->baziQiangruo = '偏强';
			// 情况1：A-B为正值，且A-B/B大于等于15%，则八字偏强，喜神取异类3行里面得分较低者。
			foreach($this->yileiWuxing as $yl){
				if($defen > $yl['defen']){
					$defen = $yl['defen'];
					$xishen = $yl;
				}else if($defen == $yl['defen']){	//同分的情况
					if(!empty($xishen)){
						if($xishen['wuxing'] > $yl['wuxing']) $xishen = $yl;
					}
				}
			}
		}else if( ($tonglei - $yilei < 0) && (float)($yilei - $tonglei) / $tonglei >= 0.15 ){
			$this->baziQiangruo = '偏弱';
			// 情况2：A-B为负值，且B-A/A大于等于15%，则八字偏弱，喜神取同类2行里面得分较低者。
			foreach($this->tongleiWuxing as $tl){
				if($defen > $tl['defen']){
					$defen = $tl['defen'];
					$xishen = $tl;
				}else if($defen == $tl['defen']){	//同分的情况
					if(!empty($xishen)){
						if($xishen['wuxing'] > $tl['wuxing']) $xishen = $tl;
					}
				}
			}
		}else{

            //处理八字均衡
            foreach($this->tongleiWuxing as $key => $val){
                $tongleiWuxing_dafen_arr['A' . $key] = $val['defen'] . '|' . $val['wuxingText'];
                //$tongleiWuxing_dafen_arr['A' . $key] = $val['wuxingText'];
            }
            sort($tongleiWuxing_dafen_arr);
            $find_wuxing = array_search($tongleiWuxing_dafen_arr['0'], $this->tongleiWuxing, true);

            foreach($this->yileiWuxing as $key => $val){
                $yileiWuxing_dafen_arr['A' . $key] = $val['defen'] . '|' . $val['wuxingText'];
                //$yileiWuxing_dafen_arr['A' . $key] = $val['wuxingText'];
            }
            sort($yileiWuxing_dafen_arr);
            $find_wuxing2 = array_search($yileiWuxing_dafen_arr['0'], $this->yileiWuxing, true);

            //判断是否喜用神均衡
//            if($xishen['qiangruo'] == '均衡') {
            //比较同类和异类的分数高低
            if($tonglei < $yilei){
                $xiyongshen = $tongleiWuxing_dafen_arr['0'];
            } else {
                $xiyongshen = $yileiWuxing_dafen_arr['0'];
            }
            $xiyongshen_arr = explode('|', $xiyongshen);
            $xiyongshen_defen = $xiyongshen_arr['0'];
            $xiyongshen_wuxing = $xiyongshen_arr['1'];
//            }
            if($xiyongshen_wuxing){
                $xishen['wuxingText'] = $xiyongshen_wuxing;
                /*$rst['xingys']['bazi'] = str_replace('「'.$xishen['wuxingText'].'」', '「'.$xiyongshen_wuxing.'」', $rst['xingys']['bazi']);
                $rst['xingys']['desc'] = str_replace('「'.$xishen['wuxingText'].'」', '「'.$xiyongshen_wuxing.'」', $rst['xingys']['desc']);*/
            }


			$this->baziQiangruo = '均衡';
			// 情况3：其余情况，八字均衡，喜神取五行里面得分较低者。
		//	$wxAll = $this->tongleiWuxing + $this->yileiWuxing;
			$wxAll = array_merge($this->tongleiWuxing, $this->yileiWuxing);
		/*	if($_SERVER['REMOTE_ADDR'] == '220.168.86.22'){
				echo '<pre>';print_r($wxAll);echo '</pre>';
			}*/
            foreach($wxAll as $wx){
                if($xishen['wuxingText'] == $wx['wuxingText']){
                    $defen = $xiyongshen_defen;
                    $xishen = $wx;
                }
            }

        }
		$this->xishen = $xishen;
	}
	
	private function mbStringToArray ($string,$encode="utf-8") {            //把含有中文的字符串转换为数组
        $strlen = mb_strlen($string);
        while ($strlen) {
            $array[] = mb_substr($string,0,1,$encode);
            $string = mb_substr($string,1,$strlen,$encode);
            $strlen = mb_strlen($string);
        }
        return $array;
    }
}
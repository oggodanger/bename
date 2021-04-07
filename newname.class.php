<?php
//五行八字引入文件
include(dirname(__FILE__).'/include/bazi.php');

include(dirname(__FILE__).'/include/wuxing.php');

include(dirname(__FILE__).'/include/BaziCommon.class.php');

// include(dirname(__FILE__).'/base.php');

include(dirname(__FILE__)."/boy_name.php");
include(dirname(__FILE__)."/girl_name.php");
include(dirname(__FILE__)."/word.php");
include(dirname(__FILE__)."/family_name.php");
include(dirname(__FILE__)."/inappropriate_name.php");
include(dirname(__FILE__)."/name_config.php");
include(dirname(__FILE__)."/sensitive_words.php");


class Newname
{
	protected static $nature_name;

	protected static $sensitive_words;

	protected static $inappropriate_name;

	protected static $zodiac_word;

	protected static $relation_arr = array('相合','相生','相安','相泄','相克');

	protected static $wx_score_arr;

	protected static $ten_god_property;

	protected static $double_tengod;

	protected static $family_name_arr;

	protected static $voice_score_arr;

	protected static $structure_score_arr;

	protected static $boy_name_arr;

	protected static $girl_name_arr;

	public static $family_name;//姓

	public static $sex;//性别

	public static $birthday;

	public $bazi;
	//五行之间 相合  生  安  泄  克  的关系
	protected static $wx_relation = array(
		'金'=>array('金','土','木','水','火'),
		'木'=>array('木','水','土','火','金'),
		'水'=>array('水','金','火','木','土'),
		'火'=>array('火','木','金','土','水'),
		'土'=>array('土','火','水','金','木'),
	);


	function __construct($birthday,$family_name,$sex)
	{

		$this->birthday = $birthday;
		$this->family_name = $family_name;
		$this->sex = $sex;
		$this->bazi = $this->get_bazi();

	}

	//获取结果
	public function get_result(){

		//判断姓氏是否可用
		if($this->check_family_name()){
			$res = $this->get_name();
			return $res;

		}else{
			return ['status'=>0,'msg'=>'姓氏不可用'];
		}
	}

	public function output($name = '翊翃')
	{
		$res['input'] = [$this->family_name,$this->sex,$this->birthday];
		$res['style'] = $this->get_style();
		$res['bazi'] = $this->get_bazi();
		$res['wuxing']=$this->get_wuxing();
		$res['zodiac'] = $this->get_zodiac();
		$res['score'] = $this->get_zodiac_score('仲');

		return $res;
	}

	//根据五行 性别 获取名字
	public  function get_name()
	{
		//获取五行

		$wuxing = $this->get_wuxing();
		if($this->sex == 2){
			//性别未定的处理
			$name_arr = array(
				'boy' => self::get_boy_name_arr(),
				'girl' => self::get_girl_name_arr()
			);

			//性别未定 小名的获取
			$childhood_name_arr = array(
				'boy'=>$name_arr['boy']['childhood'][$wuxing],
				'girl'=>$name_arr['girl']['childhood'][$wuxing],
			);
			$childhood_name = $this->get_childhood_name($childhood_name_arr);

			//性别未定 英文名的获取
			$english_name_arr = array(
				'boy'=>$name_arr['boy']['english'],
				'girl'=>$name_arr['girl']['english'],
			);
			$english_name = $this->get_english_name($english_name_arr);

			$single_name = array(
				'boy'=>$this->deal_name($name_arr['boy']['single'][$wuxing],15),
				'girl'=>$this->deal_name($name_arr['girl']['single'][$wuxing],15),
			);

			$double_name = array(
				'boy'=>$this->deal_name($name_arr['boy']['double'][$wuxing],35),
				'girl'=>$this->deal_name($name_arr['girl']['double'][$wuxing],35),
			);

			$name_list = array(
				'single_name' => $single_name,
				'double_name' => $double_name,
				'childhood' => $childhood_name,
				'english_name' => $english_name,
			);

		}else{
			//根据性别 五行获取名字
			if($this->sex == 1){
				$name_arr = self::get_boy_name_arr();
			}else if($this->sex == 0){
				$name_arr = self::get_girl_name_arr();
			}

			//英文名以及小明的最终结果
			$childhood_name = $this->get_childhood_name($name_arr['childhood'][$wuxing]);
			$english_name = $this->get_english_name($name_arr['english']);

			//初步单双名字获取名字获取
			$single_name = $this->deal_name($name_arr['single'][$wuxing],35);
			$double_name = $this->deal_name($name_arr['double'][$wuxing],65);

			$name_list = array(
				'single' => $single_name,
				'double' => $double_name,
				'childhood' => $childhood_name,
				'english' => $english_name
			);
		}

		return $name_list;

		
	}

	//处理初选姓名
	public function deal_name($name_arr,$num = 30)
	{

		$res = [];

		foreach ($name_arr as $key => $value) {

			$res[] = array('score'=>$this->get_score($value),'name'=>$value,'auspicious'=>$this->get_auspicious($this->get_score($value)));

		}

		//根据评分排序
		$score_arr = array_column($res,'score');
		array_multisort($score_arr ,SORT_DESC,$res);

		//所用字数组
		$words_arr = [];

		$result = [];

		foreach ($res as $key => $val) {

			$name_arrs = str_split($val['name'],3);

			if(count($name_arrs) >1){

				if(!in_array($name_arrs[0],array_keys($words_arr)) && !in_array($name_arrs[1],array_keys($words_arr))){

					array_push($result, $val);

					$words_arr[$name_arrs[0]] = 1;

					$words_arr[$name_arrs[1]] = 1;

				}else{

					if($words_arr[$name_arrs[0]] < 3 && $words_arr[$name_arrs[1]] < 3){

						$words_arr[$name_arrs[0]] += 1;

						$words_arr[$name_arrs[1]] += 1;

						array_push($result, $val);

					}

				}


			}else{


				array_push($result, $val);

			}

		}

		// return $words_arr;
		return array_slice($result,0,$num);
	}

	public function get_auspicious($num)
	{

		if($num >= 90){

			$res = '大吉';

		}elseif ($num < 90 && $num >= 80) {

			$res = '中吉';

		}else{

			$res = '小吉';

		}

		return $res;
	}

	//姓名评分
	public function get_score($name)
	{

		$wuxing_score = $this->get_wuxing_score($name);

		$voice_score = $this->get_vocie_score($name);

		$bazi_score = $this->get_bazi_score($name);

		$structure_score = $this->get_structure_score($name);

		$zodiac_score = $this->get_zodiac_score($name);

		$score = round($wuxing_score + $voice_score + $bazi_score + $structure_score + $zodiac_score);


		return $score;
	}

	//获取生肖得分
	public function get_zodiac_score($name)
	{
		$score = 0;

		$zodiac = $this->get_zodiac();

		$zodiac_score = self::get_zodiac_score_arr();

		$word_arr = self::get_word_arr();

		$name_arr = str_split($name,3);

		foreach ($name_arr as $key => $value) {
			

			if(in_array($word_arr[$value][0],$zodiac_score[$zodiac])){

				$score = 5;
			}

		}

		return $score;
	}

    //计算生肖
    public function get_zodiac()
    {
        //生肖
        $baziArr = $this->get_bazi_arr();

        $zodiac = BaziCommon::zhiKey($baziArr[2]);

        $shengxiaoArr = array('鼠','牛','虎','兔','蛇','马','羊','猴','鸡','狗','猪');

        return $shengxiaoArr[$zodiac];

    }

	//获取八字评分
	public function get_bazi_score($name)
	{
		$bazi_score = 0;
		$word_arr = self::get_word_arr();

		$name_arr = str_split($name,3);

		$bazi_arr = $this->get_style();

		if(count($name_arr) == 1){//单字名

			$ten_god_property = self::get_ten_god_property();

			if($ten_god_property[$bazi_arr['style']][0] == $word_arr[$name_arr[0]][7]){

				$bazi_score = $ten_god_property[$bazi_arr['style']][1];

			}


		}else{//双字名

			$double_tengod = self::get_double_tengod();

			foreach ($double_tengod as $key => $value) {

				if($bazi_arr['style'] == $value[0] && $word_arr[$name_arr[0]][7] == $value[1] && $word_arr[$name_arr[1]][7] == $value[2]){

					$bazi_score = $value[3];

				}
			}

		}

		return $bazi_score;
	}

	//获取字形评分
	public function get_structure_score($name)
	{

		$word_arr = self::get_word_arr();

		$name_arr = str_split($name,3);

		$family_name_arr = self::get_family_name_arr();

		$family_name_info = $family_name_arr[$this->family_name];

		if(strlen($this->family_name)>3){//复姓

			$family_name_structure = $family_name_info[4];

		}else{//单姓

			$family_name_structure = $family_name_info[2];

		}

		$structure_score_arr = self::get_structure_score_arr();

		if(count($name_arr) > 1){//双体字

			foreach ($structure_score_arr['double'] as $key => $value) {

				if($family_name_structure == $value[0] && $word_arr[$name_arr[0]][5] == $value[1] && $word_arr[$name_arr[1]][5] == $value[2]){

					$structure_score = $value[3];
					break;

				}
			}

		}else{//单体字

			foreach ($structure_score_arr['single'] as $key => $value) {

				if($family_name_structure == $value[0] && $word_arr[$name_arr[0]][5] == $value[1]){

					$structure_score = $value[2];
					break;

				}

			}

		}

		return $structure_score;
	}

	//获取音韵评分
	public function get_vocie_score($name)
	{

		$word_arr = self::get_word_arr();

		$name_arr = str_split($name,3);

		$family_name_arr = self::get_family_name_arr();

		$family_name_info = $family_name_arr[$this->family_name];

		if(strlen($this->family_name)>3){//复姓

			$family_name_voice = $family_name_info[3];

		}else{//单姓

			$family_name_voice = $family_name_info[1];

		}

		$voice_score_arr = self::get_voice_score_arr();
		if(count($name_arr) > 1){//双字名

			foreach ($voice_score_arr['double'] as $key => $value) {
				
				if($family_name_voice == $value[0] && $word_arr[$name_arr[0]][3] == $value[1] && $word_arr[$name_arr[1]][3] == $value[2]){

					$voice_score = $value[3];
					break;

				}
			}

		}else{//单字名

			foreach ($$voice_score_arr['single'] as $key => $value) {
				
				if($family_name_voice == $value[0] && $word_arr[$name_arr[0]][3] == $value[1]){

					$voice_score = $value[2];
					break;

				}
			}

		}

		return $voice_score;

	}

	//获取姓名五行得分
	public function get_wuxing_score($name)
	{
		$word_arr = self::get_word_arr();
		// $score = 0;

		$name_arr = str_split($name,3);
		$relation = '';
		foreach ($name_arr as $key => $value) {
			$relation .= $this->get_relation($value,$word_arr[$value][1]);
		}

		$wx_score_arr = self::get_wx_score_arr();
		foreach ($wx_score_arr as $key => $value) {
			if(in_array($relation,$value[0])){
				$score = $value[1];
				break;
			}
		}

		return $score;
	}

	//获取名字和五行的相生相克关系
	public function get_relation($word,$word_wuxing)
	{
		$wuxing = $this->get_wuxing();
		$position = '';
		// $wx_relation = self::$wx_relation;
		foreach (self::$wx_relation[$wuxing] as $key => $value) {
			if($word_wuxing == $value){
				$position = $key;
			}
		}
		// return $position;
		return self::$relation_arr[$position];
	}

	//获取英文名
	public function get_english_name($english_name_arr)
	{

		$style = $this->get_style();

		if($this->sex == 2){
			//男孩15个 英文名字
			for($i = 0; $i < 2; $i++){
				if(in_array($style['geju'],$english_name_arr['boy'][$i]['tengod'])){
					shuffle($english_name_arr['boy'][$i]['name_stuff']);
					$english_name_boy = array_slice($english_name_arr['boy'][$i]['name_stuff'], 0, 15);
				}
			}

			//女孩15个英文名字
			for($i = 0; $i < 2; $i++){
				if(in_array($style['geju'],$english_name_arr['girl'][$i]['tengod'])){
					shuffle($english_name_arr['girl'][$i]['name_stuff']);
					$english_name_girl = array_slice($english_name_arr['girl'][$i]['name_stuff'], 0, 15);
				}
			}

			$english_name = array_merge($english_name_boy,$english_name_girl);

		}else{
			for($i = 0; $i < 2; $i++){
				if(in_array($style['geju'],$english_name_arr[$i]['tengod'])){
					shuffle($english_name_arr[$i]['name_stuff']);
					$english_name = array_slice($english_name_arr[$i]['name_stuff'], 0, 30);
				}
			}
		}


		return $english_name;
	}

	//获取小名
	public function get_childhood_name($childhood_name_arr)
	{
		$wuxing = $this->get_wuxing();
		if($this->sex == 2){

			//男孩15个  小名
			shuffle($childhood_name_arr['boy']);
			$childhood_name_boy = array_slice($childhood_name_arr['boy'], 0,15);

			//女孩15个  小名
			shuffle($childhood_name_arr['girl']);
			$childhood_name_girl = array_slice($childhood_name_arr['girl'], 0,15);

			$childhood_name = array_merge($childhood_name_boy,$childhood_name_girl);

		}else{
			shuffle($childhood_name_arr);

			$childhood_name = array_slice($childhood_name_arr, 0,30);
		}

		return $childhood_name;
	}

	//计算十神
    public function get_style()
    {

    	$nature_name = self::get_nature_name();

        //类型
        $baziArr = $this->get_bazi_arr();

        $gj = BaziCommon::geju($baziArr);

        //十神
        if($gj == ''||$gj == '建禄'){

            $gj = '比肩';

        }elseif ($gj == '月刃') {

            $gj = '劫财';

        }elseif($gj == '七杀'){
            
            $gj = '偏官';
        }

        //类型

        $style = $nature_name[$gj][2];

        $res = array('geju'=>$gj,'style'=>$style);

        return $res;

    }

    //八字排序
    public function get_bazi_arr()
    {

        $baziStr = '癸丑庚申甲辰庚午';

        //获取八字
        $bazi = $this->get_bazi();

        $baziStr = !empty($bazi) ? implode('',$bazi) : $baziStr;

        $baziArr = array('', '癸', '巳', '乙', '卯', '庚', '辰', '癸', '未');

        $baziArr[0] = '';

        for($i=1;$i<=8;$i++){

            $baziArr[$i] = mb_substr($baziStr, $i-1, 1, 'utf-8');

        }
        return $baziArr;
    }

	//计算八字
    public  function get_bazi()
    {

        list($iYear,$iMonth,$iDay,$iHour) = explode('-', $this->birthday);

        //八字
        $bazi = new Bazi($iYear,$iMonth,$iDay,$iHour);

        $data = $bazi->calendar();	// 获得八字的数据

        return $data;

    }

    //计算五行喜神用做数据查询
    public function get_wuxing()
    {

        //五行
        $wx = new Wuxing($this->bazi);

        $xishen = $wx->getBaziXishen();

        return $xishen['wuxingText'];

    }



    //判断姓是否可用
    public function check_family_name()
    {
    	$family_name_arr = self::get_family_name_arr();

    	$keys = array_keys($family_name_arr);

    	if(in_array($this->family_name, $keys)){

    		return true;
    	}else{
    		return false;
    	}
    }

    /*
    过滤敏感字
    $word_data 选出来作为名字的单字或者双字
    */
    public function CullingSensitiveWord($word_data)
    {


        $family_name_arr = self::get_family_name_arr();

        $family_name_py = $family_name_arr[$this->family_name][0];



        $family_name_pinyin_arr = explode(',',$family_name_py);

        if(count($family_name_pinyin_arr) > 1){

            $family_name_py = $family_name_pinyin_arr[1];

        }

        $temp = str_split($word_data,3);

        $name_py = '';

        for ($i=0; $i < count($temp); $i++) {

            if($family_name_py == $name_word[$temp[$i]][2]){

                return false;

            }else{

                $name_py = $name_py.$name_word[$temp[$i]][2];

            }
        }

        if(count($temp) > 1){

            $temp_name_py0 = $family_name_py.$temp[1];

            $res_name_py0  =  str_replace(array('ā','á','ǎ','à','ō','ó','ǒ','ò','ē','é','ě','è','ī','í','ǐ','ì','ū','ú','ǔ','ù','ǖ','ǘ','ǚ','ǜ','ü'),
                array('a','a','a','a','o','o','o','o','e','e','e','e','i','i','i','i','u','u','u','u','v','v','v','v','v')
                ,$temp_name_py0 );

            if(in_array($res_name_py0,$min_gan_py)){

                return false;

            }else{

                return true;

            }
        }

        $temp_name_py = $family_name_py.$name_py;

        $res_name_py  =  str_replace(array('ā','á','ǎ','à','ō','ó','ǒ','ò','ē','é','ě','è','ī','í','ǐ','ì','ū','ú','ǔ','ù','ǖ','ǘ','ǚ','ǜ','ü'),
            array('a','a','a','a','o','o','o','o','e','e','e','e','i','i','i','i','u','u','u','u','v','v','v','v','v')
            ,$temp_name_py );

        if(in_array($res_name_py,$min_gan_py)){

            return false;

        }else{

            return true;

        }

    }

	protected static function get_nature_name()
	{
		global $nature_name;
		return $nature_name;
	}

	protected static function get_sensitive_words()
	{
		global $sensitive_words;
		return $sensitive_words;
	}


	protected static function get_inappropriate_name()
	{
		global $inappropriate_name;
		return $inappropriate_name;
	}

	protected static function get_zodiac_word()
	{
		global $zodiac_word;
		return $zodiac_word;
	}

	protected static function get_zodiac_score_arr()
	{
		global $zodiac_score;
		return $zodiac_score;
	}


	protected static function get_wx_relation()
	{
		global $wx_relation;
		return $wx_relation;
	}

	protected static function get_relation_arr()
	{
		global $relation_arr;
		return $relation_arr;
	}


	protected static function get_wx_score_arr()
	{
		global $wx_score_arr;
		return $wx_score_arr;
	}

	protected static function get_ten_god_property()
	{
		global $ten_god_property;
		return $ten_god_property;
	}


	protected static function get_double_tengod()
	{
		global $double_tengod;
		return $double_tengod;
	}

	protected static function get_voice_score_arr()
	{
		global $voice_score_arr;
		return $voice_score_arr;
	}


	protected static function get_structure_score_arr()
	{
		global $structure_score_arr;
		return $structure_score_arr;
	}

	protected static function get_boy_name_arr()
	{
		global $boy_name_arr;
		return $boy_name_arr;
	}

	protected static function get_girl_name_arr()
	{
		global $girl_name_arr;
		return $girl_name_arr;
	}

	protected static function get_family_name_arr()
	{
		global $family_name_arr;
		return $family_name_arr;
	}


	protected static function get_word_arr()
	{
		global $word;
		return $word;
	}
}


?>
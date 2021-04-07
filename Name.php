<?php
//五行八字引入文件
include(dirname(__FILE__).'/include/bazi.php');

include(dirname(__FILE__).'/include/wuxing.php');

include(dirname(__FILE__).'/include/BaziCommon.class.php');

include(dirname(__FILE__).'/base.php');

//姓名配置引入文件
include(dirname(__FILE__).'/nameData/word_name_data.php');

include(dirname(__FILE__).'/nameData/double_name_structure.php');

include(dirname(__FILE__).'/nameData/family_name_data.php');

include(dirname(__FILE__).'/nameData/nature_name.php');

include(dirname(__FILE__).'/nameData/single_name_structure.php');

include(dirname(__FILE__).'/nameData/min_gan_py.php');

include(dirname(__FILE__).'/nameData/fliter_name.php');

include(dirname(__FILE__).'/nameData/new_selection_name.php');


$GLOBALS['word_arr'] = array();

$GLOBALS['word_arr_single'] = array();

class Name{

    public $wuxing;//五行

    public $zodiac;//生肖

    public $style;//类型

    public $bazi;//八字

    public $randnum = array();//取名字库中 索引随机数集合

    public $single_remain;//单字名剩余多少个

    public $double_remain;//双字字名剩余多少个 主要为解决条件下收藏名字不够的情况从 名字库中补充；

    protected $xsJi = array(// 姓名中忌用

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

    protected $xiangsheng = array('金'=>'土','木'=>'水','水'=>'金','火'=>'木','土'=>'火');

    protected $redis_key_str = array(

        'wuxing'=>array('金'=>'metal','木'=>'wood','水'=>'water','火'=>'fire','土'=>'earth'),

        'sex'=>array('0'=>'female','1'=>'male'),

        'style'=>array('技术型'=>'technical','谋略型'=>'strategy','领导型'=>'leadership','开创型'=>'developer')

    );

    public function __construct($param)
    {

        $this->family_name = $param['family_name'];

        $this->sex = $param['sex'];

        $this->birthDay = $param['birthDay'];

        $this->orderid = $param['orderid'];

        $this->serveid = $param['serveid'];

        $this->bazi = $this->get_bazi();

        $this->wuxing = $this->get_wuxing();

        $this->zodiac = $this->get_zodiac();

        $this->style = $this->get_style();

        $this->redis = $this->connect_redis();

        //存入名字
        $this->set_redis_data('single');

        $this->set_redis_data('double');

        $this->set_storage_name_redis();

    }

    public function connect_redis()
    {

        //实例化redis
        $redis = new Redis();

        //连接
        $redis->connect(REDIS_IP2, REDIS_PORT2);

        return $redis;
    }

    public function set_storage_name_redis()
    {

        global $goweb;

        $redis_key = 'storage_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_'.date('Ym');


//        if($this->redis->exists($redis_key)){
//
//            $status = $this->redis->del($redis_key);
//
//            echo $status;
//        }

        if(!$this->redis->exists($redis_key)){

            $data = $goweb->select('baby_name_storage','*',[

                "AND"=>[

                    'sex'=>$this->sex,

                    'wuxing_first'=>$this->wuxing,

                    'ten_god'=>$this->style,

                    'id[>]'=>120,

                ]
            ]);

            $this->redis->set($redis_key,json_encode($data));

        }

    }

    //名字库名字入redis数据库
    public function set_redis_data($type = 'single')
    {

        global $local;

        $redis_key = 'produce_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_'.$type;


        if(!$this->redis->exists($redis_key)){


            if($type == 'single'){


                $data = $local->select('gw_name_base',['name'],[

                    "AND"=>[

                        'sex'=>$this->sex,

                        'wuxing'=>$this->wuxing,

                        'style'=>$this->style,

                        'second_character'=>'null',

                        'status'=>1
                    ],

                ]);

                $redis_key = 'produce_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_single';

            }else if($type == 'double'){

                $data = $local->select('gw_name_base',['name'],[

                    "AND"=>[

                        'sex'=>$this->sex,

                        'wuxing'=>$this->wuxing,

                        'style'=>$this->style,

                        'second_character[!]'=>'null',

                        'status'=>1

                    ],

                ]);

                $redis_key = 'produce_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_double';

            }

            //尺寸
            $size = $type=='single'?50:500;

            //切片 每个1000个名字
            $num = intval(count($data)/$size);

            for ($i=0; $i<$num; $i++){

                if($i<$num -1){

                    $redis_list = json_encode(array_slice($data,$size*$i,$size));

                }else{

                    $redis_list = json_encode(array_slice($data,$size*$i));

                }

                //存入redis
                $this->redis->lpush($redis_key,$redis_list);

            }

        }

    }

    public function print_redis($type = 'single')
    {

        $redis_key = 'produce_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_'.$type;

        $count = $this->redis->llen($redis_key);//总共条数

        echo $count;

        $temp = $this->redis->lrange($redis_key, 0,$count);

        echo '<pre>';print_r($temp);echo '</pre>';
    }


    public function get_result()
    {

        $res['name']['storage_name'] = $this->get_name_storage();

        $res['name']['produce_name'] = $this->get_name_produce();

        return $res;
    }


    /**

     * [write_log 写入日志]

     * @param  [type] $data [写入的数据]

     * @return [type]      [description]

     */

    public function write_log($data){

        $years = date('Y-m');

        //设置路径目录信息

        $url = 'log/'.$years.'/'.date('Ymd').'_name_insert_log.txt';

        $dir_name=dirname($url);

        //目录不存在就创建

        if(!file_exists($dir_name))

        {
            //iconv防止中文名乱码

            mkdir(iconv("UTF-8", "GBK", $dir_name));

            chmod($dir_name,0777);

        }

        $fp = fopen($url,"a");//打开文件资源通道 不存在则自动创建

        date_default_timezone_set('PRC');

        flock($fp, LOCK_EX);

        fwrite($fp,date("Y-m-d H:i:s").var_export($data,true)."\r\n");//写入文件

        flock($fp, LOCK_UN);

        fclose($fp);//关闭资源通道

    }


    //计算八字
    public function get_bazi()
    {

        list($iYear,$iMonth,$iDay,$iHour,$iMinutes) = explode('-', $this->birthDay);

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

    //获取名字单字五行吉凶
    public function get_wuxing_jixiong($wuxing)
    {

        if($wuxing == $this->wuxing){

            $res = '大吉';

        }else if($wuxing == $this->xiangsheng[$this->wuxing]){

            $res = '中吉';
        }else{

            $res = '小吉';

        }
        return $res;
    }

    //五行结果页出现的结果
    public function get_wuxing_result()
    {

        //五行
        $res = array();

        $wx = new Wuxing($this->bazi);

        $res['tonglei'] = $wx->getTonglei();

        $res['yilei'] = $wx->getYilei();

        $tongleiWuxing = $wx->getTongleiWuxing();

        $yileiWuxing = $wx->getYileiWuxing();

        $xishen = $wx->getBaziXishen();

        $res['baziWuxingText'] = $wx->getBaziWuxing();	// 八字五行值

        $res['tongDesc'] = $wx->getTongleiDesc();

        $res['yiDesc'] = $wx->getYileiDesc();

        $res['xingmingYi'] = $xishen['wuxingText'];

        $res['xingmingJi'] = $this->xsJi[$xishen['wuxing']]['ke']."、".$this->xsJi[$xishen['wuxing']]['xie'];

        $res['tongleiWuxing'] = $tongleiWuxing;

        $res['yileiWuxing'] = $yileiWuxing;

        $wx_total = $res['tonglei'] + $res['yilei'];

        $res['wx_total_desc'] = round($res['tonglei']-$res['yilei'],2).'分，「八字'.$xishen['qiangruo'].'」。';

        $res['bazi_desc'] = '八字'.$xishen['qiangruo'].'，八字喜「'.$xishen['wuxingText'].'」，「'.$xishen['wuxingText'].'」就是此命的「喜神」。';

        $wuxing_data = array_merge($tongleiWuxing, $yileiWuxing);

        foreach($wuxing_data as $item){

            $item['percent'] = round($item['defen'] / $wx_total, 2) * 100;

            $wuxing_data2[$item['wuxing']-1] = $item;

        }
        ksort($wuxing_data2);

        $res['wuxing_d'] = $wuxing_data2;

        return $res;

    }

    //十大能力值的得分
    public function get_ability($tonglei,$yilei,$tongleiWuxing,$yileiWuxing)
    {

        //金 木 水 火 土  能力值的计算
        $wuxingAbliDefine = array(

            1=> array(1,2),

            2=> array(3,4),

            3=> array(5,6),

            4=> array(7,8),

            5=> array(9,10)

        );

        $abilityDefine = array('A1'=>'组织管理','A2'=>'协调沟通','A3'=>'理性行动','A4'=>'决策计谋','A5'=>'内向感受','A6'=>'学习领悟','A7'=>'情感倾诉','A8'=>'灵活应变','A9'=>'诚实守信','A10'=>'意志品质');

        $tongMaxDefine = array('1.5','2');

        $yiMaxDefine   = array('2','1.5');

        //同类能力值
        foreach($tongleiWuxing as $key=> $val){

            $percent = ($tonglei >= $yilei ? $tongMaxDefine : $yiMaxDefine);

            $wuxingVal = $wuxingAbliDefine[$val['wuxing']];

            $wuxingSorce = sprintf("%.2f",$val['defen']*$percent[0]);

            $wuxingSorce2 = sprintf("%.2f",$val['defen']*$percent[1]);

            $abilityVal['A'.$wuxingVal[0]] =  $wuxingSorce;

            $abilityVal['A'.$wuxingVal[1]] =  $wuxingSorce2;

        }

        //异类能力值
        foreach($yileiWuxing as $key=> $val){

            $percent = ($tonglei >= $yilei ? $tongMaxDefine : $yiMaxDefine);

            $wuxingVal = $wuxingAbliDefine[$val['wuxing']];

            $wuxingSorce = sprintf("%.2f",$val['defen']*$percent[0]);

            $wuxingSorce2 = sprintf("%.2f",$val['defen']*$percent[1]);

            $abilityVal['A'.$wuxingVal[0]] =  $wuxingSorce;

            $abilityVal['A'.$wuxingVal[1]] =  $wuxingSorce2;

        }

        arsort($abilityVal);

        //获得所有的键名
        $abilitySortkey = array_keys($abilityVal);

        for($i=0;$i<=9;$i++){

            if($i<=2){

                $abilityMax[] = $abilityDefine[$abilitySortkey[$i]];

            }
            if($i>=7){

                $abilityMin[] = $abilityDefine[$abilitySortkey[$i]];

            }
        }

        //能力顺序雷达图定义
        $redarDefine = array(1=>'A1','A2','A3','A5','A4','A6','A7','A9','A8','A10');

        foreach($redarDefine as $key=> $val){

            $wuxingSorce  = $abilityVal[$val];

            $wuxingSorce = ($wuxingSorce < 1 ? 1: $wuxingSorce);

            $wuxingSorce = ($wuxingSorce > 6 ? 6: $wuxingSorce);

            $abilityScore[$val] = $wuxingSorce;

            $abilityName[$val] = $abilityDefine[$val];
        }

        $res['abilityName'] = $abilityName;

        $res['abilityScore'] = $abilityScore;

        return $res;

    }

    //单字名评分
    public function get_single_name_score($name)
    {

        global $family_name_data,$name_word,$single_name_structure;

        $family_name = $this->family_name;

        $family_name_voice = $family_name_data[$family_name][1];

        $family_name_structure = $family_name_data[$family_name][2];

        $voice = $name_word[$name][3];

        $structure = $name_word[$name][5];

        //结构得分
        foreach ($single_name_structure as  $v) {

            if($family_name_structure == $v[0]&&$structure==$v[1]){

                $structure_score=$v[2];

                break;

            }
        }

        //字音得分
        if($family_name_voice == "阴平"&&$voice=="去声"){

            $voice_score = 3;

        }elseif($family_name_voice == "阳平"&&$voice=="阳平"){

            $voice_score = 3;

        }elseif($family_name_voice == "上声"&&$voice=="上声"){

            $voice_score = 0;

        }elseif($family_name_voice == "去声"&&$voice=="去声"){

            $voice_score = 0;

        }else{

            $voice_score = 6;
        }
        // var_dump($voice_score);

        $wx_score = $this->GetSingleWuxingScore($name);
        // var_dump($wx_score);
        $yin_yang_score = $this->GetSingleYinyangScore($name);
        $sheng_xiao_score = 10;//判断则所有名字生肖得分皆为满分
        $zixing_score = 2;
        $total_score = $wx_score*0.6+$sheng_xiao_score+$yin_yang_score+$structure_score+$voice_score+$zixing_score;
        $res['total_score'] = $total_score;
        $res['structure_score'] = $structure_score;
        $res['wuxing_score'] = $wx_score;
        $res['yin_yang_score'] = $yin_yang_score;
        $res['voice_score'] = $voice_score;
        return $res;

    }

    /*
        获取单字名阴阳得分
    */
    public  function GetSingleYinyangScore($word)
    {

        global $name_word;

        $word_yinyang = $name_word[$word][7];

        if($word_yinyang == '中性'){

            $res = 8;

        }else{

            $res = 16;

        }

        return $res;
    }


    /*
    获取单字名五行得分
    $single_word  已经选出来的单个汉字
    */
    public  function GetSingleWuxingScore($single_word)
    {

        global $name_word;

        $word_wuxing = $name_word[$single_word][1];

        $wuxing = $this->wuxing;

        if($word_wuxing == $wuxing){

            $wx_score = 10;

        }else{

            $wx_score = 7;

        }

        $total_score = 80 + $wx_score * 2;

        return $total_score;

    }


    //双字名评分
    public function get_double_name_score($name)
    {

        $structure_score = $this->GetStructureScore($name);

        $yin_yang_score = $this->GetYiyangScore($name);

        $voice_score = $this->GetVoiceScore($name);

        $wuxing_score = $this->GetDoubleWuxingScore($name);

        $shengxiao_real_score = 10;//未判断生肖

        $zixing = 2;//字形也没有判断

        $total_score = $structure_score + $yin_yang_score + $voice_score + $shengxiao_real_score + $wuxing_score * 0.6 + $zixing;

        $res['total_score'] = $total_score;

        $res['wuxing_score'] = $wuxing_score;

        $res['structure_score'] = $structure_score;

        $res['yin_yang_score'] = $yin_yang_score;

        $res['voice_score'] = $voice_score;

        return $res;

    }
    /*
    获取双字名阴阳得分
    $double_word  已经选择出来的双字名双字
    */
    public  function GetYiyangScore($double_word)
    {

        global $double_tengod,$name_word,$second_double_tengod;

        $temp = str_split($double_word,3);

        $first_yiyang = $name_word["$temp[0]"][7];

        $last_yiyang = $name_word["$temp[1]"][7];

        $res=0;

        foreach ($double_tengod as  $v) {

            if($first_yiyang == $v[1]&&$last_yiyang==$v[2]){

                $res = $v[3];

                break;

            }
        }
        if($res == ''){

            foreach ($second_double_tengod as  $v) {

                if($first_yiyang == $v[1]&&$last_yiyang==$v[2]){

                    $res = $v[3];

                    break;

                }
            }
        }

        return $res;
    }



    /*
    获取双字名结构得分
    $double_word  已经选择出来的双字名双字
    */
    public  function GetStructureScore($double_word)
    {

        global $double_name_structure,$name_word,$family_name_data;

        $family_name = $this->family_name;

        $family_name_structure = $family_name_data[$family_name][2];//获取姓的结构

        $temp = str_split($double_word,3);

        $first_structure = $name_word[$temp[0]][5];

        $second_structure = $name_word[$temp[1]][5];


        $res = 0;
        foreach ($double_name_structure as  $v) {

            if($v[0]==$family_name_structure&&$v[1]==$first_structure&&$v[2]==$second_structure){

                $res = $v[3];

                break;

            }
        }

        return $res;

    }


    /*
    获取双字名音韵评分
    $double_word  已经选择出来的双字名双字
    */
    public  function GetVoiceScore($double_word)
    {

        global $name_word,$double_name_voice,$family_name_data;

        $family_name = $this->family_name;

        $family_name_voice = $family_name_data[$family_name][1];

        $temp = str_split($double_word,3);

        $first_voice = $name_word[$temp[0]][3];

        $second_voice = $name_word[$temp[1]][3];

        $res = 0;

        foreach ($double_name_voice as $v) {

            if($v[0]==$family_name_voice&&$v[1]==$first_voice&&$v[2]==$second_voice){

                $res = $v[3];

                break;

            }
        }

        return $res;
    }




    /*
    获取双字名五行得分
    $double_word  已经选择出来的双字名双字
    */
    public  function GetDoubleWuxingScore($double_word)
    {

        global $name_word;

        $wuxing = $this->wuxing;

        $temp = str_split($double_word,3);

        $first_wuxing = $name_word[$temp[0]][1];//首字五行

        $last_wuxing = $name_word[$temp[1]][1];//尾字五行

        if($first_wuxing == $wuxing){

            $first_wuxing_score = 10;

        }elseif($first_wuxing == $this->xiangsheng[$wuxing]){

            $first_wuxing_score = 7;

        }

        if($last_wuxing == $wuxing){

            $last_wuxing_score = 10;

        }elseif($last_wuxing == $this->xiangsheng[$wuxing]){

            $last_wuxing_score = 7;

        }

        $total_score = $first_wuxing_score + $last_wuxing_score +80;

        return $total_score;
    }

    //八字4柱纳音
    public function get_nayin()
    {

        $nayin = array();//纳音

        foreach ($this->bazi as $key => $val) {

            $nayin[$key] = BaziCommon::jiazinaying($val);

        }

        return $nayin;
    }
    //八字排序
    public function get_bazi_arr()
    {

        $baziStr = '癸丑庚申甲辰庚午';

        $baziStr = !empty($this->bazi) ? implode('',$this->bazi) : $baziStr;

        $baziArr = array('', '癸', '巳', '乙', '卯', '庚', '辰', '癸', '未');

        $baziArr[0] = '';

        for($i=1;$i<=8;$i++){

            $baziArr[$i] = mb_substr($baziStr, $i-1, 1, 'utf-8');

        }
        return $baziArr;
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

    //计算十神以及类型
    public function get_style()
    {

        global $nature_name;

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

        return $style;

    }

    //从宝宝取名存储库中提名字
    public function get_name_storage()
    {
        global $goweb,$name_word;

        //宝宝取名中的数据添加
        $redis_key = 'storage_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_'.date('Ym');

        if($this->redis->exists($redis_key)){

            $data = json_decode($this->redis->get($redis_key),true);

        }else{
            $data = $goweb->select('baby_name_storage','*',[

                "AND"=>[
                    'sex'=>$this->sex,

                    'wuxing_first'=>$this->wuxing,

                    'ten_god'=>$this->style,

                    'id[>]'=>120
                ]
            ]);
        }



        $single_name = array();//单字名

        $double_name = array();//双字名

        foreach ($data as $key => $val) {

            if(strlen($val['name']) == 3){

                $single_name[$val['name']] = $val;

            }else{

                if($val['store_num'] > 0){

                    $double_name[$val['name']] = $val;//正常收藏的名字

                }else{

                    $double_name0[$val['name']] = $val;//网络精选名字

                }


            }
        }

        //单字名选取五个
        $res = array();//结果集合

        shuffle($single_name);

        foreach ($single_name as $key => $val) {

            if($this->CullingSensitiveWord($val['name']) && !in_array($name_word[$val['name']][2],$GLOBALS['word_arr_single'])){

                $score = $this->get_single_name_score($val['name']);

                if($score['total_score'] >= 90 ){

                    $res['single_name'][] = $val['name'];

                }

                array_push($GLOBALS['word_arr_single'], $name_word[$val['name']][2]);

                if(!empty(count($res['single_name']))){

                    if(count($res['single_name'])> 4) break;

                }

            }

        }

        $this->single_remain = 20 - count($res['single_name']); //剩余多少个单字名 需要名字库中生成

        shuffle($double_name0);



        //双字名处理选择 去重字的操作
        $double_name_arr1 = $this ->UnsetSimilarName($double_name0,15);



        if(count($double_name_arr1)< 15){

            shuffle($double_name);

            $double_name_arr3 = $this ->UnsetSimilarName($double_name,15-count($double_name_arr1));

            $double_name_arr1 = array_merge($double_name_arr1,$double_name_arr3);

        }
//        echo '<pre>';print_r($double_name_arr1);echo'</pre>';
        //名字不够只能不去重字和下降评分
        if(count($double_name_arr1) <  15){

            $double_name_arr2 = $this->get_second_storage_name($double_name,10-count($double_name_arr1));

            $res['double_name'] = array_merge($double_name_arr1,$double_name_arr2);

        }else{

            $res['double_name'] = $double_name_arr1;

        }

        $this->double_remain = 30 - count($res['double_name']); //剩余多少个双字名 需要名字库中生成

        return $res;
    }

    //从生成名字库中提取名字 15 单字 15 双字
    public function get_name_produce()
    {

        global $name_word;

        //单字名 统计个数用做分段选取以防同一属性取字雷同 20个字
        $res = array();

        for($i=0;$i<5;$i++){

            $single_name_arr = $this->get_single_name_produce();

            foreach ($single_name_arr as $key => $val) {

                if(!in_array($name_word[$val['name']][2],$GLOBALS['word_arr_single']) && $this->CullingSensitiveWord($val['name']) && $this->filter_name($val['name'])) {

                    $score = $this->get_single_name_score($val['name']);

                    if($score['total_score'] >= 90){

                        $res['single_name'][] = $val['name'];

                        array_push($GLOBALS['word_arr_single'], $name_word[$val['name']][2]);

                    }

                }
                if(!empty($res['single_name'])){

                    if(count($res['single_name'])> $this->single_remain-1) break;

                }
            }

            if(!empty($res['single_name'])){

                if(count($res['single_name'])> $this->single_remain-1) break;

            }
        }

        //单字名 统计个数用做分段选取以防同一属性取字雷同 20个字
        $redis_key = 'produce_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_double';

        $count = $this->redis->llen($redis_key);//总共条数

        if($count < 10){

            $times = $count;//循环次数

        }else{

            $times = 10;//循环次数

        }

        $double_name = array();

        for($i=0;$i<$times;$i++){

            if($count < 10){

                $double_name_arr = $this->get_double_name_produce($i);

            }else{

                $double_name_arr = $this->get_double_name_produce();

            }

            $double_name_temp = $this ->UnsetSimilarName($double_name_arr,$this->double_remain-count($double_name));

            $double_name = array_merge($double_name,$double_name_temp);

            if(count($double_name) > $this->double_remain-1) break;

        }

        if(count($double_name) < $this->double_remain){

            $GLOBALS['word_arr'] = array();

            for($i=0;$i<$times;$i++){

                $double_name_arr = $this->get_double_name_produce($i);

                //取次一级的名字
                $double_name_temp = $this ->get_second_produce_name($double_name_arr,$this->double_remain-count($double_name),$double_name);

                $double_name = $double_name = array_merge($double_name,$double_name_temp);

                if(count($double_name) > $this->double_remain-1) break;

            }
        }
        shuffle($double_name);
        $res['double_name'] = $double_name;

        return $res;
    }

    //单字名提取名字  num 提取名字个数
    public function get_single_name_produce($num = 30)
    {

        global $local;

        //单字名 统计个数用做分段选取以防同一属性取字雷同 20个字
        $redis_key = 'produce_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_single';

        if($this->redis->exists($redis_key)){

            $count = $this->redis->llen($redis_key);//总共条数

            $offset = rand(0,intval($count-1));//开始值

            $single_name_json = $this->redis->lIndex($redis_key,$offset);//正取

            $single_name_arr = json_decode($single_name_json,true);

        }else{

            $single_count = $local->count('gw_name_base',[

                "AND"=>[

                    'sex'=>$this->sex,

                    'wuxing'=>$this->wuxing,

                    'style'=>$this->style,

                    'second_character'=>'null',

                    'status'=>1

                ]
            ]);

            $offset = rand(0,intval($single_count/$num)-1)*$num;

            $randNum = rand(0,1);

            $order = $randNum == 0?"DESC":"ASC";

            $single_name_arr = $local->select('gw_name_base',['name'],[

                "AND"=>[

                    'sex'=>$this->sex,

                    'wuxing'=>$this->wuxing,

                    'style'=>$this->style,

                    'second_character[]'=>'null'

                ],

                "LIMIT"=>[$offset,$num],

                "ORDER"=>['id'=>$order],//为某些结尾不能搜索到位置

            ]);
        }

        return $single_name_arr;
    }

    //双字名提取名字 num 提取名字个数
    public function get_double_name_produce($num = 100)
    {

        global $local;

        //单字名 统计个数用做分段选取以防同一属性取字雷同 20个字
        $redis_key = 'produce_name_'.$this->redis_key_str['wuxing'][$this->wuxing].'_'.$this->redis_key_str['sex'][$this->sex].'_'.$this->redis_key_str['style'][$this->style].'_double';

        if($this->redis->exists($redis_key)){

            $count = $this->redis->llen($redis_key);//总共条数

            //小于10说明判断 名字存量不多
            if($num < 10){

                $offset = $num;

            }else{

                for($i=0;$i<$count;$i++){

                    $offset = rand(0,$count -1);//开始值

                    if(!in_array($offset,$this->randnum)){

                        array_push($this->randnum,$offset);

                        break;

                    }
                }

            }

            $double_name_json = $this->redis->lindex($redis_key,$offset);//正取

            $double_name_arr = json_decode($double_name_json,true);


        }else{

            $double_count = $local->count('gw_name_base',[

                "AND"=>[

                    'sex'=>$this->sex,

                    'wuxing'=>$this->wuxing,

                    'style'=>$this->style,

                    "second_character[!]"=>'null',

                    'status'=>1

                ]
            ]);

            $offset = rand(0,intval($double_count/$num)-1)*$num;

            $randNum = rand(0,1);

            $order = $randNum == 0?"DESC":"ASC";

            $double_name_arr = $local->select('gw_name_base',['name'],[

                "AND"=>[

                    'sex'=>$this->sex,

                    'wuxing'=>$this->wuxing,

                    'style'=>$this->style,

                    "second_character[!]"=>'null'

                ],

                "LIMIT"=>[$offset,$num],

                "ORDER"=>['id'=>$order],//为某些结尾不能搜索到位置

            ]);
        }

        return $double_name_arr;
    }


    /*
    去除两个相同字组成的两个名字中的一个 去重字
    double_name 双字名数组
    num 取名字个数
    */
    public function UnsetSimilarName($double_name,$num = 10)
    {

        $res = array();

        foreach ($double_name as $k => $v) {

            list($word1,$word2) = str_split($v['name'], 3);

            if(!in_array($word1, $GLOBALS['word_arr']) && !in_array($word2, $GLOBALS['word_arr']) && $this->CullingSensitiveWord($v['name']) && $this->filter_name($v['name'])){

                $score = $this->get_double_name_score($v['name']);

                if($score['total_score'] >=90){

                    $res[] = $v['name'];

                }

                array_push($GLOBALS['word_arr'],$word1,$word2);
            }

            if(count($res) >= $num) break;

        }
        return $res;
    }

    //获取低评分和未去重字的名字
    public function get_second_storage_name($double_name,$num)
    {
        global $name_word;

        $res = array();

        foreach ($double_name as $k => $v) {

            list($word1,$word2) = str_split($v['name'], 3);

            if(!in_array($word1, $GLOBALS['word_arr']) && !in_array($word2, $GLOBALS['word_arr']) && $this->CullingSensitiveWord($v['name']) && $this->filter_name($v['name'])){

                $score = $this->get_double_name_score($v['name']);

                if($score['total_score'] >=85){

                    $res[] = $v['name'];

                }

                array_push($GLOBALS['word_arr'],$word1,$word2);
            }

            if(count($res) >= $num) break;

        }
        return $res;
    }

    /**
     * 获取低评分的库中名字
     * double_name_arr  名字库中的名字
     * num 所需取的名字个数
     * double_name 已选择名字
     */
    public function get_second_produce_name($double_name_arr,$num,$double_name)
    {

        $res = array();



        foreach ($double_name_arr as $k => $v) {

            list($word1,$word2) = str_split($v['name'], 3);

            if((!in_array($word1, $GLOBALS['word_arr']) && !in_array($word2, $GLOBALS['word_arr'])) && $this->CullingSensitiveWord($v['name']) && $this->filter_name($v['name']) && !in_array($v['name'],$double_name)){

                $score = $this->get_double_name_score($v['name']);

                if($score['total_score'] >=85){

                    $res[] = $v['name'];
                }

                array_push($GLOBALS['word_arr'],$word1,$word2);
            }

            if(count($res) >= $num) break;

        }
        return $res;
    }
    /*
    过滤敏感字
    $word_data 选出来作为名字的单字或者双字
    */
    public function CullingSensitiveWord($word_data)
    {

        global $family_name_data,$name_word,$min_gan_py;

        $family_name = $this->family_name;

        $family_name_py = $family_name_data[$family_name][0];



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

    /**
     * 去除不适合的名字
     */
    public function filter_name($name)
    {

        global $fliter_name;

        $whole_name = $this->family_name.$name;//完整的姓名

        if( in_array($whole_name,$fliter_name)){

            return false;

        }else{

            if(in_array($name,$fliter_name)){

                return false;
            }else{

                return true;

            }

        }

    }


    /**
     * 清除所有存入的redis缓存数据 重新生成新的名字 测试
     */
    public function clear_redis()
    {
        $this->redis_key_str;

        foreach ($this->redis_key_str['sex'] as $v1){

            foreach($this->redis_key_str['wuxing'] as $v2){

                foreach ($this->redis_key_str['style'] as $v3){

                    $single_redis_key = 'produce_name_'.$v2.'_'.$v1.'_'.$v3.'_single';

                    if($this->redis->exists($single_redis_key)){

                        $this->redis->del($single_redis_key);
                    }

                    $double_redis_key = 'produce_name_'.$v2.'_'.$v1.'_'.$v3.'_double';

                    if($this->redis->exists($double_redis_key)){

                        $this->redis->del($double_redis_key);
                    }

                    $redis_key = 'storage_name_'.$v2.'_'.$v1.'_'.$v3.'_'.date('Ym');

                    if($this->redis->exists($redis_key)){

                        $this->redis->del($redis_key);
                    }
                }
            }
        }

    }



}



?>
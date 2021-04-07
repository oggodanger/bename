<?php
/**八字公共类,用于计算排盘中一些公用的东西，比如纳音、藏干、地支阴阳五行、天干阴阳五行、生旺死绝（地势）、地支相害、相刑、六十甲子太岁神、桃花位、文昌位
 *
 * @author Lion
 */
class BaziCommon {
	protected static $gan_arr = array('甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸');
	protected static $zhi_arr = array('子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥', );

    /**
     * 返回甲子纳音
     *
     * @param $paramString 甲子
     * @return 纳音
     */
    public static function jiazinaying($paramString) {
        if ($paramString == '甲子' || $paramString == '乙丑') {
            return "海中金";
        }
        if ($paramString == '丙寅' || $paramString == '丁卯') {
            return "炉中火";
        }
        if ($paramString == '戊辰' || $paramString == '己巳') {
            return "大林木";
        }
        if ($paramString == '庚午' || $paramString == '辛未') {
            return "路旁土";
        }
        if ($paramString == '壬申' || $paramString == '癸酉') {
            return "剑锋金";
        }
        if ($paramString == '甲戌' || $paramString == '乙亥') {
            return "山头火";
        }
        if ($paramString == '丙子' || $paramString == '丁丑') {
            return "涧下水";
        }
        if ($paramString == '戊寅' || $paramString == '己卯') {
            return "城头土";
        }
        if ($paramString == '庚辰' || $paramString == '辛巳') {
            return "白蜡金";
        }
        if ($paramString == '壬午' || $paramString == '癸未') {
            return "杨柳木";
        }
        if ($paramString == '甲申' || $paramString == '乙酉') {
            return "泉中水";
        }
        if ($paramString == '丙戌' || $paramString == '丁亥') {
            return "屋上土";
        }
        if ($paramString == '戊子' || $paramString == '己丑') {
            return "霹雳火";
        }
        if ($paramString == '庚寅' || $paramString == '辛卯') {
            return "松柏木";
        }
        if ($paramString == '壬辰' || $paramString == '癸巳') {
            return "长流水";
        }
        if ($paramString == '甲午' || $paramString == '乙未') {
            return "沙中金";
        }
        if ($paramString == '丙申' || $paramString == '丁酉') {
            return "山下火";
        }
        if ($paramString == '戊戌' || $paramString == '己亥') {
            return "平地木";
        }
        if ($paramString == '庚子' || $paramString == '辛丑') {
            return "壁上土";
        }
        if ($paramString == '壬寅' || $paramString == '癸卯') {
            return "金箔金";
        }
        if ($paramString == '甲辰' || $paramString == '乙巳') {
            return "佛灯火";
        }
        if ($paramString == '丙午' || $paramString == '丁未') {
            return "天河水";
        }
        if ($paramString == '戊申' || $paramString == '己酉') {
            return "大驿土";
        }
        if ($paramString == '庚戌' || $paramString == '辛亥') {
            return "钗钏金";
        }
        if ($paramString == '壬子' || $paramString == '癸丑') {
            return "桑柘木";
        }
        if ($paramString == '甲寅' || $paramString == '乙卯') {
            return "大溪水";
        }
        if ($paramString == '丙辰' || $paramString == '丁巳') {
            return "沙中土";
        }
        if ($paramString == '戊午' || $paramString == '己未') {
            return "天上火";
        }
        if ($paramString == '庚申' || $paramString == '辛酉') {
            return "石榴木";
        }
        if ($paramString == '壬戌' || $paramString == '癸亥') {
            return "大海水";
        }
        return "";
    }
    
    /**
     *    地支藏干 子藏癸 卯藏乙 午藏丁己  酉藏辛
     *    
     *    寅藏 甲丙戊  巳藏 丙庚戊  申藏 庚壬戊  亥藏 甲壬
     *    
     *    丑藏 辛癸己 辰藏 癸乙戊  未藏 乙丁己  戌藏 丁辛戊
	 
	 * 子宫癸水在其中；丑癸辛金己土同；
	 * 寅中甲木兼丙戊；卯宫乙木独相逢；
	 * 辰藏乙戊三份癸；巳内庚金丙戊从；
	 * 午宫丁火共己土；未宫乙己共丁宗；
	 * 申戊庚金壬水位；酉宫辛金独兴隆；
	 * 戌宫辛金及丁戊；亥藏壬甲是真宗。

     * @param $dizhi
     * @return
     */
    public static function dizhuang($dizhi) {
        $returnstring = array();
        if ($dizhi == '子') {
            $returnstring[0] = "癸";
        }
        if ($dizhi == '卯') {
            $returnstring[0] = "乙";
        }

        if ($dizhi == '午') {
            $returnstring[0] = "丁";
            $returnstring[1] = "己";
        }

        if ($dizhi == '酉') {
            $returnstring[0] = "辛";

        }

        if ($dizhi == '寅') {
            $returnstring[0] = "甲";
            $returnstring[1] = "丙";
            $returnstring[2] = "戊";


        }

        if ($dizhi == '巳') {

            $returnstring[0] = "丙";
            $returnstring[1] = "庚";
            $returnstring[2] = "戊";
        }

        if ($dizhi == '申') {

            $returnstring[0] = "庚";
            $returnstring[1] = "壬";
            $returnstring[2] = "戊";
        }

        if ($dizhi == '亥') {

            $returnstring[0] = "甲";
            $returnstring[1] = "壬";

        }

        if ($dizhi == '丑') {

            $returnstring[0] = "辛";
            $returnstring[1] = "癸";
            $returnstring[2] = "己";

        }

        if ($dizhi == '辰') {

            $returnstring[0] = "癸";
            $returnstring[1] = "乙";
            $returnstring[2] = "戊";

        }

        if ($dizhi == '未') {

            $returnstring[0] = "乙";
            $returnstring[1] = "丁";
            $returnstring[2] = "己";

        }

        if ($dizhi == '戌') {
            $returnstring[0] = "丁";
            $returnstring[1] = "辛";
            $returnstring[2] = "戊";

        }

        return $returnstring;

    }

    /**
     * 十天干生旺死绝表(十二长生) 地势衰旺
     *
     * 天干 长生 沐浴 冠带 临官 帝旺 衰 病 死 墓 绝 胎 养      *
     * 甲 亥 子 丑 寅 卯 辰 巳 午 未 申 酉 戌
     * 丙 寅 卯 辰 巳 午 未 申 酉 戌 亥 子 丑
     * 戊 寅 卯 辰 巳 午 未 申 酉 戌 亥 子 丑
     * 庚 巳 午 未 申 酉 戌 亥 子 丑 寅 卯 辰
     * 壬 申 酉 戌 亥 子 丑 寅 卯 辰 巳 午 未
     * 乙 午 巳 辰 卯 寅 丑 子 亥 戌 酉 申 未
     * 丁 酉 申 未 午 巳 辰 卯 寅 丑 子 亥 戌
     * 己 酉 申 未 午 巳 辰 卯 寅 丑 子 亥 戌
     * 辛 子 亥 戌 酉 申 未 午 巳 辰 卯 寅 丑
     * 癸 卯 寅 丑 子 亥 戌 酉 申 未 午 巳 辰
     *
     * @param $paramString1
     * @param $paramString2
     * @return
     */
    public static function shengwang($paramString1, $paramString2) {
        if (($paramString1 == '甲' && $paramString2 == '亥') || ($paramString1 == '丙' && $paramString2 == '寅') || ($paramString1 == '戊' && $paramString2 == '寅') || ($paramString1 == '庚' && $paramString2 == '巳') || ($paramString1 == '壬' && $paramString2 == '申') || ($paramString1 == '乙' && $paramString2 == '午') || ($paramString1 == '丁' && $paramString2 == '酉') || ($paramString1 == '己' && $paramString2 == '酉') || ($paramString1 == '辛' && $paramString2 == '子') || ($paramString1 == '癸' && $paramString2 == '卯')) {
            return "长生";
        }
        if (($paramString1 == '甲' && $paramString2 == '子') || ($paramString1 == '丙' && $paramString2 == '卯') || ($paramString1 == '戊' && $paramString2 == '卯') || ($paramString1 == '庚' && $paramString2 == '午') || ($paramString1 == '壬' && $paramString2 == '酉') || ($paramString1 == '乙' && $paramString2 == '巳') || ($paramString1 == '丁' && $paramString2 == '申') || ($paramString1 == '己' && $paramString2 == '申') || ($paramString1 == '辛' && $paramString2 == '亥') || ($paramString1 == '癸' && $paramString2 == '寅')) {
            return "沐浴";
        }
        if (($paramString1 == '甲' && $paramString2 == '丑') || ($paramString1 == '丙' && $paramString2 == '辰') || ($paramString1 == '戊' && $paramString2 == '辰') || ($paramString1 == '庚' && $paramString2 == '未') || ($paramString1 == '壬' && $paramString2 == '戌') || ($paramString1 == '乙' && $paramString2 == '辰') || ($paramString1 == '丁' && $paramString2 == '未') || ($paramString1 == '己' && $paramString2 == '未') || ($paramString1 == '辛' && $paramString2 == '戌') || ($paramString1 == '癸' && $paramString2 == '丑')) {
            return "冠带";
        }
        if (($paramString1 == '甲' && $paramString2 == '寅') || ($paramString1 == '丙' && $paramString2 == '巳') || ($paramString1 == '戊' && $paramString2 == '巳') || ($paramString1 == '庚' && $paramString2 == '申') || ($paramString1 == '壬' && $paramString2 == '亥') || ($paramString1 == '乙' && $paramString2 == '卯') || ($paramString1 == '丁' && $paramString2 == '午') || ($paramString1 == '己' && $paramString2 == '午') || ($paramString1 == '辛' && $paramString2 == '酉') || ($paramString1 == '癸' && $paramString2 == '子')) {
            return "临官";
        }
        if (($paramString1 == '甲' && $paramString2 == '卯') || ($paramString1 == '丙' && $paramString2 == '午') || ($paramString1 == '戊' && $paramString2 == '午') || ($paramString1 == '庚' && $paramString2 == '酉') || ($paramString1 == '壬' && $paramString2 == '子') || ($paramString1 == '乙' && $paramString2 == '寅') || ($paramString1 == '丁' && $paramString2 == '巳') || ($paramString1 == '己' && $paramString2 == '巳') || ($paramString1 == '辛' && $paramString2 == '申') || ($paramString1 == '癸' && $paramString2 == '亥')) {
            return "帝旺";
        }
        if (($paramString1 == '甲' && $paramString2 == '辰') || ($paramString1 == '丙' && $paramString2 == '未') || ($paramString1 == '戊' && $paramString2 == '未') || ($paramString1 == '庚' && $paramString2 == '戌') || ($paramString1 == '壬' && $paramString2 == '丑') || ($paramString1 == '乙' && $paramString2 == '丑') || ($paramString1 == '丁' && $paramString2 == '辰') || ($paramString1 == '己' && $paramString2 == '辰') || ($paramString1 == '辛' && $paramString2 == '未') || ($paramString1 == '癸' && $paramString2 == '戌')) {
            return "衰";
        }
        if (($paramString1 == '甲' && $paramString2 == '巳') || ($paramString1 == '丙' && $paramString2 == '申') || ($paramString1 == '戊' && $paramString2 == '申') || ($paramString1 == '庚' && $paramString2 == '亥') || ($paramString1 == '壬' && $paramString2 == '寅') || ($paramString1 == '乙' && $paramString2 == '子') || ($paramString1 == '丁' && $paramString2 == '卯') || ($paramString1 == '己' && $paramString2 == '卯') || ($paramString1 == '辛' && $paramString2 == '午') || ($paramString1 == '癸' && $paramString2 == '酉')) {
            return "病";
        }
        if (($paramString1 == '甲' && $paramString2 == '午') || ($paramString1 == '丙' && $paramString2 == '酉') || ($paramString1 == '戊' && $paramString2 == '酉') || ($paramString1 == '庚' && $paramString2 == '子') || ($paramString1 == '壬' && $paramString2 == '卯') || ($paramString1 == '乙' && $paramString2 == '亥') || ($paramString1 == '丁' && $paramString2 == '寅') || ($paramString1 == '己' && $paramString2 == '寅') || ($paramString1 == '辛' && $paramString2 == '巳') || ($paramString1 == '癸' && $paramString2 == '申')) {
            return "死";
        }
        if (($paramString1 == '甲' && $paramString2 == '未') || ($paramString1 == '丙' && $paramString2 == '戌') || ($paramString1 == '戊' && $paramString2 == '戌') || ($paramString1 == '庚' && $paramString2 == '丑') || ($paramString1 == '壬' && $paramString2 == '辰') || ($paramString1 == '乙' && $paramString2 == '戌') || ($paramString1 == '丁' && $paramString2 == '丑') || ($paramString1 == '己' && $paramString2 == '丑') || ($paramString1 == '辛' && $paramString2 == '辰') || ($paramString1 == '癸' && $paramString2 == '未')) {
            return "墓";
        }
        if (($paramString1 == '甲' && $paramString2 == '申') || ($paramString1 == '丙' && $paramString2 == '亥') || ($paramString1 == '戊' && $paramString2 == '亥') || ($paramString1 == '庚' && $paramString2 == '寅') || ($paramString1 == '壬' && $paramString2 == '巳') || ($paramString1 == '乙' && $paramString2 == '酉') || ($paramString1 == '丁' && $paramString2 == '子') || ($paramString1 == '己' && $paramString2 == '子') || ($paramString1 == '辛' && $paramString2 == '卯') || ($paramString1 == '癸' && $paramString2 == '午')) {
            return "绝";
        }
        if (($paramString1 == '甲' && $paramString2 == '酉') || ($paramString1 == '丙' && $paramString2 == '子') || ($paramString1 == '戊' && $paramString2 == '子') || ($paramString1 == '庚' && $paramString2 == '卯') || ($paramString1 == '壬' && $paramString2 == '午') || ($paramString1 == '乙' && $paramString2 == '申') || ($paramString1 == '丁' && $paramString2 == '亥') || ($paramString1 == '己' && $paramString2 == '亥') || ($paramString1 == '辛' && $paramString2 == '寅') || ($paramString1 == '癸' && $paramString2 == '巳')) {
            return "胎";
        }
        if (($paramString1 == '甲' && $paramString2 == '戌') || ($paramString1 == '丙' && $paramString2 == '丑') || ($paramString1 == '戊' && $paramString2 == '丑') || ($paramString1 == '庚' && $paramString2 == '辰') || ($paramString1 == '壬' && $paramString2 == '未') || ($paramString1 == '乙' && $paramString2 == '未') || ($paramString1 == '丁' && $paramString2 == '戌') || ($paramString1 == '己' && $paramString2 == '戌') || ($paramString1 == '辛' && $paramString2 == '丑') || ($paramString1 == '癸' && $paramString2 == '辰')) {
            return "养";
        }
        return "";
    }

    /**
     * 判断相害 地支六害 子未害 丑午害 寅巳害 卯辰害 申亥害 酉戌害
     *
     * @param $paramString1 地支
     * @param $paramString2 地支
     * @return boolean 返回布尔型值
     */
    public static function xianghai($paramString1, $paramString2) {
        return ($paramString1 == '子' && $paramString2 == '未') || ($paramString1 == '未' && $paramString2 == '子') || ($paramString1 == '丑' && $paramString2 == '午') || ($paramString1 == '午' && $paramString2 == '丑') || ($paramString1 == '寅' && $paramString2 == '巳') || ($paramString1 == '巳' && $paramString2 == '寅') || ($paramString1 == '卯' && $paramString2 == '辰') || ($paramString1 == '辰' && $paramString2 == '卯') || ($paramString1 == '戌' && $paramString2 == '酉') || ($paramString1 == '酉' && $paramString2 == '戌') || ($paramString1 == '申' && $paramString2 == '亥') || ($paramString1 == '亥' && $paramString2 == '申');
    }

    /**
     * 地支相刑 子卯刑 寅巳申刑 丑未戌刑 辰午丑亥自刑
     *
     * @param $paramString1
     * @param $paramString2
     * @return boolean
     */
    public static function xiangxing($paramString1, $paramString2) {
        return ($paramString1 == '子' && $paramString2 == '卯') || ($paramString1 == '卯' && $paramString2 == '子') || ($paramString1 == '丑' && $paramString2 == '未') || ($paramString1 == '未' && $paramString2 == '丑') || ($paramString1 == '丑' && $paramString2 == '戌') || ($paramString1 == '戌' && $paramString2 == '丑') || ($paramString1 == '未' && $paramString2 == '戌') || ($paramString1 == '戌' && $paramString2 == '未') || ($paramString1 == '巳' && $paramString2 == '申') || ($paramString1 == '申' && $paramString2 == '巳') || ($paramString1 == '巳' && $paramString2 == '寅') || ($paramString1 == '寅' && $paramString2 == '巳') || ($paramString1 == '申' && $paramString2 == '寅') || ($paramString1 == '寅' && $paramString2 == '申') || ($paramString1 == '辰' && $paramString2 == '辰') || ($paramString1 == '午' && $paramString2 == '午') || ($paramString1 == '酉' && $paramString2 == '酉') || ($paramString1 == '亥' && $paramString2 == '亥');
    }

    /**
     * 子、寅、辰、午、申、戌为阳支；丑卯巳未酉亥为阴支
     *
     * @param $paramString
     * @return
     */
    public static function yinyang($paramString) {
        if ($paramString == '子' || $paramString == '寅' || $paramString == '辰' || ($paramString == '午') || $paramString == '申' || $paramString == '戌') {
            return "阳";
        }
        if ($paramString == '丑' || $paramString == '卯' || $paramString == '巳' || $paramString == '未' || $paramString == '酉' || $paramString == '亥') {
            return "阴";
        }
        return "";
    }

    /**
     * 天干五行 甲乙同属木, 甲为阳, 乙为阴 丙丁同属火, 丙为阳, 丁为阴 戊己同属土, 戊为阳, 己为阴 庚辛同属金, 庚为阳, 辛为阴
     * 壬癸同属水, 壬为阳, 癸为阴
     *
     * @param $paramString
     * @return
     */
    public static function tianganwuxing($paramString) {
        if ($paramString == '甲' || $paramString == '乙') {
            return "木";
        }
        if ($paramString == '丙' || $paramString == '丁') {
            return "火";
        }
        if ($paramString == '戊' || $paramString == '己') {
            return "土";
        }
        if ($paramString == '庚' || $paramString == '辛') {
            return "金";
        }
        if ($paramString == '壬' || $paramString == '癸') {
            return "水";
        }
        return "";
    }

    /**
     * 地支五行 亥子属水，巳午属火，寅卯属木，申酉属金，辰丑未戌属土，丑未为阴土，辰戌为阳土，辰丑为湿土，未戌为燥土。
     *
     * @param $paramString
     * @return
     */
    public static function dizhiwuxing($paramString) {
        if ($paramString == '寅' || $paramString == '卯') {
            return "木";
        }
        if ($paramString == '巳' || $paramString == '午') {
            return "火";
        }
        if ($paramString == '丑' || $paramString == '辰' || $paramString == '未' || $paramString == '戌') {
            return "土";
        }
        if ($paramString == '申' || $paramString == '酉') {
            return "金";
        }
        if ($paramString == '亥' || $paramString == '子') {
            return "水";
        }
        return "";
    }

    /**
     * 甲、丙、戊、庚、壬为阳；乙、丁、己、辛、癸为阴
     *
     * @param $paramString
     * @return
     */
    public static function tianganyinyang($paramString) {
        if ($paramString == '甲' || $paramString == '丙' || $paramString == '戊' || $paramString == '庚' || $paramString == '壬') {
            return "阳";
        }
        if ($paramString == '乙' || $paramString == '丁' || $paramString == '己' || $paramString == '辛' || $paramString == '癸') {
            return "阴";
        }
        return "";
    }

    /**
     * 桃花位:
     *
     * @param $P
     */
    public static function taohua($bazi) {
        $returnString = '';
        if ($bazi[2] == '寅' || $bazi[2] == '午' || $bazi[2] == '戌') {
            $returnString .= "卯";
        }
        if ($bazi[2] == '申' || $bazi[2] == '子' || $bazi[2] == '辰') {
            $returnString .= "酉";
        }
        if ($bazi[2] == '亥' || $bazi[2] == '卯' || $bazi[2] == '未') {
            $returnString .= "子";
        }
        if ($bazi[2] == '巳' || $bazi[2] == '酉' || $bazi[2] == '丑') {
            $returnString .= "午";
        }
		return $returnString;
    }

    /**
     * 六十甲子太岁神
     *
     * @param $paramString 年柱
     * @return
     */
    public static function tianshui($paramString) {
        if ($paramString == '甲子') {
            return "金办将军";
        }
        if ($paramString == '乙丑') {
            return "陈材将军";
        }
        if ($paramString == '丙寅') {
            return "耿章将军";
        }
        if ($paramString == '丁卯') {
            return "沈兴将军";
        }
        if ($paramString == '戊辰') {
            return "赵达将军";
        }
        if ($paramString == '己巳') {
            return "郭灿将军";
        }
        if ($paramString == '庚午') {
            return "王清将军";
        }
        if ($paramString == '辛未') {
            return "李素将军";
        }
        if ($paramString == '壬申') {
            return "刘旺将军";
        }
        if ($paramString == '癸酉') {
            return "康志将军";
        }
        if ($paramString == '甲戌') {
            return "施广将军";
        }
        if ($paramString == '乙亥') {
            return "任保将军";
        }
        if ($paramString == '丙子') {
            return "郭嘉将军";
        }
        if ($paramString == '丁丑') {
            return "汪文将军";
        }
        if ($paramString == '戊寅') {
            return "曾光将军";
        }
        if ($paramString == '己卯') {
            return "龙仲将军";
        }
        if ($paramString == '庚辰') {
            return "董德将军";
        }
        if ($paramString == '辛巳') {
            return "郑但将军";
        }
        if ($paramString == '壬午') {
            return "陆明将军";
        }
        if ($paramString == '癸未') {
            return "魏仁将军";
        }
        if ($paramString == '甲申') {
            return "方杰将军";
        }
        if ($paramString == '乙酉') {
            return "蒋崇将军";
        }
        if ($paramString == '丙戌') {
            return "白敏将军";
        }
        if ($paramString == '丁亥') {
            return "封济将军";
        }
        if ($paramString == '戊子') {
            return "邹镗将军";
        }
        if ($paramString == '己丑') {
            return "潘佐将军";
        }
        if ($paramString == '庚寅') {
            return "邬桓将军";
        }
        if ($paramString == '辛卯') {
            return "范宁将军";
        }
        if ($paramString == '壬辰') {
            return "彭泰将军";
        }
        if ($paramString == '癸巳') {
            return "徐华将军";
        }
        if ($paramString == '甲午') {
            return "章词将军";
        }
        if ($paramString == '乙未') {
            return "杨仙将军";
        }
        if ($paramString == '丙申') {
            return "管仲将军";
        }
        if ($paramString == '丁酉') {
            return "唐杰将军";
        }
        if ($paramString == '戊戌') {
            return "姜武将军";
        }
        if ($paramString == '己亥') {
            return "谢焘将军";
        }
        if ($paramString == '庚子') {
            return "虞起将军";
        }
        if ($paramString == '辛丑') {
            return "杨信将军";
        }
        if ($paramString == '壬寅') {
            return "贤谔将军";
        }
        if ($paramString == '癸卯') {
            return "皮时将军";
        }
        if ($paramString == '甲辰') {
            return "李诚将军";
        }
        if ($paramString == '乙巳') {
            return "吴遂将军";
        }
        if ($paramString == '丙午') {
            return "文哲将军";
        }
        if ($paramString == '丁未') {
            return "缪丙将军";
        }
        if ($paramString == '戊申') {
            return "徐浩将军";
        }
        if ($paramString == '己酉') {
            return "程宝将军";
        }
        if ($paramString == '庚戌') {
            return "倪秘将军";
        }
        if ($paramString == '辛亥') {
            return "叶坚将军";
        }
        if ($paramString == '壬子') {
            return "丘德将军";
        }
        if ($paramString == '癸丑') {
            return "朱得将军";
        }
        if ($paramString == '甲寅') {
            return "张朝将军";
        }
        if ($paramString == '乙卯') {
            return "万清将军";
        }
        if ($paramString == '丙辰') {
            return "辛亚将军";
        }
        if ($paramString == '丁巳') {
            return "杨彦将军";
        }
        if ($paramString == '戊午') {
            return "黎卿将军";
        }
        if ($paramString == '己未') {
            return "傅党将军";
        }
        if ($paramString == '庚申') {
            return "毛梓将军";
        }
        if ($paramString == '辛酉') {
            return "石政将军";
        }
        if ($paramString == '壬戌') {
            return "洪充将军";
        }
        if ($paramString == '癸亥') {
            return "虞程将军";
        }
        return "";
    }

    /**
     * 所谓命主文昌位，就是根据个人的生辰八字来推算，按照这个方法推算出来的文昌位是跟随个人，永不改变的。个人的命主文昌位如何确定?有这样一个推算的歌诀：甲岁亥巳曲与昌，乙逢马鼠焕文章，丙戊申寅庚亥巳，六丁鸡兔贵非常，壬遇虎猴癸兔西，辛宜子上马名扬。歌诀的意思是：出生在甲年的人，文昌位在东南。出生在乙年，文昌位在正南。出生在丙年，文昌位在西南。出生在丁年，文昌位在正西。出生在戊年，文昌位在西南。出生在己年，文昌位在正西。出生在庚年，文昌位在西北。出生在辛年，文昌位在正北。出生在壬年，文昌位在东北。出生在癸年，文昌位在正东。
     * 人又是如何得知自己出生在那年？这里有一套公式可以推算。凡尾数是4的年份，如2004年，即是甲年。以此类推，尾数是5的年份，即是乙年。尾数是6的年份，即是丙年。尾数是7的年份，即是丁年。尾数是8的年份，即是戊年。尾数是9的年份，即是己年。尾数是0的年份，即是庚年。尾数是1的年份，即是辛年。尾数是2的年份，即是壬年。尾数是3的年份，即是癸年。例如1013年，即是癸年。以自己的出生年份对应上面两个公式来推算，即可知道自己的命主文昌位在哪个位置。
     *
     * @param $year 年份
     * @return 文昌位:
     */
    public static function wenchangwei($year) {
        $returnString = "文昌位:";
		$returnString = '';
        if (substr(strval($year), -1) == '4') {
            $returnString .= "东南";
        }
        if (substr(strval($year), -1) == '5') {
            $returnString .= "南方";
        }
        if (substr(strval($year), -1) == '6') {
            $returnString .= "西南";
        }
        if (substr(strval($year), -1) == '8') {
            $returnString .= "西南";
        }
        if (substr(strval($year), -1) == '7') {
            $returnString .= "西方";
        }
        if (substr(strval($year), -1) == '9') {
            $returnString .= "西方";
        }
        if (substr(strval($year), -1) == '0') {
            $returnString .= "西北";
        }
        if (substr(strval($year), -1) == '1') {
            $returnString .= "北方";
        }
        if (substr(strval($year), -1) == '2') {
            $returnString .= "东北";
        }
        if (substr(strval($year), -1) == '3') {
            $returnString .= "东方";
        }
        return $returnString;
    }

	/**
	 * 胎元
	 * 指的是怀胎月。从生月起，倒推十个月，快捷数法，天干进一，地支进三。如丁卯月出生，戊午胎元。胎元主要指母亲怀孕时刻的信息，人来到世界第一信息在怀胎的时候。所以怀胎很重要。
	 */
	public static function taiyuan($gan, $zhi){
		$gan_key = array_search($gan, self::$gan_arr);
		$zhi_key = array_search($zhi, self::$zhi_arr);
		$g_key = $gan_key + 1;
		$z_key = $zhi_key + 3;
		if($g_key > 9) $g_key = $g_key % 10;
		if($z_key > 11) $z_key = $z_key % 12;
		$t_gan = self::$gan_arr[$g_key];
		$t_zhi = self::$zhi_arr[$z_key];
		return array(
			'gan' => $t_gan,
			'zhi' => $t_zhi,
			'ty' => $t_gan.$t_zhi
		);
	}
	
	/**
	 * 命卦
	 * 所谓的本命卦是依照出生年换算成八卦的代号： 1 坎 2 坤 3 震 4 巽 6 乾 7 兑 8 艮 9 离 男命5视为"坤"，女命5视为"艮"。
	 * 如果答案是 1、3、4、9 算是东四命 如果答案是 2、5、6、7、8算是西四命
	 * 乾代表天，坤代表地，巽(xùn)代表风，震代表雷，坎代表水，离代表火，艮(gèn)代表山，兑代表泽。
	 * 宇宙观上：乾为天，坤为地，震为雷，巽为风，坎为水,，离为火,，艮为山，兑为泽。
	 * 家庭观上：乾父也，坤母也，震长男，巽长女，坎中男，离中女，艮少男，兑少女。
	 * 动物观上：乾为马，坤为牛，震为龙，巽为鸡，坎为豕，离为雉，艮为狗，兑为羊。
	 * 身体观上：乾为首，坤为腹，震为足，巽为股，坎为耳，离为目，艮为手，兑为口。
	 * 运动观上：乾健也，坤顺也，震动也，巽入也，坎陷也，离丽也，艮止也，兑说也。
	 * 权力观上：乾为君，坤为众。
	 * @param $year 年份,如果是在立春之前，应该减一
	 * @param $sex 0:男, 1:女
	 */
	public static function minggua($year=1919, $sex=0){
		$minggua_arr = array(
			// 1919年
			0=>array(
				0 => array('gua'=>'离', 'xuhao'=>9, 'ming'=>'东四命'),	// 男命卦
				1 => array('gua'=>'乾', 'xuhao'=>6, 'ming'=>'西四命'),	// 女命卦
			),
			1=>array(
				0 => array('gua'=>'艮', 'xuhao'=>8, 'ming'=>'西四命'),
				1 => array('gua'=>'兑', 'xuhao'=>7, 'ming'=>'西四命'),
			),
			2=>array(
				0 => array('gua'=>'兑', 'xuhao'=>7, 'ming'=>'西四命'),
				1 => array('gua'=>'艮', 'xuhao'=>8, 'ming'=>'西四命'),
			),
			3=>array(
				0 => array('gua'=>'乾', 'xuhao'=>6, 'ming'=>'西四命'),
				1 => array('gua'=>'离', 'xuhao'=>9, 'ming'=>'东四命'),
			),
			4=>array(
				0 => array('gua'=>'坤', 'xuhao'=>5, 'ming'=>'西四命'),
				1 => array('gua'=>'坎', 'xuhao'=>1, 'ming'=>'东四命'),
			),
			5=>array(
				0 => array('gua'=>'巽', 'xuhao'=>4, 'ming'=>'东四命'), // 西四命
				1 => array('gua'=>'坤', 'xuhao'=>2, 'ming'=>'西四命'),
			),
			6=>array(
				0 => array('gua'=>'震', 'xuhao'=>3, 'ming'=>'东四命'),
				1 => array('gua'=>'震', 'xuhao'=>3, 'ming'=>'东四命'),
			),
			7=>array(
				0 => array('gua'=>'坤', 'xuhao'=>2, 'ming'=>'西四命'),
				1 => array('gua'=>'巽', 'xuhao'=>4, 'ming'=>'东四命'),
			),
			8=>array(
				0 => array('gua'=>'坎', 'xuhao'=>1, 'ming'=>'东四命'),
				1 => array('gua'=>'艮', 'xuhao'=>5, 'ming'=>'西四命'),
			)
		);
		$key = abs(($year-1919) % 9);
		$key2 = $sex == 1 ? 0 : 1;
		$return = $minggua_arr[$key][$key2];
		return $return;
	}
	
	public static function xingxiu28($day, $month){
		// 二十八星宿，如八月十五，$xingxiu[15][8]
		$xingxiu = array(
			array("", "正月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"),
			array("1日", "室", "奎", "胄", "毕", "参", "鬼", "张", "角", "氐", "心", "斗", "虚"),
			array("2日", "壁", "娄", "昂", "觜", "井", "柳", "翼", "亢", "房", "尾", "女", "危"),
			array("3日", "奎", "胄", "毕", "参", "鬼", "星", "轸", "氐", "心", "箕", "虚", "室"),
			array("4日", "娄", "昂", "觜", "井", "柳", "张", "角", "房", "尾", "斗", "危", "壁"),
			array("5日", "胄", "毕", "参", "鬼", "星", "翼", "亢", "心", "箕", "女", "室", "奎"),
			array("6日", "昂", "觜", "井", "柳", "张", "轸", "氐", "尾", "斗", "虚", "壁", "娄"),
			array("7日", "毕", "参", "鬼", "星", "翼", "角", "房", "箕", "女", "危", "奎", "胄"),
			array("8日", "觜", "井", "柳", "张", "轸", "亢", "心", "斗", "虚", "室", "娄", "昂"),
			array("9日", "参", "鬼", "星", "翼", "角", "氐", "尾", "女", "危", "壁", "胄", "毕"),
			array("10日", "井", "柳", "张", "轸", "亢", "房", "箕", "虚", "室", "奎", "昂", "觜"),
			array("11日", "鬼", "星", "翼", "角", "氐", "心", "斗", "危", "壁", "娄", "毕", "参"),
			array("12日", "柳", "张", "轸", "亢", "房", "尾", "女", "室", "奎", "胄", "觜", "井"),
			array("13日", "星", "翼", "角", "氐", "心", "箕", "虚", "壁", "娄", "昂", "参", "鬼"),
			array("14日", "张", "轸", "亢", "房", "尾", "斗", "危", "奎", "胄", "毕", "井", "柳"),
			array("15日", "翼", "角", "氐", "心", "箕", "女", "室", "娄", "昂", "觜", "鬼", "星"),
			array("16日", "轸", "亢", "房", "尾", "斗", "虚", "壁", "胄", "毕", "参", "柳", "张"),
			array("17日", "角", "氐", "心", "箕", "女", "危", "奎", "昂", "觜", "井", "星", "翼"),
			array("18日", "亢", "房", "尾", "斗", "虚", "室", "娄", "毕", "参", "鬼", "张", "轸"),
			array("19日", "氐", "心", "箕", "女", "危", "壁", "胄", "觜", "井", "柳", "翼", "角"),
			array("20日", "房", "尾", "斗", "虚", "室", "奎", "昂", "参", "鬼", "星", "轸", "亢"),
			array("21日", "心", "箕", "女", "危", "壁", "娄", "毕", "井", "柳", "张", "角", "氐"),
			array("22日", "尾", "斗", "虚", "室", "奎", "胄", "觜", "鬼", "星", "翼", "亢", "房"),
			array("23日", "箕", "女", "危", "壁", "娄", "昂", "参", "柳", "张", "轸", "氐", "心"),
			array("24日", "斗", "虚", "室", "奎", "胄", "毕", "井", "星", "翼", "角", "房", "尾"),
			array("25日", "女", "危", "壁", "娄", "昂", "觜", "鬼", "张", "轸", "亢", "心", "箕"),
			array("26日", "虚", "室", "奎", "胄", "毕", "参", "柳", "翼", "角", "氐", "尾", "斗"),
			array("27日", "危", "壁", "娄", "昂", "觜", "井", "星", "轸", "亢", "房", "箕", "女"),
			array("28日", "室", "奎", "胄", "毕", "参", "鬼", "张", "角", "氐", "心", "斗", "虚"),
			array("29日", "壁", "娄", "昂", "觜", "井", "柳", "翼", "亢", "房", "尾", "女", "危"),
			array("30日", "奎", "胄", "毕", "参", "鬼", "星", "轸", "氐", "心", "箕", "虚", "室"),
		);
		return $xingxiu[$day][$month];
	}
	
	/**
	 * 本命佛
	 *
	 * 属鼠人本命佛：千手观音菩萨
	 * 属牛人本命佛：虚空藏菩萨
	 * 属虎人本命佛：虚空藏菩萨
	 * 属兔人本命佛：文殊菩萨
	 * 属龙人本命佛：普贤菩萨
	 * 属蛇人本命佛：普贤菩萨
	 * 属马人本命佛：大势至菩萨
	 * 属羊人本命佛：大日如来
	 * 属猴人本命佛：大日如来
	 * 属鸡人本命佛：不动尊菩萨
	 * 属狗人本命佛：阿弥陀佛
	 * 属猪人本命佛：阿弥陀佛
	 *
	 */
	public static function bmf($zhi){
		$key = array_search($zhi, self::$zhi_arr);
		$key = $key ? $key : 0;
		$bmf = array("千手观音菩萨", "虚空藏菩萨", "虚空藏菩萨", "文殊菩萨", "普贤菩萨", "普贤菩萨", "大势至菩萨", "大日如来", "大日如来", "不动尊菩萨", "阿弥陀佛", "阿弥陀佛" );
		return $bmf[$key];
	}
	
	/**
	 * 命宫
	 * 凡推命宫，须以生月之数（如过中气，作次月之数推。）与生时之数合算。寅一，卯二，辰三，巳四，午五，未六，申七，酉八，戌九，亥十，子十一，丑十二，以十四为本位。如月之数不满十四当加之，加到十四为止。即以所加之数，为某宫。如满十四数者。当加至二十六，为本位。亦以所加之数为某宫。或以十四减去月令时辰之总和，所余之数，即为命宫。欲知某宫之干，再以年干遁之。
	 *
	 * 14-(月令（过候加一）+时辰)=命宫
	 * 26-(月令（过候加一）+时辰)=命宫
	 *
	 * @param $nlmonth 阴历生月
	 * @param $shizhi 时支
	 * @param $yeargan 年干
	 * @param string 命宫
	 */
	public static function minggong($nlmonth, $shizhi, $yeargan){
		$zhiMap = array("", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥", "子", "丑");	// 寅一，卯二，辰三，巳四，午五，未六，申七，酉八，戌九，亥十，子十一，丑十二
		$shiValue = array_search($shizhi, $zhiMap);
		$value = $nlmonth + $shiValue;
		if($value >= 14){
			$key = 26 - $value;
		}else{
			$key = 14 - $value;
		}
		$mingZhi = $zhiMap[$key];	// 算得命宫的地支
		
		// 年上起月表推命宫天干
		$yearMonthTab = array(
			0 => array('', '甲', '己', '乙', '庚', '丙', '辛', '丁', '壬', '戊', '癸'),
			1 => array('', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁'),
			2 => array('', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁'),
			3 => array('', '戊', '己', '庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁', '丙', '丁'),
			4 => array('', '戊', '己', '庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁', '丙', '丁'),
			5 => array('', '庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛'),
			6 => array('', '庚', '辛', '壬', '癸', '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛'),
			7 => array('', '壬', '癸', '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'),
			8 => array('', '壬', '癸', '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'),
			9 => array('',  '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸', '甲', '乙'),
			10 => array('',  '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸', '甲', '乙')
		);
		$ganKey = array_search($yeargan, $yearMonthTab[0]);
		$zhiKey = array_search($mingZhi, $zhiMap);
		$minggong = $yearMonthTab[$ganKey][$zhiKey] . $mingZhi;
		return $minggong;
	}
	
	/**
	 * 地支藏干及十神
	 * @param $dizhi 地支
	 * @param $rigan 日干
	 */
	public static function dizhicanggan($dizhi, $rigan){
		// 偏印也叫枭神,正财也简称贝,偏官也称七杀
		$shishen = array(
			'fu' => array('偏印', '正印', '比肩', '劫财', '食神', '伤官', '偏财', '正财', '七杀', '正官'),	// 偏官改成七杀
			'dan' => array('枭', '印', '比', '劫', '食', '伤', '才', '财', '杀', '官'),
			'alias' => array('枭神', '正印', '比肩', '劫财', '食神', '伤官', '偏财', '正财', '偏官', '正官'),
		);
		// 支里藏干
		$zhiCangArr = array(
			array('', '子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'),
			array('癸'),				// 子
			array('癸', '己', '辛'),	// 丑
			array('丙', '甲', '戌'),	// 寅
			array('乙'),				// 卯
			array('乙', '戊', '癸'),	// 辰
			array('戊', '丙', '庚'),	// 巳
			array('丁', '己'),			// 午
			array('乙', '己', '丁'),	// 未
			array('戊', '庚', '壬'),	// 申
			array('辛'),	// 酉
			array('辛', '戊', '丁'),	// 戌
			array('壬', '甲'),	// 亥
		);
		// 支里藏干对应的十神
		$shishenArr = array(
			0 => array('', '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'),
			// 甲日
			1 => array(
				array('正印'),
				array('正印', '正财', '正官'),
				array('食神', '比肩', '偏财'),
				array('劫财'),
				array('劫财', '偏财', '正印'),
				array('偏财', '十神', '七杀'),
				array('伤官', '正财'),
				array('劫财', '正财', '伤官'),
				array('偏财', '七杀', '偏印'),
				array('正官'),
				array('正官', '偏财', '伤官'),
				array('偏印', '比肩'),
			),
			// 乙日
			2 => array(
				array('偏印'),
				array('偏印', '偏财', '七杀'),
				array('伤官', '劫财', '正财'),
				array('比肩'),
				array('比肩', '正财', '偏印'),
				array('正财', '伤官', '正官'),
				array('食神', '偏财'),
				array('比肩', '偏财', '食神'),
				array('正财', '正官', '正印'),
				array('七杀'),
				array('七杀', '正财', '食神'),
				array('正印', '劫财'),
			),
			// 丙日
			3 => array(
				array('正官'),
				array('正官', '伤官', '正财'),
				array('比肩', '偏印', '食神'),
				array('正印'),
				array('正印', '食神', '正官'),
				array('食神', '比肩', '偏财'),
				array('劫财', '伤官'),
				array('正印', '伤官', '劫财'),
				array('食神', '偏财', '七杀'),
				array('正财'),
				array('正财', '食神', '劫财'),
				array('七杀', '偏印'),
			),
			// 丁日
			4 => array(
				array('七杀'),
				array('七杀', '食神', '偏财'),
				array('劫财', '正印', '伤官'),
				array('偏印'),
				array('偏印', '伤官', '七杀'),
				array('伤官', '劫财', '正财'),
				array('比肩', '食神'),
				array('偏印', '食神', '比肩'),
				array('伤官', '正财', '正官'),
				array('偏财'),
				array('偏财', '伤官', '比肩'),
				array('正官', '正印'),
			),
			// 戊日
			5 => array(
				array('正财'),
				array('正财', '劫财', '伤官'),
				array('偏印', '七杀', '比肩'),
				array('正官'),
				array('正官', '比肩', '正财'),
				array('比肩', '偏印', '食神'),
				array('正印', '劫财'),
				array('正官', '劫财', '正印'),
				array('比肩', '食神', '偏财'),
				array('伤官'),
				array('伤官', '比肩', '正印'),
				array('偏财', '七杀'),
			),
			// 己日
			6 => array(
				array('偏财'),
				array('偏财', '比肩', '食神'),
				array('正印', '正官', '劫财'),
				array('七杀'),
				array('七杀', '劫财', '偏财'),
				array('劫财', '正印', '伤官'),
				array('偏印', '比肩'),
				array('七杀', '比肩', '偏印'),
				array('劫财', '伤官', '正财'),
				array('食神'),
				array('食神', '劫财', '偏印'),
				array('正财', '正官'),
			),
			// 庚日
			7 => array(
				array('伤官'),
				array('伤官', '正印', '劫财'),
				array('七杀', '偏财', '偏印'),
				array('正财'),
				array('正财', '偏印', '伤官'),
				array('偏印', '七杀', '比肩'),
				array('正官', '正印'),
				array('正财', '正印', '正官'),
				array('偏印', '比肩', '食神'),
				array('劫财'),
				array('劫财', '偏印', '正官'),
				array('食神', '偏财'),
			),
			// 辛日
			8 => array(
				array('食神'),
				array('食神', '偏印', '比肩'),
				array('正官', '正财', '正印'),
				array('偏财'),
				array('偏财', '正印', '食神'),
				array('正印', '正官', '劫财'),
				array('七杀', '偏印'),
				array('偏财', '偏印', '七杀'),
				array('正印', '劫财', '伤官'),
				array('比肩'),
				array('比肩', '正印', '七杀'),
				array('伤官', '正财'),
			),
			// 壬日
			9 => array(
				array('劫财'),
				array('劫财', '正官', '正印'),
				array('偏财', '食神', '七杀'),
				array('伤官'),
				array('伤官', '七杀', '劫财'),
				array('七杀', '偏财', '偏印'),
				array('正财', '正官'),
				array('伤官', '正官', '正财'),
				array('七杀', '偏印', '比肩'),
				array('正印'),
				array('正印', '七杀', '正财'),
				array('比肩', '食神'),
			),
			// 癸日
			10 => array(
				array('比肩'),
				array('比肩', '七杀', '偏印'),
				array('正财', '伤官', '正官'),
				array('食神'),
				array('食神', '正官', '比肩'),
				array('正官', '正财', '正印'),
				array('偏财', '七杀'),
				array('食神', '七杀', '偏财'),
				array('正官', '正印', '劫财'),
				array('偏印'),
				array('偏印', '正官', '偏财'),
				array('劫财', '伤官'),
			)
		);
		
		$cgKey = array_search($dizhi,$zhiCangArr[0]);
		$cg = $zhiCangArr[$cgKey];	// 获得地支藏干数组
		$ssKey = array_search($rigan, $shishenArr[0]);
		$ss = $shishenArr[$ssKey][$cgKey-1];
		$ssDan = array();
		foreach($ss as $s){
			$shishenKey = array_search($s, $shishen['fu']);
			$ssDan[] = $shishen['dan'][$shishenKey];
		}
		return array(
			'cg' => $cg,
			'ss' => $ss,
			'ssDan' => $ssDan,
			'cgstr' => implode('', $cg),
			'ssdstr' => implode('', $ssDan)
		);
	}
	
	/**
	 * 格局
	 * 取法：先查格局表，若查到，则返回此格局。若为空，则以月支藏干的顺序去查有无透干，若有，则取为格局。但用透干方式查出的比肩(建禄)和劫财(月刃)应舍弃。
	 */
	public static function geju($bazi){
		$gj = '';
		$zhiCanggan = array(
			array('', '子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥'),
			array('癸'),				// 子
			array('己', '癸', '辛'),	// 丑
			array('甲', '丙', '戌'),	// 寅
			array('乙'),				// 卯
			array('戊', '乙', '癸'),	// 辰
			array('丙', '庚', '戊'),	// 巳
			array('丁', '己'),			// 午
			array('己', '丁', '乙'),	// 未
			array('庚', '壬', '戊'),	// 申
			array('辛'),	// 酉
			array('戊', '辛', '丁'),	// 戌
			array('壬', '甲'),	// 亥
		);
		
		$geju = array(
			0 => array('', '甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸'),
			array('正印', '正财', '建禄', '月刃', '偏财', '食神', '伤官', '正财', '偏官', '正官', '偏财', '偏印'),	// 甲
			array('偏印', '偏财', '', 	  '建禄', '正财', '伤官', '食神', '偏财', '正官', '偏官', '正财', '正印'),	// 乙
			array('正官', '伤官', '偏印', '正印', '食神', '建禄', '月刃', '伤官', '偏财', '正财', '食神', '偏官'),	// 丙
			array('偏官', '食神', '正印', '偏印', '伤官', '', 	  '建禄', '食神', '偏官', '正官', '偏财', '偏印'),	// 丁
			array('正财', '',	  '偏官', '正官', '', 	  '建禄', '正印', '', 	  '食神', '伤官', '', 	  '偏财'),	// 戊	戊日生于巳月
			array('偏财', '', 	  '正官', '偏官', '', 	  '正印', '建禄', '', 	  '伤官', '食神', '', 	  '正财'),	// 己	己日午月是建禄还是偏印？
			array('伤官', '正印', '偏财', '正财', '偏印', '偏官', '正官', '正印', '建禄', '月刃', '偏印', '食神'),	// 庚
			array('食神', '偏印', '正财', '偏财', '正印', '正官', '偏官', '偏印', '', 	  '建禄', '正印', '伤官'),	// 辛
			array('月刃', '正官', '食神', '伤官', '偏官', '偏财', '正财', '正官', '偏印', '正印', '偏官', '建禄'),	// 壬
			array('建禄', '偏官', '伤官', '食神', '正官', '正财', '偏财', '偏官', '正印', '偏印', '正官', ''	),	// 癸
		);
		$rigan = $bazi[5];
		$yuezhi = $bazi[4];
		$zhiKey = array_search($yuezhi, $zhiCanggan[0]);
		$ganKey = array_search($rigan, $geju[0]);

		$gj = $geju[$ganKey][$zhiKey-1];
		if(!empty($gj))	return $gj;	// 如果查得格局不为空，返回该格局
		
		$cg = $zhiCanggan[$zhiKey];	// 月支藏干
        
		foreach($cg as $c){
			$cgss = self::dizhicanggan($yuezhi, $rigan);
            // echo '<pre>';print_r($cgss);echo '</pre>';
			for($i=1;$i<8;$i=$i+2){
				if($i==5) continue;	// 不比较日干
				if($c == $bazi[$i]){
					$sskey = array_search($c, $cgss['cg']);
                    
					$gj = $cgss['ss'][$sskey];
					if(!empty($gj) && $gj != '比肩' && $gj != '劫财'){
						return $gj;
					}
				}
			}
		}
		return $gj;
	}
	
	/**
	 * 大运
	 * 1、大运干支的确定
	 * 2、起运年龄的确定
	 * @param array $bazi 八字数组，含八个元素，每个字为一个元素
	 * @param int $isman 1男 0女
	 */
	public static function dayun($bazi, $isman){
		if ( (self::tianganyinyang($bazi[1]) == "阳" && $isman == 1) || (self::tianganyinyang($bazi[1]) == "阴" && $isman == 0) ) { 
			$shunpai = 1;	// 阳男阴女顺排
		}else{
			$shunpai = 0;	// 阴男阳女逆排
		}
	//	var_dump($shunpai);
		$yueganKey = array_search($bazi[3], self::$gan_arr);
		$yuezhiKey = array_search($bazi[4], self::$zhi_arr);
		if($shunpai){
			$gKey = $yueganKey + 1;
			$zKey = $yuezhiKey + 1;
		}else{
			$gKey = $yueganKey - 1;
			$zKey = $yuezhiKey - 1;
		}
		$gKey = $gKey == 10 ? 0 : $gKey;
		$gKey = $gKey == -1 ? 9 : $gKey;
		$zKey = $zKey == 12 ? 0 : $zKey;
		$zKey = $zKey == -1 ? 11 : $zKey;
		
		$dayun[0]['gan'] = self::$gan_arr[$gKey];
		$dayun[0]['zhi'] = self::$zhi_arr[$zKey];
		$dayun[0]['ganzhi'] = $dayun[0]['gan'] . $dayun[0]['zhi'];
		$dayun[0]['dishi'] = self::dishi($bazi[5], $dayun[0]['zhi']);
		for($i=1; $i<8; $i++){
			if($shunpai){
				$igKey = $gKey + $i;
				$izKey = $zKey + $i;
			}else{
				$igKey = $gKey - $i;
				$izKey = $zKey - $i;
			}
			$igKey = $igKey >= 10 ? $igKey % 10 : $igKey;
			$izKey = $izKey >= 12 ? $izKey % 12 : $izKey;
			$igKey = $igKey < 0 ? $igKey + 10 : $igKey;
			$izKey = $izKey < 0 ? $izKey + 12 : $izKey;
			$dayun[$i]['gan'] = self::$gan_arr[$igKey];
			$dayun[$i]['zhi'] = self::$zhi_arr[$izKey];
			$dayun[$i]['ganzhi'] = $dayun[$i]['gan'] . $dayun[$i]['zhi'];
			$dayun[$i]['dishi'] = self::dishi($bazi[5], $dayun[$i]['zhi']);
		}
		return $dayun;
	}
	
	public static function dayunshishen($dayun, $rigan){
		$shishen = array(
			'fu' => array('偏印', '正印', '比肩', '劫财', '食神', '伤官', '偏财', '正财', '偏官', '正官'),	// 偏官改成七杀
			'dan' => array('枭', '印', '比', '劫', '食', '伤', '才', '财', '杀', '官'),
			'alias' => array('枭神', '正印', '比肩', '劫财', '食神', '伤官', '偏财', '正财', '七杀', '正官'),
		);
		$tiangan = array('甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸');
		// 天干十神对照表，横为日主，竖为天干
		$ganShishen = array(
			array('比肩', '劫财', '偏印', '正印', '偏官', '正官', '偏财', '正财', '食神', '伤官'),
			array('劫财', '比肩', '正印', '偏印', '正官', '偏官', '正财', '偏财', '伤官', '食神'),
			array('食神', '伤官', '比肩', '劫财', '偏印', '正印', '偏官', '正官', '偏财', '正财'),
			array('伤官', '食神', '劫财', '比肩', '正印', '偏印', '正官', '偏官', '正财', '偏财'),
			array('偏财', '正财', '食神', '伤官', '比肩', '劫财', '偏印', '正印', '偏官', '正官'),
			array('正财', '偏财', '伤官', '食神', '劫财', '比肩', '正印', '偏印', '正官', '偏官'),
			array('偏官', '正官', '偏财', '正财', '食神', '伤官', '比肩', '劫财', '偏印', '正印'),
			array('正官', '偏官', '正财', '偏财', '伤官', '食神', '劫财', '比肩', '正印', '偏印'),
			array('偏印', '正印', '偏官', '正官', '偏财', '正财', '食神', '伤官', '比肩', '劫财'),
			array('正印', '偏印', '正官', '偏官', '正财', '偏财', '伤官', '食神', '劫财', '比肩'),
		);
		$rowKey = array_search($rigan, $tiangan);
		$r = array();
		foreach($dayun as $k=>$dy){
			$colKey = array_search($dy['gan'], $tiangan);
			$ss= $ganShishen[$colKey][$rowKey];
			$ssKey = array_search($ss, $shishen['fu']);
			$ssDan = $shishen['dan'][$ssKey];
			$r[$k]['ss'] = $ss;
			$r[$k]['ssd'] = $ssDan;
		}
		return $r;
	}
	
	public static function liunian($nianzhu){
		$jiazi = array("甲子", "乙丑", "丙寅", "丁卯", "戊辰", "己巳", "庚午", "辛未", "壬申", "癸酉", "甲戌", "乙亥", "丙子", "丁丑", "戊寅", "己卯", "庚辰", "辛巳", "壬午", "癸未", "甲申", "乙酉", "丙戌", "丁亥", "戊子", "己丑", "庚寅", "辛卯", "壬辰", "癸巳", "甲午", "乙未", "丙申", "丁酉", "戊戌", "己亥", "庚子", "辛丑", "壬寅", "癸卯", "甲辰", "乙巳", "丙午", "丁未", "戊申", "己酉", "庚戌", "辛亥", "壬子", "癸丑", "甲寅", "乙卯", "丙辰", "丁巳", "戊午", "己未", "庚申", "辛酉", "壬戌", "癸亥");
		
		$key = array_search($nianzhu, $jiazi);
		$r = array();
		for($i=0;$i<8;$i++){
			for($j=0;$j<10;$j++){
				$lnKey = $key + ($i*10 + $j);
				if($lnKey > 59) $lnKey = $lnKey % 60;
				$r[$i][$j] = $jiazi[$lnKey];
			}
		}
		return $r;
	}
	
	/**
	 * @param $gan 日干
	 * @param $zhi 地支
	 */
	public static function dishi($gan, $zhi){
		$dishi = array(
			array('沐浴', '冠帶', '临官', '帝旺', '衰', '病', '死', '墓', '绝', '胎 ', '养', '长生'),
			array('病', '衰', '帝旺', '临官', '冠带', '沐浴', '长生', '养', '胎', '绝 ', '墓', '死'),
			array('胎 ', '养', '长生', '沐浴', '冠帶', '临官', '帝旺', '衰', '病', '死', '墓', '绝'),
			array('绝 ', '墓', '死', '病', '衰', '帝旺', '临官', '冠带', '沐浴', '长生', '养', '胎'),
			array('胎 ', '养', '长生', '沐浴', '冠帶', '临官', '帝旺', '衰', '病', '死', '墓', '绝'),
			array('绝 ', '墓', '死', '病', '衰', '帝旺', '临官', '冠带', '沐浴', '长生', '养', '胎'),
			array('死', '墓', '绝', '胎 ', '养', '长生', '沐浴', '冠帶', '临官', '帝旺', '衰', '病'),
			array('长生', '养', '胎', '绝 ', '墓', '死', '病', '衰', '帝旺', '临官', '冠带', '沐浴'),
			array('帝旺', '衰', '病', '死', '墓', '绝', '胎 ', '养', '长生', '沐浴', '冠帶', '临官'),
			array('临官', '冠带', '沐浴', '长生', '养', '胎', '绝 ', '墓', '死', '病', '衰', '帝旺'),
		);
		$ganKey = array_search($gan, self::$gan_arr);
		$zhiKey = array_search($zhi, self::$zhi_arr);
		return $dishi[$ganKey][$zhiKey];
	}
	
	public static function ganKey($gan){
		$ganKey = array_search($gan, self::$gan_arr);
		return $ganKey;
	}
	
	public static function zhiKey($zhi){
		$zhiKey = array_search($zhi, self::$zhi_arr);
		return $zhiKey;
	}
	
	/**
	 * 时间修正
	 * @param $operator 1 加	0 减
	 */
	
	public static function timeAmend($orgTime, $diffTime, $operator){
		$php_version_ge530 = version_compare(PHP_VERSION, '5.3.0', '>=');
	
		$defaultDiffTime = array(
			'y' => 0,
			'm' => 0,
			'd' => 0,
			'h' => 0,
			'i' => 0,
			's' => 0
		);
		$r = array_merge($defaultDiffTime, $diffTime);
		
		if($operator){
			// 加操作
			if($php_version_ge530){
				$DateTime = new DateTime($this->iDateStr);
				// 'P%yY%mM%dDT%hH%iM%sS'
				$intervalStr = sprintf("P%dY%dM%dDT%dH%dM%dS", $r['y'], $r['m'], $r['d'], $r['h'], $r['i'], $r['s']);
				$DateTime->add(new DateInterval($intervalStr));
			}else{
				$xY = $orgTime['y'] + $r['y'];
				$xM = $orgTime['m'] + $r['m'];
				$xD = $orgTime['d'] + $r['d'];
				$xH = $orgTime['h'] + $r['h'];
				$xI = $orgTime['i'] + $r['i'];
				$xS = $orgTime['s'] + $r['s'];
				// 秒、分钟修正
				if($xS >= 60){
					$xS = $xS % 60;
					$xI = $xI + 1;
				}
				
				// 分钟、小时修正
				if($xI >= 60){
					$xI = $xI % 60;
					$xH = $xH + 1;
				}
				
				// 时间、日期修正
				if($xH >= 24){
					$xH = $xH % 24;
					$xD = $xD + 1;
				}
				// 日期、月份修正
				if(in_array($xM, array(1, 3, 5, 7, 8, 10, 12))){
					if($xD > 31){
						$xD = $xD % 31;
						$xM = $xM + 1;
					}
				}else if(self::isRunYear($orgTime['y']) && $xM == 2){
					if($xD > 29){
						$xD = $xD % 29;
						$xM = $xM + 1;
					}
				}else if(!self::isRunYear($orgTime['y']) && $xM == 2){
					if($xD > 28){
						$xD = $xD % 28;
						$xM = $xM + 1;
					}
				}else{
					if($xD > 30){
						$xD = $xD % 30;
						$xM = $xM + 1;
					}
				}
				// 月份、年份修正
				if($xM > 12){
					$xM = $xM % 12;
					$xY = $xY + 1;
				}
			}
		}else{
			// 减操作
			if($php_version_ge530){
				$DateTime = new DateTime($this->iDateStr);
				// 'P%yY%mM%dDT%hH%iM%sS'
				$intervalStr = sprintf("P%dY%dM%dDT%dH%dM%dS", $r['y'], $r['m'], $r['d'], $r['h'], $r['i'], $r['s']);
				$DateTime->sub(new DateInterval($intervalStr));
			}else{
				$xY = $orgTime['y'] - $r['y'];
				$xM = $orgTime['m'] - $r['m'];
				$xD = $orgTime['d'] - $r['d'];
				$xH = $orgTime['h'] - $r['h'];
				$xI = $orgTime['i'] - $r['i'];
				$xS = $orgTime['s'] - $r['s'];
				// 秒、分钟修正
				if($xS < 0){
					$xS = $xS + 60;
					$xI = $xI - 1;
				}
				
				// 分钟、小时修正
				if($xI < 0){
					$xI = $xI + 60;
					$xH = $xH - 1;
				}
				
				// 时间、日期修正
				if($xH < 0){
					$xH = $xH + 24;
					$xD = $xD - 1;
				}
				// 日期、月份修正(这里还需处理)
				if($xM == 1){
					if($xD < 1){
						$xD = $xD + 31;
						$xM = 12;
						$xY = $xY - 1;
					}
				}
				else if(in_array($xM, array(2, 4, 6, 8, 9, 11))){
					if($xD < 1){
						$xD = $xD + 31;
						$xM = $xM - 1;
					}
				}else if(self::isRunYear($orgTime['y']) && $xM == 3){
					if($xD < 1){
						$xD = $xD + 29;
						$xM = $xM - 1;
					}
				}else if(!self::isRunYear($orgTime['y']) && $xM == 3){
					if($xD < 1){
						$xD = $xD + 28;
						$xM = $xM - 1;
					}
				}else{
					if($xD < 1){
						$xD = $xD + 30;
						$xM = $xM - 1;
					}
				}
				
				// 月份、年份修正
				if($xM < 1){
					$xM = $xM + 12;
					$xY = $xY - 1;
				}
			}
		}
			
		return array(
			'y' => $xY,
			'm' => $xM,
			'd' => $xD,
			'h' => $xH,
			'i' => $xI,
			's' => $xS,
		);
	}
	
	private function isRunYear($year){
		if ( $year%4 == 0 && ($year % 100 != 0 || $year % 400 == 0) )
			return true;
		else
			return false;
	}
	
	// 生肖贵人，查年支
	public static function shengxiaoguiren($zhi){	
		$zhiKey = array_search($zhi, self::$zhi_arr);
		
		// 生肖贵人，根据年支来查，顺序为地支顺序
		$sxgr = array(
			'结交人脉首选属相牛，其次为猴和龙，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是马、兔和羊。',
			'结交人脉首选属相鼠，其次为蛇和鸡，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是马和狗。',
			'结交人脉首选属相猪，其次为马和狗，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是猴和蛇。',
			'结交人脉首选属相狗，其次为猪和羊，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是鸡、鼠和龙。',
			'结交人脉首选属相鸡，其次为鼠和猴，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是狗和兔。',
			'结交人脉首选属相猴，其次为鸡和牛，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是猪和虎。',
			'结交人脉首选属相羊，其次为虎和狗，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是鼠和牛。',
			'结交人脉首选属相马，其次为猪和兔，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是鼠和狗。',
			'结交人脉首选属相蛇，其次为鼠和龙，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是虎和猪。',
			'结交人脉首选属相龙，其次为蛇和牛，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是兔和狗。',
			'结交人脉首选属相兔，其次为马和虎，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是龙、鸡、羊和牛。',
			'结交人脉首选属相虎，其次为兔和羊，这三个生肖的人是你的三合或六合贵人，合作相处较为投缘。脾气较为相克的是蛇和猴。',
		);
		
		return $sxgr[$zhiKey];
	}
	
	// 天乙贵人，查日干
	public static function tianyiguiren($gan){
		$ganKey = array_search($gan, self::$gan_arr);
		// 天乙贵人，根据日干来查，顺序为天干顺序
		$tygr = array(
			'生肖属牛和羊的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属鼠和猴的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属猪和鸡的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属猪和鸡的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属牛和羊的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属鼠和猴的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属虎和马的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属虎和马的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属兔和蛇的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
			'生肖属兔和蛇的人是你的天乙贵人，在重要危急的时刻这两个生肖的人会出手相助，助你转危为安，逢凶化吉。',
		);
		return $tygr[$ganKey];
	}
}

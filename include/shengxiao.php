<?php





function getShengXiaoIndex($year){
	// global $shengxiao;
	// 以2008年为鼠年作参考
	$cha = $year-2008;
	$yu = $cha % 12; //var_dump($yu);
	if($yu<0) $yu += 12; 
	return $yu;
}

function getShengXiaoText($year){
	$shengxiao = array('鼠','牛','虎','兔','龙','蛇','马','羊','猴','鸡','狗','猪');
	// 以2008年为鼠年作参考
	$cha = $year-2008;
	$yu = $cha % 12; 
	if($yu<0) $yu += 12;
	// var_dump($shengxiao);
	return $shengxiao[$yu];
}
//echo '<pre>';print_r($shengxiao);print_r($sxYiJi);print_r($sxEleMap);echo '</pre>';
?>
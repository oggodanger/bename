<?php  
error_reporting(E_ERROR | E_PARSE);
	$data = $_POST;

	$family_name = isset($data['family_name'])?$data['family_name']:'宋';
	$birthday = isset($data['birthday'])?$data['birthday']:'2021-03-24-02';
	$sex = isset($data['sex'])?$data['sex']:'1';
?>
<!DOCTYPE html>
<html>
<head>
	<title>测试用</title>
</head>
<body>
<form method="post" action="">
	<div>
		<label>姓</label>
		<input type="text" name="family_name" value="<?php echo $family_name;?>">
	</div>
	<div>
		<label>生日</label>
		<input type="text" name="birthday" value="<?php echo $birthday;?>"><b>格式为xxxx-xx-xx-xx</b>
	</div>
	<div>
		<label>性别</label>
		<input type="text" name="sex" value="<?php echo $sex;?>"><b>1：表示男孩 0 表示女孩 2 表示性别未知</b>
	</div>
	<div>
		<input type="submit" name="提交" οnclick="return validateForm();">
	</div>
</form>
</body>
</html>

<?php

// echo '<pre>';print_r($data);echo '</pre>';

// $birthday = '2021-03-24-02';

// $sex = 1;

// $family_name = '宋';

// $name = '书飏';

echo(date('Y-m-d',1616640107));

include "newname.class.php";
$new = new Newname($birthday,$family_name,$sex);

$temp = $new->output();

echo '<pre>基本数据';print_r($temp);echo '</pre>';

$res = $new->get_result();

echo '<pre>得出的名字';print_r($res);echo '</pre>';






?>
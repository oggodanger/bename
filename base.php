<?php 
	require  'Medoo/Medoo.php';
   // require  '__DIR__'.'/../../application/config/datebase.php';
	use Medoo\Medoo;
//   $goweb = new Medoo([
//      // 必须配置项
//      'database_type' => 'mysql',
//      'database_name' => 'mysql',
//      'server' => '127.0.0.1',
//      'username' => 'root',
//      'password' => 'root',
//      'charset' => 'utf8',
//      //可选参数 表前缀
//      'prefix' => 'gw_',
//
//    ]);
   
    $goweb = new Medoo([
       // 必须配置项
       'database_type' => 'mysql',
       'database_name' => 'goweb',
       'server' => '124.232.145.45',
       'username' => 'dbuser',
       'password' => 'd%YnWR#3fHeGMsUJ',
       'charset' => 'utf8',
       //可选参数 表前缀
       'prefix' => 'gw_',
      
     ]);


    $local = new Medoo([
           // 必须配置项
       'database_type' => 'mysql',
       'database_name' => 'gobzname',
       'server' => '172.18.193.55',
       'username' => 'gopay_user',
       'password' => 'P3Xv2qQ5MVKWDnQ',
       'charset' => 'utf8',
       //可选参数 表前缀
       'prefix' => '',
     ]);
 ?>
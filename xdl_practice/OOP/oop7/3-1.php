<?php
header("content-type:text/html;charset=utf-8");

//PDO的使用
try{
//	实例化 PDO对象
//	参数:DSN User Pass
//	数据源名称 DSN:mysql:host=127.0.0.1;dbname=s50
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=s50','root','zwt12345');
//	$pdo = new PDO('zwt','root','zwt12345');	//写在php.ini中的dsn
	var_dump($pdo);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

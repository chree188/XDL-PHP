<?php
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

//	使用foreach遍历 结果集对象.得到相应结果数组

//PDO的使用
try{
//	实例化 PDO对象
	$pdo = new PDO(DSN,USER,PASS);
//	设置字符集
	$pdo->query("set names utf8");
	
//	PDO相关的选项 结果集的数组形式
//	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

try{
//	查 SQL
	$sql = "SELECT * FROM user";
	$stmt = $pdo->query($sql);
	
	foreach($stmt as $key => $val){
//		var_dump($val);
		$list[] = $val;
	}
	var_dump($list);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

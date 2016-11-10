<?php
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

//PDO的使用
try{
//	实例化 PDO对象
	$pdo = new PDO(DSN,USER,PASS);
//	设置字符集
	$pdo->query("set names utf8");
	
//	PDO相关的选项
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

//对查询结果的预处理
try{
	$sql = "SELECT * FROM user";
//	预处理
	$stmt = $pdo->prepare($sql);
//	执行
	$stmt->execute();
	
	echo "共有:".$stmt->rowCount()."条数据<br>";
//	对查询结果的绑定  把字段绑定为变量
	$stmt->bindColumn('name',$name);
	$stmt->bindColumn('sex',$sex);
	$stmt->bindColumn('age',$age);
	
	foreach($stmt as $k => $v){
		echo $name.':'.$sex.':'.$age.'<br>';
	}
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

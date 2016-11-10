<?php	
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

	/*setAttribute(属性名,属性值)	设置属性
	getAttribute(属性名)	获取属性
SQL错误处理方式
	属性 :PDO::ATTR_ERRMODE
	属性值:
		PDO:ERRMODE_SILENT(默认)
		PDO:ERRMODE_WARNING
		PDO:ERRMODE_EXCEPTION*/
		
//PDO的使用
try{
//	实例化 PDO对象
	$pdo = new PDO(DSN,USER,PASS);
	
//	PDO相关的选项
//	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

try{
//	定义sql
	$sql = "select * from user";
	$pdo->query($sql);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

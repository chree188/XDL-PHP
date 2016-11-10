<?php	
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

	/*query($sql) 返回对象 查
	exec($sql)	受影响行数	增删改
	lastInsertId();获取自增ID*/
	
//PDO的使用
try{
//	实例化 PDO对象
	$pdo = new PDO(DSN,USER,PASS);
//	设置字符集
	$pdo->query("set names utf8");
	
//	PDO相关的选项
//	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

try{
/*//	增
	$sql = "INSERT INTO user VALUES (null, 'tom3','1','18','上海')";
//  $rows = $pdo->query($sql);
    $rows = $pdo->exec($sql);
    $id = $pdo->lastInsertId();//自增ID
    echo "共插入{$rows}条<br>";
    echo "自增ID为:{$id}<br>";*/
    
/*//  改
    $id = 16;
    $sql = "UPDATE user SET name='jack1' WHERE id='$id'";
    $rows = $pdo->exec($sql);
    echo "共修改了{$rows}条记录";*/
    
//  删
    $id = 13;
    $sql = "DELETE FROM user WHERE id='$id'";
    $rows = $pdo->exec($sql);
    echo "共删除了{$rows}条记录";

    var_dump($rows);
	
	
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

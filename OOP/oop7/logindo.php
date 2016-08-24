<?php
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

//PDO的使用
try{
//	实例化 PDO对象
	$pdo = new PDO(DSN,USER,PASS);
//	设置字符集
	$pdo->query("set names utf8");
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

try{
//	接收数据
    $name = $_POST['name'];
    $pass = $_POST['pass'];

//  定义 SQL
    $sql = "SELECT * FROM user WHERE name='$name' AND pass='$pass'";
    echo $sql;
    echo '<hr>';

//  发送SQL
    $stmt = $pdo->query($sql);
    if ($stmt->rowCount() > 0) {
        echo '登录成功拉!';
    } else {
        echo '登录失败......';
    }
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

<?php
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

/*预处理SQL(占位符)
	1. ?
	2. :
绑定参数的方式
	1.bindValue()
	2.bindParam()
	3.execute()*/
	
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

//预处理
try{
	/*1.定义SQL语句, 关键部分 使用占位符 ? 问号
    $sql = "INSERT INTO user (name,sex,age) VALUES (?,?,?)";
    2.预处理SQL 返回一个PDOStatament 对象
    $stmt = $pdo->prepare($sql);
    4.正式执行SQL
    $stmt->execute(array('高圆圆','0','17'));*/
    
//  1.定义SQL语句, 关键部分 使用占位符 : 冒号
    $sql = "INSERT INTO user (name,sex,age) VALUES (:name,:sex,:age)";
//  2.预处理SQL 返回一个PDOStatament 对象
    $stmt = $pdo->prepare($sql);
//  4.正式执行SQL
    $stmt->execute(array(':name'=>'Anne','sex'=>'0','age'=>'19'));

//  查看执行结果
    $rows = $stmt->rowCount();//手影响行数
    $id = $pdo->lastInsertId();
    echo "共插入{$rows}条数据,自增ID为:{$id}";

    /*function test( &$n )
    {
        $n = $n + $n;
        return $n;
    }
    $p = 50;
    echo test($p);
    echo $p;
    echo '<hr>';
    echo test(50);*/
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

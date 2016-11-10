<?php 
header("content-type:text/html;charset=utf8");
require './pdoconfig.php';

/*PDO 里的事务
	开始事务
		$pdo->beginTransaction();
	全部执行成功 提交
		$pdo->commit();
	有一条执行失败  则回滚
		$pdo->rollBack();
mysql的事务
	将多条SQL操作(增删改),作为一个 整体单元来操作,
	都执行成功 则成功,有一条失败,则都失败
	innodb 支持事务  行锁机制
	
	begin 开启一个事务回滚点
	rollback 回滚一个事务,回到begin前的样子
	commit 提交一个事务,只有被提交的事务,才会真正被执行到数据表里*/

//PDO的使用
try{
//	实例化 PDO对象
	$pdo = new PDO(DSN,USER,PASS);
//	设置字符集
	$pdo->query("set names utf8");
	
//	PDO相关的选项
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//	关闭自动提交
	$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
//	开启事务
	$pdo->beginTransaction();
}catch(PDOException $e){
	echo $e->getMessage();
	exit;
}

//事务操作
try{
	$data = [
		['大A','0','18'],
		['大B','1','19'],
		['大C','2','20'],
	];
//	var_dump($data);
	
	$sql = "INSERT INTO user (name,sex,age) VALUES (?,?,?)";
//	预处理
	$stmt = $pdo->prepare($sql);
	$count = 0;	//统计插入条目数
	$ids = array();	//ID们
//	遍历执行
	foreach($data as $v){
		$stmt->execute($v);
		$count += $stmt->rowCount();	//总的执行条数
		$ids[] = $pdo->lastInsertId();	//ID们
	}
	
//	全部执行成功 提交
	$pdo->commit();
	echo "共插入{$count}条数据<br>";
	var_dump($ids);
}catch(PDOException $e){
//	有一条执行失败 则回滚
	$pdo->rollBack();
	echo $e->getMessage();
	exit;
}

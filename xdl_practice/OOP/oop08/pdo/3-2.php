<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 14:17
 */

header("content-type:text/html;charset=utf-8");
require 'pdoconfig.php';

/*
将多条SQL操作(增删改),作为一个整体单元来操作,都执行成功则成功,有一条执行失败则都失败
InnDB 支持事务 行锁机制

begin 开启一个事物的回滚点
rollback 回滚一个事务,只有被移交的事务,才会被真正的执行到数据库里
*/

try {
    $pdo = new PDO(DSN,USER,PASS);
    $pdo->query('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,0); //关闭自动提交
    $pdo->beginTransaction();   //PDO开启事务
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
//    批量操作
    $data = array(
        array('大A'.'0','28'),
        array('大B','1','18'),
        array('大C','2','88'),
    );
    $sql = "INSERT INTO s50_user (name,sex,age) VALUES (?,?,?)";
//    预处理
    $stmt = $pdo->prepare($sql);

    $count = 0; //统计插入条目数
    $ids = [];  //记录自增ID们
    foreach ($data as $v) {
        $stmt->execute($v);
        $count += $stmt->rowCount();    //执行条目数
        $ids[] = $pdo->lastInsertId();  //自增ID
    }
    echo '共插入了{$count}条数据.';
    var_dump($ids);

//    提交一个事务
    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();   //有一条语句执行失败,就要回滚!!!!
    echo $e->getMessage();
    exit;
}

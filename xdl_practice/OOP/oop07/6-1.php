<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 15:27
 */

header("content-type:text/html;charset=utf-8");
require 'pdoconfig.php';
/*
PDO 增删改查
    query($sql) 返回对象 查
    exec($sql) 返回受影响行数 增删改
    lastInsertId() 获取自增ID
*/

//使用PDO

try {
//    实例化PDO
    $pdo = new PDO(DSN,USER,PASS);
//    设置字符集
    $pdo->query("set name utf8");
//    设置属性
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
/*//    增
    $sql = "INSERT INTO user VALUES(null,'p3','0','18','上海')";
    $row = $pdo->exec($sql);
    $id = $pdo->lastInsertId();
    echo "共插入{$row}条数据";
    echo "自增ID为:{$id}";
//    var_dump($row);//返回受影响行数*/

/*//    改
    $sql = "UPDATE user SET name='t1' WHERE id='35'";
    $row = $pdo->exec($sql);
    echo "共修改{$row}条";*/

/*//    删
    $id = 36;
    $sql = "DELETE FROM user WHERE id='$id'";
    $row = $pdo->exec($sql);
    echo "共删除了{$row}条数据";*/
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
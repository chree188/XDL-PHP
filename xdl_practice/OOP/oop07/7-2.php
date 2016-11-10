<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 15:48
 */

header("content-type:text/html;charset=utf-8");
require 'pdoconfig.php';
/*
PDO 查
    query() 查询 返回的是PDOStatement的实例
    fetch() 单条数据/一维数组
    fetchAll() 所有数据/二维数组
结果集属性的设置
    PDO::ATTR_DEFAULT_FETCH_MODE
    值:
        PDO::FETCH_ASSOC 关联
        PDO::FETCH_NUM 索引
        PDO::FETCH_OBJ 对象
        PDO::FETCH_BOTH 混合
*/

//使用PDO
try {
//    实例化PDO
    $pdo = new PDO(DSN,USER,PASS);
//    设置字符集
    $pdo->query("set names utf8");
//    设置属性
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    设置结果集返回数组的类型
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);  //关联
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_NUM);    //索引
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);    //对象
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_BOTH);   //混合
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
    $sql = "SELECT * FROM user";
    $stmt = $pdo->query($sql);
//    var_dump($stmt);    //返回一个对象
//    单条数据/首条数据/一维数组
//    $rows = $stmt->fetch();
//    所有数据/二维数组
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($rows);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
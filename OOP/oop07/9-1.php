<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 16:31
 */

header("content-type:text/html;charset=utf-8");
require 'pdoconfig.php';
/*
PDO 预处理
    优点:
        1.对用户的数据 进行过滤,提高安全性
        2.提高批量操作的性能
*/

//使用PDO
try {
//    实例化PDO
    $pdo = new PDO(DSN,USER,PASS);
//    设置字符集
    $pdo->query("set names utf8");
//    设置属性
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    设置几个集返回数组的类型
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);  //关联
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
//    1.定义SQL 关键部分 使用占位符 ? 问号
    $sql = "INSERT INTO user (name,sex,age) VALUES (?,?,?)";
//    2.预处理SQL 返回的是PDOStatement对象
    $stmt = $pdo->prepare($sql);
//    3.绑定参数 给占位符部分绑定参数

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 16:11
 */

header("content-type:text/html;charset=utf-8");
require 'pdoconfig.php';
/*
PDO 查
    使用foreach 遍历PDOStatement对象
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
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
    $sql = "SELECT * FROM user";
    $stmt = $pdo->query($sql);

    foreach ($stmt as $key => $val) {
//        var_dump($val);
        $list[] = $val;
    }
    echo '<pre>';
        print_r($list);
    echo '</pre>';
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 14:51
 */

header("content-type:text/html;charset=utf-8");

//使用PDO
try {
//    实例化PDO 参数:DSN User Pass
//    DSN:数据源名称 就是数据库连接的信息
    $pdo = new  PDO('mysql:host=127.0.0.1;dbname=s50','root','zwt12345');
    var_dump($pdo);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
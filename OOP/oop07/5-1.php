<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 15:12
 */

header("content-type:text/html;charset=utf-8");
require 'pdoconfig.php';
/*
PDO 设置SQL错误处理方式

属性: PDO::ATTR_ERRMODE
值: PDO::ERRMODE_SILENT(默认) 瞎了
    PDO::ERRMODE_WARNING 报错,警告
    PDO::ERRMODE_EXCEPTION 抛出异常
*/

//使用PDO
try {
//    实例化PDO
    $pdo = new PDO(DSN,USER,PASS);
//    设置属性
//    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);  //mor
//    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); //错误提示
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
    $sql = "SELECT * FROM aabbcc";
    $pdo->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
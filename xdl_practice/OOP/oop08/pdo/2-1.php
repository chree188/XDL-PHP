<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 13:39
 */

header("content-type:text/html;charset=utf-8");
require 'pdoconfig.php';

try {
    $pdo = new PDO(DSN,USER,PASS);
    $pdo->query('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
    $sql = "SELECT * FROM user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

//    获取查询条目数
    echo '共有:'.$stmt->rowCount().'条';
//    对查询结果集的绑定 把字段绑定为变量
    $stmt->bindColumn('name',$name);
    $stmt->bindColumn('sex',$sex);
    $stmt->bindColumn('age',$age);

    foreach ($stmt as $key => $val) {
        echo $name.':'.$age.'<br>';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
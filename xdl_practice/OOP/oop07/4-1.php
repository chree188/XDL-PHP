<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 14:55
 */

header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';
/*
setAttribute(属性名,属性值) 设置属性
getAttribute(属性名) 获取属性
*/

//使用PDO
try {
//    实例化PDO 参数:DSN User Pass
//    DSN:数据源名称 就是数据库连接的信息
//    $option = [PDO::ATTR_AUTOCOMMIT => 1];
//    $pdo = new PDO(DSN,USER,PASS,$options);
    $pdo = new PDO(DSN,USER,PASS);
//    var_dump($pdo);
//    设置属性
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
    echo $pdo->getAttribute(PDO::ATTR_AUTOCOMMIT);

    echo 'PDO是否自动提交:'.$pdo->getAttribute(PDO::ATTR_AUTOCOMMIT).'<br>';

    echo "当前PDO的错误处理的模式:".$pdo->getAttribute(PDO::ATTR_ERRMODE).'<br>';
    echo "表字段字符的大小写转换:".$pdo->getAttribute(PDO::ATTR_CASE).'<br>';
    echo "与连接状态相关特有信息:".$pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS).'<br>';
    echo "空字符串转换为SQL的null:".$pdo->getAttribute(PDO::ATTR_ORACLE_NULLS).'<br>';
    echo "应用程序提前获取数据大小:".$pdo->getAttribute(PDO::ATTR_PERSISTENT).'<br>';
    echo "数据库特有的服务器信息:".$pdo->getAttribute(PDO::ATTR_SERVER_INFO).'<br>';
    echo "数据库服务器版本号信息:".$pdo->getAttribute(PDO::ATTR_SERVER_VERSION).'<br>';
    echo "数据库客户端版本号信息:".$pdo->getAttribute(PDO::ATTR_CLIENT_VERSION).'<br>';
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
<?php 
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

//PDO的使用
try {
    //实例化 PDO对象 
    $pdo = new PDO(DSN,USER,PASS);
    //设置字符集
    $pdo->query("set names utf8");

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {
    //接收数据
    $name = $_POST['name'];
    $pass = $_POST['pass'];

    //定义 SQL
    $sql = "SELECT * FROM user2 WHERE name=? AND pass=?";
    
    //预处理
    $stmt = $pdo->prepare($sql);
    //给sql绑定数据
    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$pass);
    //正式执行
    $stmt->execute();

    //判断受影响行数
    if ($stmt->rowCount() > 0) {
        echo '登录成功拉!';
    } else {
        echo '登录失败......';
    }

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}



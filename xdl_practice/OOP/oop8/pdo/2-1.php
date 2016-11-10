<?php 
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

//PDO的使用
try {
    //实例化 PDO对象 
    $pdo = new PDO(DSN,USER,PASS);
    //设置字符集
    $pdo->query("set names utf8");

    //PDO相关的选项
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
//预处理:
try {
    /*// 1.定义SQL语句, 关键部分 使用占位符 ? 问号
    $sql = "INSERT INTO user (name,sex,age) VALUES (?,?,?)";
    // 2.预处理SQL 返回一个PDOStatament 对象
    $stmt = $pdo->prepare($sql);
    // 3.绑定参数
    $stmt->bindValue(1,'小静静');
    $stmt->bindValue(2,'0');
    $stmt->bindValue(3,'18');
    // 4.正式执行SQL
    $stmt->execute();*/

    // 1.定义SQL语句, 关键部分 使用占位符 : 冒号
    $sql = "INSERT INTO user (name,sex,age) VALUES (:name,:sex,:age)";
    // 2.预处理SQL 返回一个PDOStatament 对象
    $stmt = $pdo->prepare($sql);
    // 3.绑定参数
    $stmt->bindValue(':name','大静静');
    $stmt->bindValue('sex','0');
    $stmt->bindValue('age','18');
    // 4.正式执行SQL
    $stmt->execute();

    //查看执行结果
    $rows = $stmt->rowCount();//手影响行数
    $id = $pdo->lastInsertId();
    echo "共插入{$rows}条数据,自增ID为:{$id}";

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}


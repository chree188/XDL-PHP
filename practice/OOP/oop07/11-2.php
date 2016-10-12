<?php
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

/*
PDO 预处理
    占位符
        1. ?
        2. :name
    绑定参数的方式
        1. bindValue()
        2. bindParam()
        3. execute()
 */

//使用PDO
try {
    //实例化PDO
    $pdo = new PDO(DSN,USER,PASS);
    //设置字符集
    $pdo->query("set names utf8");
    //设置属性
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //设置结果集返回数组的类型
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);//关联

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

try {

    /*//1. 定义SQL   关键部分 使用占位符 ?  问号
    $sql = "INSERT INTO user (name,sex,age) VALUES(?,?,?)";
    //2. 预处理SQL 返回的是PDOStatement对象
    $stmt = $pdo->prepare($sql);
    //4. 正式执行SQL
    $stmt->execute(array('高圆圆','0','19'));*/

    //1. 定义SQL   关键部分 使用占位符 :xxx  冒号
    $sql = "INSERT INTO user (name,sex,age) VALUES(:n,:s,:a)";
    //2. 预处理SQL 返回的是PDOStatement对象
    $stmt = $pdo->prepare($sql);
    //4. 正式执行SQL
    $stmt->execute(array(':n'=>'Anne','s'=>'0','a'=>'66'));

    $rows = $stmt->rowCount();
    $id = $pdo->lastInsertId();
    echo "共插入{$rows}条数据,自增ID为{$id}";


} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}


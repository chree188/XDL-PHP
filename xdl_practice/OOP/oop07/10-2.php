<?php
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

/*
PDO 预处理
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

/*//引用参数的函数
function test( &$n ){
    $n = $n + $n;
    return $n;
}
$p = 50;
echo test(50);
echo '<hr>';
echo $p;*/


try {

    /*//1. 定义SQL   关键部分 使用占位符 ?  问号
    $sql = "INSERT INTO user (name,sex,age) VALUES(?,?,?)";
    //2. 预处理SQL 返回的是PDOStatement对象
    $stmt = $pdo->prepare($sql);
    //3. 绑定参数 给占位符部分绑定参数

    $name = '老艳艳';
    $sex = 0;
    $age = '88';

    $stmt->bindParam(1,$name);
    $stmt->bindParam(2,$sex);
    $stmt->bindParam(3,$age);
    //4. 正式执行SQL
    $stmt->execute();*/

    //1. 定义SQL   关键部分 使用占位符 :xxx  冒号
    $sql = "INSERT INTO user (name,sex,age) VALUES(:name,:sex,:age)";
    //2. 预处理SQL 返回的是PDOStatement对象
    $stmt = $pdo->prepare($sql);
    //3. 绑定参数 给占位符部分绑定参数
    $name = '中艳艳';
    $sex = 0;
    $age = '58';

    $stmt->bindParam(':name',$name);
    $stmt->bindParam('sex',$sex);
    $stmt->bindParam('age',$age);
    //4. 正式执行SQL
    $stmt->execute();

    $rows = $stmt->rowCount();
    $id = $pdo->lastInsertId();
    echo "共插入{$rows}条数据,自增ID为{$id}";


} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}


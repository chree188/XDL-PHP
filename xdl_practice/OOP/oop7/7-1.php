<?php 
header("content-type:text/html;charset=utf-8");
require './pdoconfig.php';

/*
    query($sql)  返回PDOStatement对象的实例  查
    处理结果集 
    fetch()  一维数组  得到第一条数据
    fetchall() 二维数组(混合)  得到所有数据

返回数组的形式 
属性 : PDO::ATTR_DEFAULT_FETCH_MODE
属性值
    PDO::FETCH_ASSOC 关联
    PDO::FETCH_NUM  索引
    PDO::FETCH_OBJ  对象
    PDO::FETCH_BOTH 默认(混合)
 */
 
//PDO的使用
try {
    //实例化 PDO对象 
    $pdo = new PDO(DSN,USER,PASS);
    //设置字符集
    $pdo->query("set names utf8");

    //PDO相关的选项 结果集的数组形式
    /*$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_NUM);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_BOTH);//默认的*/


} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}


try {
    //查
    $sql = "SELECT * FROM user";
    //fasongSQL
    $stmt = $pdo->query($sql);
    // var_dump($stmt);
    //fetch()  一维数组
    // $rows = $stmt->fetch();
    
    //fetchall() 二维数组(混合)
    $rows = $stmt->fetchall(PDO::FETCH_ASSOC);

    var_dump($rows);

} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
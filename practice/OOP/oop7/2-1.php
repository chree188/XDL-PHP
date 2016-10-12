<?php
header("content-type:text/html;charset=utf-8");

// 使用mysql对象风格

// 连接数据库
$mysqli = new Mysqli('localhost','root','zwt12345','s50');
// 判断错误
if($mysqli->errno>0){
    echo $mysqli->error;
    exit;
}

// 设置字符集
$mysqli->query('set names utf8');

// sql
$sql = "select * from user";

// 指定sql
$result = $mysqli->query($sql);
// 得到数据
$list = $result->fetch_all();

$mysqli->close();

var_dump($list);
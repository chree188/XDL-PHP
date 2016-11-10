<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/14
 * Time: 14:28
 */

header("content-type:text/html;charset=utf-8");

//使用mysqli之 对象风格

$mysqli = new Mysqli('localhost','root','zwt12345','s50');

if ($mysqli->error > 0) {
    echo $mysqli->error;
    exit;
}

$mysqli->query('set names utf8');
$sql = "SELECT * FROM user";

$result = $mysqli->query($sql);
$list = $result->fetch_all();

$mysqli->close();
var_dump($list);
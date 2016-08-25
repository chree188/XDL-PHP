<?php
//同一个文件中 定义多个命名空间
namespace dds;
header("content-type:text/html;charset=utf-8");
require './fun2.php';

function demo()
{
    echo 'dds的呆毛...<br>';
}

demo();          //非限定名称
nb\demo();       //限定名称
\dds\nb\demo();  //完全限定名称

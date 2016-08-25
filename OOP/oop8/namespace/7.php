<?php
namespace php;
header("content-type:text/html;charset=utf-8");

//函数
function demo()
{
    echo 'demo....<br>';
}
$fun = '\php\demo';
$fun();

//类
class User
{
    public static function test()
    {
        echo 'test..<br>';
    }
}
$class = "\php\User";
$class::test();

const DDS = '大屌丝1';
$c = '\php\DDS';
// echo $c;
echo constant($c);


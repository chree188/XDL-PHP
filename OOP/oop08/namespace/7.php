<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 14:49
 */
namespace heheda;

//函数
function demo()
{
    echo 'demo...<br>';
}
$fun = '\heheda\demo';
$fun();

//类
class User
{
    public static function test(){
        echo "test...<br>";
    }
}
$class = '\heheda\User';
$class::test();

//常量
const DDS = '大屌丝';
$c = '\heheda\DDS';
//echo $c;    //DDS 不是值
echo constant($c);  //返回一个常量的值!
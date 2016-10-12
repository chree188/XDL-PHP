<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 16:40
 */
header("content-type:text/html;charset=utf-8");

//Trait 的使用
//定义一个trait

trait A
{
    public static $name = '红红';
    public static function demo()
    {
        echo 'A中的demo<br>';
    }
}

class User
{
    use A;
    public static function demo1()
    {
        echo 'User中的demo1<br>';
    }

    public function test()
    {
        // TODO: Implement test() method.
    }
}

$u1 = new User();
//$u1->demo();    //User中的demo
echo User::$name.'<br>';    //Y
//echo $u1->name; //N 报错

User::demo();   //静态的方法
$u1->demo();    //使用动态的方法去调用 不会报错
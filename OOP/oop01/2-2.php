<?php
header("content-type:text/html;charset=utf-8");

/*
    类的定义格式:
    [修饰符] class 类名
    {
        [成员属性]
        [成员方法]
    }
*/

// 定义一个小鸡类
class Chick
{
    // 成员属性
    // 就是在类里面定义变量,只不过前面多了一个public
    public $color;
    public $sex;

    // 不允许有过程式的代码
    // echo '123456';
    // var_dump('123456');

    public function egg(){
        echo '我下蛋了...';
    }

    public function say(){
        echo '咯咯咯...';
    }
}

// 实例化
$xj = new Chick;
var_dump($xj);

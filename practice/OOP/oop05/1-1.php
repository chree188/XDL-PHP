<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 14:02
 */
header("content-type:text/html;charset=utf-8");

/*克隆对象
    对象的引用赋值机制 致使我们去克隆对象
    语法: $a = clone $b;*/
$a = 100;
echo $a.'<br>';

$b = $a;
$b = 200;
echo $a;
echo '<hr>';

//对象的引用赋值
class User{public $name = 'AAAAAA';}
$u1 = new  User();
echo $u1->name.'<br>';

$u2 = clone $u1;    //克隆对象
$u2->name = 'BBBBBB';
echo $u1->name;
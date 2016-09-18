<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 16:23
 */
header("content-type:text/html;charset=utf-8");

//Trait 的使用
//定义一个trait
trait A
{
//    属性
    public $name = '猎空';
    private $age = 18;
}

class User
{
    use A;
//    public $name = '小美';    //不能重复定义属性
    public function test()
    {
        // TODO: Implement test() method.
    }
}

$u1 = new User();
var_dump($u1);
$u1->name = '卢西安';
echo $u1->name;
<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 14:38
 */

header("content-type:text/html;charset=utf-8");

//声明函数 实现两数相除
function demo($a,$b)
{
//    除数不能为0
    if ($b == 0) {
//        抛出异常
        throw new Exception('除数不能为0!!!');
    }
    return $a / $b;
}

//封装到类
class Person
{
    private $age;
    public function __construct($age)
    {
//        判断年龄的合法性
        if ($age < 0 || $age > 150) {
            throw new Exception('您的年龄不合法!');
        }
        $this->age = $age;
    }
}

//异常的过程
try{
//    echo demo(100,0);
    new Person(-5);
} catch (Exception $e) {
    echo $e->getMessage();
}
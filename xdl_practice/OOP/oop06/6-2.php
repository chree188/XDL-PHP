<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 15:49
 */
header("content-type:text/html;charset=utf-8");

/*
 * 异常一些概念
 * 1.与其他语言的区别 (C++ JAVA)
 *      php的异常 需要手动抛出
 *      其他语言 系统自动抛出
 * 2.使用异常的情况
 *      程序员的悲观
 *      代码健壮性的要求
 *      业务需求
 */
//自定义异常处理类
class MyException extends Exception
{
    public function getString()
    {
//        return '啊,我触发了异常!';
        return '异常号:'.$this->code.'|'.$this->getMessage();
    }
}

//声明函数 实现两数相除
function demo($a,$b)
{
//    除数不能为0
    if ($b == 0) {
//        抛出异常
        throw new MyException('除数不能为0!',250);
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
    echo demo(100,0);
    echo '<hr>';
//    new Person(-5);
} catch (MyException $e) {
//    echo $e->getString();
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
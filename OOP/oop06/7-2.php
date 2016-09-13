<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 16:25
 */

header("content-type:text/html;charset=utf-8");

//自动接收异常

//声明一个回调函数
function autoException($e)
{
    echo $e->getMessage();
}
//自动接收异常
set_exception_handler('autoException');
demo(100,0);

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
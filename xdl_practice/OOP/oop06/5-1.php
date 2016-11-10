<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/13
 * Time: 15:21
 */

header("content-type:text/html;charset=utf-8");

//自定义异常处理类
//定义一个类,继承系统Exception基类.
//基类中大部分方法 都不能被重写,属性都可以访问
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

//异常的过程
try{
    echo demo(100,0);
} catch (MyException $e) {
    echo $e->getString();
//    echo $e->getMessage();
}
<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 18:40
 */

header("content-type:text/html;charset=utf-8");
/*
单例设计模式(单态)
    单例:单个实例:一个类只允许存在一个对象
    1.不让进:是类不能被实例化
    2.留后门:设置静态方法
    3.给对象:在静态方法里 实例化该类
    4.判初夜:判断时候是第一次得到该类的对象
    5.设静态:静态方法里 要使用静态属性
*/

/*//1.不让进:是类不能被实例化
class Test
{
    private function __construct()
    {
        //占位,就是不让你new   你来打我啊!!
    }
}
*/

/*//2.留后门:设置静态方法-------------------------
class Test
{
    private function __construct()
    {
        //占位,就是不让你new   你来打我啊!!
    }
    public static function getObject()
    {
        echo '啊,我是后门,进吧!<br>';
    }
}*/

/*//3.给对象:在静态方法里 实例化该类
class Test
{
    private function __construct()
    {
        //占位,就是不让你new   你来打我啊!!
    }
    public static function getObject()
    {
        echo '啊,我是后门,进吧!<br>';
        return new self();//实例化 一个对象 给你
    }
}*/

/*//4.判初夜: 判断时候是第一次得到该类的对象
class Test
{
    private $obj = null;
    private function __construct()
    {
        //占位,就是不让你new   你来打我啊!!
    }
    public static function getObject()
    {
        echo '啊,我是后门,进吧!<br>';
        if ($this->obj === null) {
            $this->obj = new self();//实例化 一个对象 给你
        }
        //返回属性:属性里存着对象
        return $this->obj;
    }
}*/

//5.设静态方法里 要使用静态属性
class Test
{
    private static $obj = null;
    private function __construct()
    {
//        占位,就是不让你new 你来打我啊!!
    }
    public static function getObject()
    {
//        echo '啊,我司后门,进吧!<br>';
        if (self::$obj == null){
            self::$obj = new self();    //实例化 一个对象给你
        }
//        返回属性:属性里存着对象
        return self::$obj;
    }
}

$t1 = Test::getObject();
$t2 = Test::getObject();
$t3 = Test::getObject();
$t4 = Test::getObject();
$t5 = Test::getObject();
$t6 = Test::getObject();
$t7 = Test::getObject();

if ($t1 == $t7) {
    echo '哦,YES!,是同一个实例.';
} else {
    echo '哦,NO!,不是同一个实例';
}
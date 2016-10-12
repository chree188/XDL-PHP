<?php 
header("content-type:text/html;charset=utf-8");


/*
单例模式
    一个类只允许有一个实例存在.
    1. 不让进 : 使类不能被实例化
    2. 留后门 : 设置静态方法
    3. 给对象 : 在静态方法里 实例化该类
    4. 判初夜 : 判断是否是第一次得到该类的对象
    5. 设静态 : 静态方法里 要使用静态属性
 */

// 1. 不让进 : 使类不能被实例化
/*class Test
{
    private function __construct()
    {
        //占位,不服  你来打我啊!
    }
}*/

//2. 留后门 : 设置静态方法
/*class Test
{
    private function __construct()
    {
        //占位,不服  你来打我啊!
    }
    //留后门,设置静态方法
    public static function getObject()
    {
        echo '啊,我是后门,进吧.';
    }
}*/

//3.给对象 : 在静态方法里 实例化该类
/*class Test
{
    private function __construct()
    {
        //占位,不服  你来打我啊!
    }
    //留后门,设置静态方法
    public static function getObject()
    {
        echo '啊,我是后门,进吧.';
        return new self();
    }
}*/

//4. 判初夜 : 判断是否是第一次得到该类的对象
/*class Test
{
    private static $obj = null;//属性值为对象,默认为空
    private function __construct()
    {
        //占位,不服  你来打我啊!
    }
    //留后门,设置静态方法
    public static function getObject()
    {
        echo '啊,我是后门,进吧.';
        if ($this->obj === null) {
            $this->obj = new self();
        }
        return $this->obj;
    }
}*/

//5. 设静态 : 静态方法里 要使用静态属性
class Test
{
    private static $obj = null;//属性值为对象,默认为空
    private function __construct()
    {
        //占位,不服  你来打我啊!
    }
    //留后门,设置静态方法
    public static function getObject()
    {
        echo '啊,我是后门,进吧.';
        if (self::$obj === null) {
            self::$obj = new self();
        }
        return self::$obj;
    }
}

//实例化
$t1 = Test::getObject();
$t2 = Test::getObject();
$t3 = Test::getObject();
$t4 = Test::getObject();
$t5 = Test::getObject();
$t6 = Test::getObject();
$t7 = Test::getObject();

echo '<hr>';
if ($t1 === $t7) {
    echo '啊,YSE! 是同一个实例';
} else {
    echo '啊,NO! 不是同一个实例';
}








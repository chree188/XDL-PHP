<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 20:20
 */

header("content-type:text/html;charset=utf-8");

/*多态性
抽象类和抽象方法
    抽象方法:使用关键字abstract 来定义的抽象方法
    抽象方法不能有方法体{}
    有抽象方法的类,必须是一个抽象类

    要使用抽象类,定义一个子类,继承抽象类.并且重写抽象类里所有抽象方法.
*/
//定义抽象类
abstract class Person
{
//    普通方法
    public function say()
    {
        echo 'say...<br>';
    }
//    抽象方法
    abstract public function run();
}
//$p = new Person(); //NO

//使用抽象类
class Xmen extends Person
{

    public function run()
    {
        echo '俺会跑<br>';
    }
}
$x = new Xmen();
$x->run();
<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 20:40
 */

header("content-type:text/html;charset=utf-8");

/*接口 API-应用接口
    使用 interface 来定义接口
    1.接口不能被实例化
    2.接口中 只允许有 抽象方法 和常量
    3.抽象方法 必须省略abstract
    4.定义标准,实现接口,重写接口中的所有方法.
    5.实现(继承)接口,不能使用extends,要使用implements
    6.接口可以实现多继承

接口与对象类的区别
    1.接口中所有方法都是抽象方法,抽象类里可以有普通方法
    2.接口中不能有属性.抽象类可以有
    3.接口可以实现多继承,抽象类不可以
*/

interface User
{
//    public $name = '静静'; //NO
    const XDL = '兄弟连';

    public function demo1();
    public function demo2();
    public function demo3();
}

//$u = new User(); //NO
//class VipUser extends User{} //NO

//接口的实现
class VipUser implements User
{
    public function demo1()
    {
    }
    public function demo2()
    {
    }
    public function demo3()
    {
    }
//    添加方法
    public function demo100()
    {
    }
}

interface A
{
    public function demo();
    public function test();
}
interface B
{
    public function demo();
    public function fun();
}
//实现接口
class C implements A,B
{
    public function demo()
    {
    }
    public function test()
    {
    }
    public function fun()
    {
    }
}
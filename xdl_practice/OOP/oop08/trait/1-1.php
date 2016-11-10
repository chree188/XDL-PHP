<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 15:10
 */
header("content-type:text/html;charset=utf-8");

//Trait 的使用
//定义一个trait

trait A
{
    public $name = '静静';
//    const DDS = '调戏';   //不能有常量

    public function demo()
    {
        echo 'A中的demo<br>';
    }
}
//$a = new A();   //不能被实例化

//父类
class User
{
//    use A;  //使用关键字 use,来使用定义好的trait
    public function say()
    {
        echo 'USER中的say<br>';
    }
}

//$u1 = new User();
//$u1->say();
//$u1->demo();

class VipUser extends User
{
    use A;  //将trait A混入类中 ,实现多继承!

    public function test()
    {
        // TODO: Implement test() method.
    }
}
$u2 = new VipUser();
var_dump($u2);
$u2->demo();
$u2->say();
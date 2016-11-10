<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 16:35
 */
header("content-type:text/html;charset=utf-8");

//Trait 的使用
//定义一个trait

trait A
{
    public function demo()
    {
        echo 'A中的demo<br>';
    }
}

class User
{
//    use A;
    public function demo(){
        echo 'User中的demo<br>';
    }
}

//$u1 = new User();
//$u1->demo();    //User中的demo

class VipUser extends User
{
    use A;  //继承User 并混入A

    public function test()
    {
        // TODO: Implement test() method.
    }
}

$u2 = new VipUser();
$u2->demo();    //A中的demo demo()被重写了
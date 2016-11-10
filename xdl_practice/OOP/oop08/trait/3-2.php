<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 16:18
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
trait B
{
    public function demo1()
    {
        echo 'B中的demo1<br>';
    }
}

trait C
{
    use A,B;    //嵌套使用
}

class User
{
    use C;
    public function say()
    {
        echo 'USER中的say<br>';
    }

    public function test()
    {
        // TODO: Implement test() method.
    }
}

$u1 = new User();
$u1->say();
$u1->demo();
$u1->demo1();
<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/18
 * Time: 16:56
 */

header("content-type:text/html;charset=utf-8");

trait A
{
    public function demo()
    {
        echo 'A中的demo<br>';
    }
}

trait B
{
    public function demo()
    {
        echo 'B中的demo<br>';
    }
}

trait C
{
    public function demo()
    {
        echo 'C中的demo<br>';
    }
}

class User
{
    use A,B,C{
//        1.代替
        A::demo insteadof B,C;  //规定使用哪个trait里的方法
//        2.起别名
        B::demo as demob;   //起别名为demob()
        C::demo as democ;   //起别名为democ()
    }
}

$u1 = new User();
$u1->demo();    //A中的...

$u1->demob();
$u1->democ();
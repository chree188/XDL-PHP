<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 14:18
 */

header("content-type:text/html;charset=utf-8");

/*
 * final class Person{}
 * class Xmen extends Person{}
 *
 * $x = new Xmen();
 * var_dump($x);
 * */

class User
{
    final public function demo()
    {
        echo 'demo....';
    }
}

class VipUser extends User
{
    public function demo()
    {
        echo '我才是demo...';
    }
}
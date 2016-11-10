<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 14:09
 */
header("content-type:text/html;charset=utf-8");

/*
 * final
 *  定义:可以用于修饰类和方法,不能修饰属性
 *  特点1:final修饰一个类 会导致该类不能被继承!
 *  特点2:final修饰一个方法 会导致该方法 不能被重写!
 * */

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
        echo 'demo...';
    }
}

class VipUser extends User
{
    public function demo()
    {
        echo "我才是demo....";
    }
}
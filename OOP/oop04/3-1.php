<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/8
 * Time: 14:22
 */

header("content-type:text/html;charset=utf-8");
/*
作用:
    1.可以在一定程度上提高安全性
    2.提高可读性
*/
class User
{
    final public function login($user,$pass)
    {
        if ($user == 'admin' && $pass == '123456') {
            echo 'login success!!';
        }else{
            echo 'error!!!'; 
        }
    }
}

//攻击者:继承父类 重写方法
class User2 extends User
{
    public function login($user,$pass)
    {
        echo "login success!!!";
    }
}

$u = new User2();
$u->login('','');
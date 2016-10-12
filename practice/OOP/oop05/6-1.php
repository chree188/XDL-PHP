<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 18:18
 */

header("content-type:text/html;charset=utf-8");

//定义一个用户管理模块
class User
{
//    添加用户
    public function add()
    {
        echo '添加用户...<br>';
    }
//    用户列表
    public function index()
    {
        echo '用户列表...<br>';
    }
//    编辑用户
    public function edit()
    {
        echo '编辑用户...<br>';
    }
//    调用不存在的方法
    public function __call($a, $b)
    {
        echo '<h1>404 NOT FOUND !!</h1>';
    }
}

//实例化
$user = new User();
//接收用户的传参
$action = empty($_GET['a'])?'index':$_GET['a'];
//调用方法
$user->$action();
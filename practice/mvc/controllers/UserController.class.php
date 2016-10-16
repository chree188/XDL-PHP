<?php

/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 10:34
 */

//用户控制器
class UserController extends Controller
{
    public function index()
    {
        $model = new Model('user');
        $this->assign('list',$model->select());
        $this->display('User/index.html');
    }


    public function add()
    {
        echo 'User add';
    }
}
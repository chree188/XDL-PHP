<?php

/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 10:34
 */

//用户控制器
class UserController
{
    public function index()
    {
        echo '我们都是用户...';
        $model = new Model('user');
        echo '<pre>';
            print_r($model->select());
        echo '</pre>';
    }
    public function add()
    {
        echo 'User add';
    }
}
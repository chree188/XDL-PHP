<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/8
 * Time: 20:50
 */

header('content-type:text/html;charset=utf-8');

//导入
require 'config.php';
require 'Model.class.php';

$model = new Model('user');
echo $model->add();//执行插入
<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/9
 * Time: 9:30
 */

header('content-type:text/html;charset=utf-8');

//导入
require 'config.php';
require 'Model.class.php';

$model = new Model('user');
echo $model->del();//执行删除
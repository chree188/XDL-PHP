<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/8
 * Time: 20:06
 */

//导入
require 'config.php';
require 'Model.class.php';

$model = new Model('s50_user');
$data = $model->select();
//var_dump($data);

//将数据转化为json编码
echo json_encode($data);
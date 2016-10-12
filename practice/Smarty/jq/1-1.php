<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/12
 * Time: 18:24
 */
header("content-type:text/html;charset=utf-8");

require './config.php';
require './Model.class.php';

$model = new Model('lamp_address');

//接收查询条件
$upid = empty($_GET['upid'])?0:$_GET['upid'];

//查询
$data = $model->where('upid ='.$upid)->select();

//将结果返回
echo json_encode($data);
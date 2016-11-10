<?php 
header("content-type:text/html;charset=utf-8");

require './Model.class.php';
require './config.php';

$model = new Model('s50_user');

// $row = $model->order('id DESC')->select();
// $row = $model->limit(3)->select();

//综合查询
$row = $model->order('id desc')->field(array('id','name'))->where("name like '%王%'")->limit(2)->select();
var_dump($row);


/*// $list = $model->where('id > 3')->select();
$list = $model->where("name like '%王%'")->select();
var_dump($list);
$list = $model->order('id DESC')->select();*/




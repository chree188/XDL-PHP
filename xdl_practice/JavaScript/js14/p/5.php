<?php 
header("content-type:text/html;charset=utf-8");

//导入
require "./config.php";
require "./Model.class.php";

$model = new Model('s51_user');
echo $model->add();//执行插入



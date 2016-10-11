<?php 
header("content-type:text/html;charset=utf-8");
//导入
require "./config.php";
require "./Model.class.php";

$model = new Model('s51_user');
$data = $model->select();

//将数据转化为 json编码
// echo json_encode($data);

echo "makedata(".json_encode($data).")";



<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/9
 * Time: 19:45
 */

header("content-type:text/html;charset=utf-8");
//导入
require "./config.php";
require "./Model.class.php";

$model = new Model('s50_user');
$data = $model->select();

//将数据转化为 json编码
// echo json_encode($data);

echo "makedata(".json_encode($data).")";
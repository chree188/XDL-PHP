<?php	
header("content-type:text/html;charset=utf-8");

require './Model.class.php';
require './config.php';

$model = new Model('users');
//var_dump($model);

$list = $model->select();
echo '<pre>';
print_r($list);

echo '<hr>';

$model2 = new Model('order');
$list = $model2->select();
print_r($list);

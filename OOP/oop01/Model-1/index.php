<?php
header("content-type:text/html;charset=utf-8");

require './config.php';
require './Model.class.php';

$model = new Model('s50_user');
$list = $model->select();
print_r($list);

echo '<hr>';
$model = new Model('user');
$list =	$model->select();
print_r($list);

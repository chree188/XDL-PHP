<?php	
header("content-type:text/html;charset=utf-8");

require './Model.class.php';
require './config.php';

$model = new Model('users');
$list = $model->select();
print_r($list);

echo '<hr>';
var_dump($model->find(5));
var_dump($model->find('男枪','name'));
echo '<hr>';

//var_dump($model->del(17));
//var_dump($model->del('好运姐','name'));


echo '<pre>';
print_r($_POST);
echo '</pre>';
echo '<hr>';
// var_dump($model->add());

echo $model->count();
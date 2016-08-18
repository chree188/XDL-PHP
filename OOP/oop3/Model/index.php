<?php	
header("content-type:text/html;charset=utf-8");

require './Model.class.php';
require './config.php';


// echo '<pre>';
//     print_r($_POST);
// echo '</pre>';

$model = new Model('s50_user');
// var_dump($model->update());

/*$list = $model->field(array('id','name','hehe'))->select();
$list1 = $model->select();

var_dump($list);
echo '<hr>';
var_dump($list1);*/

$list = $model->field(array('name','sex'))->find(20);
$list1 = $model->find(2);
var_dump($list);
var_dump($list1);
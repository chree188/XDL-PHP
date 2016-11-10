<?php	
header("content-type:text/html;charset=utf-8");

require './config.php';
require './Model.class.php';

// echo '<pre>';
//     print_r($_POST);
// echo '</pre>';

$model = new Model('s51_user');
// var_dump($model->update());

/*$list = $model->field(array('id','name','meiyoude'))->select();
var_dump($list);
echo '<hr>'; 
$list = $model->select();
var_dump($list);*/

/*$list = $model->field(array('name','age'))->find(4);
var_dump($list);
$list = $model->find(4);
var_dump($list);
*/

// $list = $model->where('id > 20')->select();
$list = $model->where("name like '%王%'")->select();
var_dump($list);

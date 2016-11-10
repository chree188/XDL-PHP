<?php	
header("content-type:text/html;charset=utf-8");

require './config.php';
require './Model.class.php';

echo '<pre>';
print_r($_POST);
echo '</pre>';

$model = new Model('user');
var_dump($model->add());

echo $model->count();

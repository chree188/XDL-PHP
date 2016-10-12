<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/12
 * Time: 21:06
 */
header("content-type:text/html;charset=utf-8");

require './init.php';
require './configs/config.php';
require './Model/Model.class.php';

$model = new Model('user');
$data = $model->select();

//分配变量
$smarty->assign('title','模板中遍历数组');
$smarty->assign('list',$data);

//加载模板
$smarty->display('./6.html');
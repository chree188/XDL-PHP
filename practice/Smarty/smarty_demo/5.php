<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/12
 * Time: 20:54
 */
header("content-type:text/html;charset=utf-8");

require './init.php';

//分配变量
$smarty->assign('title','模板中定义变量');

//加载模板
$smarty->display('./5.html');
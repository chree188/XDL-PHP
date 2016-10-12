<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/12
 * Time: 19:59
 */
header("content-type:text/html;charset=utf-8");

//1.导入模板引擎
require './libs/Smarty.class.php';

//2.实例化模板引擎
$smarty = new Smarty();
//var_dump($smarty);

//3.初始化配置

//4.分配变量
$smarty->assign('title','啊,Smarty模板引擎!!');
$smarty->assign('content','啊,我是普通的内容');

//5.加载模板
$smarty->display('./1.html');
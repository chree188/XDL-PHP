<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/12
 * Time: 20:36
 */
header("content-type:text/html;charset=utf-8");

require './init.php';

//分配变量
$smarty->assign('title','模板引擎的路径问题');
$smarty->assign('content','啊,我是普通的内容');

//加载模板
$smarty->display('./3.html');
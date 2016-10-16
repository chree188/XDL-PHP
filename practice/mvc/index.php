<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/16
 * Time: 10:11
 */

header("content-type:text/html;charset=utf-8");

//导入 配置文件+model类
require './configs/config.php';
require './models/Model.class.php';

//导入所有的控制器
require './controllers/IndexController.class.php';
require './controllers/UserController.class.php';
require './controllers/GoodsController.class.php';

//获取用户的参数
//获取控制器名
$c = (!empty($_GET['c'])) ? $_GET['c'] : 'Index';
//获取方法名
$a = (!empty($_GET['a'])) ? $_GET['a'] : 'index';

//拼接类名
$classname = $c.'Controller';
//动态的实例化控制器
$controller = new $classname();
//var_dump($controller);

//调用控制器中的方法
$controller->$a();
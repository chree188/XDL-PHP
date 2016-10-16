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

//自动加载类
function mvc_autoload($classname)
{
//    var_dump($classname);
    if (file_exists("./models/{$classname}.class.php")) {
        require "./models/{$classname}.class.php";
    } elseif (file_exists("./controllers/{$classname}.class.php")) {
        require "./controllers/{$classname}.class.php";
    } else {
        header('HTTP/1.0 404 not found');//非IE
        header('Status:404 not found');//兼容IE
        echo "<h1>404 NOT FOUND</h1>";
        exit;
    }
}

//导入smarty模板引擎
require './libs/Smarty.class.php';
spl_autoload_register('mvc_autoload');

//实例化模板引擎
$smarty = new Smarty();
//var_dump($smarty);
//配置Smarty链式配置
$smarty->setTemplateDir('./views')
    ->setCompileDir('./runtime/views_c')
    ->setConfigDir('./configs')
    ->setCacheDir('./runtim/caches');
//配置 模板变量的定界符
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';
//缓存的配置
$smarty->caching = false;
//缓存时间
$smarty->cache_lifetime = 30;

//获取用户的参数
//获取控制器名
$c = (!empty($_GET['c'])) ? $_GET['c'] : 'Index';
//获取方法名
$a = (!empty($_GET['a'])) ? $_GET['a'] : 'index';

//拼接类名
$classname = $c . 'Controller';
//动态的实例化控制器
$controller = new $classname();
//var_dump($controller);

//调用控制器中的方法
$controller->$a();
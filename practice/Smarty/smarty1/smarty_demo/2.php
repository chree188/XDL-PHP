<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/10/12
 * Time: 20:11
 */
header("content-type:text/html;charset=utf-8");

//1.导入模板引擎
require './libs/Smarty.class.php';

//2.实例化模板引擎
$smarty = new Smarty();
//var_dump($smarty);

//3.初始化配置
//配置 模板文件目录
$smarty->template_dir = './templates';

//配置 编译文件目录
$smarty->compile_dir = './templates_c';

//配置 配置文件目录
$smarty->config_dir = './configs';

//配置 缓存文件目录
$smarty->cache_dir = './caches';

//配置Smarty链式配置
/*$smarty->setTemplateDir('./templates')
        ->setCompileDir('./templates_c')
        ->setConfigDir('./configs')
        ->setCacheDir('./caches');*/

//配置 模板变量的定界符
//<{}>
$smarty->left_delimiter = '<{';
$smarty->right_delimiter = '}>';

//缓存的配置
$smarty->caching = false;//开启缓存

//缓存时间配置
$smarty->cache_lifetime = 10;//缓存10秒

//4.分配变量
$smarty->assign('title','啊,Smarty模板引擎!!!');
$smarty->assign('content','啊,我就是个普通的文本内容');

//5.加载模板
$smarty->display('./2.html');
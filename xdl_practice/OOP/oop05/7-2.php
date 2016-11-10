<?php
/**
 * Created by PhpStorm.
 * User: hui
 * Date: 2016/9/12
 * Time: 18:46
 */

header("content-type:text/html;charset=utf-8");

//自动加载类

//require './User.class.php';
//require './Goods.class.php';
//require './Order.class.php';

//接收参数
$con = empty($_GET['c'])?'User':$_GET['c'];
//实例化 对应的对象
$p = new $con();

//函数!!!!!
function __autoload($classname){
    echo '啊,'.$classname.'被调用了!';

    if (file_exists('./cons/'.$classname.'.class.php')){
        require './cons/'.$classname.'.class.php';
    } else {
        exit('404');
    }
}
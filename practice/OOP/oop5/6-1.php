<?php
header("content-type:text/html;charset=utf-8");

/*自动加载类
	__autoload()	函数!!!!
	*/
	
/*require './User.class.php';
require './Order.class.php';
require './Goods.class.php';*/

//自动加载类
function __autoload($classname)
{
	echo '啊!'.$classname.'被调用了<br>';
	if(file_exists('./cons/'.$classname.'.class.php')){
		require './cons/'.$classname.'.class.php';
	}else{
		die('404');
	}
}

//接收参数
$con = empty($_GET['c'])?'User':$_GET['c'];
//实例化对应的模块
$p = new $con();

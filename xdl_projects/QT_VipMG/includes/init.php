<?php 
	include 'dbconfig.php';
	include 'function.php';

	// 设置时区
	date_default_timezone_set('PRC');

	// 设置字符集
	header('content-type:text/html; charset=utf-8');

	// 开启session
	session_start();

	// 设置错误级别  (除了notice之外,都报)
	error_reporting(E_ALL ^E_NOTICE);

	// 项目名称
	$project = 'QT_VipMG';

	// http://localhost/..../lamp_shop/
	// 
	define('PATH',  strstr($_SERVER['SCRIPT_NAME'] ,$project, true));
	// 定义 项目根目录(网址形式的)
	define('URL',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].PATH.$project.'/'      );

	// 定义 项目根目录( 绝对盘符路径)
	define('ROOT',str_replace('\\','/', strstr(dirname(__FILE__),$project, true)).$project.'/');

	// 定义 公共css目录, js目录, images目录
	define('PUB_CSS',URL.'public/commond/css/');
	define('PUB_JS',URL.'public/commond/js/');
	define('PUB_IMG',URL.'public/commond/images/');
	
	$link = mysqli_connect(HOST, USER, PWD) or die('数据库连接失败');

	mysqli_select_db($link, DB);

	mysqli_set_charset($link, CHAR);

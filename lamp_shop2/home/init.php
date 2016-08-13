<?php 
	// include '../includes/init.php';

	// 后台的新初始化文件路径
	include str_replace('\\','/', dirname(__FILE__)).'/../includes/init.php';

	define('CSS', URL.'public/home/css/');
	define('JS', URL.'public/home/js/');
	define('IMG', URL.'public/home/images/');

	// 防止恶意登录后台, 判断后台是否已经登录
	// 首先 判断是否已经在登录页面, 不在则判断sessioni是否存在, 在则直接跳过
	
	// if( basename($_SERVER['SCRIPT_NAME']) != 'login.php' &&  basename($_SERVER['SCRIPT_NAME']) != 'action.php'){
	// 	if(empty($_SESSION['home']) ){
	// 			notice('您尚未登录, 请先登录...','login.php');
	// 			exit;
	// 	}
	// }

	

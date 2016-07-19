<?php
	//前台入口文件
	
	session_start();
    date_default_timezone_set('PRC');

	if(empty($_GET['c'])){$_GET['c']='index';}	//设置默认控制器	index
	if(empty($_GET['a'])){$_GET['a']='index';}	//设置默认函数	显示首页




	require "./controller/{$_GET['c']}.php";


	__construct();

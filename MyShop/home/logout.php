<?php
//	退出登录
	session_start();
	
//	释放指定的 session 变量
	unset($_SESSION['user']);
	
//	彻底销毁 session
//	session_destroy();

//	页面跳转
	header('Location:login.php');
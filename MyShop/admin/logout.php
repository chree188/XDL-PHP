<?php
//	退出登录
	session_start();
	
	unset($_SESSION['user']);

//	页面跳转
	header('Location:login.php');
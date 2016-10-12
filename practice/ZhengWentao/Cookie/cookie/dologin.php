<?php
	//执行登录验证

	//1接收表单传递的信息
	$name = $_POST['name'];
	$pass = $_POST['pass'];

	//2验证用户名
	if($name!="zs"){//模拟验证
		header("Location:login.php?errno=1");
		exit;
	}
	
	//3验证密码
	if($pass!=123){//模拟验证
		header("Location:login.php?errno=2");
		exit;
	}

	//4将登录信息写入到cookie

	setCookie("users",$name,time()+3600,"/");


	//5 跳转到首页
	header("Location:index.php");
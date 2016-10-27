<?php	
	//实现登录验证
	session_start();
	//1 接收表单信息
	$name = $_POST['name'];
	$password = $_POST['password'];
	$code = $_POST['code'];
	
//	查错
//	echo $code;
//	echo '<hr>';
//	echo $_SESSION['mycode'];
//	echo '<hr>';
//	var_dump($code!=$_SESSION['mycode']);
//	exit;
	
	//2 验证验证码 账号 密码
	$_SESSION['mycode'] = empty($_SESSION['mycode'])? '':$_SESSION['mycode'];
	if($code != $_SESSION['mycode']){
		header('Location:login.php?errno=3');
		exit;
	}
	
	include'../public/sql/dbconfig.php';
	$link = @mysqli_connect(HOST, USER, PASS, DBNAME) or die('连接数据库失败');
	mysqli_set_charset($link, 'utf8');
	$sql = "select * from users where username='{$name}'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_assoc($result);
	
	//判断用户是否存在
	if($result && $row){
		//判断密码是否正确
		if(md5($password)!=$row['pass']){
			//密码不正确
			header('Location:login.php?errno=2');
			exit;
		}
		//3 登录信息写入session中
		$_SESSION['user']=$row;
	}else{
		//用户不存在
		header('Location:login.php?errno=1');
		exit;
	}
	
	//4 页面跳转
	header('Location:index.php');
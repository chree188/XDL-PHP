<?php
	//实现注册验证码验证
	//开启session
	session_start();
	//1 接收验证码信息
	$code = $_POST['mycode'];
	//处理用户信息表的增 删 改 

	//首先打开数据库 
	
	//1 导入配置文件 
	include("../../public/sql/dbconfig.php");
	//2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
	//3 选择数据库 设置字符集
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,DBNAME);
	
	$_GET['a'] = empty($_GET['a'])? 0 : $_GET['a'];
	switch($_GET['a']){
		
/*========================================================================================================================*/
		//添加
		case "insert":
		//接收表单传递过来的用户信息
		if(!$_POST['username']||!$_POST['pass']||!$_POST['email']){		//带*号必填项不能为空
			header("Location:../register.php?errno=2");
			exit;
		}
		//2 验证验证码 账号 密码
		$_SESSION['mycode'] = empty($_SESSION['mycode'])? '':$_SESSION['mycode'];
		if($code != $_SESSION['mycode']){
			header('Location:../register.php?errno=3');
			exit;
		}
		$username = $_POST['username'];
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);	//使用md5 加密密码
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$code = $_POST['code'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$state = $_POST['state'];
		$addtime = time();
		//4 写sql语句 执行sql
		$sql = "insert ignore into users(username,name,pass,sex,address,code,phone,email,state,addtime) 
		values('$username','$name','$pass','$sex','$address','$code','$phone','$email','$state',$addtime)";
		mysqli_query($link,$sql);
		//5判断是否操作成功 
		if(mysqli_insert_id($link)>0){
			header("Location:../login.php");
		}else{
			header("Location:../register.php?errno=1");
		}
		break;

/*============================================================================================================================*/
		
/*************************************************************************************************************/
		//修改
		case "update":
		//接收表单传递过来的用户信息
		if(!$_POST['username']||!$_POST['pass']||!$_POST['email']){		//带*号必填项不能为空
			header("Location:edit.php?id={$_POST['id']}&errno=2");
			exit;
		}
		$username = $_POST['username'];
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);	//使用md5 加密密码
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$code = $_POST['code'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		//4 写sql语句 执行sql
		$sql = "update users set username='$username',name='$name',pass='$pass',sex=$sex,address='$address',
		code='$code',phone='$phone',email='$email' where id={$_POST['id']}";
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			header("Location:./index.php");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=1");
		}
		break;
		
/*****************************************************************************************************************************/

/*-------------------------------------------------------------------------------------------------------------------------------*/
		//确认收货修改订单状态
		case "QRSHupdate":
		//接收表单传递过来的订单信息
		//写sql语句 执行sql
		$sql = "update orders set status=3 where id={$_GET['id']}";
//		echo $sql;exit;
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			header("Location:{$_SERVER['HTTP_REFERER']}");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=1");
		}
		break;
		
/*----------------------------------------------------------------------------------------------------------------------------*/

/*********************************************************************----------------------------------------------------------*/
		//评价订单修改订单状态
		case "PJupdate":
		//接收表单传递过来的订单信息
		//写sql语句 执行sql
		$sql = "update orders set evaluate='{$_POST['evaluate']}' where id={$_POST['id']}";
//		echo $sql;exit;
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			header("Location:{$_SERVER['HTTP_REFERER']}");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=1");
		}
		break;
		
/********************************************************************-------------------------------------------------------------*/
	}

	//6 关闭数据库 
	mysqli_close($link);

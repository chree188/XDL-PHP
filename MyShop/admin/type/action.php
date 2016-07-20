<?php

	//处理商品类别的增 删 改 

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
		
		//添加
		case "insert":
		//接收表单传递过来的类别信息
		$name = $_POST['type'];
		$pid = $_POST['pid'];
		$path = $_POST['path'];
		//4 写sql语句 执行sql
		$sql = "insert into type(name,pid,path) values('$name','$pid','$path')";
		mysqli_query($link,$sql);
		//5判断是否操作成功 
		if(mysqli_insert_id($link)>0){
			header("Location:index.php");
		}else{
			header("Location:add.php?errno=1");
		}
		break;

		
		//删除
		case "del":
		//4 写sql语句 执行sql
		$sql = "delete from users where id={$_GET['id']}";
		mysqli_query($link,$sql);

		//5判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
			header("Location:index.php");
		}else{
			header("Location:index.php?errno=3");
		}
		break;


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
		$state = $_POST['state'];
		//4 写sql语句 执行sql
		$sql = "update users set username='$username',name='$name',pass='$pass',sex=$sex,address='$address',
		code='$code',phone='$phone',email='$email',state='$state' where id={$_POST['id']}";
		mysqli_query($link,$sql);
		
		/*得再增加一判断密码修改不能为原密码相同=================================================*/
		
		//5判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
			header("Location:index.php");
		}else{
			header("Location:edit.php?errno=1");
		}
		break;
	}
	//6 关闭数据库  
	mysqli_close($link);


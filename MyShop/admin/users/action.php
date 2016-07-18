<?php

	//处理学生信息表的增 删 改 

	//首先打开数据库 
	
	//1 导入配置文件 
	include("../../public/sql/dbconfig.php");
	//2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
	//3 选择数据库 设置字符集
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,DBNAME);
	

	
	switch(@$_GET['a']){
		case "insert"://添加
		//接收表单传递过来的学生信息

		if(!$_POST['name']){
			header("Location:add.php?errno=2");
			exit;
		}
		
		$username = $_POST['username'];
		$name = $_POST['name'];
		$pass = $_POST['pass'];
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$code = $_POST['code'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$state = $_POST['state'];
		$addtime = $_POST['addtime'];

		//4 写sql语句 执行sql
		$sql = "insert into user(username,name,pass,sex,address,code,phone,email,addtime) 
		values('$username','$name','$pass','$sex','$address','$code','$phone','$email','$addtime')";
		mysqli_query($link,$sql);

		//5判断是否操作成功 
		if(mysqli_insert_id($link)>0){
			header("Location:index.php");
		}else{
			header("Location:add.php?errno=1");
		}

		break;


		case "del"://删除
		//4 写sql语句 执行sql
		$sql = "delete from stu where id={$_GET['id']}";
		mysqli_query($link,$sql);

		//5判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
			header("Location:index.php?errno=1");
		}else{
			header("Location:index.php?errno=2");
		}
		break;


		case "update"://修改
		//接收表单传递过来的学生信息

		if(!$_POST['name']){
			header("Location:edit.php?errno=2");
			exit;
		}

		//4 写sql语句 执行sql
		$sql = "update users set username='$username',name='$name',pass='$pass',sex='$sex',address='$address',
		code='$code',phone='$phone',email='$email',state='$state',addtime='$addtime' where id={$_POST['id']}";
		mysqli_query($link,$sql);

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


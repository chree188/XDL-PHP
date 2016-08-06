<?php

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
		
		/*=========================================管理员账户操作部分=========================================================*/
		
		//添加
		case "insert":
		//接收表单传递过来的用户信息
		if(!$_POST['username']||!$_POST['name']||!$_POST['pass']||!$_POST['phone']){		//带*号必填项不能为空
			header("Location:add.php?errno=1");
			exit;
		}
		$username = $_POST['username'];
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);	//使用md5 加密密码
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		$addtime = time();
		//4 写sql语句 执行sql
		$sql = "insert ignore into admin(username,name,pass,sex,address,phone,logintime) 
		values('$username','$name','$pass','$sex','$address','$phone','$addtime')";
		mysqli_query($link,$sql);
		//5判断是否操作成功 
		if(mysqli_insert_id($link)>0){
			header("Location:index.php");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=2");
		}
		break;

		
		//删除
		case "del":
		//4 写sql语句 执行sql		实际生活中项目数据库删除乃大忌
		$sql = "update admin set status=2 where id={$_GET['id']}";	//删除执行更改状态为2，不予显示；数据库数据不做删除操作
		mysqli_query($link,$sql);

		//5判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
			header("Location:{$_SERVER['HTTP_REFERER']}");
			//这个常量可以告诉我们 是从哪里来的 
			//你从哪里来 回到哪里去 
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=1");
		}
		break;


		//修改
		case "update":
		//接收表单传递过来的用户信息
		if(!$_POST['username']||!$_POST['name']||!$_POST['pass']||!$_POST['phone']){	//带*号必填项不能为空
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=1");
			exit;
		}
		$username = $_POST['username'];
		$name = $_POST['name'];
		$pass = md5($_POST['pass']);	//使用md5 加密密码
		$sex = $_POST['sex'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
		//4 写sql语句 执行sql
		$sql = "update admin set username='$username',name='$name',pass='$pass',sex=$sex,address='$address',
		phone='$phone' where id={$_POST['id']}";
		//echo $sql;exit;	//echo来排错
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			header("Location:index.php");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=2");
		}
		break;
		/*===========================================管理员账户部分操作结束======================================================*/
		
		/*==============================================刷手会员部分=========================================================*/
		
		
	}
	//关闭数据库  释放资源
	//is_resource() 检测变量是否为资源类型
	if(is_resource($link)) {	//判断是否为资源，为资源  即关闭数据库连接和释放资源
		mysqli_close($link);	
	}
	if(is_resource($result||$res)) {
		mysqli_free_result($result||$res);	
	}
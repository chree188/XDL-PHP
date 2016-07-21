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
		if(!$_POST['type']){		//类别必填项不能为空
			header("Location:add.php?errno=2");
			exit;
		}
		$name = $_POST['type'];
		$pid = $_POST['pid'];
		$path = $_POST['path'];
		//4 写sql语句 执行sql
		$sql = "insert ignore into type(name,pid,path) values('$name','$pid','$path')";
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
//		判断类别底下有没有子类
		$sql = "select * from type where pid={$_GET['id']}";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_assoc($result);
		if($row){
			header("Location:index.php?errno=1");
			exit;
		}
//		4 写sql语句 执行sql
		$sql = "delete from type where id={$_GET['id']}";
		mysqli_query($link,$sql);

		//5判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
			header("Location:index.php");
		}else{
			header("Location:index.php?errno=2");
		}
		break;

		//修改
		case "update":
		//接收表单传递过来的用户信息
		if(!$_POST['type']){		//类别必填项不能为空
			header("Location:edit.php?id={$_POST['id']}&errno=2");
			exit;
		}
		$name = $_POST['type'];
		$pid = $_POST['pid'];
		$path = $_POST['path'];
		//4 写sql语句 执行sql
		$sql = "update type set name='$name',pid='$pid',path='$path' where id={$_POST['id']}";
		mysqli_query($link,$sql);
		//5判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
			header("Location:index.php");
		}else{
			header("Location:edit.php?id={$_POST['id']}&errno=1");
		}
		break;
	}
	//6 关闭数据库  释放资源 
	mysqli_close($link);
	mysqli_free_result($result);


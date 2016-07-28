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
		
		//删除
		case "del":
		//4 写sql语句 执行sql
		$sql = "delete from users where id={$_GET['id']}";
		mysqli_query($link,$sql);

		//5判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
//			header("Location:index.php");
			header("Location:{$_SERVER['HTTP_REFERER']}");
			//这个常量可以告诉我们 是从哪里来的 
			//你从哪里来 回到哪里去 
		}else{
			header("Location:index.php?errno=3");
		}
		break;


		//修改
		case "update":
		//接收表单传递过来的用户信息
		$linkman = $_POST['linkman'];	//收件人
		$address = $_POST['address'];	//收件人地址
		$code = $_POST['code'];			//邮编
		$phone = $_POST['phone'];		//电话
		$status = $_POST['status'];		//订单状态
		//4 写sql语句 执行sql
		$sql = "update orders set linkman='$linkman',address='$address',
		code='$code',phone='$phone',status='$status' where id={$_POST['id']}";
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			header("Location:./index.php");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=1");
		}
		break;
		
		
		//发货修改
		case "FHupdate":
		//接收表单传递过来的订单信息
		//4写sql语句 执行sql
		$sql = "update orders set status={$_GET['status']} where id={$_GET['id']}";
//		echo $sql;exit;
		mysqli_query($link,$sql);
		
		if(mysqli_affected_rows($link)>0){
			header("Location:{$_SERVER['HTTP_REFERER']}");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}?errno=1");
		}
		break;
	}
	//6 关闭数据库  释放资源
	mysqli_close($link);

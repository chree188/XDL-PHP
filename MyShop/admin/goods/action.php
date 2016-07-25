<?php

	//处理商品信息表的增 删 改 

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
			
		/*======================先处理图片文件上传===========================*/
		//加载文件上传的函数 
		require("../../public/functions.php");
		//执行添加 
		//1 设置参数 
		$upfile = $_FILES['pic'];
		$path = "./uploads";
		$typelist = array("image/png","image/jpg","image/gif","image/jpeg"); 

		//文件上传成功之后再来处理信息 
		//2 执行文件上传 
		$uppic = fileupload($upfile,$path,$typelist);
		if(!$uppic['error']){
			exit("图片上传失败".$uppic['info']);
		}
		
		//3 实现文件下载的时候需要的信息 
		// 原图片名 原图大小 原图片类型  新图片名
		$pic['oldname'] = $upfile['name'];
		$pic['size'] = $upfile['size'];
		$pic['type'] = $upfile['type'];
		$pic['newname'] = $uppic['info'];
		
		//4 实现图片的压缩
		imageZoom($pic['newname'],$path,$width=100,$height=100,$pre="s_");
		imageZoom($pic['newname'],$path,$width=300,$height=300,$pre="m_");
		/*======================图片文件上传结束===========================*/
		
		
		/*===============执行商品添加=====================*/
		//接收表单传递过来的商品信息
		if(!$_POST['goods']){		//带*号必填项不能为空
			header("Location:add.php?errno=2");
			exit;
		}
		$typeid = $_POST['typeid'];
		$goods = $_POST['goods'];
		$company = $_POST['company'];
		$descr = $_POST['descr'];
		$price = $_POST['price'];
//		$picname = $pic['newname']；
		$store = $_POST['store'];
		$addtime = time();
		//4 写sql语句 执行sql  ignore不能添加重复信息
		$sql = "insert ignore into goods(typeid,goods,company,descr,price,picname,store,addtime) 
		values($typeid,'$goods','$company','$descr','$price','$picname',$store,$addtime)";
		echo $sql;
		exit;
		mysqli_query($link,$sql);
		//5判断是否操作成功 
		if(mysqli_insert_id($link)>0){
			header("Location:index.php");
		}else{
			header("Location:add.php?errno=1");
		}
		break;
		/*===============执行商品添加=====================*/

				
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

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
			header("Location:index.php?errno=1");
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
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=2");
			//这个常量可以告诉我们 是从哪里来的 
			//你从哪里来 回到哪里去 
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=3");
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
			header("Location:index.php?errno=4");
		}else{
			header("Location:{$_SERVER['HTTP_REFERER']}&errno=2");
		}
		break;
		/*===========================================管理员账户部分操作结束======================================================*/
		
		
		/*==============================================刷手会员部分=========================================================*/
		
		//删除
		case "del2":
		//4 写sql语句 执行sql		实际生活中项目数据库删除乃大忌
		$sql = "update users set status=2 where id={$_GET['id']}";	//删除执行更改状态为2，不予显示；数据库数据不做删除操作
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
		case "update2":
		//接收表单传递过来的用户信息
		/*======================先处理图片文件上传===========================*/
		//加载文件上传的函数 
		require("../../public/functions.php");
		//执行多文件上传
//		$_FILES此时是一个二维array,要变成一维array使用foreach()遍历
		foreach ($_FILES as $upfile ) {
			//1 设置参数 
			$path = "../../uploads";	//上传文件的存储目录
			$typelist = array("image/png","image/jpg","image/jpeg","image/gif");
			//支持的上传图片文件的类型 array()空数组表示不限制
			//2 执行文件上传 
			$uppic = fileupload($upfile,$path,$typelist);
			if(!$uppic['error']){
				exit("图片上传失败，请重新添加试试。".$uppic['info']);
			}
			
			//3 实现文件下载的时候需要的信息 
			// 原图片名 原图大小 原图片类型  新图片名  新路径
			$pic['oldname'] = $upfile['name'];
			$pic['size'] = $upfile['size'];
			$pic['type'] = $upfile['type'];
			$pic['newname'] = $uppic['info'];
			$pic['newpath'] = $path.'/'.$pic['newname'];
			$pic['newSpath'] = $path.'/s_'.$pic['newname'];
			$pic['newMpath'] = $path.'/m_'.$pic['newname'];
			
			//4 实现图片的压缩
			imageZoom($pic['newname'],$path,$width=100,$height=100,$pre="s_");
			imageZoom($pic['newname'],$path,$width=300,$height=300,$pre="m_");
		
		/*======================图片文件上传结束===========================*/
		
		
		/*============================执行用户添加=========================*/
			//获取注册页面post提交的表单信息
			$username = $_POST['username'];//带*项不为空
			$name = $_POST['name'];//带*项不为空
			$sex = $_POST['sex'];
			$age = $pic['age'];
			$phone1 = $_POST['phone1'];//带*项不为空
			$phone2 = $_POST['phone2'];
			$qq1 = $_POST['qq1'];//带*项不为空
			$qq2 = $_POST['qq2'];
			$idcard = $_POST['idcard'];//带*项不为空
			$address = $_POST['address'];//带*项不为空
			$nowaddr = $_POST['nowaddr'];//带*项不为空
			$alipay = $_POST['alipay'];//带*项不为空
			$tenpay = $_POST['tenpay'];
			$picname = $pic['newname'];
			//接收表单传递过来的带*信息
			if(!$username || !$name || !$phone1 || !$qq1 || !$idcard 
			|| !$address || !$nowaddr || !$alipay || empty($_FILES['picname']['tmp_name']) ){		//带*号必填项不能为空
				header("Location:edit2.php?errno=2");
				unlink($pic['newpath']);	//添加失败删除已上传的图片文件
				unlink($pic['newSpath']);
				unlink($pic['newMpath']);
				exit;
			}
		}
			//4 写sql语句 执行sql  ignore不能添加重复信息
//			$sql = "insert ignore into goods(adminid,addtime,username,name,sex,age,phone1,phone2,qq1,qq2,
//			idcard,address,nowaddr,alipay,tenpay,addpic,idapic,idbpic,alipaypic) 
//			values((select id from admin where name = $adminid ;),'$addtime','$username','$name',$sex,$age,'$phone1','$phone2','$qq1','$qq2',
//			'$idcard','$address','$nowaddr','$alipay','$tenpay','$picname')";
//			echo $sql;
//			mysqli_query($link,$sql);
//			//5判断是否操作成功 
//			if(mysqli_insert_id($link)>0){
//				header("Location:{usadd.php?errno=1");
//			}else{
//				header("Location:usadd.php?errno=3");
//				unlink($pic['newpath']);	//添加失败删除已上传的文件
//				unlink($pic['newSpath']);
//				unlink($pic['newMpath']);
		break;
			/*==============================================刷手会员部分结束=========================================================*/
	}
	//关闭数据库  释放资源
	//is_resource() 检测变量是否为资源类型
	if(is_resource($link)) {	//判断是否为资源，为资源  即关闭数据库连接和释放资源
		mysqli_close($link);	
	}

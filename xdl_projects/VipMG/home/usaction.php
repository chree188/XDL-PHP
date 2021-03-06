<?php
	
	//全局设置	去除notice错误报告
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	
	//实现用户注册
	
	
		
	//  ========== 
	//  =   添加       = 
	//  ==========
			
		/*======================先处理图片文件上传===========================*/
		//加载文件上传的函数 
		require("../public/functions.php");
		//echo "<pre>";
		//print_r($_FILES);
		//echo "</br>";

		//首先打开数据库 
			//1 导入配置文件 
			include("../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 选择数据库 设置字符集
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
		
		//执行多文件上传
		foreach ($_FILES as $upfile ) {
		
		//	2 设置参数
			$path="../uploads/";	//上传文件的存储目录
			$typelist=array("image/jpg","image/png","image/gif","image/jpeg");
		//	支持的上传文件的类型 array()空数组表示不限制
			
		//	3 实现文件上传
			$uppic = fileupload($upfile,$path,$typelist);
			
		//	4 判断是否上传成功	
			if(!$uppic['error']){
				exit("文件上传失败".$uppic['info']);
			}
			
			//5 实现文件下载的时候需要的信息 
			// 原图片名 原图大小 原图片类型  新图片名  新路径
			$pic['oldname'] = $upfile['name'];
			$pic['size'] = $upfile['size'];
			$pic['type'] = $upfile['type'];
			$pic['newname'] = $uppic['info'];
			$pic['newpath'] = $path.'/'.$pic['newname'];
			$pic['newSpath'] = $path.'/s_'.$pic['newname'];
			$pic['newMpath'] = $path.'/m_'.$pic['newname'];
			
			$sql1 = "update users set piname = picname & #" .$pic['newname'];
			echo $sql1;
			//6实现图片的压缩
			imageZoom($pic['newname'],$path,$width=100,$height=100,$pre="s_");
			imageZoom($pic['newname'],$path,$width=300,$height=300,$pre="m_");
			
			//获取注册页面post提交的表单信息
			$adminid = $_POST['adminid'];//带*项不为空
			$addtime = $_POST['addtime'];//带*项不为空
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
			//接收表单传递过来的带*信息
			if(!$adminid || !$addtime || !$username || !$name || !$phone1 || !$qq1 || !$idcard 
			|| !$address || !$nowaddr || !$alipay || empty($_FILES['addpic']['tmp_name']) 
			|| empty($_FILES['idapic']['tmp_name']) || empty($_FILES['idbpic']['tmp_name']) 
			|| empty($_FILES['alipaypic']['tmp_name']) ){		//带*号必填项不能为空
				header("Location:usadd.php?errno=2");
				unlink($pic['newpath']);	//添加失败删除已上传的图片文件
				unlink($pic['newSpath']);
				unlink($pic['newMpath']);
				exit;
			}
		/*======================图片文件上传结束===========================*/
		
		/*===============执行用户添加=====================*/
			// 写sql语句 执行sql  ignore不能添加重复信息
			$sql2 = "insert ignore into users(adminid,addtime,username,name,sex,age,phone1,phone2,qq1,qq2,
			idcard,address,nowaddr,alipay,tenpay) 
			values('$adminid','$addtime','$username','$name',$sex,$age,'$phone1','$phone2','$qq1','$qq2',
			'$idcard','$address','$nowaddr','$alipay','$tenpay')";
		  //echo $sql2;
		/*===============执行用户添加=====================*/
		}
		
	//关闭数据库  释放资源
	//is_resource() 检测变量是否为资源类型
	if(is_resource($link)) {	//判断是否为空资源，为空 即关闭数据库连接和释放资源
		mysqli_close($link);	
	}
	if(is_resource($result||$res)) {
		mysqli_free_result($result||$res);	
	}
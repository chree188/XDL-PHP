<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线相册</title>
</head>
<body>
	<?php
		//载入导航页面
		include("menu.php");
		//加载文件上传的函数 
		require("functions.php");
		//设置时区 
		date_default_timezone_set("PRC");
		//执行添加 
		//1 设置参数 
		$upfile = $_FILES['pic'];
		$path = "./uploads";
		$typelist = array("image/png","image/jpeg","image/gif","image/pjpeg"); 

		//文件上传成功之后再来处理信息 
		//2 执行文件上传 
		$uppic = fileupload($upfile,$path,$typelist);
		if(!$uppic['error']){
			exit("文件上传失败".$uppic['info']);
			// echo "文件上传失败".$uppic['info'];
		}

		// if(){
		// 	echo "";//语句1
		// }else{
		// 	语句2;
		// }
		// if-else是一个双路分支 要么执行语句1 要么执行语句2  如果语句2很长 这个时候看{}非常的不方便

		// if(){
		// 	exit(语句1);
		// }
		// 语句2

		//达到的跟上面一样的效果 语句1执行的时候语句2不执行 

		//3 接收表单传递的信息 
		$pic['name'] = $_POST['picname'];//上传时候客户写的文件名 
		$pic['desc'] = $_POST['desc'];//图片描述
		$pic['addtime'] = date("Y-m-d H:i:s",time());

		//实现文件下载的时候需要的信息 
		// 原图片名 原图大小 原图片类型 
		$pic['oldname'] = $upfile['name'];
		$pic['size'] = $upfile['size'];
		$pic['type'] = $upfile['type'];
		$pic['newname'] = $uppic['info'];



		//4 将信息写入到数据库 

		// echo implode("**",$pic);//查看添加的信息 数组变成字符串 
		// exit;
		file_put_contents("picinfo.db",implode("**",$pic)."##",FILE_APPEND);
		// $f = fopen("picinfo","a"); fwrite($f,implode("**",$pic)."##");

		//5 实现图片的压缩
		imageZoom($pic['newname'],$path,$width=100,$height=100,$pre="s_");
		imageZoom($pic['newname'],$path,$width=300,$height=300,$pre="m_");

		//6 上传成功 
		echo "添加成功";//在doadd页面出现提示信息   

		// header("Location:index.php");//添加后 在doadd页面不做停留

		

	?>

	
</body>
</html>
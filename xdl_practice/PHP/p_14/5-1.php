<?php	
//	使用函数实现文件上传

//	1 加载上传文件的函数
	require("uploadfile.php");
	
//	2 设置参数
	$path="./uploads/";	//上传文件的存储目录
	@$upfile=$_FILES['pic'];	//被上传的文件
	$typelist=array("image/jpg","image/png","image/gif","image/jpeg");
//	支持的上传文件的类型 array()空数组表示不限制
	
	
//	3 实现文件上传
	$pic=uploadfile($path, $upfile,$typelist);
	
//	4 判断是否上传成功
	if(!$pic['error']){
		echo $pic['info'];	//错误的信息
	}else{
		echo"文件上传成功，新的文件名为：".$pic['info'];	//新的文件名
	}

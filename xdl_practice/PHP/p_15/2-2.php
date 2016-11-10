<?php
//	使用函数实现文件上传
	
	echo "<pre>";
//	查看多文件上传的时候 上传文件的信息
//	print_r($_FILES);
//	此时的$_FILES是一个二维数组 而我我们要处理的$upfile是一个一维数组
//	所以使用foreach遍历 遍历一次 维数就下降一维

	foreach ($_FILES as $upfile) {
//		1 加载上传文件的函数
		require_once("uploadfile.php");
//		因为foreach是循环 所以uploadfile函数会执行多次引用 所以要使用_once实现不重复引入
		
//		2 设置参数
		$path="./uploads";	//上传文件的存储目录
//		$upfile=$_FILES['pic'];	//被上传的文件
		$typelist=array("image/jpg","image/png","image/gif","image/jpeg");
//		支持的上传文件的类型 array()空数组表示不限制
		
//		3 实现文件上传
		$pic=uploadfile($path, $upfile,$typelist);
		
//		4 判断是否上传成功
		if(!$pic['error']){
			echo $pic['info']."<br>";	//错误的信息
		}else{
			echo "文件上传成功,新的文件名为:".$pic['info']."<br>";
		}
	}

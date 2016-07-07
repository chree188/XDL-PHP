<?php	
//	使用函数实现文件上传
	
//	1 加载上传文件的函数
	require("uploadfile.php");
	
//	查看上传的多维数组是形式
//	echo "<pre>";
//	print_r($_FILES);
//	1 得到的是一个三维数组 我们要的是一个一维数组

	foreach ($_FILES['pic']['name'] as $k => $v) {
		//遍历的同时 形式新的数组 新数组通过数组下标赋值得到
		$arr[$k]['name'] = $v;
		$arr[$k]['type'] = $_FILES['pic']['type'][$k];
		$arr[$k]['tmp_name'] = $_FILES['pic']['tmp_name'][$k];
		$arr[$k]['error'] = $_FILES['pic']['error'][$k];
		$arr[$k]['size']=$_FILES['pic']['size'][$k];
	}
//	print_r($arr);	//三维数组遍历得到的是一个二维数组

	foreach($arr as $upfile){
//		遍历 并且处理上传
//		2 设置参数
		$path="./uploads";	//上传文件的存储目录
//		$upfile=$_FILES['pic'];	//被上传的文件
		$typelist=array();
//		支持的上传文件的类型array()空数组表示不限制
		
//		3 实现文件上传
		$pic=uploadfile($path, $upfile,$typelist);
		
//		4判断是否上传成功
		if(!$pic['error']){
			echo $pic['info']."<br>";	//错误的信息
		}else{
			echo "文件上传成功,新的文件名为:".$pic['info']."<br>";	//新的文件名
		}
	}

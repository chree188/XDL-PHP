<?php	
//	完整的文件上传
//	1 上传的文件使用超全局数组 $_FILES来接收
//	2 接收到是文件式一个多维array
//	3 文件移动使用 move_uploaded_file(源文件, 目标文件);
//	4 文件上传之后有五个信息 name type tmp_name error size

//	1 设置参数
	$path="./uploads";	//上传文件的存储目录
	$path=rtrim($path,"/")."/";
	@$upfile=$_FILES['pic'];	//被上传的文件
//	$typelist=array("image/jpg","image/png","image/gif","image/jpeg");
//	支持的上传文件类型 array()空数组表示不限制
	$typelist=array();
	$maxsize=0;	//限制最大文件上传的尺寸  自定义设置 0表示不限制

//	2-4 都是上传失败的情况

//	echo "<pre>";
//	print_r($_FILES);

//	2 错误类型
	if($upfile['error']){
		switch ($upfile['error']) {
			case '1':
				$info="上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。";
				break;
			case '2':
				$info="上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。";
				break;
			case '3':
				$info="文件只有部分被上传。";
				break;
			case '4':
				$info="没有文件被上传。";
				break;
			case '6':
				$info="找不到临时文件夹。";
				break;
			case '7':
				$info="文件写入失败。";
				break;
			default:
				$info="其它错误！";
				break;
		}
//		exit();
		die("文件上传失败：".$info);
	}
	
//	3 类型不支持
	if(!empty($typelist)){
		if(!in_array($upfile['type'], $typelist)){
			die("文件上传失败：不支持".$upfile['type']."类型");
		}
	}
	
//	4 尺寸过大
	if($maxsize>0){
		if($upfile['size']>$maxsize){
			die("文件上传失败：尺寸过大");
		}
	}
	
//	5 随机文件名
//	5.1 后缀
//	$ext=pathinfo($upfile['name'],PATHINFO_EXTENSION);	//1.jpg jpg
////	5.2 随机文件名 并拼接
//	date_default_timezone_set("PRC");
//	$newpic=date("YmdHis").rand(0001, 9999).".".$ext;
//	echo $newpic;
////	5.3 如果生成的新文件名已经存在 重新生成一遍
//	if(file_exists($path.$newpic)){
//		$newpic=date("YmdHis").rand(0001, 9999).".".$ext;
//	}

//	使用循环语句判断文件名是否存在for while  do while
//	先执行 后判断 使用do-while
//	5.1--5.3可改写为''
	date_default_timezone_set("PRC");
	$ext=pathinfo($upfile['name'],PATHINFO_EXTENSION);
	do{
		$newpic=date("YmdHis").rand(0001, 9999).".".$ext;
	}while(file_exists($path.$newpic));
//	echo $newpic;
	
//	6 实现文件移动 上传
//	move_uploaded_file($upfile['tmp_name'],$path.$newpic);
	
	if(is_uploaded_file($upfile['tmp_name'])){	//是否是post上传得到的文件
//		文件的移动
			if(move_uploaded_file($upfile['tmp_name'], $path.$newpic)){
				echo $newpic."<br>";
			}else{
				die("文件上传失败：移动失败");
			}
	}else{
		die("文件上传失败：不是上传的文件");
	}

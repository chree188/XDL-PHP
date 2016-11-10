<?php	
	
	$path='./uploads/';
	$path=rtrim($path,"/")."/";
	$upfile=$_FILES['pic'];
	$typelist=array("image/jpg","image/png","image/gif","image/jpeg");
	$maxsize=0;

	if($upfile['error']){
		switch($upfile['error']){
			case 1:
			$info = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。";
			break;
			case 2:
			$info = "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。";
			break;
			case 3:
			$info = "文件只有部分被上传。 ";
			break;
			case 4:
			$info = "没有文件被上传。";
			break;
			case 6:
			$info = "找不到临时文件夹。";
			break;
			case 7:
			$info = "文件写入失败。";
			break;
			default:
			$info = "其他错误!";
		}
		die("文件上传失败：".$info);
	}
	
	if(!empty($typelist)){
		if(!in_array($upfile['type'], $typelist)){
			die("文件上传失败：不支持".$upfile['type']."类型");
		}
	}

	if($maxsize>0){
		if($upfile['size']>$maxsize){
			die("文件上传失败：尺寸过大");
		}
	}
	
	date_default_timezone_set("PRC");
	$ext=pathinfo($upfile['name'],PATHINFO_EXTENSION);
	do{
		$newpic=date("YmdHis").rand(0001, 9999).".".$ext;
	}while(file_exists($path.$newpic));
	
	if(is_uploaded_file($upfile['tmp_name'])){
		if(move_uploaded_file($upfile['tmp_name'], $path.$newpic)){
			echo $newpic."<br>";
		}else{
			die("文件上传失败：移动失败");
		}
	}else{
		die("文件上传失败：不是上传的文件");
	}

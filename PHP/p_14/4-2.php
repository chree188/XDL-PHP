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

<?php//公共函数库文件/**  * 文件上传函数  *@param array $upfile 被上传的文件信息（数组）  *@param String $path 上传文件的存储路径  *@param array $typelist 允许的上传文件类型，默认值为array()表示不受限制  *			如图片：array("image/png","image/jpeg","image/gif","image/pjpeg");   *@param int $maxsize 允许上传文件大小限制，默认为0表示不限制。  *@return array 返回的是一个数组：内有两个单元：  *		1. 下标为error的值为true表示成功，false表示失败  *	    2. 下标为info的值表示上传成功为文件名，失败为错误信息。  */function fileupload($upfile,$path,$typelist=array(),$maxsize=0){	//1. 定义上传处理时所需变量信息	$path = rtrim($path,"/"); //处理存放上传文件路径	$res=array("error"=>false,"info"=>"失败信息"); //定义返回变量		//2. 根据属性error判断上传文件失败原因	if($upfile['error']>0){		switch($upfile['error']){			case 1: $info="上传的文件超过了php.ini中upload_max_filesize 选项限制的值"; break;			case 2: $info="上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值"; break;			case 3: $info="文件只有部分被上传"; break;			case 4: $info="没有文件被上传"; break;			case 6: $info="找不到临时文件夹"; break;			case 7: $info="文件写入失败"; break;			default: $info="未知错误！"; break;		}		$res['info']=$info;		return $res;	}	//3. 判读上传文件类型	// var_dump( $upfile['type']);	if(!empty($typelist)){		if(!in_array($upfile['type'],$typelist)){			$res['info']="上传文件类型错误！".$upfile['type'];			return $res;		}	}	//4. 判断上传文件大小	if($maxsize>0){		if($upfile["size"]>$maxsize){			$res['info']="上传文件过大！";			return $res;		}	}	//5. 随机上传文件名	$ext = pathinfo($upfile['name'],PATHINFO_EXTENSION); //获取文件的后缀名；	do{		$newfilename = time().rand(1000,9999).".".$ext; //组装随机文件名	}while(file_exists($path."/".$newfilename)); //判断新文件是否存在	//6. 执行移动上传文件	if(is_uploaded_file($upfile['tmp_name'])){		if(move_uploaded_file($upfile['tmp_name'],$path."/".$newfilename)){			//此处表示上传成功。并获取上传文件名			$res['info']=$newfilename;			$res['error']=true; //表示上传成功		}else{			$res['info']="移动上传文件失败！";		}	}else{		$res['info']="不是一个有效的上传文件!";	}		//返回结果	return $res;}	/** * 图片等比缩放函数(支持：gif、jpeg和png格式的图片) * * @param String $pic 被缩放的源图片名 * @param String $path 被缩放图片的存储路径 * @param int $width 缩放后的最大宽度 * @param int $height 缩放后的最大高度 * @param String $pre 缩放后的图片名前缀，默认值：s_ * @return boolean 返回值 true表示成功！ false表示失败 */ function imageZoom($pic,$path,$width=100,$height=100,$pre="s_"){	$path = rtrim($path,"/")."/";	//获取原图片信息	$info = getImageSize($path.$pic);	$w = $info[0]; //宽度	$h = $info[1]; //高度	//根据原图片类型来创建图片资源画布	switch($info[2]){		case 1: //GIF			$srcim = imagecreatefromgif($path.$pic);			break;		case 2: //JPG			$srcim = imagecreatefromjpeg($path.$pic);			break;		case 3: //PNG			$srcim = imagecreatefrompng($path.$pic);			break;		default:			die("未知图片格式！");	}	//计算图片缩放后的大小	if($width/$w<$height/$h){		$dw=$width;		$dh=$h*($width/$w);	}else{		$dw=$w*($height/$h);		$dh=$height;	}	//创建模板图片画布	$dstim = imagecreatetruecolor($dw,$dh);		//执行缩放	imagecopyresampled($dstim,$srcim,0,0,0,0,$dw,$dh,$w,$h);		//输出图片	switch($info[2]){		case 1: //GIF			imagegif($dstim,$path.$pre.$pic);			break;		case 2: //JPG			imagejpeg($dstim,$path.$pre.$pic);			break;		case 3: //PNG			imagepng($dstim,$path.$pre.$pic);			break;		default:			die("未知图片格式！");	}	//销毁资源	imagedestroy($dstim);	imagedestroy($srcim);		return true; }
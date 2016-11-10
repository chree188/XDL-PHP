<?php
	
	//自定义文件上传函数 
	
/**
*功能 自定义文件上传函数		
*@param param参数 string  $path  上传文件保存的路径		
*@param array $upfile  被输出的文件信息 五大信息name type tmp_name error size	
*@param array $typelist 支持的上传文件类型 array() 表示不限制上传文件的类型		
*@param int $maxsize 表单自定义设置支持的上传文件大小 0表示不限制 
*@return $res =  array("error"=>false,"info"=>""); 携带了两个信息 一个是是否上传成功,成功或失败的具体信息
*/		

	function uploadfile($path,$upfile,$typelist=array(),$maxsize=0){
		
		
		//1 设置参数
		$res = array("error"=>false,"info"=>"");
		//一个是上传是否成功,一个是成功失败具体的信息
		
		$path = rtrim($path,"/")."/";

		
		//2 错误类型
		if($upfile['error']){
			switch($upfile['error']){
				case 1:
				$info = "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 ";
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

			$res['info'] = "文件上传失败: ".$info;
			return $res;//return 带值的break

		}	

		//3 类型不支持
		if(!empty($typelist)){
			if(!in_array($upfile['type'],$typelist)){
				
				$res['info'] = "文件上传失败: 不支持".$upfile['type']."类型";
				return $res;
			}
		}

		//4 尺寸过大
		if($maxsize>0){
			if($upfile['size']>$maxsize){
				
				$res['info'] ="文件上传失败: 尺寸过大";
				return $res;

			}
		}

		//5 随机文件名
		date_default_timezone_set("PRC");
		
		$ext = pathinfo($upfile['name'],PATHINFO_EXTENSION);
		do{
			$newpic = date("YmdHis").rand(1000,9999).".".$ext;
		}while(file_exists($path.$newpic));


		//6 实现文件移动 上传

		// move_uploaded_file($upfile['tmp_name']);

		if(is_uploaded_file($upfile['tmp_name'])){//是否是上传得到的 文件
			//文件的移动 
				if(move_uploaded_file($upfile['tmp_name'],$path.$newpic)){
					
					$res['error'] =true;
					$res['info'] =$newpic;
					
				}else{
					
					$res['info'] ="文件上传失败: 移动失败";
					return $res;

				}

		}else{
			
			$res['info'] ="文件上传失败: 不是上传的文件";
			return $res;

		}
		


		return $res;//表示带值的break
		// return $info;//java这个会报错 叫永远达到不了的地方 
	}
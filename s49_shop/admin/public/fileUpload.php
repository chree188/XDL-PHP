<?php 
	header('Content-type:text/html;charset=utf-8');

	/**
	 * 功能:文件上传操作
	 * 参数1 $path  上传后要保存的路径
	 * 参数2 $file  表单提交过来的$_FILES中的文件
	 * 参数3 $size  要求上传文件大小(字节)上限
	 * 参数3 $type  类型过滤数组
	 * 返回: 数组
	 *       ['flag']错误标识
	 *       ['msg']错误信息
	 *       ['picname']成功后的文件名
	 */
	
	function fileUpload($path,$file,$size=0,$type=[])
	{
		//预定义返回数组
		$res = [
		        'flag'=>false,
		        'msg'=>'未知错误',
                'picname'=>''
		       ];

		//错误号及对应错误信息
		$err_arr = [
                     0 => '上传成功',
                     1 => '上传文件大小超过php.ini中规定的大小',
                     2 => '上传文件大小超出表单要求的大小',
                     3 => '部分文件被上传',
                     4 => '文件没有被上传',
                     6 => '上传临时文件夹未找到',
                     7 => '写入文件时失败'
				   ];

		//1.判断错误
			if($file['error'] != 0){
				$res['msg'] = @$err_arr[$file['error']];
				return $res;	
			}


		//2.检查类型
			if( !empty($type) && in_array($file['type'],$type) ){
				$res['msg'] = '上传的文件类型不符合要求,请重新上传';
				return $res;
			}


		//3.检查大小
			if( !empty($size) && $file['size']>$size){
				$res['msg'] = '上传文件大小超出了调用函数时的要求';
				return $res;
			}

	
		//4.生成文件名

			//获得上传文件的扩展名
			$ext = strrchr($file['name'], '.');

			//修整保存上传文件的路径
			$path = rtrim($path,'\\/').'/';   

			//生成随机文件名,如果存在同名则尝试新的文件名
			do{
				$fileName = date('YmdHis').mt_rand(1000,9999).$ext;
			}while( file_exists($path.$fileName) );


		//5.判断文件来源是否为正常上传,是则移动
			if(is_uploaded_file($file['tmp_name'])){
				if(move_uploaded_file($file['tmp_name'], $path.$fileName)){
                    //移动成功后,生成小图片
                    picZoom($path.$fileName);
					$res['flag'] = true;
					$res['msg'] = '上传文件成功';
                    $res['picname'] = $fileName ;
				}else{
					$res['msg'] = '文件最后一步移动失败,请确保指定文件夹存在';
				}
				
			}else{
				$res['msg'] = '文件来源可疑';
			}

			return $res;

		
	}


 ?>
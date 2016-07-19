<?php 
	
	/*将图片缩放到指定大小函数*/


    
	function picZoom($file,$width=100,$height=100)
	{
		//检查文件
		if(!file_exists($file)){
			return '文件不存在';
		}

		//准备宽高
	 	  // $width = 100;
	 	  // $height = 100;

	    //获取扩展名,拼装函数名 
	      $img = ['gif'=>'gif','jpg'=>'jpeg','jpeg'=>'jpeg','png'=>'png'];
	      $ext = $img[pathinfo($file,PATHINFO_EXTENSION)];
	      $dirName = pathinfo($file,PATHINFO_DIRNAME);
	      $baseName = pathinfo($file,PATHINFO_BASENAME);
	      $funName = 'imagecreatefrom'.$ext;


           
		//创建画布
		  $srcImg = $funName($file);

		//获取源图宽高  
		  $srcWidth = imagesX($srcImg);
		  $srcHeight = imagesY($srcImg);

        //计算新宽高,默认把高=100,求出按比例的宽
		  //$height = 100;
		  //$width = $srcWidth/($srcHeight/$height);

		//创建目标画布
		  $dstImg = imagecreatetruecolor($width, $height);	

		//缩放
		  imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);

		//输出图像
		  $funName = 'image'.$ext;
		  $funName($dstImg,$dirName.'/sm_'.$baseName);

		//销毁资源
		  imagedestroy($srcImg);
		  imagedestroy($dstImg);


	}
	
	

	


 ?>
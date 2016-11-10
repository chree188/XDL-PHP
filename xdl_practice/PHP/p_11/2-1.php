<?php	
//	1.创建画布，准备颜色
	$hImg=imagecreatetruecolor(400, 400);
	$color=imagecolorallocate($hImg, 245, 245, 245);
	$red=imagecolorallocate($hImg, 255, 0, 0);
	//值越大，颜色看着越浅
	
	//2.绘画
	imagefill($hImg, 0, 0, $color);
//	imagesetpixel($image, $x, $y, $color);//画一个点
//	imageline($image, $x1, $y1, $x2, $y2, $color);
	
//	循环多少
	for ($i=0; $i < 50; $i++) {
		$min=0;$max=400; 
		$x=rand($min, $max);
		$y=rand($min, $max);
		$color=imagecolorallocate($hImg, rand(0, 255), rand(0, 255), rand(0, 255));
		imagesetpixel($hImg, $x, $y, $color);
		$x1=rand($min, $max);
		$y1=rand($min, $max);
		$x2=rand($min, $max);
		$y2=rand($min, $max);
		imageline($hImg, $x1, $y1, $x2, $y2, $color);
	}
	
//	3.输出
	header('content-type:image/jpeg');
	imagejpeg($hImg);
	
//	4.释放资源
	imagedestroy($hImg);
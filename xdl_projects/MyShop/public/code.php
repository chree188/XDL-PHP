<?php
	//验证码
	session_start();
	////2 把验证码放到画布资源中
	// 设置验证码的参数

	$length = 3;
	$code= getcode($length,1);
	$_SESSION['mycode'] = $code;
	$width = 20*$length;
	$height = 25;


	//1 
	$im = imagecreatetruecolor($width,$height);
	$bg =imagecolorallocate($im,200,200,200);
	$red = imagecolorallocate($im,255,0,0);

	//2画图
	imagefill($im,0,0,$bg);

	//2.1 文本放到画布资源中
	for($i=0;$i<$length;$i++){
		$cc = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imagettftext($im,20,rand(-10,10),0+20*$i,20,$cc,"./fonts/msyhbd.ttf",$code[$i]);
	}
	

	//2.2 加干扰点
	for($i=0;$i<150;$i++){
		$cc1 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imagesetpixel($im,rand(0,$width),rand(0,$height),$cc1);
	}


	//2.3 加干扰线
	for($i=0;$i<3;$i++){
		$cc2 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$cc2);
	}

	//3 
	header("Content-Type:image/png");
	imagepng($im);
	//4 

	imagedestroy($im);
	

	//1 出验证码
/**
*功能 产生随机数 
*@param int $length 随机数长度
*@param int $type 随机数的类型  只出数字 数字+小写 数字+小写+大写
*@return string $s 产生的随机数
*
*
*
*/


	function getcode($length,$type=1){
		//验证码元素
		$str ="345678abcdefghijkmnprstuvwxyABCDEFGHIJKLMNPQRSTUVWYX";
		//1 调节验证码模式 只出数字 数字+小写 数字+小写+大写
		switch($type){
			 case 1:$m = 9; break;
			 case 2:$m = 33;break;
			 default:$m = strlen($str)-1;
		}
		//2 输出多长的验证码
		
		$s = "";
		for($i=0;$i<$length;$i++){
			$s .=$str[rand(0,$m)];
		}

		return $s;
	}
	






//  ========== 
//  = 验证码（2） = 
//  ========== 
//
//<?php
//  /*验证码*/
// 
//  //1.创建画布
//  $hImg = imagecreatetruecolor(150,50);
//  
//  //2.绘画
//  imagefill($hImg,0,0,getColor($hImg,true));
//  $str = "345678abcdefghijkmnprstuvwxyABCDEFGHIJKLMNPQRSTUVWYX";
//  $code = substr(str_shuffle($str),0,4);
//  
//  for($i=0;$i<4;$i++){
//      imagettftext($hImg,18,rand(-30,30),$i*30+20,rand(20,50),getColor($hImg),'./arialbd.ttf',$code[$i]);
//  }
//	
//  //3.输出
//  header('Content-type:image/jpeg');
//  imagejpeg($hImg);
//  
//  //4.释放资源
//  imagedestroy($hImg);
//  
//  
//  /**
//  * 功能: 返回随机颜色
//  * 参数: $hImg 画布资源
//  *       可选项 给true 返回浅颜色
//  *       否则, 返回深颜色
//  */
//  function getColor($hImg,$flag=false)
//  {
//      
//      if($flag){ 
//          //返回浅颜色
//          return imagecolorallocate($hImg,rand(127,255),rand(127,255),rand(127,255));
//      }else{
//          //返回深颜色
//          return imagecolorallocate($hImg,rand(0,127),rand(0,127),rand(0,127));
//      }
//  }
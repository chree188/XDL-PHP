<?php
	//验证码
	session_start();
	////把验证码放到画布资源中
	header("content-type:image/png;charset=utf-8");
	

/*1.定义一个验证码字符生成类:
        属性(私有): 字串长度
        类型 1:数字.2:数字加小写字母.3:大小写字母与数字
        方法:
        1).构造方法: 给类中属性赋值
        2).getVcode方法: 获取一个随机的一个字符串
*/
        
class Code
{
	private $codeLen;
	
	public function __construct($codeLen = 4)	//默认长度4位
	{
		$this->codeLen = $codeLen;
	}
	
	public function getVcode($type = 2)		//默认类型数字加小写字母
	{
		//验证码元素
		$str ="0123456789qwertyuiopasdfghjklzxcvbnmQAZWSXCDERFVBGTYHNUJMIKOL";
		//调节验证码模式 1只出数字 2数字+小写 3数字+小写+大写
		switch($type){
			 case 1:$m = 9; break;
			 case 2:$m = 35;break;
			 case 3:$m = strlen($str)-1;break;
		}
		//输出多长的验证码
		$s = "";
		for($i = 0; $i < $this->codeLen; $i++){
			$s .=$str[rand(0,$m)];
		}
		return $s;
	}
}


// 设置验证码长度的参数
	$length = 4;
	$c = new Code($length);
	
//调节验证码模式 1只出数字 2数字+小写 3数字+小写+大写
	$code = $c->getVcode();
	$_SESSION['mycode'] = $code;
//	根据长度控制画布大小
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
		imagettftext($im,20,rand(-10,10),0+20*$i,20,$cc,"./msyhbd.ttf",$code[$i]);
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
	imagepng($im);
	//4 
	imagedestroy($im);
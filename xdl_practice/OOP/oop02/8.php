<?php
header("content-type:text/html;charset=utf-8");

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
		echo $s;
	}
}

$c = new Code(8);

//调节验证码模式 1只出数字 2数字+小写 3数字+小写+大写
$c->getVcode();
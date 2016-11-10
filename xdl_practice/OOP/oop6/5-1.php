<?php
header("content-type:text/html;charset=utf-8");
	
	/*自定义异常处理
	定义一个类,继承系统的Exception 异常基类
	基类里面的大部分的方法都不能被重写,属性可以正常访问.*/
	
//自定义异常类
class MyException extends Exception
{
	public function getString()
	{
//		return '啊,我触发异常了';
		return '异常号:'.$this->code.' : '.$this->getMessage();
	}
}
	
//异常封装到 函数
function demo($a,$b)
{
//	除数不能为0
	if($b == 0){
//		抛出异常
		throw new MyException('除数不能为0',249);
	}
	return $a / $b;
}

try{
	echo demo(10,0);
}catch(Exception $e){
	echo $e->getMessage();
	echo '<br>';
	echo $e->getString();
}

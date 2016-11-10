<?php	
header("content-type:text/html;charset=utf-8");

	/*自动接收异常
	set_exception_handler();*/
	
//自定义异常类
class MyException extends Exception
{
	public function getString()
	{
//		return '啊,我触发异常了!';
		return '自定义抛出的异常:异常号:'.$this->code.' : '.$this->getMessage();
	}
}
	
//声明回调函数
function autoException($e)
{
	echo '我被调用了!!';
	echo $e->getMessage();
}
set_exception_handler('autoException');	//注册到系统

//异常封装到  函数
function demo($a,$b)
{
//	除数不能为0
	if($b == 0){
//		抛出异常
		throw new MyException('除数不能为0',249);
	}
	return $a / $b;
}

echo demo(10,0);

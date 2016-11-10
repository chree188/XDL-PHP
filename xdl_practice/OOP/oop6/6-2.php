<?php	
header("content-type:text/html;charset=utf-8");

	/*处理多个异常
	原则 能解哪个算哪个.自定义的异常类 往前放.
	1.与其它语言的区别
		php的异常  手工抛出
		其它语言 系统自动抛出
	2.使用异常的情况.
		程序猿的悲观.
		代码的健壮性*/
		
//自定义异常类
class MyException extends Exception
{
	public function getString()
	{
//		return '啊,我触发异常了';
		return '自定义抛出的异常:异常号:'.$this->code.' : '.$this->getMessage();
	}
}
	
//异常封装到函数
function demo($a,$b)
{
//	除数不能为0
	if($b == 0){
//		抛出异常
		throw new MyException('除数不能为0',249);
	}
	return $a / $b;
}

//封装到类
class Person
{
	private $age;
	public function __construct($age)
	{
		if ($age < 0 || $age > 150) {
//          抛出异常
            throw new Exception('你的年龄不合法!');
        }
		$this->age = $age;
	}
}
	
try{
//	echo demo(10,0);
	new Person(188);
}catch(MyException $e){
	echo $e->getString();
}catch(Exception $e){
	echo $e->getMessage();
}

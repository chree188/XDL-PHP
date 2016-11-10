<?php
header("content-type:text/html;charset=utf-8");

//异常封装到 函数
function demo($a,$b)
{
//	除数不能为0
	if($b == 0){
//		抛出异常
		throw new Exception('除数不能为0');
	}
	return $a / $b;
}

//封装到类
class Person
{
	private $age;
	public function __construct($age)
	{
		if($age < 0 || $age > 150){
//			抛出异常
			throw new Exception('你的年龄不合法!');
		}
		$this->age = $age;
	}
}

try{
//	echo demo(10,0);
//	new Person(18);
//	new Person(188);
	new Person(180);
}catch(Exception $e){
	echo $e->getMessage();
}

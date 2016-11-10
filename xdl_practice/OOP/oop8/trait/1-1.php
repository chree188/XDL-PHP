<?php
header("content-type:text/html;charset=utf-8");

trait A
{
	public $name = '艳艳';
//	const DDS = 11111;	//常量非也
	
	public function demo()
	{
		echo "A中的demo<br>";
	}
}

//$a = new A();	//不嫩被实例化

class User
{
//	use A;	//使用关键字 use ,来使用定义好的trait
	public function say()
	{
		echo 'User中的say<br>';
	}
}

$u1 = new User();
//u1->demo();

class VipUser extends User
{
	use A;
}

$u2 = new VipUser();
var_dump($u2);
$u2->demo();
$u2->say();

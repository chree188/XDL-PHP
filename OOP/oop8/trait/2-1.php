<?php	
header("content-type:text/html;charset=utf8");

trait A
{
	public $name = '媛媛';
	
	public function demo()
	{
		echo 'A中的demo<br>';
	}
}

trait B
{
	public function demo1()
	{
		echo 'B中的demo1<br>';
	}
}

class User
{
	use A,B;	//使用关键字use,来使用定义好的trait
	public function say()
	{
		echo 'User中的say<br>';
	}
}

$u1 = new User;
$u1->demo();
$u1->demo1();
$u1->say();

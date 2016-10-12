<?php
header("content-type:text/html;charset=utf8");

trait A
{
	public $name = '静静';
	
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

trait C
{
	use A,B;	
}

class User
{
	use C;
	public function say()
	{
		echo 'User中的say<br>';
	}
}

$u1 = new User();
$u1->demo();
$u1->demo1();
$u1->say();

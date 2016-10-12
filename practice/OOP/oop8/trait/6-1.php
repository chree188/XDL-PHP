<?php
header("content-type:text/html;charset=utf-8");

trait A
{
	public static $name = '艳艳';
	public static function demo()
	{
		echo 'A中的demo<br>';
	}
		abstract public function test();
}

class User
{
	use A;
	public function demo1()
	{
		echo 'User中的demo1<br>';
	}
	public function test()
	{
		echo '11111';
	}
}

$u1 = new User();
$u1->demo();
User::demo();

//echo $u1->name;
echo  User::$name;

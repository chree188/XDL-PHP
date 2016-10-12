<?php
header("content-type:text/html;charset=utf-8");

trait A
{
	public static function demo()
	{
		echo 'A中的demo<br>';
	}
}

trait B
{
	public static function demo()
	{
		echo 'B中的demo<br>';
	}
}

trait C
{
	public static function demo()
	{
		echo 'C中的demo<br>';
	}
}

class User
{
	use A,B,C
	{
//		1).代替
		A::demo insteadof B,C;
//		2).取别名
		B::demo as demob;	//起别名demob
		C::demo as democ; 	//起别名democ
	}
}

$u1 = new User();
$u1->demo();	//A 
$u1->demob();	//B
$u1->democ();	//C

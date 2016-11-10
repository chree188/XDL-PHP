<?php
header("content-type:text/html;charset=utf-8");


/*
 * final
 * 	定义:可以用于修饰	类和方法,不能修饰属性
 * 	特点
 * 		1: final修饰的类  不能被继承
 * 		2: final修饰的方法  不能被重写
 * */
 
 	/*final class Person{}
	class Xmen extends Person{}
	$x = new Xmen();
	var_dump($x);*/
	
	class User
	{
		final public function demo()
		{
			echo 'demo';
		}
	}

	class VipUser extends User
	{
		public function demo()
		{
			echo '我才是demo';
		}
	}

$v = new VipUser();
$v->demo();

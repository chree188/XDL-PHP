<?php
header("content-type:text/html;charset=utf-8");

//封装	构造方法
	class A
	{
		private function __construct()
		{
			echo '我是构造方法!!!';
		}
	}

	
//	设计模式
$p = new A();

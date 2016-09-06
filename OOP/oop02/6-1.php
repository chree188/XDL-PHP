<?php
header("content-type:text/html;charset=utf-8");

class A
{
//	私有的属性 无法在外部访问
	public $name = '葫芦娃';
	private $age = 5;
	private $sex = '男';
	
//	当对非公有属性 调用isset()或empty() __isset()会被自动调用
	public function __isset($key)
	{
		echo '';
	}
}

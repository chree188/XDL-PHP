<?php
header("content-type:text/html;charset=utf-8");

class A
{
	private function __construct()
	{
		echo '啊,我被构造了';
	}
}

//会报错,无法调用非公有的方法
//一种设计模式
$p = new A();

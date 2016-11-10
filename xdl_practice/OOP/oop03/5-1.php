<?php
header("content-type:text/html;charset=utf-8");

/*
 * 继承的特点 2
 * 	如果子类中  方法名或属性名 与父类终点的相同,会发生属性或方法的重写.且只对子类有影响.
 * */

class Person
{
	public $name = '红红';
	protected $age = 20;
	
	public function say()
	{
		echo '呵呵哒...';
	}
}

class BatMen extends Person
{
	public $class = 'S51';
	public $name = '蝙蝠侠';
	public function say()
	{
		echo '嘿嘿嘿...';
	}
}

//实例化父子类
$p = new Person();
$b = new BatMen();

var_dump($p);
var_dump($b);

echo '<hr>';
$p->say();
$b->say();

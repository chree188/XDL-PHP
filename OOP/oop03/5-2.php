<?php	
header("content-type:text/html;charset=utf-8");

/*
 * 继承的特点 2
 * 	如果子类中 方法名与父类中的相同,会发生属性或方法的重写.且只对子类有影响.
 * */
 
class Person
{
	public $name = '红红';
	protected $age = 20;
	
	public function say()
	{
		echo '呵呵哒...<br>';
	}
}

class BatMan extends Person
{
	public $class = 's51';
	public $name = '蝙蝠侠';
	public function say()
	{
		echo '嘿嘿嘿...<br>';
	}
}

//实例化父子类
$p = new Person();
$b = new BatMan();

var_dump($p);
var_dump($b);

echo '<hr>';
$p->say();
$b->say();

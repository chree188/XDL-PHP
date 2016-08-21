<?php
header("content-type:text/html;charset=utf-8");

/*多态性

抽象类和抽象方法
	抽象方法:使用关键字abstract来定义抽象方法.抽象方法不能有方法体
	使用:新定义子类  继承抽象类,并重写所有的抽象方法*/

abstract class Person
{
//	普通方法
	public function say()
	{
		echo 'say......<br>';
	}
//	抽象的方法
	abstract public function run();
}

//$p = new Person();

//继承 并重写抽象方法
class Xmen extends Person
{
	public function run()
	{
		echo '我会跑!';
	}
}

$x = new Xmen();
$x->run();

<?php
header("content-type:text/html;charset=utf-8");

/*
 * 继承
 * 	类的继承:
 * 	一个类可以继承一个父类,如果子类继承了一个父类,
 * 	那么子类 就具有了 父类的属性和方法
 *继承的作用:
 * 	1.提高重用性
 * 	2.方便升级
 * 	3.方便扩展
 * */
 
//父类 基类
class Person
{
	public $name;
	public $age;
	public $sex;
	
	public function chi(){echo '吃饭饭';}
	public function he(){echo '喝水水';}
	public function la(){echo '拉粑粑';}
	public function shui(){echo '睡觉觉';}
}

//子类 派生类
class Meizi extends Person
{
	public function sa()
	{
		echo '蹲着小便便';
	}
}

class Hanzi extends Person
{
	public function sa()
	{
		echo '站着小便便';
	}
}

$man = new Hanzi();
$man->chi();
$man->la();
$man->sa();

echo '<hr>';
$woman = new Meizi();
$woman->chi();
$woman->la();
$woman->sa();

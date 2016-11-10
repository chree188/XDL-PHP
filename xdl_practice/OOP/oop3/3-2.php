<?php
header("content-type:text/html;charset=utf-8");

//继承
//一个子类可以继承 一个父类,如果子类继承了父类
//那么,子类就具有了父类的属性和方法
//继承的作用:
// 1.提高代码重用性
// 2.方便升级
// 3.方便扩展


//类的继承
//父类  基类
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
	
//	子类	派生类
	class Meizi extends Person
	{
		public function sa()
		{
			echo '我是蹲着的...';
		}
	}

	class Hanzi extends Person
	{
		public function sa()
		{
			echo '我是站着的...';
		}
	}
	
	$man = new Hanzi();
	$man->chi();
	$man->la();
	$man->sa();
	
	echo "<hr>";
	$woman = new Meizi();
	$woman->chi();
	$woman->la();
	$woman->sa();

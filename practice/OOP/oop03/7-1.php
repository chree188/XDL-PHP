<?php
header("content-type:text/html;charset=utf-8");

/*
 * 在子类重写父类方法时,可以在子类中调用被重写的父类方法.
 * 调用的方法		parent::方法名()
 * */
 
//定义类
class User
{
	private $name;
	private $age;
//	构造方法
	public function __construct($name,$age)
	{
		$this->name = $name;
		$this->age = $age;
	}
	public function getInfo()
	{
		echo '我的名字:'.$this->name.'我的年龄:'.$this->age.',';
	}
	private function fun1()
	{
		echo '我司fun1';
	}
}

//继承User
class VipUser extends User
{
	private $class;
//	构造方法 被重写
	public function __construct($class,$name,$age)
	{
		$this->class = $class;
		
		/*$this->name = $name;
		$this->age = $age;*/
//		无法给父类的私有属性赋值
//		把父类的构造方法再调用一次
		parent::__construct($name,$age);
	}
	public function getInfo()
	{
//		无法输出class属性,需要再调用一次父类的方法
		parent::getInfo();
		echo '我的班级:'.$this->class;
	}
	public function demo()
	{
//		调用父类的方法
		parent::getInfo();
		parent::fun1();
	}
}

$u = new User('小冰',16);
$u->getInfo();

echo '<hr>';
$vu = new VipUser('s51','小娜',20);
$vu->getInfo();

echo '<hr>';
$vu->demo();
//$vu->fun1();

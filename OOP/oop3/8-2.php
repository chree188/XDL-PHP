<?php
header("content-type:text/html;charset=utf-8");

/*
 * 在子类中重写父类方法时,可以在子类中调用  被子类覆盖的父类方法
 * 使用:parent::方法名();
 * */
 
// 定义类
	class User
	{
		private $name;
		private $age;
		
//		构造方法
		public function __construct($age,$name)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function getInfo()
		{
			echo "我的名字:".$this->name.",我的年龄:".$this->age.",";
		}
		
		private function fun1()
		{
			echo "我是fun1";
		}
	}

	
//	子类
	class VipUser extends User
	{
		private $grade;
		public function __construct($grade,$age,$name)
		{
//			无法给父类的私有属性赋值
//			把父类的构造方法再调用一次
			parent::__construct($age, $name);
			$this->grade = $grade;
//			$this->name = $name;
//			$this->age = $age;
		}
		
		public function getInfo()
		{
			parent::getInfo();
			echo '我的班级是:'.$this->grade;
		}
		
		public function demo()
		{
			parent::getInfo();
			parent::fun1();
		}
	}

//	实例化
$u = new User(16,'小冰');
$u->getInfo();

echo '<hr>';
$vip = new VipUser('s50',16,'小娜');
$vip->getInfo();
echo '<br>';
$vip->demo();

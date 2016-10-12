<?php	
header("content-type:text/html;charset=utf-8");

//定义一个人类
	class Person
	{
//		属性
		public $name;
		public $age = 18;
		public $sex;
		
//		自我介绍
		public function say()
		{
			echo '我是:'.$this->name.',今年:'.$this->age.'岁了,我是一个:'.$this->sex;
		}
		
//		初始化的方法
		public function init($name,$age,$sex)
		{
			$this->name = $name;
			$this->age = $age;
			$this->sex = $sex;
		}
		
//		传统的构造函数
		public function Person()
		{
			echo '我被调用了!';
		}
	}

//	实例化
	$dl = new Person;
	$dl->init('武大郎', 400, '男的1');
//	$dl->neme = '武大郎';
//	$dl->age = 400;
//	$dl->sex = '男的';
	$dl->say();
	echo '<hr>';
	
	$jack = new Person;	
	$jack->init('Jack', 18, '猛男1');
//	$jack->name = Jacl;
//	$jack->age = 18;
//	$jack->sex = '猛男';
	$jack->say();

<?php	
header("content-type:text/html;charset=utf-8");

/*
 * 继承的特点
 * 	子类可以重写父类的属性和方法,也可以修改访问控制符
 * 	只能改的 更开放.建议重写时,一般不要修改访问控制符.
 * 	开放顺序	public -> protected -> private
 * */
 
 	class Person
 	{
 		public $name = '小雨';
		protected $age = 18;
		private $sex = '男';
		
		public function say()
		{
			echo '哈哈哈...';
		} 
 	}

 	class BatMan extends Person
 	{
 		public $name = '蝙蝠侠';	//1
// 		private $name = '蝙蝠侠';	//0
// 		protected $name = '蝙蝠侠';	//0

//		public $age = 1;	//1
//		private $age = 1;	//0
		protected $age = 1;	//1
		
//		public $sex = '男';	//1
		protected $sex = '男';	//1
 	}

$p = new Person();
$b = new BatMan();

echo '<pre>';
	var_dump($p);
	var_dump($b);
	

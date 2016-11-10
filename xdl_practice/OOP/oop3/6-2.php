<?php
header("content-type:text/html;charset=utf-8");

/*
 * 继承的特点
 * 如果子类中 方法名和属性名 与父类中的相同
 * 会发生 属性或方法 重写(覆盖),且只对子类有影响
 * 
 * 重写方法比较常见
 * */
 
 	class Person
 	{
 		public $name = '小雨';
		protected $age = 18;
		
		public function say()
		{
			echo '哈哈哈...';
		}
 	}

 	class BatMan extends Person
 	{
 		public $sax = '男的';
		public $name = '蝙蝠侠';
		
		public function say()
		{
			echo '嘿嘿嘿...';
		}
 	}

$p = new Person();
$b = new BatMan();

echo '<pre>';
	var_dump($p);
	var_dump($b);
echo '<br>';

$p->say();
echo '<br>';
$b->say();

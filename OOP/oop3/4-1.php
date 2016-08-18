<?php
header("content-type:text/html;charset=utf-8");

/*
 * 访问控制符
 * 访问控制		public		private		protected
 * 内部		1			1			1
 * 外部		1			0			0
 * 子类		1			0			1
 * 
 * 公有的,最开放的,谁想用都可以用.
 * 私有的,最保守的,只有自己可以用.
 * 受保护的,只允许家族使用,外人不容易用.
 * */
 
// 父类
	class Person
	{
		public $name = '小红红';
		private $age = 18;
		protected $grade = 's50';
		
		public function getInfo()
		{
			echo "在类的内部访问public属性:".$this->name.'<br>';
			echo "在类的内部访问private属性:".$this->age.'<br>';
			echo "在类的内部访问protected属性:".$this->grade.'<br>';
		}
	}

//	实例化

$p = new Person();
$p->getInfo();
echo '<hr>';

echo "在类的外部访问public属性:".$p->name.'<br>';
//echo "在类的外部访问private属性:".$p->age.'<br>';
//echo "在类的外部访问protected属性:".$p->grade.'<br>';



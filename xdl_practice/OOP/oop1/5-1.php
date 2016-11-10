<?php	
header("content-type:text/html;charset=utf-8");

/*
 * 成员属性
 * 	不能重复定义
 * 	可以有默认值
 * 	默认值不可以是变量
 * 	默认值不可以有运算
 * 	默认值可以是常量
 * 	默认值可以是数组
 * 成员方法
 * 	与函数一致
 * 	可以直接输出自己的成员属性
 * */
 
$num = 18;
define('NUM', 18);

//定义一个小鸭类
	class Duck
	{
//		属性
		public $name = '唐老鸭';
//		public $age = 18;
//		public $age = 19;
//		public $age = $num;
//		public $age = 5+8;
//		public $age = max(1,5,9,7,966);
//		public $age = NUM;
		public $age = array(1,5,6,7,5);
		
		public $sex = '公';
		
		public function say($a,$b=5)
		{
			echo '成员方法:'.$a.'|'.$b;
		}
	}

//	实例化
	$tly = new Duck;
	$tly->say(10);

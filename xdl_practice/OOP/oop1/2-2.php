<?php	
header("content-type:text/html;charset=utf-8");

/*
 * 类的定义格式	PSR规范
 * 		[修饰符] class 类名
 * 		{
 * 			[成员属性]
 * 			[成员方法]
 * 		}
 * */
 
// 定义一个小鸡类
	class Chick
	{
//		成员属性
//		就是在类里面写的变量,只不过前面加了个public
		public $color;
		public $sex;
		
//		类中禁止出现过程化代码
//		echo '11111111';
		
//		成员方法
//		就是在类里面写的函数,只不过前面加了个public
		public function egg()
		{
			echo '我下蛋了...';
		}
		public function say()
		{
			echo '咯咯咯...';
		}
	}

//	实例化
	$xj = new Chick;
	var_dump($xj);
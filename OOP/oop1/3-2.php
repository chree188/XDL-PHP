<?php	
header("content-type:text/html;charset=utf-8");

//定义一个小鸭类
	class Duck
	{
		public $name;
		public $age;
		public $sex;
		
		public function say()
		{
			echo '嘎嘎嘎...';
		}
	}

//	实例化
$tly = new Duck;

$tly->name = '唐老鸭';

//可变变量
$a = 'age';
$tly->$a = 18;
//$tly->age = 18;

var_dump($tly);

//访问属性
echo $tly->name;

echo '<hr>';
//访问方法
$tly->say();
	
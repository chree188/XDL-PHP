<?php	
header("content-type:text/html;charset=utf-8");

//定义一个小鸭类
	class Duck
	{
//		属性
		public $name = '唐老鸭';
		public $age = 18;
		public $sex = '公';
		
//		自我介绍
		public function say()
		{
//			echo '我叫'.$name;
//			伪变量 $this
			echo '我叫:'.$this->name;
		}
	}

//实例化
$tly = new Duck;
$tly->say();

//无法在外部使用
//echo '我叫:'.$this->name;

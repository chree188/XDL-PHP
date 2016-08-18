<?php
header("content-type:text/html;charset=utf-8");

//对象链
	class Number
	{
		private $num = 0;
//		加法
		public function plus($num)
		{
			$this->num += $num;
			return $this;
		}
		
//		获取结果
		public function getNum()
		{
			return $this->num;
		}
	}

//	实例化
$n = new Number();
/*$n->plus(10);
$n->plus(20);
$n->plus(30);
$n->plus(40);
echo $n->getNum();*/
echo $n->plus(10)->plus(20)->plus(30)->plus(40)->getNum();

<?php	
header("content-type:text/html;charset=utf-8");

//定义一个小鸭类
class Duck
{
	public $name = '唐老鸭';
	public $age = 2;
	public $sex = '公';
	
//	自我介绍
	public function say(){
		echo '我叫:'.$this->name;
		echo '我今年:'.$this->age.'岁';
	}
}

//实例化
$tly = new Duck;
$tly->name = '唐老鸭';
$tly->say();

echo '<hr>';
$txy = new Duck;
$txy->name = '唐小鸭';
$txy->age = 1;
$txy->say();

<?php
header("content-type:text/html;charset=utf-8");

//定义一个小鸭类

class Duck
{
	public $name;
	public $age;
	public $sex;
	
	public function say(){
		echo '嘎嘎嘎...';
	}
}

//实例化
$tly = new Duck;
//给属性赋值
$tly->name = '唐老鸭';
$tly->age = 2;
$tly->sex = '公';

var_dump($tly);

echo $tly->name;	//取成员属性值
$tly->say();	//调用成员方法

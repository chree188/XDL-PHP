<?php
header("content-type:text/html;charset=utf-8");
	
/*
 * 成员属性:
 * 	不能重复定义!
 * 	可以有默认值
 * 	默认值不能是变量!!!
 * 	默认值不可以有运算
 * 	值可以有任意类型
 *成员方法:
 * 	与函数一致
 * 	可以直接输出自己的成员属性
 * */	
 
//定义一个小鸭类
class Duck
{
	public $name = '唐老鸭';
//	public $name = '唐老鸭1';
	public $age = 2;
//	public $age = $this->name;	//错误
//	public $sex = '公';
//	public $sex = array(1,2,3,4);
//	public $sex = null;
//	public $sex = 1+2;
//	public $sex = min(2,852,39,48985);	//运算不行
	
	
//	自我介绍
	public function say(){
		echo '我叫:'.$this->name;
		echo '我今年:'.$this->age.'岁';
	}
	public function hehe($a,$b = 5){
		echo '成员方法:'.$a.'|'.$b;
	}
}

//实例化
$tly = new Duck;
$tly->name = '唐老鸭';
$tly->say();
echo '<br>';

$tly->hehe(100);

<?php	
header("content-type:text/html;charset=utf-8");

//对象的比较
	class A
	{
		
	}

	class B
	{
		
	}

$a = new A;
$b = new A;

//取别名  不会产生新的对象
$c = $a;
$a->age = 18;
var_dump($c);

echo '<hr>';
if($a === $c){
	echo 'Y';
}else{
	echo 'N';
}

//  == 比较的是:
//  只要两个对象 是同一个类的实例,并且所有属性及值都相等则相等.
//  === 比较的是:
//  唯一的作用就是 比较两个对象 是不是 同一个对象.
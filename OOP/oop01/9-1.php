<?php	
header("content-type:text/html;charset=utf-8");

class A
{
	public $age = 18;
}

class B{}

$a = new A();
$b = new B();

//= 区别名 就是把引用给了一个新变量
$c = $a;
$c->age = 20;
echo $a->age;

echo '<hr>';
//== 比较
//只要两个对象 是同一个类的实例,并且所有的属性及值都相等,则相等\n
if ($a == $c) {
	echo 'YES';
} else {
	echo 'NO';
}

echo '<hr>';
//== 比较
//唯一的作用 就是比较两个对象 是不是同一个对象
if ($a === $c) {
	echo 'YES';
} else {
	echo 'NO';
}


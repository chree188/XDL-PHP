<?php	
header("content-type:text/html;charset=utf-8");

class Person
{
	public function __construct($name){
		$this->name = $name;
		echo $this->name.'出生了...<br>';
	}
	
	public function __destruct(){
		echo $this->name.'挂了...<br>';
	}
}

$p1 = new Person('张三');
$p2 = new Person('李四');
$p3 = new Person('王五');

unset($p2);

<?php	
header("content-type:text/html;charset=utf-8");

class Person
{
	public $name;
	
//	php特有的构造方法
	public function __construct($name){
		$this->name = $name;
	}
	
	/*
	 * 与类名相同的方法
	 * 传统的构造方法
	 * public function Person($name){
	 * 		$this->name = $name.'******';
	 * }
	 * */
	 
//	自我介绍
	public function say(){
		echo '我是:'.$this->name;
	}
}

//实例化对象
$dl = new Person('武大郎');
$dl->say();

echo '<hr>';
$jack = new Person('Jack');
$jack->say();

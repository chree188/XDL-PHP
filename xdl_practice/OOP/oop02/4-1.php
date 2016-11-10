<?php
header("content-type:text/html;charset=utf-8");

/*
 * 封装性:
 * 	1).非公有属性和方法  不能在外部访问!
 * 	2).只能在类的内部通过$this来使用
 * 
 * 属性的封装  作用是:实现访问控制
 * 方法的封装  作用是:提高重用性,可读性
 * */
 
 class Robot
 {
 	private $name;
	public function __construct($name)
	{
		$this->name = $name;
	}
	
//	自我介绍
	public function say()
	{
		echo '我的名字是:'.$this->name.'<br>';
	}
	
//	走路
	public function run()
	{
		$this->upLeg();
		$this->downLeg();
	}
	
	/*
	 * 某个方法有代码重复,把重复的代码封装成非公有的方法
	 * 在公有方法中,调用这个非公有方法
	 * 代码过多,拆分成小块再调用.
	 * */
	 
	private function upleg()
	{
		echo '机械收缩,抬腿<br>';	//几百行code...
	}
	private function downleg()
	{
		echo '机械放松,放腿<br>';	//几百行的代码...
	}
 }

 $p = new Robot('Atlas');
 $p->say();
 $p->run();
 $p->run();
 $p->run();
 $p->run();

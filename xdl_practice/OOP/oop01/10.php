<?php
header("content-type:text/html;charset=utf-8");

//定义一个工人类
class Worker
{
	public $category;	//工作种类
	public $duty;	//职务
	
	public function __construct($category,$duty){
		$this->category = $category;
		$this->duty = $duty;
	}
	
	public function work(){
		echo '我的工作种类是:'.$this->category.'<br>职务是:'.$this->duty;
	}
}

//实例化
$zwt = new Worker('IT','程序猿');
$zwt->work();

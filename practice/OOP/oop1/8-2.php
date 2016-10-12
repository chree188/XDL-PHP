<?php 
header("content-type:text/html;charset=utf-8");

//定义一个人类
	class Person
	{
//	             属性
	    public $name;
	
//	             构造
	    public function __construct($name)
	    {
	        $this->name = $name;
	        echo $this->name.'出生了<br>';
	    }
//	             析构方法 
	    public function __destruct()
	    {
	        echo $this->name.'挂了<br>';
	    }
	}

//实例化
$zs = new Person('张三');
$ls = new Person('李四');
$ww = new Person('王五');

unset($ls);//李四先挂







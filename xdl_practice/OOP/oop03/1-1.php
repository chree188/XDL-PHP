<?php	
header("content-type:text/html;charset=utf-8");

三大特性	封装 继承 多态
类与对象的关系
	先有类	通过类	实例化得到对象
优势: 代码重用性/可扩展性/可维护性

1.什么是封装
	将属性或方法设置为非公有
	
2.封装后的特点
	无法在外部访问
	通过$this在内部访问
3.属性封装
	实现访问控制
4.方法封装
	重用性  可读性
5.访问被封装的属性
	1.定义公有方法
	2.使用魔术方法

6.魔术方法
	public function __get($key)
	{
		return $this->$key;
	}
	public function __set($key,$value)
	{
		$this->$key = $value;
	}
	public function __isset($key)
	{
		return isset($this->$key);
	}
	public function __unset($key)
	{
		unset($this->$key);
	}
	public function __construct()
	{
//		用于初始化
	}
	public function __destruct()
	{
//		用于写遗言
	}

<?php	
header("content-type:text/html;charset=utf-8");


/*oop 的优势:
    代码重用性/ 可扩展性/可维护

三大特性  封装/继承/多态

类与对象的关系 : 现有类,才有对象. 通过类实例化出来对象

1.什么是封装
    将成员属性/方法 设置为非公有
2.封装后的特点   X3
    无法在外部访问
    通过$this 内部调用
3.属性的封装
    实现访问控制
4. 方法封装
    重用性和可读性
5.访问封装的属性/方法
    1).定义公共的方法
    2).使用魔术方法

6.魔术方法*/

	public function __get($key){
		return $this->$key;
	}
	
	public function __set($key,$value){
		$this->$key = $value;
	}
	
	public function __isset($key){
		return isset($this->$key);
	}
	
	public function __unset($key){
		unset($this->$key);
	}
	
	public function __construct(){
//		用于初始化
	}

	public function __destruct(){
//		用于释放资源
	}

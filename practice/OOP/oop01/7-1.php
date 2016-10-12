<?php	
header("content-type:text/html;charset=utf-8");

class Person
{
	public $name;
	
//	php特有的构造方法
//	在得到对象的时候  自动调用  用于初始化
//	连接数据库/打开一个目录/给属性赋初始值
	public function __construct($name){
		$this->name = $name;
		echo $this->name.'出生了...<br>';
	}
	
//	析构方法
//	在对象被销毁时 自动触发. 用于写遗言
//	释放资源/关闭目录
	public function __destruct(){
		echo $this->name.'挂了...<br>';
	}
}

$p = new Person('张三');
//unset($p);	//销毁变量

echo '123456789<br>';

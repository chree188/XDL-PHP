<?php 
header("content-type:text/html;charset=utf-8");

//定义一个人类
class Person
	{
//	             属性
	    public $name;
	
//	   	 自我介绍
	    public function say()
	    {
	        echo '我是:'.$this->name.',今年:'.$this->age.'岁了,我是一个:'.$this->sex;
	    }
	
	    
	
//	    PHP特有的构造方法 
//	             在得到对象的时候 自动调用 .用于初始化
//	             如 数据库连接 / 打开目录 / 创建画布
	    public function __construct($name,$age,$sex)
	    {
	        $this->name = $name;
	        $this->age = $age;
	        $this->sex = $sex;
	    }
//	              传统的构造函数
//	               在实例化时就 自动调用此函数
//	    public function Person($name,$age,$sex)
//	    {
//	        $this->name = $name.'+++++';
//	        $this->age = $age;
//	        $this->sex = $sex;
//	    }
	}

//实例化
$dl = new Person('武大郎',400,'男的1');
$dl->say();
echo '<hr>';

$jack = new Person('Jack',18,'猛男1');
$jack->say();







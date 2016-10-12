<?php 
header("content-type:text/html;charset=utf-8");

/*
封装性
    1.非公有的成员方法和属性 不能在类的外部访问
    2.只能在类的内部方法中 通过$this来访问

成员属性的封装 ,作用是:实现访问控制
成员方法的封装 ,作用是:提高重用性和代码的可读性
*/

//实现成员方法和属性的封装
	class Robot
	{
	    private $name;
	    public function __construct($name)
	    {
	        $this->name = $name;
	    }
	    //自我介绍
	    public function say()
	    {
	        echo 'MY NAME IS :'.$this->name;
	        echo '<br>';
	    }
	
	    public function run()
	    {
	        $this->upLeg();
	        $this->downLeg();
	    }
	
	    private function upLeg()
	    {
	        echo '机械收缩,抬腿<br>';// 几百行代码
	    }
	    private function downLeg()
	    {
	        echo '机械放松,放腿<br>';// 几百行代码
	    }
	}

//实例化
$a = new Robot('AlphaGo');
$a->say();
$a->run();
$a->run();
$a->run();




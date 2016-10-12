<?php	
header("content-type:text/html;charset=utf-8");

class A
{
//	私有的属性  无法在外部访问
	public $name = '葫芦娃';
	private $age = 5;
	private $sex = '男娃';
	
//	当对非公有属性  调用isset()或empty()  __isset()会被自动调用
	public function __isset($key)
	{
		echo '啊,我来判断'.$key.'<br>';
		return isset($this->$key);
	}
	public function __get($key)
	{
		return $this->$key;
	}
	
//	当对非公有属性调用unset()时  会被自动触发__unset()
	public function __unset($key)
	{
		echo '啊,删除'.$key.'啦!<br>';
		unset($this->$key);
	}
}

$a = new A();
//isset()	是判断属性是否存在 不需要得到值
var_dump(isset($a->name));	//true
var_dump(isset($a->age));	//true
var_dump(isset($a->sex));	//true

echo '<hr>';
//empty()	判断属性值是否为空 所以必须得到属性值!!!
var_dump(empty($a->name));	//false
var_dump(empty($a->age));	//正确结果应该是 false

echo '<hr>';
unset($a->name);
var_dump($a);

unset($a->age);
unset($a->sex);
var_dump($a);

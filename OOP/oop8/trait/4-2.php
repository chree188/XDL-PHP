<?php	
header("content-type:text/html;charset=utf8");

trait A
{
	public $name = '艳艳';
	private $age = 18;
	
	public function demo()
	{
		echo 'A中的demo<br>';
	}
}

class User
{
	use A;
//	public $name = '大艳艳';	//不能重复定义属性!!!
	
	public function say()
	{
		echo 'User中的say<br>';
	}
}

$u1 = new User();
var_dump($u1);
$u1->neme = "anna";
echo $u1->name;

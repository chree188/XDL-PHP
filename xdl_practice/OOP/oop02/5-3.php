<?php	
header("content-type:text/html;charset=utf-8");

/*
 * __set($key,$value){}
 * 		给非公有属性 赋值时 自动调用
 * 		并把属性名和属性值 作为参数1/2 传入
 * 		它必须有两个参数 且必须是public
 * __get($key){}
 * 		使用非公有属性时,自动调用,并把属性名 作为参数传入
 * 		它必须有1个参数 且必须是public
 * */
 
class A
{
//	私有的属性 无法在外部访问
	private $name = '葫芦娃';
	private $age = 5;
	private $sex = '男';
	
	public function __set($key,$value)
	{
		echo '啊,我被set了!<br>';
		echo '$key:'.$key;
		echo '<br>';
		echo '$value:'.$value;
//		让访问生效
		$this->$key = $value;
	}
	
	public function __get($key)
	{
//		echo '啊,我被get了!';
//		echo $key;
		return $this->$key;
	}
}

$a = new A();
var_dump($a);

$a->name = '水娃';
echo '<hr>';
$a->age = 5.5;
echo '<hr>';
$a->sex = '男娃';

var_dump($a);
echo $a->name;
echo $a->age;
echo $a->sex;

<?php
header("content-type:text/html;charset=utf-8");

/*对象的串行化
	就是将对象转换为字符串
	serialize()
	unserialize()*/
	
class Person
{
	private $name;
	private	$age;
	public function __construct($name,$age)
	{
		$this->name = $name;
		$this->age = $age;
	}
}

$p = new Person('静静',20);
var_dump($p);

//将对象串行化
$info = serialize($p);
echo $info;

echo '<hr>';
//将对象以字串的形式存到文件里面
var_dump(file_put_contents('./data.info', $info));

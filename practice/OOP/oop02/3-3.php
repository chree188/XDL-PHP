<?php
header("content-type:text/html;charset=utf-8");

/*
 * 封装性:
 * 	把属性或方法 设置为非公有 就称为封装性
 * 	public	公有的
 * 	private	私有的
 * 	protected	受保护的
 * 
 * 访问的含义:读写(取值,赋值)
 * */
 
// 定义一个妹子
class Meizi
{
	public $name;
	private $age = 18;
	public $size;
	
	public function getAge()
	{
		$this->age = 200;
		echo '我的年龄是:'.$this->age;
	}
	private function getSize()
	{
		echo '我的size是:'.$this->size;
	}
	public function askSize()
	{
		if ($this->size > 'D') {
//			调用自己的私有方法 得到输出信息
			$this->getSize();
		} else {
			echo '臭流氓!!!';
		}
		
	}
}

//得到一个妹子
$mv = new Meizi();

//初始化妹子
$mv->name = '金莲';
//$mv->age = 18;	//不能访问私有的属性
$mv->size = 'A';

//问题1	妹子的年龄  我们想看就看  不合理
//问题2	妹子的尺寸  我们想问就问  不合理

echo '美女的名字:'.$mv->name.'<br>';
//echo '美女的年龄:'.$mv->age.'<br>';	//不能访问私有的属性
echo '美女的尺寸:'.$mv->size.'<br>';

//获取妹子的年龄
$mv->getAge();

echo '<hr>';
//$mv->getSize();	//不能调用私有的方法

$mv->askSize();
var_dump($mv);


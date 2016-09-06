<?php
header("content-type:text/html;charset=utf-8");

/*2.定义学生信息类Stu
        内容私有属性:学号/姓名/性别/班级
        定义一个构造方法,目的实现上面四个属性的初始化赋值操作
        定义魔术方法:__set  __get  __unset  __isset,并发挥其作用
        定义一个获取信息的方法getinfo方法
*/

class Stu
{
	private $id;
	private $name;
	private $sex;
	private $classe;
	
	public function __construct($id,$name,$sex = '男',$classe = 'S51')
	{
		$this->id = $id;
		$this->name = $name;
		$this->sex = $sex;
		$this->classe = $classe;
	}
	
	public function __set($key,$value)
	{
		$this->$key = $value;
	}
	
	public function __get($key)
	{
		return $this->$key;
	}
	
	public function __isset($key)
	{
		return isset($this->$key);
	}
	
	public function __unset($key)
	{
		unset($this->$key);
	}
	
	public function getInfo()
	{
		echo '学号:'.$this->id.'<br>';
		echo '姓名:'.$this->name.'<br>';
		echo '性别:'.$this->sex.'<br>';
		echo '班级:'.$this->classe.'<br>';
	}
}

$zs = new Stu(23,'张三');
$zs->sex = '女';
$zs->getInfo();
echo '<hr>';
$jj = new Stu(1,'静静','女','S50');
$jj->classe = 'S51';
$jj->getInfo();


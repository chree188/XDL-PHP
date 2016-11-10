<?php
header("content-type:text/html;charset=utf-8");

/*
 克隆魔术方法 __clone()
 触发条件:在该对象被克隆的时候自动触发
 作用:
 1.封装该方法的话,会使该对象不能被克隆
 2.将属性值的里对象 在克隆时 也进行克隆
 3.当对象被克隆时,可以设置或重置 对象的属性
 */

/*class Person
 {
 private function __clone()
 {
 echo'我被克隆了!!!';
 }
 }

 $p1 = new Person();
 $P2 = clone $p1;*/

class A
{
    public $name = '毛骗';
}
 
class Man
{
	public $obj = null;	//类型为对象
	public function __construct($obj)
	{
		$this->obj = $obj;
	}
	
	public function __clone()
    {
        $this->obj = clone $this->obj;
    }
}

//实例化
$m = new Man(new A);
var_dump($m);

$n = clone $m;
var_dump($n);
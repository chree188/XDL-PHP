<?php
header("content-type:text/html;charset=utf-8");

/*
 * 继承的特点 3
 * 	子类可以重写父类的属性和方法,也可以修改访问控制符
 * 	访问控制符只能改的更开放,建议重写时 一般不要修改访问控制符
 * 
 * 开放顺序:	public ==> protected ==> private
 * */
class Person
{
	public $name = '红红';
	protected $age = 20;
	private $sex = '女的';
}

class BatMan extends Person
{
//	public $name = '蝙蝠侠';	//Y
//	protected $name = '蝙蝠侠';	//N
//	private $name = '蝙蝠侠';	//N

//	public $age = 18;	//Y
//	protected $age = 18;	//Y
//	private $age = 18;	//N

//	private $sex = '女';	//Y
//	public $sex = '女';	//Y
//	protected $sex = '女';	//Y
}

$p = new Person();
$b = new BatMan();

var_dump($p);
var_dump($b);

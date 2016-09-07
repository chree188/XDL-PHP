<?php	
header("content-type:text/html;charset=utf-8");

/*
 * 		public private	protected
 * 内部	  Y		  Y			Y
 * 外部	  Y		  N			N
 * 子类	  Y		  N			Y
 * 
 * 公有的,最开放  谁想用都可以用
 * 私有的,最保守的,只能自己能用
 * 受保护的,只允许家族使用,外人不让用
 * */
 
class Person
{
	public $name = '小静静';
	private $age = 18;
	protected $sex = '保密';
	
	public function getInfo()
	{
		echo '在类的内部访问public属性:'.$this->name.'<br>';
		echo '在类的内部访问private属性:'.$this->age.'<br>';
		echo '在类的内部访问protected属性:'.$this->sex.'<br>';
	}
}

$p = new Person();
$p->getInfo();
echo '<hr>';

//类的外部
echo '在类的外部访问public属性:'.$p->name.'<br>';
//echo '在类的外部访问private属性:'.$p->age.'<br>';	//no
//echo '在类的外部访问protected属性:'.$p->sex.'<br>';	//no

echo '<hr>';
class SuperMan extends Person
{
	public function sm()
	{
		echo '在子类中访问public属性:'.$this->name.'<br>';
//		echo '在子类中访问private属性:'.$this->age.'<br>';	//no
		echo '在子类中访问protected属性:'.$this->sex.'<br>';
	}
}

$s = new SuperMan();
$s->sm();
echo '<hr>';
$s->getInfo();

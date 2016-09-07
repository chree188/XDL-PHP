<?php
header("content-type:text/html;charset=utf-8");

/*
 * 对象链 对象的连贯操作
 * */
 
class Number
{
	private $num = 0;
//	加法
	public function plus($num)
	{
		$this->num += $num;
		return $this;	//返回对象自己
	}
//	获取结果
	public function getNum()
	{
		return $this->num;
	}
}

$n = new Number();

echo $n->plus(10)->plus(20)->plus(30)->plus(40)->getNum();

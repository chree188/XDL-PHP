<?php
header("content-type:text/html;charset=utf-8");

/*__toString()
	把对象当做字串一样去输出的时候,自动调用.
	要求该方法,必须return一个字串
	作用:	
		一般用于 写一些调试输出信息
*/
class A
{
//	魔术方法
	public function __tostring(){
		return '我是字串!<br>';
	}
}

$p = new A();
echo $p;
print($p);

echo '<hr>';
print_r($p);
var_dump($p);

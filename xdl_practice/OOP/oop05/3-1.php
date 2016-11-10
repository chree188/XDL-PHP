<?php
header("content-type:text/html;charset=utf-8");

/*__toString()
	把对象当作字串一样去输出时,自动调用.
	该方法要求 值必须是return的字串
作用:
	一般用于 写调试信息
*/

class A
{
	public function __tostring()
	{
		return '我被输出了!';
	}
}	

$p = new A();

echo $p;
print($p);

echo '<hr>';
var_dump($p);	//NO
print_r($p);	//NO

<?php
/*
 局部变量,在函数内部定义,只能在函数内部使用,函数结束时,自动销毁
 全局变量 在定义它之后的任何地方,都可以使用
 		要在函数内部使用全局变量,需要 global 变量名  来声明
 静态变量 在函数内部定义,只能在函数内部使用,
 */

$a = 100;
function xxoo() {
	$a = 10;
	global $a;
	echo $a;	// 这里输出100, 因为上面一句已说指明使用全局的$a
}

echo xxoo();

	function ooxx(){
		static $b=100;	//定义一个静态变量,只在函数第一次调用时,执行这一句
		$b++;
		echo $b;
	}
	
	echo '<br>';
	ooxx();echo '<br>';	//即,只在这次调用时,执行  $b=100;
	ooxx();echo '<br>';
	ooxx();echo '<br>';
	ooxx();echo '<br>';

	// echo $b;
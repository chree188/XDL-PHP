<?php
/*$a = 100;
 function xxoo() {
 $a = 10;
 global $a;
 echo $a;
 // 这里输出100, 因为上面一句已说指明使用全局的$a
 }

 echo xxoo();*/

function ooxx() {
	static $b = 100;
	//定义一个静态变量,只在函数第一次调用时,执行这一句
	$b++;
	echo $b;
}

ooxx();
echo '<br>';
//即,只在这次调用时,执行  $b=100;
ooxx();
echo '<br>';
ooxx();
echo '<br>';
ooxx();
echo '<br>';

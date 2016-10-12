<?php
/*引用传值*/

function fun1(&$a) {//在形参前面加上&
	$a++;
	echo $a;
}

$b = 100;
fun1($b);
// 在调用函数的时候,相当于形参与实参建立了引用关系,即 $a=&$b;
// 所以,在函数内部对$a的修改,也会影响到$b

echo $b;

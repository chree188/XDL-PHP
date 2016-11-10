<?php
//return 返回值

function add($a, $b) {
	$c = $a + $b;

	// return;  //返回给调用它的人
	//return 可以返回任何值
	// return 下面的语句不会被执行.
	// 不写return 或 只写return  视为函数返回NULL
	// echo '我算完了';

}

$i = 5;
$j = 7;

$sum = add($i, $j);
var_dump($sum);
// echo add($i,$j);   //  操作  $a=$i;   $b=$j;

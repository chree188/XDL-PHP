<?php	
	/* 数组入栈出栈 */
	
	$arr=['a'];
	
//	栈：后进先出

//	1.入栈
	array_push($arr,'b','x');
	
//	2.出栈
	echo array_pop($arr);
	
//	3.入列
	array_unshift($arr,'x','y');
	
//	4.出列
	echo array_shift($arr);
	echo '<pre>';
	print_r($arr);
	
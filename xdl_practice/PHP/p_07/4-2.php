<?php	
	/* 二维数组及多维数组 */
	
	$a=['a','b','c'];
	$b=['x','y','z'];
	$c=['q','e','r'];
	
	$arr=[$a,$b,$c];
	$brr=[$a,$b,$c];
	
//	echo $arr[0][1];

	$arr=[
		0=>['a','b','c'],
		1=>['x','y','z'],
		2=>['q','e','r']
	];
//	echo $arr[1][1];

	$brr=['a','b','c',['x','y','z']];
//	echo $brr[3][1];
	echo '<pre>';
	print_r($brr);

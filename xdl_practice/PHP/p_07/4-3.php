<?php	
	/* 二维数组及多维数组 */
	
	$a=['a','b','c'];
	$b=['x','y','z'];
	$c=['q','w','e'];
	
	$arr=[$a,$b,$c];
	$brr=[$a,$b,$c];
	
//	echo $arr[1][1];
//	echo $brr[0][1];
	
	$arr=[
		0=>['a','b','c'],
		1=>['x','y','z'],
		2=>['q','w','e']
	];
	echo $arr[2][2];
	
	$brr=['a','b','cde',['x','y','z']];
	
	var_dump($brr);

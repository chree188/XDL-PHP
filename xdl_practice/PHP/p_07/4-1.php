<?php	
	/* 二维数组及多维数组 */
	
	$a=['a','b','c'];
	$b=['x','y','z'];
	$c=['q','e','r'];
	
	$arr=[$a,$b,$c];
	$brr=[$a,$b,$c];
	
//	echo $arr[1][1];	// 二维数组中元素值的表示
	$arr=[
		0=>['a','b','c'],
		1=>['d','e','f'],
		2=>['g','h','i']
	];
	
//	echo $arr[2][1];

/*	$brr=['a','b','c',['x','y','z']];	//这样也行
	echo $brr[3][1];*/
	echo	'<pre>';
	print_r($arr);

	
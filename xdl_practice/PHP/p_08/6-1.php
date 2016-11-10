<?php	
	/* 其它函数 */
	
	$a=['a','b','c'];
	$b=['xiaowanzi','lufei','mingren'];
	
//	返回一个新数组，$a的值作为下标，$b的值作为值
	$arr=array_combine($a, $b);

	echo '<pre>';
	print_r($arr);
	
//	返回一个新数组，连接两个数组的元素
	$brr=array_merge($a,$b);
	print_r($brr);

<?php	
	/* 数组的遍历，每个元素都整一下 */
	
	$arr=['a','b','c','d'];
	
	//要打印出每一个元素
	foreach ($arr as $k => $v) {		//左边的变量为下标，右的变量为元素值
		echo $k.'======'.$v,'<br>';		//如果只有一变量，代表的是元素值
	}									//不管变量的名字是什么

	
	/* 改变原数组的值 */
	$brr=[108,7,10,88,50,23];
	foreach ($brr as $k => $v) {
		// $brr[$k]=$brr[$k]+1;
			$brr[$k]=$v+1;
		//$v++;
	}
	//$brr=[109,8,11,89,51,24];
	echo '<pre>';
	print_r($brr);
	
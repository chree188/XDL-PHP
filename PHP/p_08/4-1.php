<?php	
	/* 一位数组的排序 */
	
	$arr=[10,100,30,20,40,80,50,90,60,70,0,];
	
	echo '<pre>';
	
	sort($arr);	//小到大，即升序
	rsort($arr); //大到小，即降序
	
	$arr=['a'=>10,'d'=>92,'b'=>62,'c'=>38];
	asort($arr);	//保持关联  小到大
	arsort($arr);	//保持关联  大到小
	
	ksort($arr);	//保持关联  下标 小到大
	krsort($arr);	//保持关联  下标 大到小
	
	print_r($arr);
	

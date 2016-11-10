<?php
	/* explode  implode */
	
	$str='aa##bb##cc##dd';
	
//	以#为标志，把字符串拆分为一个数组
	$arr=explode('#', $str);
	/*echo '<pre>';
	print_r($arr);*/
	
//	用@把数组元素连接为一个字符串
	$brr=['a','b','c'];
	$str=implode('@', $brr);
//	echo $str;

//	求多个数的和
	function add(){
		$arr=func_get_args();
		$sum=0;
		foreach ($arr as $k => $v) {
			$sum+=$v;
		}
		return $sum;
	}
//	echo add(1,2,3,4,5,6,7,8,9,0);

	$str='I Love You';
	$str1='apple banana orange peach';
	echo strtolower($str),'<hr>';
	echo strtoupper($str),'<hr>';
	echo ucfirst($str1),'<hr>';
	echo ucwords($str1);
	
	
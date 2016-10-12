<?php	
	/* explode  implode */
	
	$str='aa##bb##cc##dd';
	
//	以#为标志，把字符串拆分为一个数组
	$arr=explode('#', $str);
//	echo '<pre>';
//	print_r($arr);

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
//	echo add(6,7,8,9,10);

	$str='I Love You';
	$str2='apple banana orange peach';
	echo strtolower($str),'<hr>';	//字母全部转为小写
	echo strtoupper($str),'<hr>';	//字母全部转为大写
	echo ucfirst($str2),'<hr>';		//语句首字母转为大写
	echo ucwords($str2);			//语句里每个单词首字母转为大写

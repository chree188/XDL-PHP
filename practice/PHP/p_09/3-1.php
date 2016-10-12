<?php	
	/*
	 * 正则表达式：次数
	 * {n} 修饰前面的原子，连续出现的次数
	 * {1,n} 最少1次，最多n次  最大优先
	 * {0,1} 0次 或 1次	？
	 * {1,} 1次 或 多次	+
	 * {0,} 0次 或 多次	*
	 * */
	 
//	 1.要匹配的内容
	$str="axaaxaaaxaaaax";
	
//	2.正则表达式
	$ptn="/a{2}/";	//a连续出现2次
	$ptn="/a{1,3}/";	//a连续出现1-3次
	$ptn="/a{0,1}/";	//0次或1次
	$ptn="/a?/";	//0次或1次
	$ptn="/a{1,}/";	//1次到无限次
	$ptn="/a+/";	//1次到无限次
	$ptn="/a{0,}/";	//0次到无限次
	$ptn="/a*/";	//0次到无限次
	
	
	
//	3.执行
	preg_match_all($ptn,$str,$arr);
	
//	4.看结果
	echo '<pre>';
	print_r($arr);
	
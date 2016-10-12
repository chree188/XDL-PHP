<?php	
	/* 正则表达式 */
	
//	1.要被匹配的内容
	$str='asdfasdfasdf';
//	$str='a1=b2=c3';
	
//	2.正则表达式
	$ptn='/a/';
	
//	3.用函数执行正则匹配
//	preg_match_all('正则', '在哪儿匹配','匹配结果存放的数组')
	preg_match_all($ptn,$str,$arr);
	
//	4.查看匹配结果
	echo '<pre>';
	print_r($arr);
	
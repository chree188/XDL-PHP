<?php	
	/* 正则表达式：分割 */
	
//	1.被匹配的字符串
	$str="23,425;67#849;08:716";
	
//	2.正则
	$ptn="/[,;#:]/";
	
//	3.执行
	$arr=preg_split($ptn, $str);
	
//	4.查看分割结果
	echo '<pre>';
	print_r($arr);
	
//	5.替换
	echo preg_replace($ptn, '=', $str);

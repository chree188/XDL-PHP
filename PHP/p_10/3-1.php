<?php	
	/* 正则表达式 */
		
//	1.被匹配的字符串
	$str="23,425;67#845;08:716";
	
//	2.正则匹配
	$ptn="/[,;#:]/";
	
//	3.执行
//	preg_split(以什么来分割, 分割谁);
//	$arr=preg_split($ptn, $str);
	
//	替换
	echo preg_replace($ptn, '=', $str);
	
//	4.看结果
//	echo '<pre>';
//	print_r($arr);
//	
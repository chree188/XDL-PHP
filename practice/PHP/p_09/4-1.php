<?php	
	/*
	 * 正则表达式：模式修正符
	 * i	忽略大小写
	 * s	让 . 可以匹配换行符
	 * */
	 
//	 1.要匹配的内容
	$str="axaax
aaaxAAAA";
	
//	2.正则表达式
	$ptn="/a+/i";	//ignore	无视大小写
	$ptn="/.+/is";	
	
//	3.执行
	preg_match_all($ptn,$str,$arr);
	
//	4.看结果
	echo '<pre>';
	print_r($arr);

<?php	
	
//	将下面的b标签换成i标签
	
//	1.要被匹配的字符串
	$str = "<b>a?aa</b><b>ccb>c</b><b>ddd</b>";
	
//	2.正则匹配
	$ptn="/<b>(.*?)<\/b>/";
	
//	3.执行输出
	echo preg_replace($ptn, '<i>$1</i>', $str);
	echo '<hr>';
	
	$str="2015-12-24";	//替换成：12/24/2015
	
	$ptn="/(\d{4})-(\d{2})-(\d{2})/";
	
	echo preg_replace($ptn, '$2/$3/$1', $str);	//可以是 \\3或$3

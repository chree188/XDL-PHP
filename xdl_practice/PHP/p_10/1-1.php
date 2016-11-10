<?php	
	/* 继续正则 */
	
//	1)匹配b标签中的所有内容
//	<b>a?aa</b>	<i>bbB#b</i>
//	<b>cc#c</b>
//	<b>ddd</b>

//	1.被匹配的字符串
	$str="<b>a?aa</b><i>bbB#b</i><b>cc#c</b><b>ddd</b>";
	
//	2.正则表达式
	$ptn="/<b>.*?<\/b>/";
	
//	3.执行匹配
	preg_match_all($ptn,$str,$arr);
	
//	4.查看匹配结果
	echo '<pre>';
	print_r($arr);
	
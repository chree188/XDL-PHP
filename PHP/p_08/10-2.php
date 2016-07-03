<?php	
	/* 网页输出格式化函数 */
	
//	1.在新行前面加<br/>
	$str="abc\r\ndef";
	echo nl2br($str);
	echo '<hr>';
	
//	2.把特殊符号转化为实体符
	$str="<b>qwer</b>";
	echo htmlspecialchars($str);
	echo '<hr>';
	
//	3.去掉字符串中的HTML标签
	echo strip_tags($str);
	
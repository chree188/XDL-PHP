<?php	
	/* 网页输出格式化函数 */
	
//	1.在新行前加<br/>
	$str="abc\r\ndef";
//	echo nl2br($str);
	
//	2.把特殊符号转为实体符
	$str="<b>abcd</b>";
//	echo htmlspecialchars($str);

//	3.去掉字符串中的html标签
	echo strip_tags($str);
	
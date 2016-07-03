<?php	
	/* 时间戳格式化 */
	
	date_default_timezone_set('PRC');	//设置时区
	
	echo date('Y年m月d日 h时i分s秒',time()),'<hr>';
	
	echo date('y年M月D日 H时i分s秒');
	
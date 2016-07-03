<?php	
	/*
	 * 程序中的时间戳
	 * 实际上是，距离某一时刻的秒数
	 * */
	 
	 date_default_timezone_set('PRC'); //设置时区(上海时间)
	 
//	 echo time();	//获取当前这一刻的时间戳，
	 				//即距离(格林尼治时间)1970-1-1 0:0:0的秒数
	
//	生成时间戳
	echo strtotime('-1 day'),'<br>';	//昨天的现在这一刻的时间戳
	echo time()-60*60*24,'<br>';
	
	echo mktime(11,52,08,6,30,2016);	//时分秒月日年
	
	echo '<hr><pre>';
	print_r(getdate());

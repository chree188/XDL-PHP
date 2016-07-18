<?php	
	
//	服务器被访问过多少次
	$num = file_get_contents("a.txt")+0;
	echo "页面被访问了{$num}次";
	$num++;
	file_put_contents("a.txt", $num);

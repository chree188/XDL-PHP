<?php	
//	接收表单上传的文件
	
	echo "<pre>";
	
//	1 文件上传 传过来的是一个多维array
//	2 使用超全局数组来接收 上传的文件
//	3 文件上传到临时目录 tmp 如果没有移动拿走 就直接丢弃
	
	print_r($_FILES);
	
//	print_r($_FILES['pic']);
//	sleep(5);
	
//	copy(源文件, 目标文件);

//	指定上传文件的复制  文件目录操作的函数	
//	copy($_FILES['pic']['tmp_name'], $_FILES['pic']['name']);
	
//	文件上传有自己专用的函数  剪切
//	目录名后面要打斜线
	move_uploaded_file($_FILES['pic']['tmp_name'], $_FILES['pic']['name']);
//	move 移动 upload上传 uploaded被上传的  已经上传的 file文件
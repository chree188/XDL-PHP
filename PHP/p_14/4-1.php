<?php	
//	完整的文件上传
//	1 上传的文件使用超全局数组 $_FILES来接收
//	2 接收到是文件式一个多维array
//	3 文件移动使用 move_uploaded_file(源文件, 目标文件);
//	4 文件上传之后有五个信息 name type tmp_name error size

//	1 设置参数
	$path="./uploads";

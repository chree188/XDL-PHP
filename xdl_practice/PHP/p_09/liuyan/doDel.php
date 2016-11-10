<?php	
	/*我负责删除留言*/
	
	$k=$_GET['k'];
	
	$str=file_get_contents('./msg.txt');	//把文件读出来
	
	$str=rtrim($str,'|#x#|'); 	//把最后一条记录的最后标志去掉
	
	$arr=explode('|#x#|', $str);	//拆分成一条一条的记录  数组
	
	unset($arr[$k]);
	
	$str=implode('|#x#|', $arr).'|#x#|';
	
	file_put_contents('./msg.txt', $str);
	
	echo '删除成功，3秒后跳转....';
	echo "<meta http-equiv='refresh' content='2,./show.php'>";
	
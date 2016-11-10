<?php	
	
	$_POST['ip']=$_SERVER['REMOTE_ADDR'];
	$str=implode('@@', $_POST).'|#x#|';
	
	file_put_contents('./msg.txt', $str,FILE_APPEND);
	
	echo '添加成功，3秒后跳转....';
	echo "<meta http-equiv='refresh' content='2,./index.php'/>";

<?php	
	
	$str=implode('@@', $_POST).'|#x#|';
	file_put_contents('./msg.txt', $str,FILE_APPEND);
	echo "<a href='./index.php'>添加成功</a>";

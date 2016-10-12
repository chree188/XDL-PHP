<?php	
//	file读取
	
//	fopen($filename, $mode)
//	fread($handle, $length) fgets() fgetc($handle) file($filename) readfile($filename) file_get_contents($filename) 多种读取的形式
//	fwrite($handle, $string) file_put_contents($filename, $data,[FILE_APPEND])
//	fclose($handle)

//	1 一次读取文件一个字符
	$f=fopen("11.txt", "r");
//	echo fread($f, 2);	//fread读取 后面需要传字符长度
//	echo fgetc($f);	//一次读取一个字符 	//char
//	while ($str=fgetc($f)) {
//		echo $str;
//	}		//字符全部读取



//	2 一次读取文件一行
//	echo fgets($f);	//f file get s string
//	while ($str=fgets($f)) {
//		echo $str."<br>";
//	}	//每行文件全部读取


//	3 整个文件类型读到数组里去
//	注意直接对文件进行操作
	echo "<pre>";
	$arr=file("11.txt");	//fopen+fread
	print_r($arr);
	
//	4 读取文件内容 打开 读取 输出全套
	readfile("11.txt");	//fopen+fread+echo
	
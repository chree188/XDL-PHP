<?php	

//	2.目录 读取目录里面的文件

//	1、目录路径
	$path="./mydir";	//给出mydir目录的路径
	
//	2、打开目录
	$dir=opendir($path);	//资源resource opendir(string 文件目录路径)
//	$dir1=opendir($path);

	var_dump($dir);		
	echo "<hr>";
	
	var_dump(readdir($dir));
	echo "<br>";
	echo readdir($dir);
	echo "<br>";
	echo readdir($dir);
	echo "<br>";
	echo readdir($dir);
	echo "<br>";
	echo readdir($dir);
	echo "<br>";
	echo readdir($dir);
	echo "<br>";
	echo readdir($dir);
	echo "<br>";
	echo "<hr>";
	echo "<hr>";
	rewind($dir);
	
	readdir($dir);
	readdir($dir);
	
	echo "<hr>";
	while (false !== ($f=readdir($dir))) {
		echo $f."<br>";
	}
	

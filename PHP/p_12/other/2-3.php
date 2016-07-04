<?php	
	
//	2.目录 读取目录里面的文件

//	1.目录路径
	$path="./mydir";//给出mydir目录的路径
	
//	2.打开目录
	$dir=opendir($path);//资源resouce opendir(string 文件目录路径)
//	$dir1=opendir($path);
	var_dump($dir);
	echo "<hr>";
//	var_dump($dir1);//两次打开返回的资源号是不一样的

//	3.读取目录里面的文件
	var_dump(readdir($dir));//字符串string readdir(资源);//读不到东西之后返回的是布尔值
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
	rewind($dir);//指针复位 //re返回 return wind风
//	var_dump(readdir($dir));
	
//	3.遍历目录里面的文件
	readdir($dir);
	readdir($dir);
//	var_dump($f=readdir($dir));
	echo "<hr>";
	while (FALSE !== ($f=readdir($dir))) {
//		屏蔽掉string "0" boolean为false的情况
		echo $f."<br>";
	}
	
//	FALSE boolean 7
//	int 0
//	float 0.0 0.00
//	string "" "0"
//	array array()
//	boolean false

//	4.关闭目录资源
	closedir($dir);
	var_dump($dir);

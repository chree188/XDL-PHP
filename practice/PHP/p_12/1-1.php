<?php	
	
//	1.文件路径和对路径的一些操作
//	$path="/path/work/a.txt";	//这是一个unix和linux的绝对路径	//路径的类型是字符串
//	$path="\\path\\work\\a.txt";	//这是windows的绝对路径的表示方式	// \表示转义
//	$path="D:\\PHP\\wamp64\\www\\PHP\\p_12\\1-1.php";
	$path="D:/PHP/wamp64/www/PHP/p_12/1-1.php";
	
	echo "原路径为：".$path."<br>";
	
	echo "读取文件名：".basename($path)."<br>";	//包含文件扩展名
	
	echo "路径名为：".dirname($path)."<br>";
	
	echo "<hr>";
	
	echo "读取文件名".pathinfo($path,PATHINFO_BASENAME)."<br>";//base基本的 基础的
	echo "读取路径名".pathinfo($path,PATHINFO_DIRNAME)."<br>";//dir目录
	echo "文件的后缀".pathinfo($path,PATHINFO_EXTENSION)."<br>";//extension扩展的
	echo "不带后缀的文件名".pathinfo($path,PATHINFO_FILENAME)."<br>";//file文件 name名字
	
//	echo "<pre>";
//	print_r(get_defined_constants());

//	获得当前文件的路径
//	windows文件和目录都不区分大小写	Linux分区区分大小写
	echo realpath("1-1.php");
	
	echo "<hr>";
	echo __FILE__;

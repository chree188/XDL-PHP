<?php	
	
//	1.文件路径和对路径的一些操作
	$path="D:/PHP/wamp64/www/PHP/p_12/1-2.php";
	
	echo "原路径为：".$path."<br>";
	echo "读取文件名：".basename($path)."<br>";
	echo "路径名为：".dirname($path)."<br>";
	echo "<hr>";
	
	echo "读取文件名：".pathinfo($path,PATHINFO_BASENAME)."<br>";//base基本的基础的
	echo "读取路径名：".pathinfo($path,PATHINFO_DIRNAME)."<br>";//dir目录
	echo "文件的后缀名".pathinfo($path,PATHINFO_EXTENSION)."<br>";//extension扩展的
	echo "不带后缀的文件名".pathinfo($path,PATHINFO_FILENAME)."<br>";//file文件 name名字
//	echo "<pre>";
//	print_r(get_defined_constants());
	
//	获得当前文件的路径
//	Windows文件和目录都不区分大小写 Linux区分大小写
	echo realpath("1-2.php");
	
	echo "<hr>";
	echo __FILE__;

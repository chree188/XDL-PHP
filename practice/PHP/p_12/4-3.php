<?php	
	
	//4 查看磁盘空间

	//这个是目录的层级
	// ./	当前文件的文件目录
	// ../ 当前文件的上层文件目录
	// /   磁盘跟目录 
	//绝对地址 绝对路径 windows unix
	
	// url地址中的绝对和相对 超链接
	// 绝对 http://
	// 相对 ./ ../

	//字符的大小

	// 1Byte = 8bit;//1字节 = 8个bit 位 
	// 1024Byte = 1KB;
	// 1024KB = 1MB;
	// 1024MB = 1GB;

	//查看跟目录的磁盘的情况 
//	echo disk_free_space("/")."字节";
	echo "当前磁盘空间剩余".(disk_free_space("/")/1024/1024/1024)."GB"."<br>";
	echo "当前磁盘总空间".(disk_total_space("/")/1024/1024/1024)."GB";
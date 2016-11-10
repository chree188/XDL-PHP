<?php
	//6 创建目录 删除目录 删除文件 

	//1 创建aa文件目录 
	// mkdir("./aa");// make   dir目录 directory
	//mkdir创建只能执行一次 如果存在报警告

	//2 创建aa目录下的bb目录
	// mkdir("./aa/bb"); //在没有aa目录的情况下 不能直接创建aa目录下面的bb

	//3 删除 aa目录下的bb目录
	// rmdir("./aa/bb");//remove移除 dir目录

	//4 删除aa目录
	// rmdir("./aa");//目录删除的时候只能删除空目录 

	//5 删除文件 
	// @unlink("./aa/1.txt");//删除aa目录下 1.txt文件  //删除一个不存在的文件会报warning
	//可以添加错误抑制符 
<?php	
//	文件的操作
	
//	对目录的操作
//	opendir(路径);	打开
//	readdir(资源);	读取
//	closedir(资源);	关闭

//	对文件的操作
//	1 打开文件获得一个资源 fopen(路径)
//	r read 只读	r+	write
//	w write 清空写	w+ read
//	a add	追加写	a+ read
//	x		创建写	x+ read


//	2 读取文件资源里面的内容 string fread(资源,int读取的字符长度);
//	3 往文件中写入内容 fwrite(资源,"写的内容");
//	4 关闭文件资源 fclose(资源);

//	1 r只读的方式打开文件
//	$f=fopen("a.txt", "r");
//		1 r read 只读的方式打开
//		2 文件不存在会报错 Warning

//	读取$f资源里面的两个字符的长度
//	echo fread($f,2);
	
//	2 r+读写的方式打开文件 +write加一个write
//	$f=fopen("a.txt", "r+");
//	内容 abcde
//	指针 01234
	
//	往资源$f里面写入字符串123
//	写的时候默认从头开始写
//	fwrite($f, "123");

//	echo fread($f, 2);
//	读的时候在当前指针的位置往下读取

//	3 w清空写的方式打开文件

//	$f=fopen("b.txt", "w");
//		1 以清空写的形式打开文件
//		2 文件里面有内容的话会被清空
//		3 每次打开的时候都会被清空
//		4 如果文件不存在会自动新建
//		5 清空写只发生在文件打开那一刻
//	fwrite($f, "aa");
//		内容 aa
//		指针 01 2
//		写完之后指针默认指向下一位
//	echo ftell($f);	//查看当前文件指针的位置
//	fwrite($f, "bb");
//	fwrite($f, "cc");
//	fwrite($f, "dd");
	
//	结果为 aabbcc
	
	
//	4 w+清空写的方式打开文件
//	$f=fopen("b.txt", "w+");

//	fwrite($f, "abc");
//		内容 abc
//		指针 012 3
//	echo ftell($f);	//当前指针指向3
//	echo fread($f, 2);
//	echo "<hr>";
//	rewind($f);	//指针重置
//	echo "读取到的2个字符为：".fread($f, 2);
//	echo "<hr>";
//	echo "当前指针的位置为：".ftell($f);	//当前指针指向2

//	5 a以追加写的形式打开
//	file_put_contents(, ,FILE_APPEND);	//类似这种追加写
//	$f=fopen("b.txt", "a");
	
//	fwrite($f, "xxoo");
//	1 每次写的时候指针指向最后
	
//	5 a+以追加写的形式打开
//	file_put_contents($filename, $data);  //类似这种追加写
//	$f=fopen("b.txt", "a+");
//	echo fread($f, 3);

//	echo "<br>";	
//	fwrite($f, "xxoo");
//	echo fread($f, 3);

//	6 x以创建写的方式打开
	@$f=fopen("b.txt", "x");
//	1 初次创建$f是一个资源 之后就是bool(false)
//	var_dump($f);
	fwrite($f, "123");
//	以创建的形式打开文件
//	适用于初次创建文件
	

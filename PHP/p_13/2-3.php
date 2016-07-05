<?php	
	file_put_contents("a.txt", "456");
//	将456写入a.txt文件内，没有则先创建该文件；每次运行写入会覆盖上次写入

	file_put_contents("a.txt", "789",FILE_APPEND);
//	FILE_APPEND在文件内容末尾接着写而不会覆盖原内容
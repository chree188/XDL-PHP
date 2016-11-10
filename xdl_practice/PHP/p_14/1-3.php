<?php	
//	文件复制
	
//	copy(源文件,目标文件);

	copy("../test.php", "test1.php");
	var_dump(copy("../test.php", "test1.php"));

//	var_dump(copy("../p_13", "./aa"));	//不能去复制目录
//	1 copy函数 只能复制文件 不能复制目录
<?php	
//	自定义复制函数
	
	function mycopy($file1,$file2){	//$file1源文件 $file2目标文件
		$f1=fopen($file1, "rb");	//源文件以只读的方式打开
		$f2=fopen($file2, "wb");	//目标文件已清空写的方式打开
		
//		rt t text  字符流			可以复制文本类型等
//		rb b binary	二进制  字节流	任意类型 通过二进制方式复制
		while ($str=fread($f1, 1024)) {	//源文件读取
//			1024 文件一次读取1024个字节  这个就是缓存
			fwrite($f2, $str);	//目标文件  写入
		}
		
		fclose($f1);
		fclose($f2);
	}
	
	mycopy("../p_11/images/3.jpg", "1.jpg");

<?php
	//1 文件类型 
	header("Content-Type:".$_GET['type']);

	//2 原文件名
	header("Content-Disposition:attachment;filename=".$_GET['oldname']);
	//attachment 附件 

	//3 文件大小 
	header("Content-Length:".$_GET['size']);

	//4 实现下载 
	readfile("./uploads/".$_GET['newname']);
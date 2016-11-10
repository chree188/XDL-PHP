<?php	

/*	$str='asdfasdfasdf';
	
	$ptn="/a/";
	
	preg_match_all($ptn, $str,$arr);
	
	echo '<pre>';
	print_r($arr);*/

	
	$str='a1=b2=c3';
	
	$ptn="/\d/"; //所以数字
	$ptn="/[a-zA-Z]/";	//所以字母
	$ptn="/\W/";	//所以特殊符号
//	$ptn="/[23]/";	//2或3
	
	preg_match_all($ptn, $str,$arr);
	
	echo '<pre>';
	print_r($arr);

<?php	
	
	$str = "<b>a?aa</b><b>ccb>c</b><b>ddd</b>";
	
	$ptn="/<b>(.*?)<\/b>/";
	
	echo preg_replace($ptn, '<i>$1</i>', $str);
	
	echo '<hr>';
	
	$str="2015-12-24";	//替换成：12/24/2015
	
	$ptn="/(\d{4})-(\d{2})-(\d{2})/";
	
	echo preg_replace($ptn, '$2/$3/$1', $str);

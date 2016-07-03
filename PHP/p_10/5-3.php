<?php	
	
	$str="<b>a?aa</b><b>ccb>c</b><b>ddd</b>";
	
	$ptn="/<b>(.*?)<\/b>/";
	
	echo preg_replace($ptn, '<i>$1</i>', $str);
	
	echo '<hr>';

	$str="2016-06-30";

	$ptn="/(\d{4})-(\d{2})-(\d{2})/";
	
	echo preg_replace($ptn, '$2/$3/$1', $str);

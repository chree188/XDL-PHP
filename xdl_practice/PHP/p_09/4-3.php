<?php	
	
	$str="axaaxaaax
	AAAA";
	
	$ptn="/a+/i";
	$ptn="/.+/is";
		
	preg_match_all($ptn,$str,$arr);
	
	echo '<pre>';
	print_r($arr);

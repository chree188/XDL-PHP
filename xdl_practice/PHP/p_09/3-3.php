<?php	
	
	$str='axaaxaaaxaaaaxaaaaax';
	
	$ptn="/a{2}/";
	$ptn="/a{1,3}/";
	$ptn="/a{0,1}/";
	$ptn="/a?/";
	$ptn="/a{1,}/";	
	$ptn="/a+/";
	$ptn="/a{0,}/";
	$ptn="/a*/";
	
	preg_match_all($ptn,$str,$arr);
	
	echo '<pre>';
	print_r($arr);

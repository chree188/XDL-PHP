<?php	

	$arr=['a','b','c','d'];
	
	foreach ($arr as $k => $v) {
		echo $k.'======'.$v,'<br>';
	}
	
	$brr=[110,120,119,112,114];
	foreach ($brr as $k => $v) {
		$brr[$k]=$v+1;
	}
	
	echo '<pre>';
	print_r($brr);

<?php
	
//	1-100的和
	
	$sum =0;
	for ($i=1; $i <=100 ; $i++) { 
		if($i%2==0)
		$sum += $i;
	}
	echo $sum;
	
	echo '<br/>';
	
	for ($j=0, $s =0; $j <=100 ; $j+=2) { 
		$s += $j;
	}
	echo $s;
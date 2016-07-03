<?php	
	
	echo time(),'<br>';
	$a=10;
	$b=5;
	echo '<pre>';
	$n=count(range(1, 99999));
	echo microtime(TRUE),'<br>';
	for ($i=1; $i < $n; $i++) { 
		$b=$a;
	}
	echo microtime(TRUE);
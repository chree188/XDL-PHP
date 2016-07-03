<?php	
	/* microtime(true) 微秒 */
	
	echo time(),'<br>';
	$a=10;$b=5;
	echo '<pre>';
	$arr=range(1, 99999);
//	print_r($arr);die;
	$n=count($arr);
	echo microtime(TRUE),'<br>';
		for ($i=1; $i < $n; $i++) { 
			$b=$a;
		}
	echo microtime(TRUE);
	
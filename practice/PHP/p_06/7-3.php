<?php	
	function test($n){
		echo $n,'<br>';
		if($n>1){
			test($n-1);
		}
		echo $n,'<br>';
	}
	test(10);

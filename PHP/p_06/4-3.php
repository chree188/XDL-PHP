<?php	
	/*引用传值*/
	
	function fun1(&$a){		//在形参前面加上&
		$a++;
		echo $a;
	}
	
	$b=100;
	fun1($b);
	
	echo $b;

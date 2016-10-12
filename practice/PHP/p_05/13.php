<?php
	header('Content-type:text/html;charset=utf-8');

	for ($i=1; $i <= 9; $i++) {
		for ($j=1; $j <= $i; $j++) { 
			echo "$j * $i =" .$j*$i ."&nbsp";
		} 
		echo '<br>';
	}
	echo '<br>';
	
	$a=0;
	while ($a>=0 && $a <9) {
		$a++;
		for ($b=1; $b <= $a ; $b++) { 
			echo "$b * $a =" .$b*$a ."&nbsp";
		}
		echo '<br>';
	}
	echo '<br>';
	
	$c=0;
	do{
		$c++;
		for ($d=1; $d <= $c ; $d++) { 
			echo "$d * $c =" .$d*$c ."&nbsp";
		}
		echo '<br>';
	}while($c>=0 && $c <9);

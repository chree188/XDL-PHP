<?php
	for ($i=1; $i <=9 ; $i++) { 
		for ($j=1; $j <=$i ; $j++) { 
			echo $j.'X'.$i.'='.$j*$i.'&nbsp;';
		}
		echo '<br/>';
	}
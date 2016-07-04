<?php	
	
	$sum=0;
	for ($i=0; $i < 10; $i++) { 
		$sum +=$i;
	}
	
	echo $sum;
	echo "<hr>";
	
	
	$path="./mydir";
	
	$dir=opendir($path);
	
	$sum=0;
	
	while (FALSE !==($f=readdir($dir))) {
		if($f=="."||$f==".."){
			continue;
		}
		
		$ff=rtrim($path,"/")."/".$f;
		$sum+=filesize($ff);
		
	}
	
	echo $sum;
	
	
	closedir($dir);
	
	echo "<hr>";
	
	
	
	function dirsize($path){
		
		$dir=opendir($path);
		
		
	}

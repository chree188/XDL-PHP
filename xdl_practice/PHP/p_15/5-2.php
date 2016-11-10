<?php

	echo "<hr>";
	foreach($_FILES['pic']['name'] as $k=>$v){
		echo $k."=>".$v."<br>";
		$arr[$k]['name'] = $v;
		$arr[$k]['type'] = $_FILES['pic']['type'][$k];
	}
	echo "<hr>";
	print_r($arr);

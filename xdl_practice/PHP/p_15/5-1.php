<?php
	//查看三维数组的处理 
	// echo "<pre>";
	// print_r($_FILES);

	echo "<hr>";
	//三维数组的遍历
		// $_FILES['pic']['name']是一个一维数组 
	foreach($_FILES['pic']['name'] as $k=>$v){
		//1 普通的遍历方式 
		echo $k."=>".$v."<br>";

		//2 数组遍历的同时 实现新数组的赋值 
		$arr[$k]['name'] = $v;
		$arr[$k]['type'] = $_FILES['pic']['type'][$k];

	}
	echo "<hr>";
	print_r($arr);
	// $arr = array(10,20,30);
	// $arr[] = 40;
	// print_r($arr);

	// 数数组的维数3种方式
	// array
	// [][]
	// =>

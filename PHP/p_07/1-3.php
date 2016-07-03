<?php	
	/* 定义数组的三种方式 */
	
	//1.通过下标
	$arr[]='a';
	$arr[4]='b';
	$arr[]='c';
	
	//2.[]php版本>=5.4
	$arr=['a','b','c','d'];
	echo $arr[3];	//d
	
	//3.array
	$arr=array('a','b','c','d');
	echo $arr[2];	//b
	
	//分类：索引数组	关联数组
	$arr=[
		'name'=>'zhengwentao',
		'sex'=>'man',
		'age'=>'18'
	];
	
	echo $arr['name'];

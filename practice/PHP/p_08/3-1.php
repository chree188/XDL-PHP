<?php	
	/* 二维数组的排序 */
	
	$stu=[
		0=>['name'=>'张三','age'=>20,'sex'=>'女'],
		1=>['name'=>'李四','age'=>21,'sex'=>'男'],
		2=>['name'=>'王五','age'=>22,'sex'=>'女'],
		3=>['name'=>'赵六','age'=>23,'sex'=>'男'],
	];
	
//	1.你要对谁排序  2.用哪个函数

	usort($stu,'px');
	
	function px($a,$b){
		if($a['age']<$b['age']){return -1;}
		if($a['age']==$b['age']){return 0;}
		if($a['age']>$b['age']){return 1;}
	}
	
	echo '<pre>';
	print_r($stu);
	
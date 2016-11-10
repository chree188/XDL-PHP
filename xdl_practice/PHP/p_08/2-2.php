<?php	
	/* 数组过滤，留女不留男 */
	
	$stu=[
		0=>['name'=>'张三','age'=>20,'sex'=>'女'],
		1=>['name'=>'李四','age'=>21,'sex'=>'男'],
		2=>['name'=>'王五','age'=>22,'sex'=>'女'],
		3=>['name'=>'赵六','age'=>23,'sex'=>'男'],
	];
	
	$arr=[];
	foreach ($stu as $k => $v) {
		if($v['sex']=='女'){
			$arr[]=$v;
		}
	}
	
	echo '<pre>';
	print_r($arr);

<?php	
	/* 为数组中每行记录添加一项 'height'=>178 */
	$arr=[
		0=>['name'=>'张三','sex'=>'男','age'=>24],
		1=>['name'=>'李四','sex'=>'女','age'=>23],
		2=>['name'=>'王五','sex'=>'男','age'=>25],
		2=>['name'=>'赵六','sex'=>'女','age'=>21]
	];
	
	foreach ($arr as $k => $v) {
		$arr[$k]['height']=178;
	}
	
	echo '<pre>';
	print_r($arr);

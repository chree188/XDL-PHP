<?php	
	/* 往数组中添加一个属性 */
	
	$cart=[
		['gname'=>'香皂','price'=>10,'cnt'=>5],
		['gname'=>'肥皂','price'=>5,'cnt'=>3],
		['gname'=>'透明皂','price'=>7,'cnt'=>1]
	];
	
	foreach ($cart as $k => $v) {
		$cart[$k]['rmb']=$v['price']*$v['cnt'];
	}

	echo '<pre>';
	print_r($cart);

<?php	
	
	$a = function(){echo '说好的匿名函数呢？';};
	
	function xxoo(){
		$x = '杭州';
		
		// use($x) 是指在匿名函数内部使用其父亲的变量$x
		$a = function()use($x){echo '我在'.$x;};
		return $a;	//把存有函数的变量，返回
	}
	
	$z = xxoo();
	$z();

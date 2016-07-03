<?php	
	/*匿名函数，又称为闭包函数
	函数定义最后，要加上分号*/
	
	$a = function(){
		echo '说好的匿名函数呢？';
	};
	
	function xxoo(){
		$x = '北京';
		
//		use() 是指在匿名函数内部使用其父亲的变量$x
		$a = function()use($x){
			echo '我在' .$x;
		};
		return $a;
	}
	
	$z = xxoo();
	
	$z();	//调用 函数xxoo中的函数
	
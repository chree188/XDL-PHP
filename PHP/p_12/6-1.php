<?php	
//	函数代码执行情况
//	1.函数执行完之后回到调用处
	
	function fun(){
		return 1;
	}
	
	echo fun();
	
	echo "<br>";
	echo 234;
	echo "<hr>";
	
//	递归函数 自己调用自己
//	一定要有循环终止条件 不然就死循环
	function demo($m){
		echo $m."";//递
		if($m>-50){
			demo($m-1);
		}
		echo $m."";//归
	}
	
	demo(3);

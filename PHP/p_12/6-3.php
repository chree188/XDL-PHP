<?php	
//	函数代码执行情况
//		1.函数执行完之后回到调用处
	
	function fun(){
		return 1;
	}
	
	echo fun();
	echo 234;
	echo "<hr>";
	
//	递归函数 自己调用自己
//	一定要有循环终止条件 不然就死循环
	function demo($m){
		echo $m."","<br>";//递
		if($m>1){
			demo($m-1);
		}
		echo $m."","<br>";//归
	}
	
	demo(10);

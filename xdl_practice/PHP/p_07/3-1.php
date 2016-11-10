<?php	
	/* 其它三种遍历 */
	
	$arr = [
		'name'=>'zhengwentao',
		'sex'=>'man',
		'age'=>'23',
		'height'=>'170'
	];
	$arr=['a','b',5=>'c','d','e','f','g','h','xxoo'];
//	$brr=array_values($arr);

	echo '<pre>';
//	print_r($brr);die;
	$n=count($arr);
//	2.用for循环，遍历数组
	/*for ($i=0; $i < $n; $i++) { 
		echo $brr[$i],'<br>';
	}*/
	
//	3.list each 遍历
	/*$arr = ['a','b',5=>'c','d','e','f','g','h','xxoo'];
	while(list($k,$v)=each($arr)){
		echo $k.'===='.$v,'<br>';
	}*/
	

		/*next($arr)	数组的下一个元素
		prev()	上一个元素
		current()	指针指向的位置上 的值
		key()	指针指向的位置上 的下标
		reset()	把指针指向开头
		end()	把指针指向结尾*/
		
//	$arr = ['a','b',5=>'c','d','e','f','g','h','xxoo'];
	reset($arr);
	do{
		echo '下标：'.key($arr).'===='.'元素值：'.current($arr	);
		echo '<br>';
	}while(next($arr));

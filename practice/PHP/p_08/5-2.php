<?php	
	/* 其它数组函数 */
	
//	1.是否在数组中
	$arr=['a','b','b','c','d','e','f'];
	
//	var_dump(in_array('c', $arr));

	echo '<pre>';
//	unset($arr[1]); //数组元素可以通过unset销毁
//  unset($arr[2]);

//    2.下标to值  值to下标，值重复的时候，后面覆盖前面
//  print_r(array_flip($arr));

//    3.在数组中找特定值，如果找到，返回下标
// var_dump(array_search('b',$arr));

//	4.使数组元素值唯一，去除重复的值，如果值重复取先出现的
//	print_r(array_unique($arr));
	
//	5.随机打乱数组顺序
//	shuffle($arr);
//	print_r($arr);

//	6.从原数组中取一段，1)数组   2)起点   3)长度
	/*$brr=array_slice($arr, 2,3);
	print_r($brr);*/
	
//	7.1)数组  2)起点  3)长度  4)用作替换的数组  原数组被改变  返回被替换的数组
	$brr=array_splice($arr,1,2,['x','y','z']);
	print_r($arr);
	
<?php
/*
 函数
 1)一段有名字的可以被重复调用的具有功能的代码块.
 2)有这个函数了,不会执行,调用才会执行
 3)加载文件时,提前被加载到内存,所以调用可以在定义之前
 4)函数名字不区分大小写,但尽量保持一致
 */

// mktable();
mktable(5, 7);
// 这两个5称为实参, 实际调用时给的参数
// 再调用的时候, 有这样的操作 $rows = 5  $cols=7

mktable(2);
// 只有一实参,它会赋值给第一个 形参

// mktable();

function mktable($rows, $cols = 3)//定义函数时,小括号中写的为默认值
{
	// $rows  $cols 函数定义中的参数,称为形式参数,简称形参
	// 有默认值的形参,要写到参数列表后面

	// $rows=5;  //代表行
	// $cols=8;  //代表列
	echo '<table border=1>';
	for ($i = 1; $i <= $rows; $i++) {
		echo '<tr>';
		for ($j = 1; $j <= $cols; $j++) {
			echo '<td>';
			echo 'xxoo';
			echo '</td>';
		}
		echo '</tr>';
	}
	echo '</table>';
}

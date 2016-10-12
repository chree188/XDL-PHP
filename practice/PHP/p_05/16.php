<?php

//不适用
/*for ($i = 1; $i <= 45; $i++) {
 if ($i < 10) {
 $i = '0' . $i;
 }
 if ($i % 10 == 0) {
 echo $i . '<br>';
 } else {
 echo $i . '&nbsp;';
 }
 }
 */

//正确的打开方式

$a = 1;
//控制从哪个数字开始
$num = 36;
//控制结尾数字
$cols = 6;
//控制列数
$rows = ceil($num / $cols);
//随数字大小变动的行数
for ($i = 1; $i <= $rows; $i++) {
	for ($j = 1; $j <= $cols; $j++) {
		if ($a <= $num) {
			//if($a<10) $a = '0'.$a;
			$a = str_pad($a, 2, '0', STR_PAD_LEFT);
			if ($j == $cols) {
				echo $a . "<br>";
			} else {
				echo $a . "&nbsp;";
			}
			$a++;
		}
	}
}

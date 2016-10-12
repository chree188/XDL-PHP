<?php
	header('Content-type:text/html;charset=utf-8');

$sum = 0;
for ($i = 1; $i <= 50; $i++) {
	if ($i % 2 == 0) {
		echo $i . '&nbsp';
		$sum += $i;
	}
}
echo "<br>";
echo $sum;

echo "<br>";

$s = 0;
$a = 1;
while ($a >= 1 && $a <= 50) {
	$a++;
	if ($a % 2 == 0) {
		echo $a . '&nbsp';
		$s += $a;
	}
}
echo "<br>";
echo $s;

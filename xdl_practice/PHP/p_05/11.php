<?php
header('Content-type:text/html;charset=utf-8');

for ($i = 10; $i <= 20; $i++) {
	echo $i . "&nbsp";
}
echo "<br>";

$a = 9;
while ($a >= 9 && $a < 20) {
	$a++;
	echo $a ."&nbsp";
}
echo "<br>";

$b = 9;
do{
	$b++;
	echo $b ."&nbsp";
}while($b >= 9 && $b < 20);

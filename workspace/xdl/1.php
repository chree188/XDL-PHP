<?php
$a = 100;
function xxoo() {
	$a = 10;
	global $a;
	echo $a;
}
echo xxoo ();

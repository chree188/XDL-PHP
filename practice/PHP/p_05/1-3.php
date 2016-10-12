<?php
/* 星星 */
for ($i = 1; $i <= 9; $i++) {
	for ($j = 1; $j < $i; $j++) {
		echo '&ensp;';
	}
	for ($k = 1; $k <= (9 - $i); $k++) {
		echo 'a';
	}
	echo '<br/>';
}

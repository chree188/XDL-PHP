<?php

mktable(5, 7);
mktable(2);

function mktable($rows, $cols = 3) {
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

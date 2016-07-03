<?php	
	
	$str="<ul>
		  	<li><a href='http://localhost/a.php'>关于我们</a></li>
		  	<li><a href='http://localhost/b.php'>加入我们</a></li>
		  	<li><a href='http://localhost/c.php'>供应商计划</a></li>
		  </ul>";
		  
	$ptn="/<a href\=\'(.*?)\'>(.*?)<\/a>/";
	
	preg_match_all($ptn,$str,$arr);
	
	echo '<pre>';
	print_r($arr);
	
	echo "<table border=1 width=400>";
		foreach ($arr[1] as $k => $v) {
			echo "<tr>";
				echo '<td>'.$arr[1][$k].'</td>';
				echo '<td>'.$arr[2][$k].'</td>';
			echo "</tr>";
		}
	echo "</table>";

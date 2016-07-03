<?php	
	/*
	 * 	要href部分，要 关于我们
	 * */
	 
//	 1.被匹配的字符串
	$str="<ul>
		  	<li><a href='http://localhost/a.php'>关于我们</a></li>
		  	<li><a href='http://localhost/b.php'>加入我们</a></li>
		  	<li><a href='http://localhost/c.php'>供应商计划</a></li>
		  </ul>";
		  
//	2.正则表达式
	$ptn="/<a href=\'(.*?)\'>(.*?)<\/a>/";
	
//	3.执行正则表达式
	preg_match_all($ptn,$str,$arr);
	
//	4.查看正则匹配结果
	echo '<pre>';
	print_r($arr);
	
	echo '<table border=1 width=400>';
		foreach ($arr[1] as $k => $v) {
			echo "<tr>";
				echo '<td>'.$arr[1][$k].'</td>';
				echo '<td>'.$arr[2][$k].'</td>';
			echo "</tr>";
		}
	echo '</table>';
	
<style>
	td{text-align: center;}
</style>
<?php	
	
	$year=empty($_GET['year']) ? date('Y') : $_GET['year'];
	$mon=empty($_GET['mon']) ? date('m') :	$_GET['mon'];
	
	$timestamp=mktime(7,7,7,$mon,1,$year);	//得到年份月份中1号那天的时间戳
	
	$week=date('w',$timestamp);	//得到年份月份的1号是周几
	
	$days=date('t',$timestamp);	//这个相应的月份 总共有多少天
	
	echo "<center>
		<h2>简 单 日 历</h2>
		<h3>{$year}年{$mon}月</h3>
	</center>";
	
	echo "<table border=1 width=500 align=center>";
		echo "<tr>
			<th>星期日</th>
			<th>星期一</th>
			<th>星期二</th>
			<th>星期三</th>
			<th>星期四</th>
			<th>星期五</th>
			<th>星期六</th>
		</tr>";
		$num=1;
		for ($i=0; $i < 6; $i++) { 	//负责6行
			echo "<tr>";
				for ($j=0; $j < 7; $j++) { 	//负责7个单元格
					if($num<=$week || $num>($days+$week)){
						echo '<td>'.'&nbsp;'.'</td>';
					}else{
						echo '<td>'.($num-$week).'</td>';
					}
					$num++;
				}	
			echo "</tr>";
		}
	echo "</table>";
	
//	先想美好的，不考虑边界
	$prevYear=$year;
	$nextYear=$year;
	
	$prevMon=$mon-1;
	$nextMon=$mon+1;
	
//	再考虑，如果的特殊情况怎么办
	if($mon>=12){
		$nextMon=1;
		$nextYear=$year+1;
	}
	
	if($mon<=1){
		$prevMon=12;
		$prevYear=$year-1;
	}
	
	echo "<br><center>
		<a href='./1-1.php?year={$prevYear}&mon={$prevMon}'>上一月</a>
		<a href='./1-1.php?year={$nextYear}&mon={$nextMon}'>下一月</a>
	</center>";

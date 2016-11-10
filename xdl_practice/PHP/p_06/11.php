<?php

	printTable(15,6,400,1,8);
	function printTable($rows,$cols,$width,$border,$content){
		/*$rows=10;//行数
		$cols=5;//列数
		$width=400;//表格宽度
		$border=1;//表格边框宽度
		$content='a';//单元格的内容*/
		
		echo "<table border=$border width=$width >";
			for($i=1;$i<=$rows;$i++){
					echo '<tr>';

				for($j=1;$j<=$cols;$j++){
					echo '<td>';
						echo $content;
					    '</td>';
				}
				echo '</tr>';
			}
		echo '</table>';
	}

	
	/*function table($a,$cols,$width,$border,$height){
	echo '<table width='.$width.' border='.$border.'>';
		for($i=1;$i<=$a;$i++){
			echo "<tr>";
				for($j=1;$j<=$cols;$j++){
					echo "<td height=".$height.">aaa</td>";
				}
			echo "</tr>";
		}
	echo "</table>";
	}*/
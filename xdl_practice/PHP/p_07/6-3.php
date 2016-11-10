<?php
$arr = [
        0=>['name'=>'张三','sex'=>'男','age'=>24],
        1=>['name'=>'李四','sex'=>'女','age'=>23],
        2=>['name'=>'王五','sex'=>'男','age'=>29],
        3=>['name'=>'赵六','sex'=>'女','age'=>26],
    ];
	
	
	echo '<table border=1 width=300px align=center>';
		foreach($arr as $k=>$v){
			echo '<tr>';
				echo '<td>',$v['name'],'</td>';
				echo '<td>',$v['sex'],'</td>';
				echo '<td>',$v['age'],'</td>';
				echo '<td>',$arr[$k]['height']=178;'</td>';
			echo '</tr>';
		}
	
	echo '</table>';
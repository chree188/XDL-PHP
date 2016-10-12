<?php	
	/* 二维数组的遍历 */
	
	$arr=[
		['a','b','c'],
		['x','y','z'],
		['q','w','e','r']
	];
	
	foreach ($arr as $k => $v) {
		foreach ($v as $kk => $vv) {
			echo $vv.' ';
		}
		echo '<br>';
	}
	
	$arr=[
		0=>['name'=>'张三','sex'=>'男','age'=>24],
		1=>['name'=>'李四','sex'=>'女','age'=>23],
		2=>['name'=>'王五','sex'=>'男','age'=>29],
		3=>['name'=>'赵六','sex'=>'女','age'=>25]
	];
//	echo '<pre>';
//	print_r($arr[2]);

	echo '<table border=1 width=300 align=center>';
		echo '<tr>';
			echo '<th>姓名</th>';
			echo '<th>性别</th>';
			echo '<th>年龄</th>';
		echo '</tr>';
		foreach ($arr as $k => $v) {
			echo '<tr>';
				echo '<td>'.$v['name'].'</td>';
				echo '<td>'.$v['sex'].'</td>';
				echo '<td>'.$v['age'].'</td>';
			echo '</tr>';
		}
	echo '</table>';
	
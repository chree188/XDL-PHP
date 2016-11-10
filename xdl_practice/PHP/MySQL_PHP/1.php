<?php	
	
	
	$link=mysqli_connect("localhost","root","zwt12345","s50") or die("数据库连接失败");
	mysqli_set_charset($link,"utf8");	
	
	$sql = "select * from s50";
	$result = mysqli_query($link, $sql);
	
	$sex=array('man'=>'男','woman'=>'女');
	echo "<table border=1 width=400>";
		echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>姓名</th>";
			echo "<th>性别</th>";
			echo "<th>年龄</th>";
			echo "<th>祖籍</th>";
		echo "</tr>";
		
	while($list = mysqli_fetch_assoc($result)){
		echo "<tr>";
			echo "<td>{$list['id']}</td>";
			echo "<td>{$list['name']}</td>";
			echo "<td>{$sex[$list['sex']]}</td>";
			echo "<td>{$list['age']}</td>";
			echo "<td>{$list['province']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	
    mysqli_close($link);
	mysqli_free_result($result);
	
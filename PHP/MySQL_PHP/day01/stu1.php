<?php   
//	1 php连接数据库
    $mysqli=mysqli_connect("localhost","root","zwt12345","php") or die("数据库连接失败"); 

//	2 select查询
	$sql = "select * from stu where sex = 'm'";
	
//	3 数据库执行 获得结果集
	$result = mysqli_query($mysqli, $sql);
	
	$sex=array('m'=>'男','w'=>'女');
	echo "<table border=1 width=400>";
		echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>姓名</th>";
			echo "<th>年龄</th>";
			echo "<th>性别</th>";
			echo "<th>班级</th>";
		echo "</tr>";
		
//	4 解析结果集
	while($list = mysqli_fetch_assoc($result)){
		echo "<tr>";
			echo "<td>{$list['id']}</td>";
			echo "<td>{$list['name']}</td>";
			echo "<td>{$list['age']}</td>";
			echo "<td>{$sex[$list['sex']]}</td>";
			echo "<td>{$list['classid']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	
//	5 关闭数据库 
    mysqli_close($mysqli);
//	6 释放结果集
	mysqli_free_result($result);

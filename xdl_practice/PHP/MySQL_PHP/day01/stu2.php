<?php	
//	六脉神剑
	
//	1 导入配置文件
	include("dbconfig.php");
	
//	2 连接数据库
	$link = @mysqli_connect(HOST, USER, PASS) or die("数据库连接失败");
//	echo "<pre>";
//	var_dump($link);
	
//	3 选择数据库 设置字符集
	mysqli_select_db($link, DBNAME);		//选择PHP库
	mysqli_set_charset($link, "utf8");
	
//	4 写sql语句 [执行操作]获得结果集
	$sql = "select * from stu";		//sql查询语句
	$result = mysqli_query($link, $sql);	//执行查询语句 获得结果集
	
//	5 解析结果集
//	输出表格
	$sex=array('m'=>'男','w'=>'女');
	echo "<table border=1 width=400>";
		echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>姓名</th>";
			echo "<th>年龄</th>";
			echo "<th>性别</th>";
			echo "<th>班级</th>";
		echo "</tr>";
	while($list = mysqli_fetch_assoc($result)){		//解析结果集
		echo "<tr>";
			echo "<td>{$list['id']}</td>";
			echo "<td>{$list['name']}</td>";
			echo "<td>{$list['age']}</td>";
			echo "<td>{$sex[$list['sex']]}</td>";
			echo "<td>{$list['classid']}</td>";
		echo "</tr>";
	}
	echo "</table>";
	
//	6 关闭数据库 释放结果集
	mysqli_close($link);
	mysqli_free_result($result);
	
	
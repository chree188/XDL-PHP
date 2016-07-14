<?php	
//	php连接数据库 六脉神剑
	
//	1 导入配置文件
//	include('dbconfig.php');
	include "dbconfig.php";	//两种导入的书写形式都可以
	
//	2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS);
//	$link = @mysqli_connect(HOST,USER,PASS,DBNAME);
//	$link 是一个连接的对象
	echo "<pre>";
//	var_dump($link);  //连接成功的时候返回一个连接对象 失败的时候返回bool值 false
	if(!$link){
		exit('数据库连接失败，错误号为：'.mysqli_connect_errno().'错误信息为：'.mysqli_connect_error());
//		errno 错误号	error 错误信息
	}
	
//	3 选择数据库  设置字符集
	mysqli_select_db($link, DBNAME);
	mysqli_set_charset($link, 'utf8');
	
//	4 写sql语句 获得结果集
	$sql = "select * from stu";
	$result = mysqli_query($link,$sql);
	
//	5 解析结果集
//	输出到表格中
	$sex = array('m'=>'男','w'=>'女');
	echo "<table width=600 border=1>";
		echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>姓名</th>";
			echo "<th>年龄</th>";
			echo "<th>性别</th>";
			echo "<th>班级</th>";
		echo "</tr>";
		
		while($row = mysqli_fetch_assoc($result)){
//			print_r($row);
//			echo "<br>";
			echo "<tr>";
				echo "<td>{$row['id']}</td>";
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['age']}</td>";
				echo "<td>{$sex[$row['sex']]}</td>";
				echo "<td>{$row['classid']}</td>";
			echo "</tr>";
		}
	echo "</table>";
	
//	6 关闭数据库 释放结果集
	mysqli_close($link);
	mysqli_free_result($result);
	
	

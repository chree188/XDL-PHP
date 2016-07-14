<?php	
//	mysql语句的5处理结果集
//	php连接数据库
	
//	1 导入配置文件
	include('dbconfig.php');
	
//	2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
	
//	3 选择数据库 设置字符集	
	mysqli_select_db($link, DBNAME);
	mysqli_set_charset($link, "utf8");
	
//	4 写sql语句 获得结果集
//	$sql = "select * from stu";
	$sql = "select id,name from stu";
	$result = mysqli_query($link, $sql);
	
//	5 解析结果集
	echo "<pre>";
	var_dump($result);
	
	echo "查询的结果一共有".mysqli_num_rows($result)."条数据";
	echo "<hr>";
	echo "查询的结果一共有".mysqli_num_fields($result)."个字段";
	
//	6 关闭数据库 释放结果集
	mysqli_close($link);
	mysqli_free_result($result);
	
	

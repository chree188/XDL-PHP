<?php	
	
//	mysql语句的  解析结果集
//	php 连接数据库
	
//	1 导入配置文件
	include("dbconfig.php");
	
//	2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败！！！");
	
//	3 选择数据库 设置字符集
	mysqli_select_db($link,DBNAME);
	mysqli_set_charset($link, "utf8");
	
	echo "<pre>";
//	4 写sql语句 霍德尔结果集
	$sql = "select * from stu";
	$result = mysqli_query($link,$sql);
	
//	5 解析结果集
	echo "<h2>1 使用mysqli_fetch_array解析：索引和关联数组</h2>";
	$row = mysqli_fetch_array($result);
	print_r($row);

	echo "<h2>2 使用mysqli_fetch_assoc解析：关联数组</h2>";
	$row = mysqli_fetch_assoc($result);
	print_r($row);
	
	echo "<h2>3 使用mysqli_fetch_row解析：索引数组</h2>";
	$row = mysqli_fetch_row($result);
	print_r($row);
	
	echo "<h2>4 使用mysqli_fetch_array解析：索引数组</h2>";
	$row = mysqli_fetch_array($result,MYSQL_NUM);
	print_r($row);
	
	echo "<h2>5 使用mysqli_fetch_array解析：关联数组</h2>";
	$row = mysqli_fetch_array($result,MYSQL_ASSOC);
	print_r($row);
	
	echo "<h2>6 使用mysqli_fetch_array解析：索引和关联数组</h2>";
	$row = mysqli_fetch_array($result, MYSQL_BOTH);
	print_r($row);
	
	echo "<h2>7 使用mysqli_fetch_object解析：索引和关联数组</h2>";
	$row = mysqli_fetch_object($result);
	print_r($row);	//当前$row是一个对象
	echo $row->name;	//输出当前对象的属性 name的值
	
//	6 关闭数据库释放结果集
	mysqli_close($link);
	mysqli_free_result($result);

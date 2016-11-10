<?php	
//	六脉神剑
	
//	1 导入配置文件
	include('dbconfig.php');
	
//	2 连接数据库
	$link = @mysqli_connect(HOST, USER, PASS) or die("数据库连接失败");
	echo "<pre>";
//	var_dump($link);
	
//	3 选择数据库 设置字符集
	mysqli_select_db($link, DBNAME);
	mysqli_set_charset($link, "utf8");
	
//	4 写sql语句 [执行操作] 获得结果集
	$sql = "select * from stu";
	$result = mysqli_query($link, $sql);
	
//	5 解析结果集
	while($list = mysqli_fetch_assoc($result)){
		print_r($list);
		echo "<br>";
	}
	
//	6 关闭数据库 释放结果集
	mysqli_close($link);
	mysqli_free_result($result);

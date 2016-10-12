<?php	
	
//	mysql语句的 2 错误信息
//	php连接数据库
	
//	1 导入配置文件
	include('dbconfig.php');
	
//	2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
	
//	3 选择数据库 设置字符集
	mysqli_select_db($link, DBNAME);
	mysqli_set_charset($link, 'utf8');
	
//	4 写sql语句  获得结果集
//	$sql = "select * from stu";	//正确的查询语句
	$sql = "select * form stu";	//错误的查询语句
	
//	$sql = "delete form stu where id = 1";	//错误的删除语句    正确为from

	$result = mysqli_query($link,$sql);
	
//	查看当前操作的错误号和错误信息
	echo "数据库操作命令的错误号为：".mysqli_errno($link);
	echo "<hr>";
	echo "数据库操作命令的错误信息为：".mysqli_error($link);
	echo "<hr>";
	var_dump($result);
	mysqli_close($link);
//	mysqli_free_result($result);

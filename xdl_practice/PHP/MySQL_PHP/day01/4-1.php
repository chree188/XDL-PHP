<?php	
	
//	mysql语句的3关于结果集
//	php连接数据库
	
//	1 导入配置文件
	include"dbconfig.php";
	
//	2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
	
//	3 选择数据库 设置字符集
	mysqli_select_db($link, DBNAME);
	mysqli_set_charset($link, 'utf8');
	
//	4 写sql语句 获得结果集
//	$sql = "select * form stu";	
	$sql = "desc stu";	//错误的查询语句
//	$sql = "select * from aa";

//	$sql = "insert into stu(name) values('qq1')";

	$result = mysqli_query($link,$sql);
	
//	查看当前操作的错误号和错误信息 
	echo "<pre>";
	var_dump($result);//结果集 
//	1 只有查询有结果集 
//	2 结果集一般输出为表格的形式 
//	3 正确的时候返回的是一个对象 错误的时候返回是false
//	4 有了结果集才会去使用 释放结果集 
//	6 关闭数据库 释放结果集 
//	7 对于增删改的操作 没有结果集对象这一说 失败就是false 成功是true或者是大于1的说 
	mysqli_close($link);

//	mysqli_free_result($result);
<?php	
	
//	mysql语句的6其它函数 查看增删改操作是否成功
//	php连接数据库
	
//	1 导入配置文件
	include"dbconfig.php";
	
//	2 连接数据库 
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败！");
	
//	3 选择数据库 设置字符集
	mysqli_select_db($link, DBNAME);
	mysqli_set_charset($link, 'utf8');
	
//	4 写sql语句 好获得结果集
//	1 添加 
//	$sql = "insert into stu(name) values('qq5')";
//	2 删除
//	$sql = "delete from stu where id = 25";
//	3 修改
	$sql = "update stu set name='qq6',age=27 where id = 100";
	
	$result = mysqli_query($link, $sql);
	
	var_dump($result);	//这个是看这条sql语句是否执行正确 以及返回的信息
	echo "<hr>";
	
//	1 判断添加是否成功
	var_dump(mysqli_affected_rows($link));	//返回一个大于0的数 表示添加成功 添加失败返回小雨0的数
	echo "<hr>";
	
	var_dump(mysqli_insert_id($link));	//专门用于查看添加成功是否的函数
	echo "<hr>";
	
//	2 判断删除是否成功
	var_dump(mysqli_affected_rows($link));	//删除成功 返回1 失败或者没有数据被删除返回0 
	echo "<hr>";
	
//	3 判断修改是否成功
	var_dump(mysqli_affected_rows($link));	//修改成功 返回1 失败或者没有修改返回0
	
//	6 关闭数据库释放结果集
	mysqli_close($link);
//	mysqli_free_result($result); //boolean类型释放不了结果集


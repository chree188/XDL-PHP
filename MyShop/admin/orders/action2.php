<?php

	//首先打开数据库 
	
	//1 导入配置文件 
	include("../../public/sql/dbconfig.php");
	//2 连接数据库
	$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
	//3 选择数据库 设置字符集
	mysqli_set_charset($link,"utf8");
	mysqli_select_db($link,DBNAME);
	
	$_GET['a'] = empty($_GET['a'])? 0 : $_GET['a'];
	switch($_GET['a']){
		
		//修改
		case "CKupdate":
		// 写sql语句 执行sql
		$sql = "update goods set store = store - {$_GET['num']} where id = {$_GET['id']}";
		mysqli_query($link,$sql);
		//判断是否操作成功 
		if(mysqli_affected_rows($link)>0){
			//删除
			// 写sql语句 执行sql
			$sqli = "delete from detail where goodsid = {$_GET['id']}";
			mysqli_query($link,$sqli);
			header("Location:{$_SERVER['HTTP_REFERER']}");
		}else{
				header("Location:{$_SERVER['HTTP_REFERER']}?errno=1");
			}
		break;
	}
	// 关闭数据库
	mysqli_close($link);


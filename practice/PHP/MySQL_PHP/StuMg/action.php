<?php
	//执行数据库的增删改  
	// 执行学生信息的添加 删除 和修改 

	include("dbconfig.php");
	$link = @mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
	mysqli_set_charset($link,"utf8");
	
	//判断执行的是 那个操作 增删改
	switch($_GET['a']){
		case "insert": //添加
		//接收表单传递的信息
		if($_POST['name']){
			$name = $_POST['name'];
			$age = $_POST['age'];
			$sex = $_POST['sex'];
			$classid = $_POST['classid'];
			//写sql语句 执行query
			$sql = "insert into stu(name,age,sex,classid) values('$name','$age','$sex','$classid')";
			// echo $sql;//查看sql语句是否正确
			// exit;
			$result = mysqli_query($link,$sql);

			//判断是否操作成功

			// var_dump(mysqli_insert_id($link));//检查 操作是否成功
			// exit;
			if(mysqli_insert_id($link)>0){
				header("Location:index.php");
			}else{
				header("Location:add.php?errno=1");
			}
		}else{
			header("Location:add.php?errno=2");
		}
		break;
		case "del": //删除
		//接收id
		$id = $_GET['id'];
		//写sql语句 执行sql命令
		$sql = "delete from stu where id={$id}";
		// echo $sql;
		// exit;

		$result = mysqli_query($link,$sql);

		//判断操作是否成功
		if(mysqli_affected_rows($link)>0){
			header("Location:{$_SERVER['HTTP_REFERER']}");
			//这个常量可以告诉我们 是从哪里来的 
			//你从哪里来 回到哪里去 
		}else{
			header("Location:index.php?errno=3");
		}
		break;
		case "update": //修改
		//接收表单传递的信息
		if($_POST['name']){
			$name = $_POST['name'];
			$age = $_POST['age'];
			$sex = $_POST['sex'];
			$classid = $_POST['classid'];
			//写sql语句 执行query
			$sql = "update stu set name='$name',age='$age',sex='$sex',classid='$classid' where id={$_POST['id']}";
			// echo $sql;//查看sql语句是否正确
			// exit;
			$result = mysqli_query($link,$sql);

			//判断是否操作成功

			
			if(mysqli_affected_rows($link)>0){
				header("Location:index.php");
			}else{
				header("Location:edit.php?errno=1");
			}
		}else{
			header("Location:edit.php?errno=2");
		}

		break;
	}
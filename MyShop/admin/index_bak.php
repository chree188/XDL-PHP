<?php
	session_start();	
	//登录验证
	if(empty($_SESSION['user'])){
		header('Location:login.php');
		exit;
	}
?>

<!DOCTYPE HTML >
<html>
	<head>
		<meta charset="utf-8" />
		<title>商城管理系统</title>
	</head>
	<frameset rows="100,*" border="1px" noresize>
		<frame src="./include/top.php" />
		<frameset cols="160,*">
			<frame src="./include/left.php" />
			<frame src="./include/main.php" name="main" />
		</frameset>
	</frameset>
</html>  
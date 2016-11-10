<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cookie模拟用户登录</title>
</head>
<body>
	<?php include("menu.php"); 

		if(empty($_COOKIE['users'])){//如果没有登录 下面的查看信息不执行
			header("Location:login.php");
			exit();
		}
	?>
	<h2>查看信息</h2>
</body>
</html>
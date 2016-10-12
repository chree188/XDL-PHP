<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cookie模拟用户登录</title>
</head>
<body>
	<?php include("menu.php"); ?>
	<h2>登录</h2>
	<form action="dologin.php" method="post">
		用户名: <input type="text" name='name'><br><br>
		密&nbsp;码: <input type="password" name='pass'><br><br>
		<input type="submit" value="提交">
		<input type="reset">
	</form>

	<?php
		$_GET['errno'] = empty($_GET['errno'])? '':$_GET['errno'];
		// 接收错误信息
		switch($_GET['errno']){
			case 1:
			echo "<h2 style='color:red'>用户不存在</h2>";
			break;
			case 2:
			echo "<h2 style='color:red'>密码错误</h2>";
			break;
		}
	?>
</body>
</html>
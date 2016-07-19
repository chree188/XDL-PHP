<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>商城管理系统</title>
	</head>
	<body>
		<h1>网站后台登录</h1>
		<form action="dologin.php" method="post">
			用户名：<input type="text" name="name" /><br /><br />
			密&nbsp;码：<input type="password" name="password" /><br /><br />
			验证码：<input type="text" name="code" size="5"/>
				  <img src="../public/code.php" onclick="this.src='../public/code.php?id='+Math.random();"/><br /><br />
			<input type="submit" value="登录" />
			<input type="reset" />
		</form>
		<?php	
			//输出错误信息
			$_GET['errno'] = empty($_GET['errno'])? '':$_GET['errno'];
			switch($_GET['errno']){
				case 1:
					echo "<h2 style='color:red;'>用户不存在</h2>";
				break;
				case 2:
					echo "<h2 style='color:red;'>密码错误</h2>";
				break;
				case 3:
					echo "<h2 style='color:red;'>验证码错误</h2>";
				break;
			}
		?>	
	</body>
</html>
<?php
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>首页</title>
</head>
<body>
	<h3>这是首页</h3>

	<div class="top">
		<?php
			if(!empty($_SESSION['USER'])){
				echo "你好:{$_SESSION['USER']['name']}";
			}else{
				echo '请登录';
			}
		 ?>
	</div>

	<div class="nav">
		<a href="findpwd.php">找回密码</a>
		<a href="register.php">注册</a>
		<a href="login.php">登录</a>
	</div>

</body>
</html>

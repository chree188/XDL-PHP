<?php include 'init.php'; ?>
<!doctype html>
<html lang="zh">
	<head>
		<meta charset="UTF-8">
		<title>后台登录界面</title>
		<link rel="stylesheet" type="text/css" href="<?= CSS?>login.css">
	</head>
	<body>
	<!-- 代码 开始 -->
	<div class="wrapper">
		<div class="container">
			<h1>欢迎登陆</h1>
			<form action="action.php?bz=login" method="post" class="form">
				<input type="text" name="name" placeholder="用户名">
				<input type="password" name="pwd" placeholder="密码">
				<!-- 验证码 点击刷新 -->
				<img src="<?= PUB_IMG?>yzm.php" class='yzm' onclick="this.src=this.src+'?i='+Math.random()">
				<input type="text" name='v_code' placeholder='验证码'>
				<button type="submit" id="login-button">登陆</button>
			</form>
		</div>
	</div>
	<!-- 代码 结束 -->
	</body>
</html>
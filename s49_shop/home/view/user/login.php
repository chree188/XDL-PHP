<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户登录</title>
</head>
<body>
	<form action="./index.php?c=user&a=dologin" method='POST'>
		账号: <input type="text" name='uname' ><br/><br/>
		密码: <input type="password" name="upwd" id=""><br/><br/>
		<input type="submit" value="登录">
	</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		b{color: red;size: 20px;}
	</style>
</head>
<body>
	<fieldset>
		<legend>新增用户</legend>
		<form action="action.php?bz=add" method='post' enctype='multipart/form-data'>
			<p>头&nbsp;&nbsp;像: <input type="file" name='icon' ></p>
			<p>昵&nbsp;&nbsp;称: <input type="text" placeholder='username' name='nickname' ><b>*</b></p>
			<p>密&nbsp;&nbsp;码: <input type="password" placeholder='password' name='pwd' ><b>*</b></p>
			<p>确认密码: <input type="password" placeholder='please again pwd' name='repwd' ><b>*</b></p>
			<p>性&nbsp;&nbsp;别: 
				<label> <input type="radio" name="sex" value=1 checked>男</label>
				<label> <input type="radio" name="sex" value=2>女</label>
			</p>
			<p>生&nbsp;&nbsp;日: <input type="date" name='birthday' ></p>
			<p>手机号码: <input type="text" name='tel' placeholder='mobilephone' maxlength=11><b>*</b></p>
			<p>邮&nbsp;&nbsp;箱: <input type="email" placeholder='email' name='email' ><b>*</b></p>
			<p>输入框带<b>*</b>为必填项</p>
			<p> <input type="submit" value='新增' ></p>
		</form>
	</fieldset>
</body>
</html>
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
		<legend>新增管理员用户</legend>
		<form action="action.php?bz=add" method='post' enctype='multipart/form-data'>
			<p>头&nbsp;&nbsp;像: <input type="file" name='icon' ></p>
			<p>昵&nbsp;&nbsp;称: <input type="text" placeholder='昵称/账号' maxlength=3 name='username' ><b>*</b></p>
			<p>姓&nbsp;&nbsp;名: <input type="text" placeholder='姓名' name='name' ><b>*</b></p>
			<p>密&nbsp;&nbsp;码: <input type="password" placeholder='密码' name='passwd' ><b>*</b></p>
			<p>确认密码: <input type="password" placeholder='密码' name='repasswd' ><b>*</b></p>
			<p>性&nbsp;&nbsp;别: 
				<label> <input type="radio" name="sex" value=1 checked>男</label>
				<label> <input type="radio" name="sex" value=2>女</label>
			</p>
			<p>住&nbsp;&nbsp;址: <input type="text"  placeholder='住址' name='address' ></p>
			<p>手机号码: <input type="text" name='phone' placeholder='手机号' maxlength=11><b>*</b></p>
			<p>输入框带<b>*</b>为必填项</p>
			<p><input type="submit" value='新增' ></p>
		</form>
	</fieldset>
</body>
</html>
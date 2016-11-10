<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<fieldset>
		<legend>新增用户</legend>
		<form action="action.php?bz=add" method='post' enctype='multipart/form-data'>
			<p>手机号: <input type="text" name='tel' placeholder='手机号' maxlength=11></p>
			<p>密码: <input type="password" name='pwd' minlength=6  maxlength=20></p>
			<p>确认密码: <input type="password" name='repwd' minlength=6  maxlength=20></p>
			<p>昵称: <input type="text" name='nickname' ></p>
			<p>性别: 
				<label> <input type="radio" name="sex" value=1 checked>男</label>
				<label> <input type="radio" name="sex" value=2>女</label>
			</p>
			<p>生日: <input type="date" name='birthday' ></p>
			<p>邮箱: <input type="email" name='email' ></p>
			<p>头像: <input type="file" name='icon' ></p>
			<p style="color:red;"><?php echo empty($_GET['notice'])?'':$_GET['notice']?></p>
			<p> <input type="submit" value='新增' ></p>
		</form>
	</fieldset>
</body>
</html>
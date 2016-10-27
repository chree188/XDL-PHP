<?php
	include '../init.php';

	$sql = 'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`  from user where id='.$_GET['id'];
	$result = query($sql);
	$user_list = $result[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<fieldset>
		<legend>编辑信息</legend>
		<form action="action.php?bz=edit" method='post' enctype='multipart/form-data'>
			<input type="hidden" name='id' value='<?= $user_list['id']?>'>
			<p>手机号: <input type="text" name='tel' placeholder='手机号' maxlength=11 value='<?= $user_list['tel']?>'></p>
			<p>密码: <input type="password" name='pwd' ></p>
			<p>确认密码: <input type="password" name='repwd' ></p>
			<p>昵称: <input type="text" name='nickname' value='<?= $user_list['nickname']?>' ></p>
			<p>性别: 
				<label> <input type="radio" name="sex" value=1 <?= $user_list['sex'] == 1? 'checked':'' ?>>男</label>
				<label> <input type="radio" name="sex" value=2 <?= $user_list['sex'] == 2? 'checked':'' ?>>女</label>
			</p>
			<p>生日: <input type="date" name='birthday' value='<?= $user_list['birthday']?>' ></p>
			<p>邮箱: <input type="email" name='email' value='<?= $user_list['email']?>' ></p>
			<p>头像: <input type="file" name='icon' ></p>
			<p> <input type="submit" value='修改' ></p>
		</form>
	</fieldset>
</body>
</html>
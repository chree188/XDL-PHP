<?php
	include '../init.php';

	$sql = 'select * from admin where id='.$_GET['id'];
	$result = query($sql);
	$user_list = $result[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员账户信息编辑页</title>
	<style type="text/css">
		b{color: red;size: 20px;}
	</style>
</head>
<body>
	<fieldset>
		<legend>编辑管理员用户</legend>
		<form action="action.php?bz=edit" method='post' enctype='multipart/form-data'>
			<input type="hidden" name='id' value='<?= $user_list['id']?>' >
			<p>头&nbsp;&nbsp;像: <input type="file" name='icon' ></p>
			<p>昵&nbsp;&nbsp;称: <input type="text" maxlength=3 name='username' value='<?= $user_list['username']?>' ><b>*</b></p>
			<p>姓&nbsp;&nbsp;名: <input type="text" name='name' value='<?= $user_list['name']?>' ><b>*</b></p>
			<p>密&nbsp;&nbsp;码: <input type="password" placeholder='新密码' name='passwd' ><b>*</b></p>
			<p>确认密码: <input type="password" placeholder='新密码' name='repasswd' ><b>*</b></p>
			<p>性&nbsp;&nbsp;别: 
				<label> <input type="radio" name="sex" value=1 <?= $user_list['sex'] == 1? 'checked':'' ?> >男</label>
				<label> <input type="radio" name="sex" value=2 <?= $user_list['sex'] == 2? 'checked':'' ?> >女</label>
			</p>
			<p>住&nbsp;&nbsp;址: <input type="text" name='address' value='<?= $user_list['address']?>' ></p>
			<p>手机号码: <input type="text" name='phone' maxlength=11 value='<?= $user_list['phone']?>' ><b>*</b></p>
			<p>输入框带<b>*</b>为必填项</p>
			<p><input type="submit" value='修改' ></p>
		</form>
	</fieldset>
</body>
</html>
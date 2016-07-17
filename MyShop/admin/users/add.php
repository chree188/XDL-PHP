<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理</title>
</head>
<body>
	<form action="action.php?a=insert" method="post">
			账号: <input type="text" name="username"><br><br>
			真实姓名: <input type="text" name="name"><br><br>
			密码: <input type="text" name="pass"><br><br>
			<label>性别: <input type="radio" name="sex" value="1" checked>男</label>
			<label><input type="radio" name="sex" value="0">女</label><br><br>
			地址: <input type="text" name="address"><br><br>
			邮编: <input type="text" name="code"><br><br>
			电话: <input type="text" name="phone"><br><br>
			Email: <input type="text" name="email"><br><br>
			注册时间: <input type="text" name="addtime"><br><br>
			<input type="submit" value="提交"> <input type="reset">
	</form>
	<?php
		//处理添加表单的错误信息
		switch(@$_GET['errno']){
			case 1: 
			echo "<h2 style='color:red; '>添加失败</h2>";
			break;
			case 2: 
			echo "<h2 style='color:red; '>用户名不能空</h2>";
			break;
		}

	?>
</body>
</html>
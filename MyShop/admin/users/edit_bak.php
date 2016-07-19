<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理</title>
</head>
<body>
	<?php
		//需要获得被修改的学生信息
		//1 导入配置文件 
		
		if(@$_GET['id']){

			include("../../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 选择数据库 设置字符集
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
			//4 写sql语句 执行sql
			$sql = "select * from users where id={$_GET['id']}";
			$result = mysqli_query($link,$sql);

			//5 解析结果集 
			$users = mysqli_fetch_assoc($result);

		}

	?>
	<form action="action.php?a=update" method="post">
			账号: <input type="text" name="username" value="<?php echo $users['username']?>"><br><br>
			真实姓名: <input type="text" name="name" value="<?php echo $users['name']?>"><br><br>
			密码: <input type="text" name="pass" value="<?php echo $users['pass']?>"><br><br>
			<label>性别: <input type="radio" name="sex" value="m" <?php echo $users['sex']=='1' ? 'checked' :'';  ?> >男</label>
			<label><input type="radio" name="sex" value="w" <?php echo $users['sex']=='0' ? 'checked' :'';  ?> >女</label><br><br>
			地址: <input type="text" name="address" value="<?php echo $users['address']?>"><br><br>
			邮编: <input type="text" name="code" value="<?php echo $users['code']?>"><br><br>
			电话: <input type="text" name="phone" value="<?php echo $users['phone']?>"><br><br>
			Email: <input type="text" name="email" value="<?php echo $users['email']?>"><br><br>
			状态: <input type="text" name="state" value="<?php echo $users['state']?>"><br><br>
			注册时间: <input type="text" name="addtime" value="<?php echo $users['addtime']?>"><br><br>
			<input type="submit" value="提交"> <input type="reset">

	</form>
	<?php
		//处理添加表单的错误信息
		switch(@$_GET['errno']){
			case 1: 
			echo "<h2 style='color:red; '>修改失败</h2>";
			break;
			case 2: 
			echo "<h2 style='color:red; '>用户名不能空</h2>";
			break;
		}

	?>
</body>
</html>
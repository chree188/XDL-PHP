<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>学生信息管理</title>
	</head>
	<body>
		<form action="../users/action.php?a=insert" method="post">
			账&nbsp;&nbsp;号:
			<input type="text" name="username" class="text05"><b style="color: red;">*</b>
			<br>
			<br>
			真实姓名:
			<input type="text" name="name" class="text05">
			<br>
			<br>
			密&nbsp;&nbsp;码:
			<input type="text" name="pass" class="text05"><b style="color: red;">*</b>
			<br>
			<br>
			性&nbsp;&nbsp;别:
			<label>
			<input type="radio" name="sex" value="1" checked>
			男</label>
			<label>
			<input type="radio" name="sex" value="0">
			女</label>
			<br>
			<br>
			地&nbsp;&nbsp;址:
			<input type="text" name="address" class="text05">
			<br>
			<br>
			邮&nbsp;&nbsp;编:
			<input type="text" name="code" class="text05">
			<br>
			<br>
			电&nbsp;&nbsp;话:
			<input type="text" name="phone" class="text05">
			<br>
			<br>
			Email :&nbsp;
			<input type="text" name="email" class="text05"><b style="color: red;">*</b>
			<br>
			<br>
			<h4>加<b style="color: red;">*</b>号项为必填项。。。</h4>
			<input type="submit" value="提交">
			<input type="reset">
		</form>
		<?php
		//处理添加表单的错误信息
		switch(@$_GET['errno']) {
			case 1 :
				echo "<h2 style='color:red; '>添加失败</h2>";
				break;
			case 2 :
				echo "<h2 style='color:red; '>用户名不能空</h2>";
				break;
		}
		?>
	</body>
</html>
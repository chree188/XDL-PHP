<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理系统</title>
</head>
<body>

	<?php include "menu.php";?>
	<form action="action.php?a=insert" method="post">
		姓名: <input type="text" name="name"><br><br>
		年龄: <input type="text" name="age"><br><br>
		性别: <input type="radio" name="sex" value="m" checked>男
		 	  <input type="radio" name="sex" value="w">女
				<br><br>
		班级: <input type="text" name="classid"><br><br>
		 <input type="submit" value="提交">  <input type="reset">


	</form>
	<?php
		switch(@$_GET['errno']){
			case 1:
			echo "<h2 style='color:red;'>添加失败</h2>";
			break;
			case 2:
			echo "<h2 style='color:red;'>用户名不能为空</h2>";
			break;
		}

	?>

</body>
</html>
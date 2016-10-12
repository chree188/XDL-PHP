<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理系统</title>
</head>
<body>

	<?php include "menu.php";
		//查询收到的id号对应的学生记录
			//接收要修改的学生信息的id号 
			if($_GET['id']){
				$id = $_GET['id'];
				//执行查询
				include("dbconfig.php");
				$link = @mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
				mysqli_set_charset($link,"utf8");
				$sql = "select * from stu where id={$id}";
				$result = mysqli_query($link,$sql);
				$stu = mysqli_fetch_assoc($result);
//				print_r($stu);//查看被选中的学生信息
			}

			

	?>
	<form action="action.php?a=update" method="post">
		<input type="hidden" name='id' value="<?php echo $stu['id']?> ">
		姓名: <input type="text" name="name" value="<?php echo $stu['name']; ?>"><br><br>
		年龄: <input type="text" name="age" value="<?php echo $stu['age']; ?>"><br><br>
		性别: <input type="radio" name="sex" value="m" <?php echo $stu['sex']=='m' ? 'checked' :'';  ?> >男
		 	 <input type="radio" name="sex" value="w" <?php echo $stu['sex']=='w' ? 'checked' :'';  ?> >女
				<br><br>
		班级: <input type="text" name="classid" value="<?php echo $stu['classid']; ?>"><br><br>
		 <input type="submit" value="修改">  <input type="reset">


	</form>
	<?php
		switch(@$_GET['errno']){
			case 1:
			echo "<h2 style='color:red;'>修改失败</h2>";
			break;
			case 2:
			echo "<h2 style='color:red;'>用户名不能为空</h2>";
			break;
		}

	?>

</body>
</html>
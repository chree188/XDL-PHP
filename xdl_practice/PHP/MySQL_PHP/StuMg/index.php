<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理系统</title>
</head>
<body>
	<?php include "menu.php"; 
		//输出删除失败的提示
		switch(@$_GET['errno']){
			case 3: echo "<h3 style='color:red'>删除失败!</h3>";break;
		}

	?>

	<table width="600px" border='1px'>
		<tr>
			<th>ID</th>
			<th>姓名</th>
			<th>年龄</th>
			<th>性别</th>
			<th>班级</th>
			<th>操作</th>
		</tr>
		<?php
			//六脉神剑	
			$sex = array("m"=>"男","w"=>"女");
			include("dbconfig.php");
			$link = @mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
			mysqli_set_charset($link,"utf8");
			$sql = "select * from stu";
			$result = mysqli_query($link,$sql);
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>{$row['id']}</td>";
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['age']}</td>";
				echo "<td>{$sex[$row['sex']]}</td>";
				echo "<td>{$row['classid']}</td>";
				
				echo "<td align=center>
					<a href='action.php?a=del&id={$row['id']}'>删除</a>  
					<a href='edit.php?id={$row['id']}'>修改</a>  
					</td>";
				echo "</tr>";
			}
			
		?>

	</table>
	<?php  echo "一共查询到".mysqli_num_rows($result)."条记录"; 

		mysqli_close($link);
		mysqli_free_result($result);
	  ?>
</body>
</html>
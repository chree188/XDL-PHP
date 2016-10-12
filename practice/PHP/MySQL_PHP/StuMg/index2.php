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
	<form action="index2.php">
		<?php $_GET['name'] = empty($_GET['name'])? "":$_GET['name']; ?>
		姓名含有 <input type="text" name="name" size="5" value="<?php echo $_GET['name']; ?>"/>
		性别 <select name="sex">
			<option value="">--请选择--</option>
			<?php	$_GET['sex']=empty($_GET['sex']) ? "" : $_GET['sex'] ?>
			<option value="m" <?php echo $_GET['sex']=="m" ? "selected" : "";  ?>>--男--</option>
			<option value="w" <?php echo $_GET['sex']=="w" ? "selected" : "";  ?>>--女--</option>
		</select>
		<input type="submit" value="搜索" />
	</form>

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
			

			//=============封装搜索条件======================
			//1 设置数组接收搜索条件
				$wherelist = array();

			//2 接收搜索条件 
				if(!empty($_GET['name'])){
					$wherelist[] =" name like '%{$_GET['name']}%'"; 
				}	
				if(!empty($_GET['sex'])){
					$wherelist[] = "sex='{$_GET['sex']}'";
				}

			//3 判断搜索条件的有效性	
				if(count($wherelist)>0){
					$where = " where ".implode(" and ",$wherelist);
				}

			//=============封装搜索条件======================
			if(!$wherelist){	//判断搜索条件数组是否为空
				$sql = "select * from stu";
			}else{
				$sql = "select * from stu".$where;
			}
//			@$sql = "select * from stu".$where;
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
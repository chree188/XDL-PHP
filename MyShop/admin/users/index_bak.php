<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生信息管理</title>
	<style type="text/css">
		a {
			text-decoration: none;
		}
	</style>
</head>
<body>
	<table width="100%" border="1px">
		<tr>
			<th>用户ID</th>
			<th>账号</th>
			<th>真实姓名</th>
			<th>密码</th>
			<th>性别</th>
			<th>地址</th>
			<th>邮编</th>
			<th>电话</th>
			<th>Email</th>
			<th>状态</th>
			<th>注册时间</th>
			<th>操作</th>
		</tr>
		<?php
			//查看学生信息 select 输出到表格里面 
			// 设置性别
			$sex = array("1"=>"男","0"=>"女");
			// 设置权限
			$state = array("0"=>"超级管理员","1"=>"一般管理员","2"=>"信息录入员");
			//六脉神剑 
			//1 导入数据库配置文件
			include("../../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 设置字符集 选择数据库
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
			//4 写sql语句 获得结果集 
			$sql = "select * from users";
			$result = mysqli_query($link,$sql);
			//5 解析结果集 
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>{$row['id']}</td>";
				echo "<td>{$row['username']}</td>";
				echo "<td>{$row['name']}</td>";
				echo "<td>{$row['pass']}</td>";
				echo "<td>{$sex[$row['sex']]}</td>";
				echo "<td>{$row['address']}</td>";
				echo "<td>{$row['code']}</td>";
				echo "<td>{$row['phone']}</td>";
				echo "<td>{$row['email']}</td>";
				echo "<td>{$row['state']}</td>";
				echo "<td>{$row['addtime']}</td>";
				echo "<td align=center>
   						<a href='action.php?a=del&id={$row['id']}'>删除</a>
   						<a href='edit.php?id={$row['id']}'>修改</a>
					</td>";
				echo "</tr>";
			}
			//6 关闭数据库 释放结果集 
			mysqli_close($link);
			mysqli_free_result($result);
		?>
	</table>
</body>
</html>
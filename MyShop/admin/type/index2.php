<html>
<head>
<meta charset=utf-8 />
</head>
<body>
	<select name="">
		<?php
		//输出删除失败的提示
		$_GET['errno'] = empty($_GET['errno']) ? '' : $_GET['errno'];
		switch($_GET['errno']){
			case 3: echo "<h3 style='color:red'>删除失败!</h3>";
			break;
		}
			//查看类别信息 select 输出到表格里面 
			//六脉神剑 
			//1 导入数据库配置文件
			include("../../public/sql/dbconfig.php");
			//2 连接数据库
			$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
			//3 设置字符集 选择数据库
			mysqli_set_charset($link,"utf8");
			mysqli_select_db($link,DBNAME);
			//4 写sql语句 获得结果集 
			$sql = "select * from type order by concat(path,id)";	// 修改为一类别pid path排序
			$result = mysqli_query($link,$sql);
			//5 解析结果集 
			while($row = mysqli_fetch_assoc($result)){
//				第一种显示下拉列表的形式
//				echo "<option value='{$row['id']}'>{$row['name']}</option>";

//				第二种显示下拉列表的形式
//				if($row['id']==0){
//					echo "<optgroup label = '{$row['name']}'";
//				}else{
//					echo "<option value='{$row['id']}'>{$row['name']}</option>";
//				}
//			}

//				第三种显示下拉列表的形式
				$disable = null;
				if($row['pid']==0){
					$disable = "disabled";
				}
				
//				1 数逗号个数
				$num = substr_count($row['path'], ',');
//				2 输出空格
				$pad = str_repeat("&nbsp;&nbsp;", $num-1);
				
				echo "<option value='{$row['id']}'{$disable}>{$pad}{$row['name']}</option>";
			}	
			//6 关闭数据库 释放结果集 
			
			mysqli_close($link);
			mysqli_free_result($result);
		?>
	</select>
</body>
</html>
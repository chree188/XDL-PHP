<!DOCTYPE HTML >
<html>
	<head>
		<meta charset="utf-8" />
		<title>文件管理系统</title>
	</head>
	<body>
		<h2><a href="system.php">文件管理系统</a></h2>
		
		<!--表格开始-->
		<table width="600px" border="1px">
			<tr>
				<th>文件名</th>
				<th>文件类型</th>
				<th>文件大小</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
		
		<!--php处理部分-->	
		<?php
			date_default_timezone_set("PRC");
//			遍历文件到表格中
			$path="./";
//			$path="../mydir";	//操作其它文件目录
			$dir=opendir($path);
//			遍历目录中的文件
			while (false!==($f=readdir($dir))) {
				if($f=="."||$f==".."||$f=="system.php"){
					continue;
				}
				$ff=rtrim($path,"/")."/".$f;
//				输出到表格
				echo "<tr>";
					echo "<td>{$f}</td>";
					echo "<td>".filetype($ff)."</td>";
					echo "<td>".filesize($ff)."</td>";
					echo "<td>".date("Y-m-d H:i:s",filectime($ff))."</td>";
					echo "<td align=center>
						<a href='system.php?a=edit&filename={$ff}'>修改</a>
						<a href='system.php?a=del&filename={$ff}'>删除</a>
					</td>";
				echo "</tr>";
			}
		?>
		
		</table>
		<!--表格结束-->
		
		<h4><a href="system.php?a=add">新建文件</a></h4>
		
		<?php	
			$_GET['a'] = empty($_GET['a'] ? " " : $_GET['a']);
//			显示添加菜单
			switch ($_GET['a']) {
				case 'add':
					echo "<form action='system.php?a=create' method='post'>";
						echo "<input type='text' name='filename'>";
						echo "<input type='submit' value='新建'>";
					echo "</form>";
					break;
				
				default:
					
					break;
			}
		?>
		
	</body>
</html>
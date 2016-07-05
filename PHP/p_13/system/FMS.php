<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>文件管理系统</title>
		<?php	
			header('content-type:text/html;charset=utf-8');
			date_default_timezone_set("PRC");	//初始化
			$GETa=empty($_GET['a'])?"":$_GET['a'];
//			错误抑制，防止$_GET['a']为空值时报错
		?>
	</head>
	<body>
		
		<?php
//			对文件执行 添加 删除 修改的操作	
			switch ($GETa) {
				case 'create':	//添加
//				使用file_put_contents添加内容到文件中的函数实现新建文件
					file_put_contents($_POST['filename'], "");
					break;
				case 'update':	//修改
					file_put_contents($_POST['filename'], $_POST['content']);
//					将值1写入到文件1中以追加写的方式			
//					file_put_contents(文件1, 值1,[FILE_APPEND]);
					break;
				case 'del':	//删除
					unlink($_GET['filename']);
			}
		?>
		
		<h2 align="center"><a href="FMS.php" style="text-decoration: none;" >文件管理系统</a></h2>
		<!--表格开始-->
		<table width="600px" border="1px" align="center">
			<tr>
				<th>文件名</th>
				<th>文件类型</th>
				<th>文件大小</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
			
			<!--php处理部分-->
			<?php
//				遍历文件到表格
				$path="./";
				$dir=opendir($path);
//				遍历目录中的文件
				while (false!==($f=readdir($dir))) {
					if($f=="."||$f==".."||$f=="fileSystem.php"||$f=="system.php"||$f=="FMS.php"){
						continue;
					}
					$ff=rtrim($path,"/")."/".$f;
//					输出到表格
					echo "<tr>";
						echo "<td>{$f}</td>";
						echo "<td>".filetype($ff)."</td>";
						echo "<td>".filesize($ff)."</td>";
						echo "<td>".date("Y-m-d H:i:s",filectime($ff))."</td>";
						echo "<td align=center>
							<a href='FMS.php?a=edit&filename={$ff}'>修改</a>
							<a href='FMS.php?a=del&filename={$ff}'>删除</a>
						</td>";
					echo "</tr>";
				}
			?>
			<!--php遍历结束-->
		</table>
		<!--表格结束-->
		
		<center>	
		<h4><a href="FMS.php?a=add" style="text-decoration: none;">新建文件</a></h4>
		<!--php处理部分-->
		<?php
			switch ($GETa) {
//				显示新建文件
				case 'add':
					echo "<form action='FMS.php?a=create' method='post'>";
						echo "<input type='text' name='filename'>";
						echo "<input type='submit' value='新建'>";
					echo "</form>";
					break;
				case "edit":
					$ycontent=file_get_contents($_GET['filename']);	//读取文件内容
					echo "<h3>修改的文件为：{$_GET['filename']}</h3>";
					echo "<form action='FMS.php?a=update' method='post'>";
						echo "<input type='hidden' name='filename' value='{$_GET['filename']}'>";
						echo "<textarea name='content' cols='30' rows='10'>{$ycontent}</textarea><br>";
						echo "<input type='submit' value='修改'>";
					echo "</form>";
					break;
			}
		?>
		</center>	
	</body>
</html>
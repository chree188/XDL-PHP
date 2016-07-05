<!DOCTYPE HTML >
<html>
	<head>
		<meta charset="utf-8" />
		<title>文件管理系统</title>
		<?php	
			header('content-type:text/html;charset=utf-8');
			$GETa = empty($_GET['a']) ? " " : $_GET['a'];
		?>
	</head>
	<body >
		
		<?php	
//			对文件执行 添加 删除 修改的操作		
			switch ($GETa) {
				case 'create':	//添加
//					使用file_put_content添加内容到文件中的函数实现新建文件
					file_put_contents($_POST['filename'], "");
					break;
				case 'update':	//修改
				file_put_contents($_POST['filename'], $_POST['content']);
//				将值1写入到文件1中以追加写的方式
//				file_put_contents(文件1, 值1,[FILE_APPEND]);
					break;
				case "del":	//删除
					@unlink($_GET['filename']);
			}
		?>
		
		<h2><a href="system.php" style="text-decoration: none;">文件管理系统</a></h2>
		
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
		
		<h4><a href="system.php?a=add" style="text-decoration: none;">新建文件</a></h4>
		
		<?php	
			
			switch ($GETa) {
//				显示新建文件
				case 'add':
//					第一种表格输出形式
					echo "<form action='system.php?a=create' method='post'>";
						echo "<input type='text' name='filename'>";
						echo "<input type='submit' value='新建'>";
					echo "</form>";
					break;
//				显示修改表单
				case "edit":
//					第二种表格输出方式 定界符输出表格
// 					1 <<<aa后面不能有空格
// 					2 aa; aa要定格写
// 					3 $str要echo 输出
					$ycontent=file_get_contents($_GET['filename']);	//读取文件内容
					echo "<h3>修改的文件为：{$_GET['filename']}</h3>";
					echo "<form action='system.php?a=update' method='post'>";
						echo "<input type='hidden' name='filename' value='{$_GET['filename']}'>";
						echo "<textarea name='content' cols='30' rows='10'>{$ycontent}</textarea><br>";
						echo "<input type='submit' value='修改'>";
					echo "</form>";

					break;
			}
		?>
		
	</body>
</html>
<!doctype html>
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
		<h2 align="center"><a href="fileSystem.php" style="text-decoration: none;" >文件管理系统</a></h2>
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
					if($f=="."||$f==".."||$f=="fileSystem.php"){
						continue;
					}
					$ff=rtrim($path,"/")."/".$f;
//					输出到表格
					
				}
			?>
		</table>
	</body>
</html>
<?php

	echo "<center>";
	echo "<h2><a href='doAdd.php' style='text-decoration:none';>文件管理系统</a></h2>";
	echo "<table border=1 width=600>";
		echo "<tr>
			<th>文件名</th><th>文件类型</th><th>文件大小</th><th>创建时间</th><th>操作</th>
		</tr>";
		date_default_timezone_set('PRC');
		$path="./";
		$dir=opendir($path);
		while (false !== ($f = readdir($dir))) {
			if($f=="."||$f==".."||$f=="index.php"){
				continue;
			}
			$ff=rtrim($path,"/")."/".$f;
			echo "<tr>";
				echo "<td>{$f}</td>";
				echo "<td>".filetype($ff)."</td>";
				echo "<td>".filesize($ff)."</td>";
				echo "<td>".date("Y-m-d H:i:s",filectime($ff))."</td>";
				echo "<td align=center>
					<a href=''>修改</a>
					<a href=''>删除</a>
				</td>";
			echo "</tr>";
		}
	echo "</table>";
	echo "<h3><a href='index.php?a=add' style='text-decoration:none';>新建文件</a><h3>";
//	$getA=empty($_GET['a'])?"":$_GET['a'];
//	switch ($getA) {
//				case 'add':
//					echo "<form action='index.php?a=create' method='post'>";
//						echo "<input type='text' name='filename'>";
//						echo "<input type='submit' value='新建'>";
//					echo "</form>";
//					break;
//				case "edit":
//					$ycontent=file_get_contents($_GET['filename']);
//					echo "<h3>修改的文件为：{$_GET['filename']}</h3>";
//					echo "<form action='index.php?a=update' method='post'>";
//						echo "<input type='hidden' name='filename' value='{$_GET['filename']}'>";
//						echo "<textarea name='content' cols='30' rows='10'>{$ycontent}</textarea><br>";
//						echo "<input type='submit' value='修改'>";
//					echo "</form>";
//					break;
//	}
	echo "</center>";

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>在线相册</title>
</head>
<body>
	<?php
		//载入导航页面
		include("menu.php");
	?>

	<form action="doadd.php" method="post" enctype="multipart/form-data">
		名称: <input type="text" name="picname"><br><br>
		文件: <input type="file" name="pic"><br><br>
		描述: <input type="text" name="desc"><br><br>
		<input type="submit" value="发布">
	</form>
</body>
</html>
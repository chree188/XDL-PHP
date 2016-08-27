<?php include 'init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<!--
	top	 头部页面
	menu 菜单页面
	main 主体页面
-->
<frameset rows='50px,*' frameborder=0>
	<frame src='top.php' name='top'></frame>
	<frameset cols='14%,*'>
		<frame src='menu.php' name='menu'></frame>
		<frame src='user/index.php' name='main'></frame>
	</frameset>
</frameset>


</html>
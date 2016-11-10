<?php include 'init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>QT刷手会员管理后台</title>
</head>
<!--
	top	 头部页面
	menu 菜单页面
	main 主体页面
-->
<frameset rows='8%,*' frameborder=1>
	<frame src='top.php' name='top'></frame>
	<frameset cols='15%,*'>
		<frame src='menu.php' name='menu'></frame>
		<frame src='admin/index.php' name='main'></frame>
	</frameset>
</frameset>


</html>
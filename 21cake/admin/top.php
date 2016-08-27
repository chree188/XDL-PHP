<?php include 'init.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= PUB_CSS?>commond.css">
	<style>
		html{overflow-y:hidden;}
		body{background-color: #432818;}
		.logo_admin{font:35px/65px ;color:#fff;width: 178.5px;height: 50px;background: white;}
		.login_info{width: 500px; height: 100%; position:absolute; color:#fff; font-size:14px; right:0; text-align:right; line-height:50px; margin-right:50px;
			top: 0px;}
		.img{text-align: center;}
		a{color: white;}
		a:hover{
			color:#faaf3b; 
		}
	</style>
</head>
<body>
	<div class='logo_admin'><img src="<?= PUB_IMG?>logo.png" height=50px alt=""></div>
	<div class='login_info'>
		欢迎 <?= $_SESSION['admin']['name']?> 进入后台管理系统 
		<a href='action.php?bz=logout' target="_top">[ 退出 ]</a>
		<a href="../home/index.php" target="_top">[ 前台 ]</a>
	</div>
</body>
</html>
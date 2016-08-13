<?php include 'init.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= PUB_CSS?>commond.css">
	<style>
		html{overflow-y:hidden;}
		body{background-color: #2F2E2E;}
		.logo_admin{font:112px/73px 华文彩云;color:#fff; width:320px; height:100%; position:absolute; background-color:#00CC99; text-align:center;}
		.login_info{width: 500px; height: 100%; position:absolute; color:#fff; font-size:20px; right:0; text-align:right; line-height:65px; margin-right:50px;}
		a{color:white;}
	</style>
</head>
<body>
	<div class='logo_admin'><img src="<?=PUB_IMG?>logo.png" ></div>
	<div class='login_info'>
		欢迎 <?= $_SESSION['admin']['name']?> 进入后台管理系统 
		<a href='action.php?bz=logout' target="_top">[ 退出 ]</a>	
	</div>
</body>
</html>
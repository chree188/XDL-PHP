<?php include 'init.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?= PUB_CSS?>commond.css">
	<link rel="stylesheet" type="text/css" href="<?= PUB_CSS?>menu.css">
	<link rel="stylesheet" type="text/css" href="<?= PUB_CSS?>iconfont/iconfont.css">
</head>
<body>
	<div class='menu'>
		<ul class='menu_content'>
			<li>
				<span>管理员管理</span>
				<ul class='list'>
					<li class='iconfont'>&#xe662; <a href='admin/index.php' target='main'> 管理员列表</a></li>
					<li class='iconfont'>&#xe667; <a href='admin/add.php'  target='main'>新增管理员</a></li>
				</ul>
			</li>
			<li>
				<span>刷手管理</span>
				<ul class='list'>
					<li class='iconfont'>&#xe650; <a href='user/index.php'  target='main'> 会员列表</a></li>
					<li class='iconfont'>&#xe65a; <a href='user/add.php'  target='main'>新增会员</a></li>
				</ul>
			</li>
			<li>
				<span>商家管理</span>
				<ul class='list'>
					<li class='iconfont'>&#xe659; <a href='user/index.php'  target='main'> 商家列表</a></li>
					<li class='iconfont'>&#xe645; <a href='user/add.php'  target='main'>新增商家</a></li>
				</ul>
			</li>
		</ul>
	</div>
</body>
</html>
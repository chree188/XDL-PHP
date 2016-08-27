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
				<span>用户管理</span>
				<ul class='list'>
					<li class='iconfont'>&#xe662; <a href='user/index.php' target='main'> 用户列表</a></li>
					<li class='iconfont'>&#xe667; <a href='user/add.php'  target='main'>新增用户</a></li>
				</ul>
			</li>
			<li>
				<span>分类管理</span>
				<ul class='list'>
					<li class='iconfont'>&#xe660; <a href='category/index.php'  target='main'> 分类列表</a></li>
					<li class='iconfont'>&#xe657; <a href='category/add.php'  target='main'>新增一级分类</a></li>
				</ul>
			</li>
			<li>
				<span>商品管理</span>
				<ul class='list'>
					<li class='iconfont'>&#xe664; <a href='goods/index.php' target='main'> 商品列表</a></li>
					<li class='iconfont'>&#xe666; <a href='goods/add.php' target='main'>新增商品</a></li>
					<li class='iconfont'>&#xe664; <a href='goods/show-detail.php' target='main'> 商品详情</a></li>
					<li class='iconfont'>&#xe666; <a href='goods/detail.php' target='main'> 新增详情</a></li>
					<li class='iconfont'>&#xe664; <a href='goods/comment.php' target='main'> 商品评论</a></li>
				</ul>
			</li>
			<li>
				<span>订单管理</span>
				<ul class='list'>
					<li class='iconfont'>&#xe652; <a href='orders/index.php' target='main'> 订单列表</a></li>
				</ul>
			</li>
		</ul>

	</div>
</body>
</html>
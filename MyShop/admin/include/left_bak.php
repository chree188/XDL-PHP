<?php session_start();	?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>商城管理系统</title>
		<style type="text/css">
		a {
			text-decoration: none;
			color: yellowgreen;
		}
	</style>
	</head>
	<body>
		<p>欢迎：<?php echo $_SESSION['user']['username']; ?><a href="../logout.php" target="_top">退出</a></p>
		<h2>用户模块</h2>
		<h4><a href="../users/index.php" target="main">查看用户</a></h4>
		<h4><a href="../users/add.php" target="main">添加用户</a></h4>
		<h2>类别模块</h2>
		<h4><a href="../type/index.php" target="main">查看类别</a></h4>
		<h4><a href="../type/add.php" target="main">添加类别</a></h4>
		<h2>商品模块</h2>
		<h4><a href="../goods/index.php" target="main">查看商品</a></h4>
		<h4><a href="../goods/add.php" target="main">添加商品</a></h4>
		<h2>用户模块</h2>
		<h4><a href="../orders/index.php" target="main">查看订单</a></h4>
		<h4><a href="../orders/index2.php" target="main">最新订单</a></h4>
	</body>
</html>
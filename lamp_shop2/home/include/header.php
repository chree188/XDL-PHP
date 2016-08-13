<?php include './init.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页top</title>
	<style>
		*{margin:0;padding:0;list-style:none;text-decoration:none;}
		.clear::before,.clear::after{content:''; clear:both; display:table;}
		#header{width:100%;height:143px;}
		#header #top{width:100%;height:53px;}
		#header #top .top-left{width:330px;height:53px;margin-left:220px;}
		#header #top .top-left ul li{float:left;margin-left:20px;line-height:53px;}

		#header #bottom{width:100%;height:86px;}
		#header #bottom .bottom-left{width:315px;height:43px;margin-left:234px;margin-top:22px;float:left;background:url(./include/images/logo.png);}
		#header #bottom .bottom-right{width:800px;height:43px;float:left;margin-left:234px;margin-top:22px;}
		#header #bottom .bottom-right ul li{float:left;margin-left:15px;line-height:43px;}
	</style>
</head>
<body>	
	<div id="header">
		<div id="top">
			<div class="top-left">
				<ul>
					<?php if($_SESSION['home']): ?>
						<li><a href="./login/reg.php"><?= empty($_SESSION['home']['nickhome'])? $_SESSION['home']['tel']:$_SESSION['home']['nickname'] ?></a></li>
						<li><h2>|</h2></li>
						<li><a href="./login/action.php?bz=logout"><h2>退出</h2></a></li>
					<?php else: ?>
						<li><a href="./login/reg.php"><h2>注册</h2></a></li>
						<li><h2>|</h2></li>
						<li><a href="./login/login.php"><h2>登录</h2></a></li>
					<?php endif; ?>
					
				</ul>
			</div>
		</div>
		<div id="bottom">
			<div class="bottom-left"></div>
			<div class="bottom-right">
				<ul>
					<li><a href="./index.php"><h2>首页</h2></a></li>
					<li><a href="./list.php"><h2>婚纱样式</h2></a></li>
					<li><a href="./listone.php"><h2>鱼尾型婚纱</h2></a></li>
					<li><a href="./listtwo.php"><h2>抹胸长拖尾婚纱</h2></a></li>
					<!-- <li><a href=""><h2>浪漫旅拍</h2></a></li> -->
				</ul>
			</div>
		</div>
	</div>
</body>
</html>
<?php 
	include 'init.php';

	$sql = 'select id,name from category where pid=0 and display = 1'; 
	$cate_list = query($sql);

	

	if (empty($_SESSION['cart'])) {
		$num='0';
	}else{
	$_SESSION['cart'];
	
	foreach ($_SESSION['cart'] as $v) {
		$count = $v['count'];
		$num +=$count;
	}
	}

 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
 	<link rel="stylesheet" href="<?= CSS?>head.css">
 	
 </head>
 <body>
 	<div id="NAV">
 		<div id="NAV-l">
 			<a href="index.php" class="logo"><image src="<?= IMG ?>logo.png"></image></a>
 			<div class="add">
 				<form action="" method='get' enctype='multipart/form-data'>
	 				<select name="address" id="" >
	 					<option value="sh">上海</option>
	 					<option value="hz" selected>杭州</option>
	 					<option value="bj">北京</option>
	 					<option value="sz">深圳</option>
	 					<option value="gz">广州</option>
	 					<option value="wx">无锡</option>
	 					<option value="sz">苏州</option>
	 				</select>
 				</form>
 			</div>
 			<ul class="nav">
 				<li><a href="index.php">首页</a></li>
<!--  				<li><a href="cake-all.php">蛋糕</a></li>
 				<li><a href="">新品</a></li>
 				<li><a href="BrandStory.php">品牌故事</a></li>
 				<li><a href="">订购帮助</a></li> -->
					<li><a href="cake-all.php?id=<?= $cate_list['0']['id']?>"><?= $cate_list['0']['name']?></a>
					</li>
					<li><a href="new-all.php?id=<?= $cate_list['1']['id']?>"><?= $cate_list['1']['name']?></a>
					</li>
				<li><a href="BrandStory.php">品牌故事</a></li>
 			</ul>
 		</div>
 		<div id="NAV-r">
 			<ul class="nav">
 				<li><a href="cart.php"><?=$num?></a></li>
 				<li><span>&#xe622;</span></li>
 				<li><a href="buy.php">订单</a></li>
 				<?php if($_SESSION['home']): ?>
 							Hello,&nbsp;&nbsp;
							<a class="com" href="user-center.php" style="text-style:none; color:#432818; text-decoration:none; padding-right:10px;font-size:12px;font-family:'Microsoft Yahei';"><?= empty($_SESSION['home']['nickname'])? $_SESSION['home']['tel']:$_SESSION['home']['nickname']?></a>
							<span>|</span>
							<a class="com" href="action.php?bz=logout" style="text-style:none; text-decoration:none; padding-right:10px; color:#432818;font-size:12px;font-family:'Microsoft Yahei';">[ 退出 ]</a>
						<?php else: ?>
							<li><a href="reg.php">注册</a></li>
							<span>|</span>
							<li><a href="login.php">登录</a></li>
						<?php endif; ?>
 				<!-- <li><a href="reg.php">注册</a></li>
 				<span>|</span>
 				<li><a href="login.php">登录</a></li> -->
 			</ul>
 		</div>
 		<div class="clear"></div>
 	</div>
 </body>
 </html>
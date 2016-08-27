<?php include 'head.php';?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>注册</title>
 	<link rel="stylesheet" href="<?= CSS?>reg.css"/>
 </head>
 <body>
 	<div id="LOGIN-BOX">
 		<div id="LOGIN">
 			<img src="<?= IMG?>userbg.jpg" alt="">
 			<span>新用户注册</span>
 		</div>
 			<form action="action.php?bz=reg" method="post">
 				<ul>
 					<li>
 						<span class="input-1">
 							<input class="loginname" name='tel' type="text" placeholder="手机号码" maxlength=11 required>
 						</span>
 					</li>
 					<li>
 						<span class="input-2">
 							<input class="password" name='pwd' type="password" placeholder="填写密码" minlength=6 required>
 						</span>
 					</li>
 					<li>
 						<span class="input-3">
 							<input class="password" name='repwd' type="password" placeholder="确认密码" minlength=6  maxlength=20 required>
 						</span>
 					</li>
 					<li class="identify">
 						<span class="input-4">
 							<input class="phone-identify" type="text" placeholder="短信验证码">
 						</span>
 						<a href="1.php">获取短信验证码</a>
 					</li>
 					<li>
	 					<span style="higeht:20px;color:red;">
	 						<?php echo empty($_GET['notice'])?'':$_GET['notice']?>
	 					</span>
 					</li>
 					<li class="remember">
 						<div>
 							<input type="checkbox" id="for_remember" required>
 						</div>
 						<label for="for_remember" >我已阅读并同意&nbsp;</label>
 						<a href="1.php"> 会员注册协议&nbsp;</a> 
 						<span>&nbsp;和&nbsp;</span> 
 						<a href="1.php">&nbsp;隐私保护政策 </a>
 					</li>
 					<li class="button">
 							<button class="dl" type="submit">注 册</button>
 					</li>
 				</ul>
 			</form>
 		<div class="clear"></div>
 	</div>
 	<?php include 'foot.php';?>
 </body>
 </html>
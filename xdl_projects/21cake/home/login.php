<?php 
	include 'head.php';
 ?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>登录</title>
 	<link rel="stylesheet" href="<?=CSS?>login.css">
 </head>
 <body>
 	<div id="LOGIN-BOX">
 		<div id="LOGIN">
 			<img src="<?= IMG?>userbg.jpg" alt="">
 			<span>用户登陆</span>
 		</div>
 			<form action="action.php?bz=login" method="post">
 				<ul>
 					<li>
 						<span class="input-1">
 							<input class="loginname" name="tel" type="text" placeholder="手机号码" maxlength="11">
 						</span>
 					</li>
 					<li>
 						<span class="input-2">
 							<input class="password" name="pwd" type="password" placeholder="填写密码">
 						</span>
 					</li>
 					<li>
 							<img src="<?= PUB_IMG?>yzm.php" class='yzm' onclick="this.src=this.src+'?i='+Math.random()" width="400px" height="52px";>
 					</li>
 					<li style="margin-top:-3px;">
 						<span class="input-2">
 							<input class="password" type="text" name='v_code' placeholder='验证码'>
 						</span>
 					</li>
 					<li>
	 					<span style="higeht:20px;color:red;">
	 						<?php echo empty($_GET['notice'])?'':$_GET['notice']?>
	 					</span>
 					</li>
 					<li class="remember">
 						<div>
 							<input type="checkbox" name="is_remember" id="for_remember">
 						</div>
 						<label for="for_remember">记住账号</label>
 						<a href="1.php" target="_blank">忘记密码？</a>
 					</li>
 					<li class="button">
 							<button class="dl" type="submit" style="outline:none;">登 录</button>
 					</li>
 				</ul>
 			</form>
 		<div class="clear"></div>
 	</div>
 	<?php include 'foot.php';?>
 </body>
 </html>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./public/css/login.css">  
</head>
<body>
	<div id='zc'>
		<div id='zc1'><img src="./public/images/6.jpg" alt=""></div>
		<div id='zc2'>已有账号  <a href='./index.php?c=enter&a=index'>请登录</a></div>
	</div>
	<hr/>
	<div class='zc123'>
		<div class='zczuo'>
			<!-- <form action='./login.php?c=login&a=index' method='POST'> -->
			<form action='./index.php?c=login&a=dologin' method='POST'>
				用 户 名：<input type='txt' name='uname' value='' placeholder='您的账户名和登录名'/></br></br>
				设置密码：<input type='password' name='qupwd' value='' placeholder='密码'/><br/></br>
				再次输入：<input type='password' name='upwd' value='' placeholder='密码'/><br/></br>
				验 证 码：<input type='text' name='yzm' value='' placeholder='输入验证码'/><br/><br/>
				<img src='./view/enter/yzm.php'  title="点 我 刷 新 呦"  style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" /><br/><br/>
				<input type="submit" value="登录" style="width:255px;">
			</form>
		</div>
		
		<div class='zcyou'><img src="/dashboard/s49_s/home/public/images/8.png" alt=""></div>
	</div>
	<?php
	include ("./view/base/base1.html");
	?>
</body>
</html>
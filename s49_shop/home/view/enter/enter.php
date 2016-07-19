<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./public/css/enter.css">  
</head>
<body>
	<div id='zctou'>
		<div><img src="./public/images/6.jpg" alt=""></div>
	</div>
	<div id='zctu'>
		<div id='zctu1'>
			<div id='dl'>
				<div class='dl1'>
					<h3>ECSEOP会员</h3>
					<div id='dl3'><a href='./index.php?c=login&a=index'>立即注册</a></div>
				</div>
				<form action='./index.php?c=enter&a=dologin' method='POST' >
					<div class='biaodan1'><img src="./public/images/1.png" alt=""><input type='txt' name='uname' value='' placeholder='用户名/邮箱/已验证手机' style="height:30px;"/></div><br/>
					<div class='biaodan2'><img src="./public/images/2.png" alt=""><input type='password' name='upwd' value='' placeholder='密码' style="height:30px;"/></div><br/>
					<div class='biaodan3'><input type='text' name='yzm' value='' placeholder='输入验证码' style="height:30px;"/></div>
					<div class='biaodan4'><img src='./view/enter/yzm.php'  title="点 我 刷 新 呦"  style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" /></div>
					<div class='biaodan5'><input type="submit" value="登录" style="width:173px;"></div>
				</form>
			</div>
		</div>	
	</div>
	<?php
	include ("./view/base/base1.html");
	?>
</body>
</html>
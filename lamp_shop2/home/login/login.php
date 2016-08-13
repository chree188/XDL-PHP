<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员登录页面</title>
	<style>
		#head{width:1200px;height:100px;margin:0 auto;margin-top:20px;}
		#head .throat{width:400px;height:100px;line-height:180px;float:left;}
		#head .nipple{width:91px;height:50px;float:right;margin-right:100px;margin-top:20px;}
		#chest{width:1204px;height:400px;margin:0 auto;margin-top:15px;}
		#chest .pit{width:600px;height:400px;border:1px solid #ccc;float:left;}
		#chest .pit .abdomen{width:545px;height:106px;margin-left:26px;}
		#chest .pit .thigh{width:325px;height:210px;margin-left:126px;margin-top:25px;}
		#chest .pit .thigh .touch{width:65px;height:28px;}
		#chest .pit .thigh .touchone{width:65px;height:31px;margin:0 0 -11px 0;}
		#chest .pit .thigh .button03{width:100px;height:30px;margin-left:30px;}
		#chest .navel{width:600px;height:400px;float:right;}
	</style>
</head>
<body>
	<div id="head">
	<div class="throat"><img src="../include/images/logo.png" alt=""></div>
	<div class="nipple"><a href="./reg.php"><img src="../include/images/2016-08-07_163543.png"></a></div>
	</div>
	<div id="chest">
		<div class="pit">
			<div class="abdomen"><img src="../include/images/2016-08-07_164609.png" alt=""></div>
			<div class="thigh">
				<form action="./action.php?bz=login" method="post">
					用户名：<input type="text" name="nickname" /><br /><br />
					密&nbsp;码：<input type="password" name="pwd" /><br /><br />
					验证码：<input type="text" class="touch" name="code" size="5"/>
						  <img src="../../public/commond/images/code.php" class="touchone" onclick="this.src='../../public/commond/images/code.php?id='+Math.random();"/><br /><br />
					<input type="submit" value="登录" class="button03" />
					<input type="reset" class="button03" />
				</form>
			</div>
		</div>
		<div class="navel"><img src="../include/images/n_s02068729821972654073.jpg" alt=""></div>
	</div>
	<?php include("../include/footer.php"); ?>
</body>
</html>
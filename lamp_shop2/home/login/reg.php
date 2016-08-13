<?php include '../init.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员注册页面</title>
	<!-- <link rel="stylesheet" href="<? CSS?>reg.css"> -->
	<style>
			#head{width:1200px;height:100px;margin:0 auto;margin-top:20px;line-height:180px
				;}
			#throat{width:1200px;height:520px;margin:0 auto;margin-top:10px;}
			#throat .nipple{width:530px;height:520px;border:1px solid #ccc;margin-left:30px;float:left;}
			#throat .nipple .chest{width:530px;height:71px;margin-top:10px;}
			#throat .nipple .pit{width:470px;height:671px;margin-top:10px;margin-left:75px;}
			#throat .nipple .pit .touch{width:76px;height:23px;}
			#throat .nipple .pit .text06{width:85px;height:25px;margin:0 0 -6px 0;}
			#throat .nipple .pit .button03{width:170px;height:41px;background:orange;font-size:20px;}
			#throat .navel{width:530px;height:520px;float:right;margin-right:100px;}
			#throat .navel .thigh{width:439px;height:78px;float:right;margin-right:91px;}
			#throat .navel .abdomen{width:440px;height:440px;}
	</style>
</head>
<body>
	<div id="head"><img src="../include/images/logo.png" alt=""></div>
	<div id="throat">
		<div class="nipple">
			<div class="chest"><img src="../include/images/2016-08-07_152508.png" alt=""></div>
			<div class="pit">
				<form action="./action.php?bz=reg" method="post">
							账&nbsp;&nbsp;号: <input type="text" name="nickname" placeholder="用户名" class="text05"><br><br>
							<!-- 真实姓名: <input type="text" name="name" class="text05"><br><br> -->
							密&nbsp;&nbsp;码: <input type="password" name="pwd" placeholder="密码" class="text05"><br><br>
							确认密码: <input type="password" name="repwd" placeholder="确认密码" class="text05"><br><br>
							
							<input type="submit" value="提交注册" class="button03"> <input type="reset" class="button03">
					</form>
				
			</div>
		</div>
		<div class="navel">
			<div class="thigh"><img src="../include/images/brand_logo.jpg" alt=""></div>
			<div class="abdomen"><img src="../include/images/1561bd879cb12ab196005951df21d12b.jpg" alt=""></div>
		</div>
	</div>
	<?php include("../include/footer.php"); ?>
</body>
</html>
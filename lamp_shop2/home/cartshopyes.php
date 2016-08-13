<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单完成页</title>
	<style>
		#head{width:1200px;height:330px;border:1px solid orange;margin:0 auto;}
		#head .throat{width:1200px;height:50px;border:1px solid red;}
		#head .throat .nipple{width:1200px;height:50px;border:1px solid red;line-height:50px;background:#FFA800;}
		#head .throat .chest{width:1200px;height:250px;margin-top:10px;}
		#head .throat .chest .pit{width:1200px;height:150px;margin-top:47px;}
		#head .throat .chest .pit .navel{width:200px;height:150px;float:left;margin-left:300px;}
		#head .throat .chest .pit .abdomen{width:500px;height:150px;margin-left:500px;}
		#head .throat .chest .pit .abdomen .thigh{width:500px;height:50px;line-height:50px;color:#ccc;}
		#head .throat .chest .pit .abdomen .neck{width:500px;height:50px;line-height:50px;font-size: 15px;color:#ccc;}
		#head .throat .chest .pit .abdomen .shoulder{width:500px;height:50px;line-height:50px;color:#ccc;}
		#head .throat .chest .pit .abdomen .shoulder .orange{color:orange;}
	</style>
</head>
<body>
	<?php include("./include/header.php"); ?>
	<div id="head">
		<div class="throat">
			<div class="nipple"><h2>订单完成</h2></div>
			<div class="chest">
				<div class="pit">
					<div class="navel"><img src="./include/images/mark03.jpg" alt=""></div>
					<div class="abdomen">
						<div class="thigh"><h2>恭喜，您的订单已成功生成！</h2></div>
						<div class="neck"><h2>请保持您的手机畅通，我们将有专人与您联系。</h2></div>
						<div class="shoulder"><h2>您可以选择
						<a href="./list.php" class="orange">继续购物</a>,或<a href="./index.php" class="orange">返回首页</a>。</h2></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("./include/footer.php"); ?>
</body>
</html>
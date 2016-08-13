<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单详情页</title>
		<link href="./include/css/cartshop.css" rel="stylesheet" type="text/css"/>
	
</head>
<body>
	<?php include("./include/header.php"); ?>
	<div id="head">
		<div class="throat"><img src="./include/images/flow01.jpg" alt=""></div>
		<div class="chest"><h1>填写收货地址并核对订单信息</h1></div>
		<div id="pit">
			<div class="navel"><h2>填写收货地址</h2></div>
			<div class="abdomen">
				<form action="post"action="">
					<table width="100%">
						<tr>
							<td class="l">登录账号：</td>
							<td>
								<input type="text" class="text06" readonly value="" />
							</td>
						</tr>
						<tr>
							<td class="l">收件人：</td>
							<td>
								<input type="text" name="linkman" class="text08" value="" />
							</td>
						</tr>
						<tr>
							<td class="l">详细地址：</td>
							<td>
								<input type="text" name="address" class="text10" value="" />
								&nbsp;邮编：<input type="text" name="code" class="text09" value="" />
							</td>
						</tr>
						<tr>
							<td class="l">手机号码：</td>
							<td>
								<input type="text" name="phone" class="text11"  value="" />
							</td>
						</tr>
						<tr>
							<td class="l">备注：</td>
							<td>
								<textarea name="descr" value="" cols="55px" rows="33px" class="text-word"></textarea>
							</td>
						</tr>
					</table>
					<div id="thigh">
						<div class="thigh-one"><a href=""><img src="./include/images/button10.jpg" alt=""></a></div>
						<div class="thigh-two"><h3>金额总计：</h3></div>
						<div class="thigh-three"><h3>数量总计：</h3></div>
						<div class="thigh-four"><a href="./cartshopyes.php"><img src="./include/images/button11.jpg" alt=""></a></div>
					</div>
				

			
			</form>
			</div>
		</div>
	</div>
	<?php include("./include/footer.php"); ?>
</body>
</html>
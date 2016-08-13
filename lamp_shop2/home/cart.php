<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车页</title>
		<link href="./include/css/cart.css" rel="stylesheet" type="text/css"/>
	
</head>
<body>
	<?php include("./include/header.php"); ?>
	<div id="head">
		<div class="throat">
			<div class="throat-one"><h2>会员下单实惠</h2></div>
			<div class="throat-two"><h5>会员享受新客优惠，获得积分，VIP特价，专享商品，更有赠券等你拿！如果您已拥有名门新娘婚纱礼服官方商城账户，则可</h5></div>
			<div class="throat-three">立即登陆</div>
			<div class="throat-four">注册</div>
		</div>
		<div id="nipple">
			<!-- <div class="nipple-one"><h2>1 商品清单</h2></div> -->
			<div class="chest"><img src="./include/images/flow.jpg" alt=""></div>
			<div class="pit">
				<table width="100%">
					<tr>
						<td class="tt">商品</td>
						<td class="tt">价格</td>
						<td class="tt">库存</td>
						<td class="tt">数量</td>
						<td class="tt">小计</td>
						<td class="tt">操作</td>
					</tr>
				</table>
			</div>
			<div id="navel">
				<div class="navel-one"><a href=""><h2>清空购物车</h2></a></div>
				<div class="navel-two"><h2>总计金额：</h2></div>
			</div>
			<div id="abdomen">
				<div class="abdomen-one"><a href="./list.php"><img src="./include/images/button10.jpg"></a></div>
				<div class="abdomen-two"><a href="cartshop.php"><img src="./include/images/button11.jpg"></a></div>
			</div>
		</div>
	</div>
	<?php include("./include/footer.php"); ?>
</body>
</html>
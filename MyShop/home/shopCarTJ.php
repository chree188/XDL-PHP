<html>
	<head>
		<meta charset="UTF-8" />
		<title>天慈天养_购物车_提交订单</title>
	</head>
	<body>
		<div class="content icontent">
			<?php	
				include'./include/header.php';
			?>
			<div class="inner">
				<div class="buyflow">
					<div class="flow">
						<img src="./include/img/flow01.jpg" width="980" height="57" />
					</div>
					<div class="flowtt">
						填写收货地址并核对订单信息
					</div>
					<div class="ordercon">
						<div class="title">
							填写收货地址
						</div>
						<div class="address">
							<table width="100%">
								<tr>
									<td class="l">收货人</td>
									<td>
										<input type="text" class="text09" />
									</td>
								</tr>
								<tr>
									<td class="l">所在地区</td>
									<td>
										<select>
											<option>浙江</option>
										</select>
										<select>
											<option>浙江</option>
										</select>
										<select>
											<option>浙江</option>
										</select>
									</td>
								</tr>
								<tr>
									<td class="l">详细地址</td>
									<td>
										<input type="text" class="text10" />
									</td>
								</tr>
								<tr>
									<td class="l">手机号码</td>
									<td>
										<input type="text" class="text09" />
										或 固定电话
										<input type="text" class="text09" />
									</td>
								</tr>
								<tr>
									<td class="l">邮箱</td>
									<td>
										<input type="text" class="text09" />
									</td>
								</tr>
								<tr>
									<td class="l">备注</td>
									<td>
										<textarea class="text11"></textarea> 天慈天养会员用户请在此填写您的会员卡号
									</td>
								</tr>
							</table>
						</div>
						<div class="payt">
							<span class="title">支付及配送方式</span>&nbsp;&nbsp;&nbsp;&nbsp;送货上门|货到付款
						</div>
						<div class="detail">
							<div class="title">
								商品清单
							</div>
							<div class="c">
								<table width="100%">
									<tr>
										<td class="t">商品</td>
										<td class="t">数量</td>
										<td class="t">小计</td>
									</tr>
									<tr>
										<td>
											<div class="m">
												<a href="#_">
													<img src="./include/img/p.jpg" width="85" height="55" />
												</a>
											</div>
											<div class="i">
												<a href="#_">
													野生菌菇
												</a>
											</div></td>
										<td>×2</td>
										<td>￥135</td>
									</tr>
									<tr>
										<td>
											<div class="m">
												<a href="#_">
													<img src="./include/img/p.jpg" width="85" height="55" />
												</a>
											</div>
											<div class="i">
												<a href="#_">
													野生菌菇
												</a>
											</div></td>
										<td>×2</td>
										<td>￥135</td>
									</tr>
									<tr>
										<td>
											<div class="m">
												<a href="#_">
													<img src="./include/img/p.jpg" width="85" height="55" />
												</a>
											</div>
											<div class="i">
												<a href="#_">
													野生菌菇
												</a>
											</div></td>
										<td>×2</td>
										<td>￥135</td>
									</tr>
									<tr>
										<td class="llast" colspan="3">共 <span class="orange">3</span> 件商品，总商品金额：  ￥688.00</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="but">
						<div class="r">
							金额总计：<span class="numcon">￥<span class="num">135</span></span>
							<a href="shopCarCG.php">
								<img src="./include/img/button11.jpg" />
							</a>
						</div>
						<a href="#_">
							<img src="./include/img/button10.jpg" />
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php	
			include'./include/footer.php';
		?>
	</body>
</html>
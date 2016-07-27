<html>
	<head>
		<meta charset="UTF-8" />
		<title>购物车_提交订单</title>
		<link link rel="shortcut icon" type="imagex-icon" href="../favicon.ico" />
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
						<div class="detail">
							<div class="title">
								商品清单
							</div>
							<div class="c">
								
								<table width="100%">
							<tr>
								<td width="200" class="tt">商品</td>
								<td width="130" class="tt">价格</td>
								<td width="95" class="tt">数量</td>
								<td width="130" class="tt">小计</td>
							</tr>
			<!--展示购物车-->
			<?php
				//判断购物车中是否有商品，并遍历输出
				$total=0; //定义一个存放总金额的变量
				if(!empty($_SESSION['shoplist'])){
					foreach($_SESSION['shoplist'] as $shop){
						echo "<tr>";
						echo "<td>";
						echo "<div class='m'>";
						echo "<img src='../admin/goods/uploads/s_{$shop['picname']}' width='85' height='55' />";
						echo "</div>";
						echo "<div class='i'>{$shop['goods']}</div>";
						echo "</td>";
						echo "<td class='num'>￥{$shop['price']}</td>";
						echo "<td class='num'>{$shop['m']}</td>";
						echo "<td>";
						echo "<span class='num'>￥<span class='num'>".($shop['m']*$shop['price'])."</span></span>";
						echo "</td>";
						echo "</tr>";
						$total += $shop['m'] * $shop['price']; //累加每次的小计
						$num += $shop['m'];
					}
				}
						echo "</table>";
						echo "<div class='handdle'>";
						echo "<div class='allprice'>金额总计：<span class='num'>￥<span class='num'>{$total}</span></span>&nbsp;&nbsp;数量总计：<span class='num'>{$num}</span></div>";
						echo "</div>";
						//将统计出来的总金额存放到session中
						$_SESSION['total']=$total;
			?>		
							</div>
						</div>
					</div>
					<div class="but">
						<div class="r">
							<a href="./shopCarCG.php">
								<img src="./include/img/button11.jpg" />
							</a>
						</div>
						<a href="./shopCar.php">	<!--返回购物车-->
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
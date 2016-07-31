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
					<div class="num">
						填写收货地址并核对订单信息
					</div>
					<div class="ordercon">
						<div class="title">
							填写收货地址
						</div>
						<div class="address">
							<form method="post" action="./shopCar/orderaction.php?a=add">
							<table width="100%">
								<!--<tr>		//订单号这里不让用户看到,在用户中心显示最终生成订单号展示给用户
									<td class="l">订单号：</td>
									<td>
										<input type="text" class="text09" readonly value="<?php echo date('YmdHis',time()).substr(microtime(),2,4);?>" />
										<b>订单号以最终提交生成的为主</b>
									</td>
								</tr>-->
								<!--用隐藏域传：1、按时间戳生成的订单号 2、商品总价 3、用户ID 4、状态值_默认新订单1-->
								<input type="hidden" name="odid" value="<?php echo date('YmdHis',time()).substr(microtime(),2,4);?>" />
								<input type="hidden" name="total" value="<?php echo $_SESSION['total'];?>" />
								<input type="hidden" name="uid" value="<?php echo $_SESSION['user']['id'];?>" />
								<input type="hidden" name="status" value="1" />
								<tr>
									<td class="l">登录账号：</td>
									<td>
										<input type="text" class="text06" readonly value="<?php echo $_SESSION['user']['username'];?>" />
									</td>
								</tr>
								<tr>
									<td class="l">收件人：</td>
									<td>
										<input type="text" name="linkman" class="text08" value="<?php echo $_SESSION['user']['name'];?>" />
									</td>
								</tr>
								<tr>
									<td class="l">详细地址：</td>
									<td>
										<input type="text" name="address" class="text10" value="<?php echo $_SESSION['user']['address'];?>" />
										&nbsp;邮编：<input type="text" name="code" class="text09" value="<?php echo $_SESSION['user']['code'];?>" />
									</td>
								</tr>
								<tr>
									<td class="l">手机号码：</td>
									<td>
										<input type="text" name="phone" class="text09"  value="<?php echo $_SESSION['user']['phone'];?>" />
									</td>
								</tr>
								<tr>
									<td class="l">备注：</td>
									<td>
										<textarea name="descr" value="" cols="42px" rows="7px" class="text-word"></textarea>
									</td>
								</tr>
							</table>
							<div class="but">
								<div class="r">
									<?php
										echo "金额总计：<span class='num'>￥<span class='num'>{$_SESSION['total']}</span></span>&nbsp;&nbsp;
										</span>&nbsp;";
//										数量总计：<span class='num'>{$_SESSION['num']}	出bug,单独提出来，以后解决了再放进
									?>
									<input type="image" src="./include/img/button11.jpg" onclick="javascript:document.forms['Form_2'].submit();" />
								</div>
								<a href="./shopCar.php">	<!--返回购物车-->
									<img src="./include/img/button10.jpg" />
								</a>
								</div>
							</form>
						</div>
						<!--------------------------------------------------------------------------------------->
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
						/*echo "<div class='handdle'>";			//总金额和总数量已经放在提交订单按钮前显示
						echo "<div class='allprice'>金额总计：<span class='num'>￥<span class='num'>{$total}</span></span>&nbsp;&nbsp;数量总计：<span class='num'>{$num}</span></div>";
						echo "</div>";*/
						//将统计出来的总数量存放到session中
						$_SESSION['num'] = $num;
						//将统计出来的总金额存放到session中
						$_SESSION['total'] = $total;
			?>		
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<?php	
			include'./include/footer.php';
		?>
	</body>
</html>
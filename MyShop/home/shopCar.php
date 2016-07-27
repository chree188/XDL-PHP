<html>
	<head>
		<meta charset="UTF-8" />
		<title>天慈天养_购物车</title>
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
						<img src="./include//img/flow.jpg" width="980" height="57" />
					</div>
					<div class="buylist">
						<table width="100%">
							<tr>
								<td width="200" class="tt">商品</td>
								<td width="130" class="tt">价格</td>
								<td width="130" class="tt">库存</td>
								<td width="95" class="tt">数量</td>
								<td width="130" class="tt">小计</td>
								<td class="tt">操作</td>
							</tr>
							<!---->
							<?php
				//判断购物车中是否有商品，并遍历输出
				$total=0; //定义一个存放总金额的变量
				if(!empty($_SESSION['shoplist'])){
					foreach($_SESSION['shoplist'] as $shop){
						echo "<tr>";
						echo "<td>{$shop['goods']}</td>";
						echo "<td><img src='./uploads/s_{$shop['picname']}'/></td>";
						echo "<td>{$shop['price']}</td>";
						echo "<td><button onclick=\"window.location='shopaction.php?a=edit&id={$shop['id']}&m=-1'\">-</button> {$shop['m']} <button onclick=\"window.location='shopaction.php?a=edit&id={$shop['id']}&m=1'\">+</button></td>";
						echo "<td>".($shop['m']*$shop['price'])."</td>";
						echo "<td><a href='shopaction.php?a=del&id={$shop['id']}'>删除</a></td>";
						echo "</tr>";
						$total +=$shop['m']*$shop['price']; //累加每次的小计
					}
				}
				echo "<tr>";
				echo "<th>总计：</th>";
				echo "<td colspan='4' align='right'>{$total}</td>";
				echo "<td>&nbsp;</td>";
				echo "</tr>";
				
				//将统计出来的总金额存放到session中
				$_SESSION['total']=$total;
			?>
							
			<!--<?php
				//判断购物车中是否有商品，并遍历输出
				$total=0; //定义一个存放总金额的变量
				if(!empty($_SESSION['shoplist'])){
					foreach($_SESSION['shoplist'] as $shop){
$str = <<<aa
							<tr>
								<td>
									<div class="m">
										<a href="#_">
											<img src="./include//img/p.jpg" width="85" height="55" />
										</a>
									</div>
									<div class="i">
										<a href="#_">
											野生菌菇
										</a>
									</div></td>
								<td>￥135</td>
								<td>有货</td>
								<td><span class="jian"></span>
										<span class="txt">
											<input type="text" value="1" class="text07" />
										</span>
									<span class="jia"></span>
								</td>
								<td><span class="numcon">￥<span class="num">135</span></span></td>
								<td>
									<a href="#_" class="thd orange">
										删除
									</a></td>
							</tr>
aa;
					//将统计出来的总金额存放到session中
					$_SESSION['total']=$total;
					echo $str;
							}
                    	?>-->
						</table>
						<div class="handdle">
							<div class="allprice">
								金额总计：<span class="numcon">￥<span class="num">135</span></span>
							</div>
							<div class="del">
								<a href="#_">
									删除选中的商品
								</a>
							</div>
						</div>

					</div>
					<div class="but">
						<div class="r">
							<a href="shopCarTJ.php">
								<img src="./include/img/button11.jpg" />
							</a>
						</div>
						<a href="./lists.php">
							<img src="./include/img/button10.jpg" />
						</a>
					</div>
				</div>
			</div>
			<?php	
				include'./include/footer.php';
			?>
		</div>
	</body>
</html>
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
						echo "<div class='i'>";
						echo "<a href='../admin/goods/uploads/m_{$shop['picname']}'>{$shop['goods']}</a>";
						echo "</div>";
						echo "</td>";
						echo "<td>￥{$shop['price']}</td>";
						echo "<td>{$shop['store']}</td>";
						echo "<td><button onclick=\"window.location='./shopCar/shopaction.php?a=edit&id={$shop['id']}&m=-1'\">-</button>
						 {$shop['m']} <button onclick=\"window.location='./shopCar/shopaction.php?a=edit&id={$shop['id']}&m=1'\">+</button></td>";
						echo "<td>";
						echo "<span class='numcon'>￥<span class='num'>".($shop['m']*$shop['price'])."</span></span>";
						echo "</td>";
						echo "<td>";
						echo "<a href='./shopCar/shopaction.php?a=del&id={$shop['id']}' class='thd orange'>删除</a>";
						echo "</td>";
						echo "</tr>";
						$total +=$shop['m']*$shop['price']; //累加每次的小计
					}
				}
						echo "</table>";
						echo "<div class='handdle'>";
						echo "<div class='allprice'>
								金额总计：<span class='numcon'>￥<span class='num'>{$total}</span></span>
							</div>";
						echo "<div class='del'><a href='#_'>清空购物车</a></div>";
						echo "</div>";
						//将统计出来的总金额存放到session中
						$_SESSION['total']=$total;
			?>
			<!--展示购物车-->
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
<?php 
	include 'head.php';
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车</title>
	<link rel="stylesheet" href="<?= CSS ?>cart.css">
</head>
<body>
	<div id="title">我的购物车</div>
	<?php if(empty($_SESSION['cart'])): ?>
		<div class='cart_null_box'>
			<div class="cart">
				<span>&#xe622;</span>
			</div>
			<div class='cart_null'>
				<p>购物车暂无商品</p>
				<a href="index.php">我们快去购物吧></a>
			</div>
		</div>
	<?php endif; ?>
	<form action="./cart-checkout.php" method="post" class="form">
		<table id="cart_main">
			<thead>
				<tr>
					<th class="th1" colspan="2">商品</th>
					<th class="th2">属性</th>
					<th class="th3">单价</th>
					<th class="th4">数量</th>
					<th class="th5">小计</th>
					<th class="th6">操作</th>
				</tr>
			</thead>
			<tbody class="cart-item">
			<?php if(!empty($_SESSION['cart'])):?>
				<?php foreach($_SESSION['cart'] as $v):?>
					<?	//var_dump($_SESSION['cart']);
					// var_dump($v);
					?>
					<tr class="cart-product last" style="border-bottom:1px solid #f1f1f1;">
						<td class="td1">
							<div class="p-pic">
								<a href="" target="_blank">
									<img src="<?= img_url($v['icon'])?>" alt="" width="120px">
								</a>
							</div>
						</td>
						<td class="p-info">
							<div class="p-title">
								<a href="" target="_blank"><?=$v['name']?></a>
							</div>
						</td>
						<td>
							<div class="bang">1.0磅</div>
							<div class="zs">
								<span style="background:#8c6a52; color:#fff; padding:0 4px; margin-right:5px;">标配</span>
								餐具套装5套
							</div>
						</td>
						<td class="p-price">&yen;<?=$v['price']?></td>
						<td class="NUM">
							<span class="num">
	 							<a class="les" href="action.php?bz=jian&id=<?=$v['id']?>" title="减少数量" ></a>
	 							<input class="number" disabled="disabled" value="<?=$v['count']?>" >
	 							<a class="add1" href="action.php?bz=jia&id=<?= $v['id']?>" title="增加数量"></a>
	 							<a class="time" href=""></a>
	 						</span>
						</td>
						<td class="p-subtotal">&yen;<?=($v['price'])*($v['count'])?></td>
						<td class="p-action">
							<a href="action.php?bz=del&id=<?= $v['id']?>">
								<img src="<?= IMG ?>delete.jpg" alt="">
							</a>
						</td>
					</tr>
					<?php  
						$count = $v['count'];
						$sum += $count * $v['price'];
						$num2 +=$count;
					?>
				<?php endforeach;?>
			<?php endif;?>
			</tbody>
			<tfoot class="right">
					<tr class="hr-bg">
						<td class="zw" colspan="3"></td>
						<td class="order-price" colspan="4">
							<ul>
								<li class="goods" style="text-align:right;font-size:14px;">
									<span class="label">
										<span class="cart_number" style="color:#D1BDAB; font-size:14px">
											(共&nbsp;<span><?=$num2?></span>&nbsp;件)
										</span>
										商品金额:
									</span>
								<span class="price" style="text-alin:right;padding:0 15px 0 5px;">
										&yen;<?=$sum?></span>
								</li>
								<li class="goods" style="text-align:right;font-size:14px;">
									<span class="label">
										配送费:
									</span>
								<span class="price" style="text-alin:right;padding:0 15px 0 5px;">
										&yen;0</span>
								</li>
								<li class="goods" style="text-align:right;font-size:18px;">
									<b class="label">
										总计金额:&nbsp;
									</b>
								<span class="price" style="text-alin:right;padding:0 15px 0 5px;">
										&yen;<?=$sum?></span>
								</li>
								<li class="cost"></li>
								<li class="total"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<td colspan="3" class="cart-left">
							<button type="button" class="clean" title="清空购物车" style="border:none;padding:0;background:white;"><a href="action.php?bz=del-all"><img src="<?=IMG?>cart_03.jpg" alt="" width="40px";></a></button>
						</td>
						<td colspan="4" class="cart-right">
							<a href="cake-all.php" class="btn-link" style="width: 148px;height: 48px;background: #F8F6F7;border: solid 1px #d5c2b9;color: #8e6a55;display: inline-block;line-height: 48px;text-align: center;font-size: 18px;margin-right: 10px;">继续购物</a>

								<a href="action.php?bz=orderinfo"><span style="width: 148px;height: 48px;font-family:Microsoft Yahei;background: #432818;color: white;display: inline-block;line-height: 48px;text-align: center;font-size: 18px;">下单结算</span></a>
						</td>
					</tr>
			</tfoot>
		</table>
	</form>
	<?php include 'sale-top.php'; ?>
	<?php include 'foot.php';?>
	 	<script>
		// 通过id 获取 购买数量表单 的对象
		var mynum = document.getElementById('mynum');   

		function jian(){
			// mynum.value  是代表 id为mynum的value值
			// 正常减1
			if(  mynum.value  > 0 ){
				mynum.value = mynum.value - 1;
			}

			// 判断如果购买数量小于1(负值或者0) ,直接赋值1 
			if( mynum.value < 1){
				mynum.value = 1;
			}
		}


		function jia(){
			//  js中 + 是作为拼接符, 
			mynum.value = parseInt(mynum.value) + 1;
		}
	</script>
</body>
</html>
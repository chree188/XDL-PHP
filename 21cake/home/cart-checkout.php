<?php 
	include 'head.php';
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车</title>
	<link rel="stylesheet" href="<?= CSS ?>cart-checkout.css">
</head>
<body>
	<div id="title">订单信息</div>
	<form action="action.php?bz=buy" method="post" class="form">
		<table id="cart_main">
			<thead>
				<tr>
					<th class="th1" colspan="2">商品</th>
					<th class="th2">属性</th>
					<th class="th3">单价</th>
					<th class="th4">数量</th>
					<th class="th5">小计</th>
				</tr>
			</thead>
			<?php foreach($_SESSION['cart'] as $v):?>
				<tbody class="cart-item">
					<tr class="cart-product last">
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
	 							<input class="number" type="text" value="<?=$v['count']?>" readonly="">
	 						</span>
						</td>
						<td class="p-subtotal">&yen;<?=($v['price'])*($v['count'])?></td>
					</tr>		
				</tbody>
				<?php  
					$count = $v['count'];
					$sum += $count * $v['price'];
					$num3 += $count;
				?>
			<?php endforeach;?>
			<tfoot class="right">
				<tr class="shdz">
					<td colspan="6">
						<span id="shxx">送货信息</span>
					</td>
				</tr>
				<tr class="com">
					<td colspan="6">
						<input type="text" name="receiver" placeholder="收货人" required>
					</td>
				</tr>
				<tr class="com">
					<td colspan="6">
						<input type="text" name="address" placeholder="收货地址" required>
					</td>
				</tr>
				<tr class="com">
					<td colspan="6">
						<input type="text" name="phone" maxlength="11"; placeholder="联系电话" required>
					</td>
				</tr>
				<tr class="pay">
					<td colspan="6">
						<span id="fkxx">付款信息</span>
					</td>
				</tr>
				<tr class="hr-bg">
					<td class="zw" colspan="3"></td>
					<td class="order-price" colspan="3">
						<ul>
							<li class="goods" style="text-align:right;font-size:14px;">
								<span class="label">
									<span class="cart_number" style="color:#D1BDAB; font-size:14px">
										(共&nbsp;<span><?=$num3?></span>&nbsp;件)
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
					<td colspan="6" style="margin:20px 0; text-align:right;padding:15px;">
						<span style="font-size:16px;">请选择付款方式：</span>
						<select name="orderway" id="" style="margin:20px 0;padding:10px;">
								<!-- <option value="" readolny="">付款方式</option> -->
								<option value="1">在线支付</option>
								<option value="2">货到付款</option>
						</select>
					</td>
				</tr>
				<input type="hidden" name='amount' value="<?=$sum?>">
				
				<tr>
					<td colspan="6" class="cart-right">
						请确认信息无误后下单
						<button type="submit" class="btn-huge" style="padding:0;border:none;">
							<a href="action.php?bz=buy"><span style="width: 148px;height: 48px;font-family:Microsoft Yahei;background: #432818;color: white;display: inline-block;line-height: 48px;text-align: center;font-size: 18px;">提交订单并购买</span></a>
						</button>
					</td>
				</tr>
			</tfoot>
		</table>
	</form>
	<?php include 'foot.php';?>
</body>
</html>
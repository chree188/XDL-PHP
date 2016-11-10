<?php 
	include 'head.php';
	$id = $_SESSION['home']['id'];

	// $sql = 'select o.orderNum, o.time, o.phone, o.address, o.orderWay, o.isPay, o.status, o.isReceive, o.cancel, o.receiver, g.icon, g.gname, g.price, g.count 
	// 		from orders o, ordersGood g
	// 		where o.id = g.oid and o.uid='.$id; 

	// $sql = 'select id, orderNum, time, phone, receiver, address, orderWay, isPay, status, isReceive, cancel from orders where uid ='.$id. ' order by time desc';

	// $oid_list = query($sql);
	// var_dump($oid_list);
	// $oid .= $v['id'].','; 
	// $oid = rtrim($oid,',');
	// $sql = 'select * from ordersgood where oid in ('.$oid.')';
	// $new_list = query($sql);
	// var_dump($new_list);
	// $sql = 'select o.id, o.orderNum, o.time, o.phone, o.address, o.orderWay, o.isPay, o.status, o.isReceive, o.cancel, o.receiver, o.amount, c.ogid 
	// from orders o,goodscomment c 
	// where o.id = c.oid and o.uid ='.$id. ' order by time desc';
	$sql='select id,orderNum,time,phone,address,orderWay, isPay, status, isReceive, cancel,receiver, amount
	from orders
	where uid='.$id. ' order by time desc';
	$oid_list = query($sql);

	// $oid = '';
	// if($oid_list){
	// foreach($oid_list as $v){
	//     $oid = $v['id'].','  ; 
	// }
	// $oid = rtrim($oid,',');
	// var_dump($oid);

	// $sql = 'select * from ordersgood where oid ='.;
	// echo $sql;
	// $new_list = query($sql);
	// }





 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>订单信息</title>
	<link rel="stylesheet" href="<?= CSS ?>buy.css">
</head>
<body>
	<div id="title">订单信息</div>
	<?php if($oid_list): ?>
		<?php foreach ($oid_list as $value ): ?>
			<form action="action.php?id=<?=$value['id']?>" method="post" class="form">
				<table id="cart_main" style="width:1200px;">
					<thead>
						<tr style="border:none;">
							<td colspan="3" style="background:white;text-align:left;padding-left:10px;">订单编号 :&nbsp;<span><?= $value['orderNum']?></span></td>
							<td colspan="5" style="background:white;text-align:left;padding-left:10px;">下单时间 :&nbsp;<span><?= date('Y-m-d h:i:s',$value['time'])?></span></td>
						</tr>
						<tr style="border:none;">
							<td colspan="3" style="background:white;text-align:left;padding-left:10px;">收货人 :&nbsp;<span><?=htmlentities($value['address'])?></span></td>
							<td colspan="5" style="background:white;text-align:left;padding-left:10px;">联系电话 :&nbsp;<span><?=$value['phone']?></span></td>
						</tr>
						<tr style="border:none;">
							<td colspan="9" style="background:white;text-align:left;padding-left:10px;">收货地址 :&nbsp;<span><?=htmlentities($value['address'])?></span></td>
						</tr>
						
							
						
						<tr>
							<th>商品</th>
							<th>商品名</th>
							<th>单价</th>
							<th>数量</th>
							<th>运费</th>
							<th>小计</th>
							<th>付款方式</th>
							<th>支付状态</th>
							<th>发货状态</th>
							<th>订单状态</th>
							
						</tr>
					</thead>
					
					
					
					
						<?php 
							$oid = $value['id']; 
							$sql = 'select g.gname, g.icon, g.price, g.count, o.orderWay, o.status, o.isReceive, o.cancel from ordersgood g, orders o where g.oid=o.id and oid ='.$oid;
							$new_list = query($sql); 

							$sql = 'select comment from goodscomment where oid ='.$value['id'];
							$comment_list = query($sql);
						?>
						<?php foreach ($new_list as $v ): ?>
						<tbody class="cart-item">
							<tr class="cart-product last">
								<td class="td1">
									<div class="p-pic">
										<a href="" target="_blank">
											<img src="<?= img_url($v['icon'])?>" alt="" width="60px">
										</a>
									</div>
								</td>
								<td class="p-info">
									<div class="p-title">
										<a href="" target="_blank"><?=$v['gname']?></a>
									</div>
								</td>
								<td class="p-action">
									<?=$v['price']?>
								</td>
								<td class="p-action">
									<?=$v['count']?>
								</td>
								<td class="p-action">
									0
								</td>
								<td class="p-price"><?=($v['price'])*($v['count'])?></td>
								<td class="p-action">
									<?=$v['orderWay']==1?'在线支付':'货到付款';?>
								</td>
								<td class="p-action">
									已支付
								</td>
								<td class="p-action">
									<?=$v['status']==1?'未发货':'已发货';?>
								</td>
								<td class="p-action">
									<?php if($v['cancel']==1):?>
										<?php if($v['isReceive']==1):?>
											进行中...
										<?php else:?>
											订单完成
										<?php endif;?>
									<?php else:?>
										无效订单,已退货退款
									<?php endif;?>
								</td>
							</tr>
						</tbody>
						<?endforeach;?>

					<tfoot class="right">
						<tr class="hr-bg">
							<td class="zw" colspan="3"></td>
							<td class="order-price" colspan="10">
								<ul>
									
									<li class="goods" style="text-align:right;font-size:18px;">
										<b class="label">
											支付金额:&nbsp;
										</b>
									<span class="price" style="text-alin:right;padding:0 15px 0 5px;">
											&yen;<?= $value['amount']?></span>
									</li>
									<li class="cost"></li>
									<li class="total"></li>
								</ul>
							</td>
						</tr>
						<tr style="text-align:right;">
							<td colspan="10" class="cart-right" >
								<?php if($value['cancel']==1):?>
									<a href="action.php?bz=cancel&id=<?=$value['id']?>" class="btn-link" style="width: 148px;height: 48px;background: #F8F6F7;border: solid 1px #d5c2b9;color: #8e6a55;display: inline-block;line-height: 48px;text-align: center;font-size: 18px;margin-right: 10px;">退货退款</a>
								<?php endif;?>
								<?php if($value['cancel']==1):?>
									<?php if($value['isReceive']==1):?>
										<!-- <button type="submit" class="btn-huge" style="padding:0;border:none;"> -->
										<?php if($value['status']==2):?>
											<a href="action.php?bz=receive&id=<?=$value['id']?>"><span style="width: 148px;height: 48px;font-family:Microsoft Yahei;background: #432818;color: white;display: inline-block;line-height: 48px;text-align: center;font-size: 18px;">确认收货</span></a>
										<!-- </button> -->
										<?php endif;?>
									<?php else:?>
										<!-- <button type="submit" class="btn-huge" style="padding:0;border:none;"> -->
										<?php if(empty($comment_list[0]['comment'])):?>
											<a href="comment.php?&id=<?=$value['id']?>"><span style="width: 148px;height: 48px;font-family:Microsoft Yahei;background: #432818;color: white;display: inline-block;line-height: 48px;text-align: center;font-size: 18px;">去写评论</span></a>
										<?php else:?>
											<a href="comment.php?&id=<?=$value['id']?>"><span style="width: 148px;height: 48px;font-family:Microsoft Yahei;background: #432818;color: white;display: inline-block;line-height: 48px;text-align: center;font-size: 18px;">查看评论</span></a>
										<?php endif;?>
										<!-- </button> -->
									<?php endif;?>
								<?php endif;?>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
		<?php endforeach ?>
	<?php else:?>
		<div class='cart_null_box'>
			<div class="cart">
				<span>&#xe622;</span>
			</div>
			<div class='cart_null'>
				<p>您暂无订单</p>
				<a href="index.php">我们快去购物吧></a>
			</div>
		</div>
	<?php endif ?>
	
	
	<?php include 'foot.php';?>
</body>
</html>
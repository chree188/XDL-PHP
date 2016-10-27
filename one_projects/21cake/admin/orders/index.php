<?php 
	include '../init.php';

	$tel = $_POST['tel'];
	if(empty($tel)){
		$sql = '
				select o.id, o.uid, u.tel, o.orderNum, o.time, o.amount, o.status, o.isReceive, o.isPay, o.orderWay, o.cancel
				from  orders o, user u
				where o.uid = u.id
				order by o.time desc
				';
	}else{
		$sql = '
				select o.id, o.uid, u.tel, o.orderNum, o.time, o.amount, o.status, o.isReceive, o.isPay, o.orderWay, o.cancel
				from  orders o, user u
				where o.uid = u.id and tel like "%'.htmlentities($tel).'%"
				order by o.time desc 
				';
	}

	$status = $_GET['a'];

	if(empty($status)){
		$sql = '
				select o.id, o.uid, u.tel, o.orderNum, o.time, o.amount, o.status, o.isReceive, o.isPay, o.orderWay, o.cancel
				from  orders o, user u
				where o.uid = u.id
				order by o.time desc
				';
	}else{
		$sql = '
		select o.id, o.uid, u.tel, o.orderNum, o.time, o.amount, o.status, o.isReceive, o.isPay, o.orderWay, o.cancel
		from  orders o, user u
		where o.uid = u.id and o.status = '.$status.'
		order by o.time desc 
		';
	}
	
	

	$result = page($sql);
	$order_list = $result[1];
	$page = $result[0];

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= PUB_CSS?>commond.css">
	<link rel="stylesheet" href="<?= PUB_CSS?>iconfont/iconfont.css">
</head>
<body>
	<div class="container">
	    <div id="search">
	      <form action="index.php" method='post'>
	      	 Tel : <input type="text" name="tel" class='search' maxlength="11">
	      	<input class="button" type="submit" value="Search" >
	      </form>
	    </div>
	</div>
	<a href="index.php?a=1">[ 未处理订单 ]</a>
	<a href="index.php?a=2">[ 已处理订单 ]</a>
	<table class='table'>
		<tr>
			<th>编号</th>
			<th>用户id</th>
			<th>手机号</th>
			<th>订单号</th>
			<th>下单时间</th>
			<th>成交金额</th>
			<th>发货状态</th>
			<th>收货状态</th>
			<th>支付状态</th>
			<th>支付方式</th>
			<th>订单状态</th>
			<!-- <th>付款方式</th> -->
			<th>操作</th>
		</tr>
		<?php if(empty($order_list)): ?>
			<tr><td colspan=13>找不到您搜索的内容....</td></tr>
		<?php else: ?>
			<?php foreach($order_list as $v): ?>
				<tr>
					<td><?= $v['id']?></td>
					<td><?= $v['uid']?></a></td>
					<td><?= $v['tel']?></td>
					<td><?= $v['orderNum']?></td>
					<td><?= date('Y-m-d H:i:s',$v['time'])?></td>
					<td><?= $v['amount']?></td>
					<td><a href='action.php?bz=status&id=<?= $v['id']?>&status=<?= $v['status']?>' class='iconfont'><?= $v['status']==1?'未发货':'已发货'; ?></a></td>
					<!-- <a href='action.php?bz=isReceive&id=<?= $v['id']?>&isReceive=<?= $v['isReceive']?>' class='iconfont'><?= $v['isReceive']==1?'未收货':'已收货'; ?></a> -->
					<td><?= $v['isReceive']==1?'未收货':'已收货'; ?></td>
					<td>已支付</td>
					<td class='iconfont' readonly><?= $v['orderWay']==1?'在线支付':'货到付款';?></td>
					<td>
						<?php if($v['cancel']==1):?>
							<?php if($v['isReceive']==1):?>
								进行中...
							<?php else:?>
								订单完成,<br>交易成功
							<?php endif;?>
						<?php else:?>
							取消订单,<br>交易失败
						<?php endif;?>
					</td>
					<td>
						<a href="order-check.php?&oid=<?= $v['id']?>">订单详情</a>
						<a href="action.php?bz=del&oid=<?= $v['id']?>">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>

		
	</table>
	<?= $page ?>
</body>
</html>
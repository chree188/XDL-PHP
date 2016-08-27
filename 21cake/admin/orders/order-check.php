<?php 
	include '../init.php';

	$oid = $_GET['oid'];

	// echo $sql;exit;
	$sql = '
				select o.id, o.uid, o.receiver, o.orderNum, o.address, o.phone, o.amount, g.gid, g.price, g.count, g.icon, g.gname, g.id
				from  orders o, ordersGood g
				where o.id = g.oid and o.id='.$oid
				;
	$orders = query($sql);

	$result = ifpage($sql);
	$order_list = $result[1];
	$ifpage = $result[0];
	// var_dump($order_list);



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
	      	 Name : <input type="text" name="tel" class='search'>
	      	<input class="button" type="submit" value="Search" >
	      </form>
	    </div>
	</div>
	<table class='table'>
		<tr>
			<th>id</th>
			<th>用户id</th>
			<th>收货人</th>
			<th>收货地址</th>
			<th>联系电话</th>
			<th>购买商品id</th>
			<th>商品名</th>
			<th>商品图片</th>
			<th>商品单价</th>
			<th>购买数量</th>
			<th>总价</th>
		</tr>
		
			<?php foreach($orders as $v): ?>
				<tr>
					<td><?= $v['id']?></td>
					<td><?= $v['uid']?></td>
					<td><?= $v['receiver']?></td>
					<td><?= $v['address']?></td>
					<td><?= $v['phone']?></td>
					<td><?= $v['gid']?></td>
					<td><?= $v['gname']?></td>
					<td><img src="<?= img_url($v['icon'])?>" width="50"></td>
					<td><?= $v['price']?></td>
					<td><?= $v['count']?></td>
					<td><?= ($v['count'])*($v['price'])?></td>
				</tr>
			<?php endforeach; ?>

		
	</table>
	<?= $ifpage ?>
</body>
</html>
<?php 
	// include 'init.php';
	$sql = 'select i.icon, g.name, g.price, g.id, g.sales
			from goods g, goodsImg i
			where g.id = i.gid and face = 1 and up = 1
			';

	$goods_list = query($sql);	
	$v1=$goods_list[1];
	$v2=$goods_list[5];
	$v3=$goods_list[14];
	$v4=$goods_list[16];
	$v5=$goods_list[20];

 ?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>SALE-TOP</title>
 	<link rel="stylesheet" href="<?= CSS ?>sale-top.css">
 </head>
 <body>
 	<div id="big-box">
 		<div class="hd">本月销售榜</div>
 		<div class="bd">
 			<ul class="goods-list">
 				<li class="goods-item">
 					<div class="goods-pic">
 						<a href="goods-details-pages.php?id=<?=$v1['id']?>">
 							<img src="<?= img_url($v1['icon'])?>" alt="" width="200px">
 						</a>
 					</div>
 					<div class="goods-info">
 						<div class="goods-name">
 							<a href="goods-details-pages.php?id=<?=$v1['id']?>"><?= $v1['name']?></a>
 						</div>
 						<div class="goods-price">
 							<span>&yen;<?=$v1['price']?></span>
 						</div>
 					</div>
 				</li>
 				<li class="goods-item">
 					<div class="goods-pic">
 						<a href="goods-details-pages.php?id=<?=$v2['id']?>">
 							<img src="<?= img_url($v2['icon'])?>" alt="" width="200px">
 						</a>
 					</div>
 					<div class="goods-info">
 						<div class="goods-name">
 							<a href="goods-details-pages.php?id=<?=$v2['id']?>"><?= $v2['name']?></a>
 						</div>
 						<div class="goods-price">
 							<span>&yen;<?=$v2['price']?></span>
 						</div>
 					</div>
 				</li>
 				<li class="goods-item">
 					<div class="goods-pic">
 						<a href="goods-details-pages.php?id=<?=$v3['id']?>">
 							<img src="<?= img_url($v3['icon'])?>" alt="" width="200px">
 						</a>
 					</div>
 					<div class="goods-info">
 						<div class="goods-name">
 							<a href="goods-details-pages.php?id=<?=$v3['id']?>"><?= $v3['name']?></a>
 						</div>
 						<div class="goods-price">
 							<span>&yen;<?=$v3['price']?></span>
 						</div>
 					</div>
 				</li>
 				<li class="goods-item">
 					<div class="goods-pic">
 						<a href="goods-details-pages.php?id=<?=$v4['id']?>">
 							<img src="<?= img_url($v4['icon'])?>" alt="" width="200px">
 						</a>
 					</div>
 					<div class="goods-info">
 						<div class="goods-name">
 							<a href="goods-details-pages.php?id=<?=$v4['id']?>"><?= $v4['name']?></a>
 						</div>
 						<div class="goods-price">
 							<span>&yen;<?=$v4['price']?></span>
 						</div>
 					</div>
 				</li>
 				<li class="goods-item">
 					<div class="goods-pic">
 						<a href="goods-details-pages.php?id=<?=$v5['id']?>">
 							<img src="<?= img_url($v5['icon'])?>" alt="" width="200px">
 						</a>
 					</div>
 					<div class="goods-info">
 						<div class="goods-name">
 							<a href="goods-details-pages.php?id=<?=$v5['id']?>"><?= $v5['name']?></a>
 						</div>
 						<div class="goods-price">
 							<span>&yen;<?=$v5['price']?></span>
 						</div>
 					</div>
 				</li>
 			</ul>
 		</div>
 		<div class="clear"></div>
 	</div>
 </body>
 </html>
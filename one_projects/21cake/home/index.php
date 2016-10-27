<?php 
	include 'head.php';

	$sql = 'select i.icon, g.name, g.price, g.id, g.sales
			from goods g, goodsImg i
			where g.id = i.gid and face = 1 and hot = 1 and up = 1
			';

	$goods_list = query($sql);



	// var_dump($goods_list);exit;
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>首页</title>
 	<link rel="stylesheet" href="<?= CSS?>index.css">
 </head>
 <body>
 	<!-- slider 滚动器-->
 	<div id="slider">
 			<a href="./goods-details-pages.php?&id=72"><img  class="com" src="<?=IMG?>bg3.jpg" alt="" width="1263px"></a>
			<div class="list">
				<span></span>
				<span></span>
				<span></span>
			</div>
		<div class="clear"></div>
 	</div>
 	<!-- 首页商品 -->
 	<div class="indexgoods">
 			<ul class="box">
 				<?php foreach ($goods_list as $k => $v):?>
	 				<li>
				 		<a href="goods-details-pages.php?id=<?=$v['id']?>" title="<?= $v['name']?>"><img src="<?= img_url($v['icon'])?>"width="300"></a>
	 				</li>
	 			<?php endforeach;?>
 			</ul>
 		<div class="clear"></div>
 	</div>
 	<?php include 'foot.php';?>
 </body>
 </html>

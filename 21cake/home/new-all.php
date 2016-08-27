<?php 

	include 'head.php';
	// $sql = 'select id,name from category where pid=1 and display = 1'; 
	// $cate_list = query($sql);

	$sql = 'select id,name from category where pid=8 and display = 1'; 
	$cate_list = query($sql);
	// include '../header.php';

	// 接收分类id
	$cid = $_GET['id'];
	$gid = $_GET['gid'];
	// 根据当前的分类id  查询子分类path中含有当前分类的id  的id
	$sql  = 'select id from category where path like "%'.$cid.'%"';
	
	$cate_id = query($sql);
	$cate_str = '';
	foreach($cate_id as $v){
		$cate_str .= $v['id'].',';
	}

	$cate_str = rtrim($cate_str,',');

	// 根据商品的cid 是否在 上述id池里面,  在则说明该商品属于该类
	if(empty($gid)){
		$sql = 'select i.icon, g.name, g.price, g.sales, i.gid, d.detail1, d.detail2, d.detail3
			from  goods g, goodsImg i, goodsDetail d
			where g.id = i.gid and d.gid = g.id and g.cid in ('.$cate_str.') and up = 1 and face = 1
			';
	}else{
		$sql = 'select i.icon, g.name, g.price, g.sales, i.gid, d.detail1, d.detail2, d.detail3
			from  goods g, goodsImg i, goodsDetail d
			where g.id = i.gid and d.gid = g.id and g.cid in ('.$cate_str.') and up = 1 and face = 1 and g.cid = '.$gid
			;
	}



	$goods_list = query($sql);

	// var_dump($cate_list);
	// exit;

 ?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>首页-蛋糕分类-不限</title>
 	<link rel="stylesheet" href="<?= CSS?>new-all.css">
 </head>
 <body>
 <!--面包线-->
 	<div id="bread-crumbs">
 		<span><a href="index.php">首页</a></span>
 		<span>&nbsp;>&nbsp;</span>
 		<span class="now">蛋糕名录</span>
 		<div class="clear"></div>
 	</div>
 <!--蛋糕分类列表-->
 	<div id="filter_lists">
 		<dl>
 			<dt>新品分类 :</dt>
 			<dd>
<!--  				<span><a href="">不限</a></span>
 				<span><a href="">乳脂奶油蛋糕</a></span>
 				<span><a href="">慕斯蛋糕</a></span>
 				<span><a href="">乳酪蛋糕</a></span>
 				<span><a href="">巧克力蛋糕</a></span>
 				<span><a href="">冰淇淋蛋糕</a></span> -->
 				<?php foreach($cate_list as $v): ?>
					<span><a href="new-all.php?gid=<?=$v['id']?>"><?= $v['name']?></a></span>
				<?php endforeach; ?>
 			</dd>
 		</dl>
 		<div class="clear"></div>
 	</div>
 <!--大盒子-->
 	<div id="BOX">
 <!--商品列表盒子-->
 		<div id="GOODS-BOX">
 			<ul>
 				<?php foreach ($goods_list as $k => $v):?>
	 				<li class="a">
						<!--商品图片-->
	 					<div class="goods-pic">
	 						<a href="<?= URL?>home/goods-details-pages.php?id=<?=$v['gid']?>">
	 							<img src="<?= img_url($v['icon']) ?>" width='200'>
	 						</a>
	 					</div>
	 					<!--右边查看详情和加入购物车-->
	 					<div class="goods-action">
	 						<div class="goods-buy">
	 							<a href="<?= URL?>home/new-details-pages.php?id=<?=$v['gid']?>" class="detail">
		 							<div>
		 								<img src="<?=IMG?>查看详情.png" alt="">
		 								<span>查看详情</span>
		 							</div>
	 							</a>
	 							<a href="" class="joincart">
	 							<form action="action.php?" method="get">
	 								<button type="submit" name='type' value="cart" style="outline:none;cursor:pointer;">
		 							<div>
		 								<input type="hidden" name="bz" value="cart">
		 								<input type="hidden" name="count" value="1">
										<input type="hidden" name="gid" value="<?=$v['gid']?>">
										<input type="hidden" name="stock" value="100">
		 								<img src="<?=IMG?>加入购物车.png" alt="">
		 								<span>加入购物车</span>
		 							</div>
		 							</button>
		 						</form>
		 						</a>
	 						</div>
	 					</div>
	 					<!--价格块-->
	 					<div class="goods-price">
	 						<ul>
	 							<li>
	 								<span>&yen;</span>
	 								<span><?= $v['price']?></span>
	 								<span> /1份</span>
	 							</li>
	 							<a href="">查看配送时间</a>
	 						</ul>
	 					</div>
	 					<!--商品简介块-->
	 					<div class="goods-info">
	 						<a href="<?= URL?>home/goods-details-pages.php?id=<?=$v['gid']?>" class="goods-name"><?= $v['name']?></a>
 	 					<div class="goods-desc">
		 						<?= $v['detail1']?><p>
								<?= $v['detail2']?><p>
								<?= $v['detail3']?>
	 						</div>
	 					</div>
	 				</li>
	 			<?php endforeach;?>
 			</ul>
 		</div>
 		<div class="clear"></div>
 	</div>
 <!--商品列表页码-->
 	<div id="paging">
 		总计：
 		<span class="ct"><?php echo(count($goods_list));?>&nbsp;</span>
 		 | 共 1 页
 	</div>
 	<?php include 'foot.php';?>
 </body>

 </html>
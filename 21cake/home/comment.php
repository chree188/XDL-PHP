<?php 
	include 'head.php';
	$id = $_GET['id'];

	$sql = 'select g.id, g.oid, g.gid, g.gname, g.icon, o.time from ordersgood g,orders o where o.id=g.oid and g.oid ='.$id. ' order by time desc';

	$oid_list = query($sql);
	// exit;

 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>商品评价</title>
 	<link rel="stylesheet" href="<?= CSS ?>buy.css">
 </head>
 <body>
 	<div id="title">商品评价</div>
	<?php if($oid_list): ?>
		<div style="width:1200px;margin:0 auto;margin-bottom:250px;">
			<table id="cart_main" style="width:1200px;border:1px solid #f1f1f1;">
				<thead>
					<tr>
						<th>商品</th>
						<th>商品名</th>
						<th>评价</th>
					</tr>
				</thead>
				<?php foreach ($oid_list as $v ): ?>
					<form action="action.php?bz=comment&gid=<?=$v['gid']?>&oid=<?=$v['oid']?>" class="form" method="post">
						<?php
							$sql = 'select comment from goodscomment where ogid ='.$v['id'];
							$comment_list = query($sql);
						?>
						<tbody class="cart-item" style="border:1px solid #f1f1f1;">
							<tr class="cart-product last">
								<td class="td1">
									<div class="p-pic" style="text-align:center;">
										<a href="" target="_blank">
											<img src="<?= img_url($v['icon'])?>" alt="" width="60px">
										</a>
									</div>
								</td>
								<td class="p-info">
									<div class="p-title" style="text-align:center;">
										<a href="" target="_blank"><?=$v['gname']?></a>
									</div>
								</td>
								
								<?php if(empty($comment_list[0]['comment'])):?>
									<td>
										<input type="text" name="comment"  style="width:450px;margin-left:100px;text-align:center;" required>
										<button type="submit">提交评论</button>
									</td>
								<?php else:?>
									<td style="text-align:center;">
										<input type="text" name="comment" value="<?=$comment_list[0]['comment']?>" readonly style="text-align:center;border:none;">
									</td>
								<?php endif;?>	
							</tr>
						</tbody>
					</form>
				<?php endforeach; ?>
			</table>
		</div>
	<?php endif ?>
	
	
	<?php include 'foot.php';?>
 </body>
 </html>
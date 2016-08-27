<?php 
	include 'head.php';
	$id=$_GET['id'];
//详情
	$sql = 'select gid,gname,detail1,detail2,detail3,detail4,detail5,taste,stuff from goodsDetail where gid='.$id;
	$detail = query($sql);
	$detail1 = $detail[0]['detail1'];
	$detail2 = $detail[0]['detail2'];
	$detail3 = $detail[0]['detail3'];
	$detail4 = $detail[0]['detail4'];
	$detail5 = $detail[0]['detail5'];
	$taste = $detail[0]['taste'];
	$stuff = $detail[0]['stuff'];
//小图
	$sql = 'select icon from goodsImg where gid='.$id; 
	$img=query($sql);
//大图
	$sql = 'select icon from goodsImg where face=1 and gid='.$id;
	$face = query($sql); 
	$face = $face[0]['icon'];
//价格
	$sql ='select price from goods where id='.$id;
	$price = query($sql);
	$price = $price[0]['price'];


	$sql = 'select i.icon, g.name, g.sales, g.id, g.stock
			from  goods g, goodsImg i
			where  g.id = i.gid and up = 1 and face = 1 and g.id = '.$id;
	$goods_list = query($sql)[0];




 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>商品详情页</title>
	<link rel="stylesheet" href="<?= CSS ?>goods-details-pages.css">

 </head>
 <body>
	<div id="bread-crumbs">
		<span><a href="index.php">首页</a></span>
		<span>&nbsp;>&nbsp;</span>
		<span>乳脂奶油蛋糕</span>
		<span>&nbsp;>&nbsp;</span>
		<span class="now"><?=$detail[0]['gname']?></span>
		<div class="clear"></div>
	</div>
 	<div id="main">
 		<div class="TOP">
 			<div class="photo">
 				<div class="big-photo-box">
 					<div class="big-photo">
						<img src="<?= img_url($face)?>" alt="" width="500px">
 					</div>
 				</div>
 				<div class="bottom-box">
 					<ul>
 						<?php foreach ($img as $k => $v):?>
 							<li>
 								<div class="small-photo-box">
									<img src="<?= img_url($v['icon'])?>" alt="" width="150px">
								</div>
							</li>
						<?php endforeach;?>
 					</ul>
 				</div>
 			</div>
 			<div class="choose">
 				<div class="goods-name">
 					<span><?=$detail[0]['gname']?></span>
 				</div>
 				<div class="information">
 					<!--商品价格-->
 					<div class="goods-price">
 						<ul>
 							<li>
 								<span class="JG">价格 :</span>
 								<span class="money">
 									<span class="RMB">&yen;</span>
 									<span class="price"><?=$price?></span>
 									<span class="price2">
 										&yen;
 										<span class="price3"><?=$price?></span>
										 /份
 									</span>
 								</span>
 							</li>
 						</ul>
 					</div>
 					<!--购买区-->
 					<div class="product-buy">
 						<!--商品规格-->
 						<div class="product_spec">
 							<!--选择磅数-->
 							<ul class="spec-area">
 								<li>
 									<a href="">
 										<span>&nbsp;&nbsp;1份</span>
 									</a>
 								</li>
 								
 							</ul>
 						</div>
 						<ul class="guige">
 							<li>
 								<div class="box">
 									<div class="com"><img src="<?= IMG?>persons.png" alt=""></div>
 									<div class="com">适合1人分享</div>
 								</div>
 								<div class="box">
 									<div class="com"><img src="<?= IMG?>timers.png" alt=""></div>
 									<div class="com">需提前5小时预订</div>
 								</div>
 							</li>
 						</ul>
 						<div class="product-action">
 							<form action="action.php" method="get">
	 							<ul>
	 								<li class="Num">
	 									<span class="num">
	 										<a class="les" title="减少数量" value='jian'onclick="jian()"></a>
	 										<input type="text" value="1" name="count" id='mynum'>
	 										<a class="add" value='jia' onclick="jia()"></a>
	 										<span class="time" href="" style="padding-right:50px;">已售<?=$goods_list['sales']?>件</span>
	 									</span>
	 								</li>
	 								
	 									<input type="hidden" name="bz" value="cart">
										<input type="hidden" name="gid" value="<?=$goods_list['id']?>">
										<input type="hidden" name="stock" value="<?=$goods_list['stock']?>">
	 								<li class="buy">
	 									<button type="submit" name='type' value="buy">
	 										<span>立即购买</span>
	 									</button>
	 									<button type="submit" name='type' value="cart">
	 										
	 										<span>加入购物车</span>
	 									</button>
	 								</li>
	 							</ul>
 							</form>
 						</div>
 					</div>
 				</div>
 				<!--产品简介-->
 				<div class="goods-culture">
 					<p>
 						<?=$detail1?><br>
						<?=$detail2?><br>			
						<?=$detail3?> 
 					</p>
 				</div>
 			</div>
 			<div class="clear"></div>
 		</div>
 		<div class="bottom">
 			<!--商品详情行-->
 			<div class="tags-hd-active">
 				<img src="<?= IMG?>tit-pro.jpg" alt="" style="float:left;margin-top:24px;">
 				<a href="" >
 				<span  style="font-size:14px;">商品详情</span></a>
 			</div>
 			<div id="product_detail">
 				<div class="product-attributes"style="margin-bottom:10px;">
 					<ul style="padding:10px 0;">
 						<li>
 							<p>品牌：21Cake</p>
 							<p>蛋糕分类：乳脂奶油蛋糕</p>
 							<p>甜度：★★★☆☆</p>
 						</li>
 						<li>
 							<p>所属分类：乳脂奶油蛋糕</p>
 							<p>适合人群：除老人、小孩外的各类人群</p>
 							<p>保鲜条件：0-4℃保藏12小时，10℃食用为佳</p>
 						</li>
 						<li>
 							<p>口味：<?=$taste?></p>
 							<p>适合节日：一般性</p>
 							<p>原材料：<?=$stuff?></p>

 						</li>
 						<div class="clear"></div>

 					</ul>
 				</div>
 				<div class="detail-content" style="padding-top:10px; margin-bottom:10px; line-height: 24px;">
 					<p><?=$detail3?></p>
 					<p><?=$detail1?></p>
 					<p><?=$detail2?></p>
 					<p style="margin-top:30px;"><?=$detail4?><?=$detail5?></p>
 					<div style="width:100%; height:10px; border-bottom:1px solid #eee;"></div>
 					<div style="width:100%; margin-top:10px;">
 						小提示：
 						<ol>
 							<li>
 								1、蛋糕规格及免费配送餐具 ：
 								<table style="width:40%; margin-left:19px;line-height:20px;">
									<colgroup>
										<col style="width:35%;">
										<col style="width:35%;">
										<col style="width:30%;">
									</colgroup>
									<tbody><tr>
										<td>1.0磅：约13×13(cm)</td>                  
										<td>适合3-4人食用</td>
										<td>免费配送5套餐具</td>
									</tr>
									<tr>
										<td>2.0磅：约17×17(cm)</td>
										<td>适合7-8人食用</td>
										<td>免费配送10套餐具</td>
									</tr>
									<tr>
										<td>3.0磅：约23×23(cm)</td> 
										<td>适合11-12人食用</td>
										<td>免费配送15套餐具</td>
									</tr>
									<tr>
										<td>5.0磅：约30×30(cm)</td>
										<td>适合15-20人食用</td>
										<td>免费配送20套餐具</td>
									</tr>
								</tbody></table>
								<p style="margin-left:19px;">订购5磅及5磅以上规格的蛋糕，请与客服人员联系，订购电话：400 650 2121</p>
 							</li>
							<li>2、蛋糕在收到后2-3小时内食用为佳。</li>
							<li>3、如对上述食材有过敏经历者，请选择其它款蛋糕。</li>
 						</ol>
 					</div>
 				</div>
 			</div>
 		</div>
 		<div class="clear"></div>
 	</div>
 	<?php include 'sale-top.php';?>
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
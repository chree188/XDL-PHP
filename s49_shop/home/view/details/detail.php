<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情页</title>
	<link rel="stylesheet" href="./public/css/detalis.css">
</head>
<body>
	<?php
	include ("./view/head/head.php");
	include ("./view/seek/seek.html");
	?>
	<div class='xqdaohang'>
		<ul>
			<li><a href='./index.php?c=index&a=index'>首页</a></li>
			<li><a href='./index.php?c=404&a=index'>发布会</a></li>
			<li><a href='./index.php?c=404&a=index'>新品首发</a></li>
			<li><a href='./index.php?c=404&a=index'>预售</a></li>
			<li><a href='./index.php?c=404&a=index'>新品试用</a></li>
		</ul>
	</div>
	<hr/>
	<div class='xqdaohang1'>
		<div class='xqdaohang2'>
			<a href="./index.php?c=index&a=index">首页 ></a>
			<a href="./index.php?c=404&a=index">家用电器 ></a>
			<a href="./index.php?c=404&a=index">详情页</a>
		</div>	
		<div class='xqdaohang3'>
			<div class='xqdaohang4'><a href="./index.php?c=404&a=index">乐视电视旗舰店</a></div>
			<div class='xqdaohang4'><a href="./index.php?c=404&a=index"><img src="/dashboard/s49_s/home/public/images/q.png">联系供应商</a></div>
			<div class='xqdaohang4'><a href="./index.php?c=404&a=index"><img src="/dashboard/s49_s/home/public/images/r.png">JIMI</a></div>
			<div class='xqdaohang4'><a href="./index.php?c=404&a=index"><img src="/dashboard/s49_s/home/public/images/e.png">关注店铺</a></div>
		</div>
	</div>

		<div class='xqzhuti'>
		<div class='xqzhuti1'>
			<div class='xqzhuti2'><a href="#"><img src="<?php echo "../admin/public/images/goods/{$goods['gpic']}"; ?>"></a></div><br/>

			<div class='xqzhuti3'>
				<ul>
					<li><a href="#"><img src="/dashboard/s49_s/home/public/images/36.png"></a></li>
					<li><a href="#"><img src="/dashboard/s49_s/home/public/images/35.png"></a></li>
					<li><a href="#"><img src="/dashboard/s49_s/home/public/images/35.png"></a></li>
					<li><a href="#"><img src="/dashboard/s49_s/home/public/images/35.png"></a></li>
					<li><a href="#"><img src="/dashboard/s49_s/home/public/images/35.png"></a></li>
					<li><a href="#"><img src="/dashboard/s49_s/home/public/images/35.png"></a></li>
					<li><a href="#"><img src="/dashboard/s49_s/home/public/images/37.png"></a></li>
				</ul>
			</div>
		</div>

<!--主要部分右边-->
		<div class='xqzty'>
			<div class='xqzty1'><?php echo $goods['gname'];  ?></div><br/>
			<div class='xqzty2'>
				<br/>
				<div class='xqzty3'>劲爆价:<a>￥<?php echo $goods['price'];  ?></a></div>
				<div class='xqzty3'>加价购 满800.00元另加168.00元即可在购物车换购热销商品   详情 >></div>
			</div><br/>
			<div class='xqzty4'>支　持：以旧换新，闲置电视回收  北京节能补贴，首件最高800元</div><br/>
			<div class='xqzty4'>
				<form action="" method='POST' enctype='multipart/form-data'>
					配送至：<select name="classid" id="">
						<option value='lamp44'>北京</option>
						<option value='lamp49'>上海</option>
						<option value='lamp50'>广州</option>
		     		 </select>
					有货支持	99元免运费 货到付款
				</form>
			</div><br/>
			<div class='xqzty4'>由 京东 发货，并提供售后服务。18:00前完成下单,预计明天(06月26日)送达</div>
			<div class='xqzty4'>----------------------------------------------------------------------------------------------------</div>
		
		<!-- 按钮 -->
		<!-- <form action="" method='POST' enctype='multipart/form-data'> -->
		<div class='xqzty5'>
		<!-- 	<input type="text" name="num" value="1" style="width:30px;">
			<input type="submit" name="" value="-">
	       	<input type="submit" name="" value="+">&nbsp;&nbsp; -->
	       	<!-- <a href='./index.php?c=cart&a=put&gid={$_GET['gid']}'><input type='submit'  value='加入购物车' style='width:80px; height:40px;'></a> -->
	         <?php
			 echo "<a href='./index.php?c=cart&a=put&gid={$_GET['gid']}'>加入购物车</a>";
             ?>
		</div><br/>
	<!-- 	</form> -->
		</div>
		<div class='xqzty6'>温馨提示·本商品不能使用 东券·请完成预约后及时抢购！·支持7天无理由退货</div>
		<div class='ggtu'><img src="/dashboard/s49_s/home/public/images/38.png"></div>
		</div>
		<div class='ggtu3'>
			<div class='ggtu4'><img src="/dashboard/s49_s/home/public/images/40.jpg"></div>
			<div class='ggtu2'><img src="/dashboard/s49_s/home/public/images/38.jpg"></div>
			
			<div class='ggtu2'><img src="/dashboard/s49_s/home/public/images/39.jpg"></div>
		</div><br/>
	<?php
		include ("./view/base/base.html");
	?>
</body>
</html>
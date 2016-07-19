<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<style>
		*{ margin:0; padding:0;}
		body{margin:0 auto;}
		ul,li{list-style:none;}
		a{text-decoration:none;}
		/*-------------导航条-----------------*/
		.sydh{background-image:url(/dashboard/s49_s/home/public/images/9.png);height:49px;width:100%;position: relative;}
		.sydh1 ul{margin-left:310px;}
		.sydh1 ul li{float:left;line-height:49px;margin:0 18px;}
		.sydh1 ul li a{color:#ffffff;}
		/*---------------左部导航条---------------*/
		.daohang1{position: absolute;top: 130px;left: 50px;text-align:center;border:1px solid;border-color:#DA3738;height:458px;line-height:29px;}
		.daohang1 a{color:#242424;}
		.daohang2{background-color: #DA3738;height: 48px;margin-top: 0px;}
		.daohang3{float:left;margin-left: 30px;}
		/*---------------轮播图---------------------*/
		.lunbotu{float:left;margin-left: 280px;}
		/*------------------------------------*/
	</style>
</head>
<body>
	<?php
	include ("../head/head.html");
	include ("../seek/seek.html");
	?>
	<!-- 导航条 -->
	<div class='sydh'>
		<div class='sydh1'>
			<ul>
				<li><a href='#'>首页</a></li>
				<li><a href='#'>益智玩具</a></li>
				<li><a href='#'>电子玩具</a></li>
				<li><a href='#'>毛绒玩具</a></li>
				<li><a href='#'>车模导航</a></li>
				<li><a href='#'>春夏服装</a></li>
			 	<li><a href='#'>精品眼镜</a></li>
			</ul>
		</div>
	</div>
	<!-- 左部导航条 -->
	<div class='daohang'>
		<div class='daohang1'>
			<div class='daohang2'>所有商品分类</div>
			<div><img src="/dashboard/s49_s/home/public/images/10.png" alt=""></div>
			<div><a href='#'>模型玩具   遥控玩具   魔方</a></div>
			<div><a href='#'>拼图玩具   魔术玩具   魔方</a></div>
			<div><a href='#'>拼图玩具   魔术玩具   魔方</a></div>
			<div><img src="/dashboard/s49_s/home/public/images/11.png" alt=""></div>
			<div class='daohang3'><a href='#'>女装</a></div><br/>
			<div><a href='#'>针织衫   外套   保暖内衣</a></div>
			<div class='daohang3'><a href='#'>男装</a></div><br/>
			<div><a href='#'>针织衫   外套   保暖内衣</a></div>
			<div><img src="/dashboard/s49_s/home/public/images/12.png" alt=""></div>
			<div><a href='#'>遮阳镜   太阳眼镜   偏光镜</a></div>
			<div><a href='#'>遮阳镜   太阳眼镜   偏光镜</a></div>
			<div><a href='#'>遮阳镜   太阳眼镜   偏光镜</a></div>
		</div>
		<div class='lunbotu'>
			<img src="/dashboard/s49_s/home/public/images/13.png" alt="">
		</div>
		<div>
			<img src="/dashboard/s49_s/home/public/images/14.png" alt="">
		</div>

		<?php 
		// header('content-type:text/html;charset=utf-8');
		$link = @mysqli_connect('localhost','root','','s49_shop')or die('数据库连接失败');
		mysqli_set_charset($link,'utf8');

		$sql = "select * from shop_goods where tid=18 limit 0,4";
	    $res = mysqli_query($link,$sql);
	    while($row = mysqli_fetch_assoc($res)){
	 ?>
		<div class='zhuti3'>
			<a href='./view/details/details.php'><img src="<?php echo '../././admin/public/images/goods/',$row['gpic']?>" alt=""></a>
			<div class='zhuti7'><a href='./view/details/details.php'><?php echo $row['gname']; ?> <?php echo $row['gdesc'] ?></a></div>
			<div class='zhuti7'><a href='./view/details/details.php'><font color=red><?php echo $row['price'] ?> 元</font></a></div>
		</div>

	<?php
		}
	?>
	</div><br/>
<?php
	include ("../base/base.html");
?>
</body>
</html>
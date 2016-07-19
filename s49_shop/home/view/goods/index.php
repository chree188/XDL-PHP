<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./public/css/index.css">  
</head>

<body>
	<?php
		include ("./view/head/head.php");
		include ("./view/seek/seek.html");
	?>
	
	<div class='xqdaohang'>
		<ul>
			<li><a href='./index.php?c=index&a=index'>首页</a></li>
			<li><a href='./index.php?c=goods&a=index'>玩具系列</a></li>
			<li><a href='./index.php?c=goods&a=index2'>服装系列</a></li>
			<li><a href='./index.php?c=goods&a=index1'>眼镜系列</a></li>
		</ul>
	</div>
	<div class='lb'>
		<img src="./public/images/111.jpg" alt="">
	</div><br/><br/>
	<div class='lunbotu1'>
		<img src="./public/images/15.gif" alt="">&nbsp;
		<img src="./public/images/16.png" alt="">
	</div><br/>
	<!-- 1级页面-->
	<div><img src="./public/images/18.gif" alt=""></div>
	<div><img src="./public/images/19.gif" alt=""></div>
	<div class='zhuti1'>
		<div class='zhuti2'><img src="./public/images/17.png" alt=""></div>
		<div class='zhuti3'>
	    <?php
				$_GET['tblname'] = 'shop_goods';
				$_GET['pk'] = 'gid';
				$condition=" where tid=18 limit 0,4";
				$goods=select($condition);
				// echo '<pre>';
				// print_r($goods);die;
				foreach($goods as $k=>$v){
						$v['gpic']=rtrim($v['gpic'],'|#x#|');
						// echo '<pre>';
						// print_r($v['gpic']);die;
						echo "<div  class='zhuti3'>
							<ul>
								<li class='mb3'><a href='./index.php?c=goods&a=detail&gid={$v['gid']}'><img src='../admin/public/images/goods/{$v['gpic']}'></a></li>
								<li class='mb4'><a href='./index.php?c=goods&a=detail&gid={$v['gid']}'>{$v['gname']}</a></li>
								<li class='mb5'>¥ {$v['price']}</li>
							</ul>
						
						</div>";
						
				}
			?>
		</div>
	</div>
	<div class='kb'></div>

	<?php
		include ("./view/base/base.html");
	?>

</body>
</html>
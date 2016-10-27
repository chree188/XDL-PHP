<html>
	<head>
		<meta charset="UTF-8" />
		<title>商品详情</title>
		<link link rel="shortcut icon" type="imagex-icon" href="../favicon.ico" />
		<script src="./include/js/ScrollPic.js"></script>
	</head>
	<body>
			<?php
				include './include/header.php';		//导入header
			?>
		<div class="content">
			<div class="inner">
				<div class="ibanner">
					<img src="./include/img/ibanner05.jpg" width="980" height="249" />
				</div>
				<div class="tinner">
					<div class="hd">
						<img class="png" src="./include/img/hd.png" width="1006" height="29" />
					</div>
					<div class="bd png">
						<div class="ileft">
							<div class="title">
								商品详情
							</div>
							<ul class="list">
						<?php
							//商品类别表里面的一级类别遍历出来	
                    		$sql = "select * from type where pid = 0";
							$result = mysqli_query($link,$sql);	//成功是结果集对象 失败false
							if($result){
								while($row = mysqli_fetch_assoc($result)){
$str = <<<aa
					<li>
						<a href="lists.php?typeid={$row['id']}">
							精选{$row['name']}类产品
						</a>
					</li>
aa;
					echo $str;
								}
							}
                    	?>
							</ul>
							<div class="lft">
								<img src="./include/img/lnavft.jpg" width="222" height="15" />
							</div>
						</div>
						<div class="iright">
							<div class="position">
								当前位置&nbsp;&nbsp;
								<a href="index.php">
									首页
								</a>
								|
								<a href="">
									商品详情
								</a>
							</div>
							<?php	
                    		$sql = "select * from goods where id = {$_GET['id']}";
							$result = mysqli_query($link,$sql);
							//设置状态
							$state = array("1"=>"新添加","2"=>"在售","3"=>"下架");
							while($row = mysqli_fetch_assoc($result)){
								$addTime = date("Y-m-d",$row['addtime']);	//格式化注册时间戳
$str = <<<aa
					  <div class="title">
								{$row['goods']}
							</div>
							<div class="pdetail">
								<div class="mdetail">
									<div class="media">
										<ul class="big-img">
											<li class="select">
												<a href="../admin/goods/uploads/{$row['picname']}">
													<img src="../admin/goods/uploads/{$row['picname']}" width="360" height="200" />
												</a>
											</li>
										</ul>
										<ul class="small-img">
											<li class="select">
												<img src="../admin/goods/uploads/m_{$row['picname']}" width="70" height="45" />
											</li>
											<li>
												<img src="../admin/goods/uploads/m_{$row['picname']}" width="70" height="45" />
											</li>
										</ul>
									</div>
									<div class="intro">
										<table width="100%">
											<tr>
												<td class="t" width="75"><span class="cbg">价格</span></td>
												<td><span class="numcon">￥<span class="num">{$row['price']}</span></span></td>
											</tr>
											<tr>
												<td class="t">产地</td>
												<td>{$row['company']}</td>
											</tr>
											<tr>
												<td class="t">状态</td>
												<td>{$state[$row['state']]}</td>
											</tr>
											<tr>
												<td class="t">添加时间</td>
												<td>{$addTime}</td>
											</tr>
											<tr>
												<td class="t">库存</td>
												<td>{$row['store']}</td>
											</tr>
											<tr>
												<td class="t">销量</td>
												<td>{$row['num']}</td>
											</tr>
										</table>
										
										<div class="blink01">
											<a href="./shopCar/shopaction.php?a=add&id={$row['id']}">
												加入购物车
											</a>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="tt">
									产品介绍
								</div>
								<div class="c">
									{$row['descr']}
								</div>
aa;
					echo $str;
							}
                    	?>
								<div class="link">
									<a href="lists.php">
										<img src="./include/img/button02.jpg" width="87" height="27" />
									</a>
								</div>
							</div>
							<div class="title">
								相关优选品牌
							</div>
							<div class="oproduct">
								<div class="picgd">
									<a href="#" onclick="return false" title="上翻" id="LeftArr" class="up png">
										上翻
									</a>
									<a href="#" onclick="return false" title="下翻" id="RightArr" class="down png">
										下翻
									</a>
									<div id="pic" class="pic">
										<ul id="scrollPic">
											<?php	//遍历数据库商品
                    		$sql = "select * from goods ";
							$result = mysqli_query($link,$sql);
							while($row = mysqli_fetch_assoc($result)){		//下架产品不予显示
							if($row['state']!=3){
$str = <<<aa
					  <li>
                        <p class="media"><a href="./details.php?id={$row['id']}"><img src='../admin/goods/uploads/m_{$row['picname']}' width="203" height="131" /></a></p>
                      	<p class="intro"><a href="./details.php?id={$row['id']}">{$row['goods']}</a></p>
                      </li>
aa;
					echo $str;
							}
							}
                    	?>
										</ul>
									</div>
								</div>
								<script>function pic(v) {
									return document.getElementById(v);
								}
								
									var scrollPic_01 = new ScrollPic();
									scrollPic_01.scrollContId = "pic"; //内容容器ID
									scrollPic_01.arrLeftId = "LeftArr"; //左箭头ID
									scrollPic_01.arrRightId = "RightArr"; //右箭头ID
									
									scrollPic_01.frameWidth = 640; //显示框宽度
									scrollPic_01.pageWidth = 213; //翻页宽度
									
									scrollPic_01.speed = 20; //移动速度(单位毫秒，越小越快)
									scrollPic_01.space = 20; //每次移动像素(单位px，越大越快)
									scrollPic_01.autoPlay = true; //自动播放
									scrollPic_01.autoPlayTime = 3; //自动播放间隔时间(秒)
									scrollPic_01.initialize(); //初始化
								</script>
							</div>
						</div>
					</div>
					<div class="ft">
						<img class="png" src="./include/img/ft.png" width="1006" height="29" />
					</div>
				</div>
			</div>
		</div>
		<?php
			include './include/footer.php';
			?>
	</body>
</html>
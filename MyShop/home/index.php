<html>
	<head>
		<meta charset="UTF-8" />
		<title>天慈天养</title>
		<link link rel="shortcut icon" type="imagex-icon" href="../favicon.ico" />
		<script type="text/javascript" src="./include/js/jquery-1.6.4.min.js"></script>
		<script type="text/javascript" src="./include/js/jquery.nivo.slider.js"></script>
		<script type="text/javascript" src="./include/js/cufon-yui.js"></script>
		<script type="text/javascript" src="./include/js/ScrollPic.js"></script>
		<script type="text/javascript" src="./include/js/scripts.js"></script>
		<script type="text/javascript" src="./include/js/custom.js"></script>
		<script type="text/javascript" src="./include/js/tab.js"></script>
    
	</head>
	<body>
		<!--网页主体content-->
		<div class="content">
			<?php
			include './include/header.php';		//导入header
			?>
			<div class="banner">
    	<div class="clear" id="slider-bg">
            <div class="full-width-wrapper" id="slider-frame">
                <div class="fixed-width-wrapper maxx-theme" id="slider-wrapper">
                    <div id="slider" class="nivoSlider">
                    <img src="./include/img/banner.jpg" alt="懒人图库">
                    <img src="./include/img/banner01.jpg" alt="懒人图库">
                    <img src="./include/img/banner.jpg" alt="懒人图库">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main">
    	<div class="mleft">
            <div class="lnav">
                <div class="hd">产品类别</div>
                <ul class="list">
                	<?php	//遍历数据库里产品类别
                    		$sql = "select * from type where pid = 0";
							$result = mysqli_query($link,$sql);
							while($row = mysqli_fetch_assoc($result)){
$str = <<<aa
					<li>
                        <div class="m"><a href="lists.php?typeid={$row['id']}"></a></div>
                        <div class="i"><a href="lists.php?typeid={$row['id']}">{$row['name']}</a></div>
                    </li>
aa;
					echo $str;
							}
                    	?>
                </ul>
            </div>
            <div class="ad"><a href="#_"><img src="./include/img/ad04.jpg" width="240" height="286" /></a></div>
        </div>
        <div class="mright">
        	<div class="ad">
            	<div class="vcontainer" id="idTransformView">
                    <ul class="vslider" id="idSlider">
                        <li><img src="./include/img/ad05.jpg" width="722" height="286" /></li>
                        <li><img src="./include/img/ad05.jpg" width="722" height="286" /></li>
                        <li><img src="./include/img/ad05.jpg" width="722" height="286" /></li>
                        <li><img src="./include/img/ad05.jpg" width="722" height="286" /></li>
                    </ul>
                    <ul class="vnum png" id="idNum">
                      <li class="on">●</li>
                      <li>●</li>
                      <li>●</li>
                      <li>●</li>
                    </ul>
                </div>
            </div>
        	<div class="commend">
            	<div class="picgd"> <a href="#" onclick="return false" title="上翻" id="LeftArr" class="up png">上翻</a> <a href="#" onclick="return false" title="下翻" id="RightArr" class="down png">下翻</a>
                  <div id="pic" class="pic">
                    <ul id="scrollPic">
                    	<?php	//遍历数据库商品
                    		$sql = "select * from goods ";
							$result = mysqli_query($link,$sql);
							while($row = mysqli_fetch_assoc($result) and $row['state']!=3){		//下架产品不予显示
$str = <<<aa
					  <li>
                        <p class="media"><a href="./details.php?id={$row['id']}"><img src='../admin/goods/uploads/m_{$row['picname']}' width="203" height="131" /></a></p>
                      	<p class="intro"><a href="./details.php?id={$row['id']}">{$row['goods']}</a></p>
                      </li>
aa;
					echo $str;
							}
                    	?>
                    </ul>
                  </div>
                </div>
                <script>   
                function pic(v){return document.getElementById(v);}
                        
                            var scrollPic_01 = new ScrollPic();
                            scrollPic_01.scrollContId   = "pic"; //内容容器ID
                            scrollPic_01.arrLeftId      = "LeftArr";//左箭头ID
                            scrollPic_01.arrRightId     = "RightArr"; //右箭头ID
                    
                            scrollPic_01.frameWidth     = 655;//显示框宽度
                            scrollPic_01.pageWidth      = 217; //翻页宽度
                    
                            scrollPic_01.speed          = 20; //移动速度(单位毫秒，越小越快)
                            scrollPic_01.space          = 20; //每次移动像素(单位px，越大越快)
                            scrollPic_01.autoPlay       = true; //自动播放
                            scrollPic_01.autoPlayTime   = 3; //自动播放间隔时间(秒)
                            scrollPic_01.initialize(); //初始化
        
                 </script>
            </div>
        </div>
    </div>
    <div class="main main01">
    	<div class="mleft">
            <div class="lnav01">
                <div class="hd">滋补/饮品</div>
                <ul class="list">
                  <li class="bottom">
                        <div class="m"><a href="#_"></a></div>
                        <div class="i"><a href="#_">滋补品</a></div>
                    </li>
                  <li class="bottom">
                        <div class="m"><a href="#_"></a></div>
                        <div class="i"><a href="#_">茶</a></div>
                    </li>
                  <li class="bottom llast">
                        <div class="m"><a href="#_"></a></div>
                        <div class="i"><a href="#_">酒</a></div>
                    </li>
                </ul>
            </div>
            <div class="ad"><a href="#_"><img src="./include/img/ad02.jpg" width="240" height="347" /></a></div>
        </div>
        <div class="mright">
        	<div class="ad">
            	<div class="vcontainer" id="idTransformView01">
                    <ul class="vslider" id="idSlider01">
                        <li><img src="./include/img/ad05.jpg" width="722" height="286" /></li>
                        <li><img src="./include/img/ad03.jpg" width="722" height="286" /></li>
                        <li><img src="./include/img/ad05.jpg" width="722" height="286" /></li>
                        <li><img src="./include/img/ad03.jpg" width="722" height="286" /></li>
                    </ul>
                    <ul class="vnum png" id="idNum01">
                      <li class="on">●</li>
                      <li>●</li>
                      <li>●</li>
                      <li>●</li>
                    </ul>
                </div>
            </div>
        	<div class="commend">
            	<div class="picgd"> <a href="#" onclick="return false" title="上翻" id="LeftArr01" class="up png">上翻</a> <a href="#" onclick="return false" title="下翻" id="RightArr01" class="down png">下翻</a>
                  <div id="pic01" class="pic">
                    <ul id="scrollPic01">
                    	<?php	//遍历数据库商品
                    		$sql = "select * from goods ";
							$result = mysqli_query($link,$sql);
							while($row = mysqli_fetch_assoc($result) and $row['state']!=3){		//下架产品不予显示
$str = <<<aa
					  <li>
                        <p class="media"><a href="./details.php?id={$row['id']}"><img src='../admin/goods/uploads/m_{$row['picname']}' width="203" height="131" /></a></p>
                      	<p class="intro"><a href="./details.php?id={$row['id']}">{$row['goods']}</a></p>
                      </li>
aa;
					echo $str;
							}
                    		?>
                    </ul>
                  </div>
                </div>
                <script>   
                function pic(v){return document.getElementById(v);}
                        
                            var scrollPic_02 = new ScrollPic();
                            scrollPic_02.scrollContId   = "pic01"; //内容容器ID
                            scrollPic_02.arrLeftId      = "LeftArr01";//左箭头ID
                            scrollPic_02.arrRightId     = "RightArr01"; //右箭头ID
                    
                            scrollPic_02.frameWidth     = 655;//显示框宽度
                            scrollPic_02.pageWidth      = 217; //翻页宽度
                    
                            scrollPic_02.speed          = 20; //移动速度(单位毫秒，越小越快)
                            scrollPic_02.space          = 20; //每次移动像素(单位px，越大越快)
                            scrollPic_02.autoPlay       = true; //自动播放
                            scrollPic_02.autoPlayTime   = 3; //自动播放间隔时间(秒)
                            scrollPic_02.initialize(); //初始化
        
                 </script>
            </div>
        </div>
    </div>
    <div class="main">
    	<div class="tzabout">
        	<div class="title"><a href="#_">台州特色名品</a></div>
            <div class="con">
            	台州市，中国历史文化名城，以海上仙子国著称。地属亚热带海洋性季风气候，夏无酷暑，冬不严寒，优越的环境适宜植被生长，海产生鲜的繁衍。
            </div>
        </div>
        <div class="aboutus">
        	<div class="title">天慈生灵，天养生辉</div>
            <div class="con">
            	作为绿色食品的崇尚者，我们把绿色环保深入到
				经营的各个角落——绿色包装，绿色推广，绿色
				经营。天慈天养致力于打造消费者信得过，彰显
				身份的品牌、
            </div>
            <div class="more"><a href="#_">READ MORE</a></div>
        </div>
        <div class="news">
        	<div class="hd">
            	<div class="more"><a href="#_">+</a></div>
                <div class="title">新闻资讯</div>
            </div>
            <div class="bd">
            	<div class="first">
                	<div class="media"><a href="#_"><img src="./include/img/news.jpg" width="108" height="66" /></a></div>
                	<div class="intro">
                    	<div class="title"><a href="#_">选绿色食品环保产品,有人教你 </a></div>
                        <div class="c">怎么选择绿色食品、环保节能产品，今后有地方可以学习到相关知识了...</div>
                    </div>
                </div>
                <ul class="list">
                	<li>
                    	<div class="time">05-31</div>
                        <a href="#_">·春节前调查菜篮子 绿色有机食品"当家作主" </a>
                    </li>
                    <li>
                    	<div class="time">05-31</div>
                        <a href="#_">·春节前调查菜篮子 绿色有机食品"当家作主" </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
			<?php
			include './include/footer.php';			//导入footer
			?>
		</div>
	</body>
</html>

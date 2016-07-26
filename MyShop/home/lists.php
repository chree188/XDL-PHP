<?php
	session_start();	
	//登录验证
	if(empty($_SESSION['user'])){
		header('Location:login.php');
		exit;
	}
?>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>天慈天养</title>
		<script type="text/javascript" src="./include/js/jquery-1.6.4.min.js"></script>
	</head>
	<body>
		<!--网页主体content-->
		<div class="content">
			<?php
			include './include/header.php';
			?>
			<div class="inner">
    	<div class="ibanner">
    <img src="./include/img/ibanner04.jpg" width="980" height="249" /></div>
    	<div class="tinner">
        	<div class="hd"><img class="png" src="./include/img/hd.png" width="1006" height="29" /></div>
        	<div class="bd png">
            	<div class="ileft">
                	<div class="title">精选产品</div>
                    <ul class="list">
                    	<li class="select">
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                        <li>
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                        <li>
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                        <li>
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                        <li>
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                        <li>
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                        <li>
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                        <li>
                        	<a href="#_">精选菌菇类产品</a>
                        </li>
                    </ul>
                    <div class="lft"><img src="./include/img/lnavft.jpg" width="222" height="15" /></div>
                </div>
                <div class="iright">
                	<div class="position">
                    	当前位置&nbsp;&nbsp;<a href="#_">首页</a>|<a href="#_">精选产品</a>|<span class="orange">精选菌菇类产品</span>
                    </div>
                    <div class="title">精选菌菇类产品</div>
                    <ul class="plist">
                    	<li>
                        	<div class="media"><a href="#_"><img src="./include/img/p.jpg" width="203" height="131" /></a></div>
                        	<div class="intro">
                            	<div class="tt"><a href="#_">野生菌菇</a></div>
                                <div class="c">野生菌是云南省特有的野生食用菌，生长在海拔2000--4000米，地形地貌复杂的立体气候地。云南野生食用菌分为二个纲、十一个目、三十五个科、九十六个属、约二百五十种，占了全世界食用菌一半以上，中国食用菌的三分之二。</div>
                                <div class="more"><a href="#_"><img src="./include/img/button01.jpg" width="130" height="38" /></a></div>
                            </div>
                        </li>
                        <li class="llast">
                        	<div class="media"><a href="#_"><img src="./include/img/p.jpg" width="203" height="131" /></a></div>
                        	<div class="intro">
                            	<div class="tt"><a href="#_">野生菌菇</a></div>
                                <div class="c">野生菌是云南省特有的野生食用菌，生长在海拔2000--4000米，地形地貌复杂的立体气候地。云南野生食用菌分为二个纲、十一个目、三十五个科、九十六个属、约二百五十种，占了全世界食用菌一半以上，中国食用菌的三分之二。</div>
                                <div class="more"><a href="#_"><img src="./include/img/button01.jpg" width="130" height="38" /></a></div>
                            </div>
                        </li>
                    </ul>
                    <div class="page">
  <span class="disabled">«上一页</span><span class="current">1</span><a href="/newslist/0/2.aspx">2</a><a href="/newslist/0/3.aspx">3</a><a href="/newslist/0/4.aspx">4</a><a href="/newslist/0/2.aspx">下一页»</a>
</div>
                </div>
            </div>
            <div class="ft"><img class="png" src="./include/img/ft.png" width="1006" height="29" /></div>
        </div>	
    </div>
			<?php
			include './include/footer.php';
			?>
		</div>
	</body>
</html>

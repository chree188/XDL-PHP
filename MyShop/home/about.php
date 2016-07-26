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
		<script type="text/javascript" src="./include/js/jquery.nivo.slider.js"></script>
		<script type="text/javascript" src="./include/js/cufon-yui.js"></script>
		<script type="text/javascript" src="./include/js/scripts.js"></script>
		<script type="text/javascript" src="./include/js/custom.js"></script>
		<script src="./include/js/ScrollPic.js"></script>
		<script src="./include/js/tab.js" type="text/javascript"></script>
    
	</head>
	<body>
		<?php
			include './include/header.php';
			?>
		<!--网页主体content-->
		<div class="inner">
    	<div class="ibanner"><img src="./include/img/ibanner.jpg" width="980" height="334" /></div>
    	<ul class="aboutusbd">
        	<li>
            	<div class="media"><a href="#_"><img src="./include/img/aboutus.jpg" /></a></div>
            	<div class="name"><img src="./include/img/aword.jpg" /></div>
                <div class="con">
                	作为绿色食品的崇尚者，我们把绿色环保深入到经营的各个角落——绿色包装，绿色推广，绿色经营...
                </div>
            </li>
            <li>
            	<div class="media"><a href="#_"><img src="./include/img/aboutus01.jpg" /></a></div>
            	<div class="name"><img src="./include/img/aword01.jpg" /></div>
                <div class="con">
                	作为绿色食品的崇尚者，我们把绿色环保深入到经营的各个角落——绿色包装，绿色推广，绿色经营...
                </div>
            </li>
            <li class="llast">
            	<div class="media"><a href="#_"><img src="./include/img/aboutus02.jpg" /></a></div>
            	<div class="name"><img src="./include/img/aword02.jpg" /></div>
                <div class="con">
                	作为绿色食品的崇尚者，我们把绿色环保深入到经营的各个角落——绿色包装，绿色推广，绿色经营...
                </div>
            </li>
        </ul>
    </div>
			<?php
			include './include/footer.php';
			?>
		</div>
	</body>
</html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>刷手会员管理系统</title>
		<link link rel="shortcut icon" type="imagex-icon" href="favicon.ico" />
		<link rel="stylesheet" href="./public/css/base.css"/>
		<style type="text/css">
		body{
			background-image: url("./public/img/bg.jpg");	/*index页背景图,图片路径在/public/img/下*/
			background-size: cover;
		}
		/*浮动tool*/
		.aside-panel{
		    position:fixed;
		    left:10%;
		    height:40%;
		    z-index:20;
		    bottom:325px;
		    width:50px;
		}
		.aside-panel a{
		    display:block;
		    width:100px;
		    height:100px;
		    background-color:#c30d15;
		    color:#FFF;
		    text-align:center;
		    font-size: 30px;
		    margin:55px 0;
		    -moz-border-radius:15px;
		    -webkit-border-radius:5px;
		    border-radius:5px;
		    opacity:0.5;
		    filter: Alpha(opacity=50);
		}
		.aside-panel .backtop{
		    display:none;
		}
	</style>
	</head>
	<body>
		<div class="aside-panel" id="j-panel">
		<a href="./home/usadd.php" title="" id="j-message">会员<br />注册</a>
		<a href="./home/meradd.php" title="" id="j-message">商家<br />注册</a>
		<a href="./admin/index.php" title=""  id="j-service">后台<br />登录</a>
	</div>
	</body>
</html>

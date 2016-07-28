<head>
	<title>天慈天养商城</title>
	<link link rel="shortcut icon" type="imagex-icon" href="favicon.ico" />
	<link rel="stylesheet" href="./home/include/css/base.css"/>
	<style type="text/css">
		body{
			background-image: url("./public/bg.jpg");
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
		<a href="./home/index.php" title="" id="j-message">商城<br />前台</a>
		<a href="./admin/index.php" title=""  id="j-service">商城<br />后台</a>
	</div>
</body>
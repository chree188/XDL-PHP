<?php 
//设置报错情况	去除notice错误
	error_reporting(E_ALL ^ E_NOTICE);
//	开启session
	session_start(); 
	//登录验证
	if(empty($_SESSION['user'])){
		header('Location:login.php');
		exit;
	}
	//连接数据库
	include("../public/sql/dbconfig.php");
	$link  = @mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
	// var_dump($link);
	mysqli_set_charset($link,"utf8");
	
?>
<!--网站头部和导航栏-->
<link href="./include/css/common.css" rel="stylesheet" />
<link href="./include/css/style.css" rel="stylesheet" />

<!--头部-->
<div class="top">
	<div class="link">
		<span>用户：<a href="./users/iUserCenter.php"><?php 
			echo $_SESSION['user']['name']; 
		?></a>&nbsp;&nbsp;角色：
    	<?php 
		    $state = array("1"=>"钻石会员","2"=>"黄金会员","3"=>"普通用户");
		    echo $state[$_SESSION['user']['state']]; 
    	?>
    	</span>
    	&nbsp;&nbsp;
    	<a class="i" href="logout.php">
			注销
		</a>
		&nbsp;&nbsp;
		<a class="a" href="edit.php?id=<?php 
			echo $_SESSION['user']['id']; 
		?>">
			修改账号信息
		</a>
	</div>
	<div class="logo">
		<a href="./index.php"></a>
	</div>
</div>
<div class="nav">
	<div class="search">
		<a href="./shopCar.php">
			<img src="./include/img/buycar.gif" width="182" height="41" />
		</a>
	</div>
	<ul class="list">
		<li>
			<a class="n01" href="./about.php"></a>
		</li>
		<li>
			<a class="n02" href="#_"></a>
		</li>
		<li>
			<a class="n03" href="./lists.php"></a>
		</li>
		<li>
			<a class="n04" href="#_"></a>
		</li>
		<li>
			<a class="n05" href="#_"></a>
		</li>
		<li>
			<a class="n06" href="#_"></a>
		</li>
		<li>
			<a class="n07" href="#_"></a>
		</li>
	</ul>
</div>

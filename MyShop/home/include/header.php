<?php 
//设置报错情况	去除notice错误
	error_reporting(E_ALL ^ E_NOTICE);
	session_start(); 
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
		    $state = array("0"=>"超级管理员","1"=>"一般管理员","2"=>"信息录入员");
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
		<br />
		<input type="text" class="text08" />
		<input type="button" class="button04" />
		&nbsp;&nbsp;
		<a href="#_" class="sbutton">
			余额查询
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
			<a class="n01" href="#_"></a>
		</li>
		<li>
			<a class="n02" href="#_"></a>
		</li>
		<li>
			<a class="n03" href="#_"></a>
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

<?php session_start();	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
<style> 
body {
	overflow-x: hidden;
	background: #f2f0f5;
	padding: 15px 0px 10px 5px;
}

#main {
	font-size: 12px;
}

#main span.time {
	font-size: 14px;
	color: #528dc5;
	width: 100%;
	padding-bottom: 10px;
	float: left
}

#main div.top {
	width: 100%;
	background: url(images/main/main_r2_c2.jpg) no-repeat 0 10px;
	padding: 0 0 0 15px;
	line-height: 35px;
	float: left
}

#main div.sec {
	width: 100%;
	background: url(images/main/main_r2_c2.jpg) no-repeat 0 15px;
	padding: 0 0 0 15px;
	line-height: 35px;
	float: left
}

.left {
	float: left
}

#main div a {
	float: left
}

#main span.num {
	font-size: 30px;
	color: #538ec6;
	font-family: "Georgia", "Tahoma", "Arial";
}

.left {
	float: left
}

div.main-tit {
	font-size: 14px;
	font-weight: bold;
	color: #4e4e4e;
	background: url(images/main/main_r4_c2.jpg) no-repeat 0 33px;
	width: 100%;
	padding: 30px 0 0 20px;
	float: left
}

div.main-con {
	width: 100%;
	float: left;
	padding: 10px 0 0 20px;
	line-height: 36px;
}

div.main-corpy {
	font-size: 14px;
	font-weight: bold;
	color: #4e4e4e;
	background: url(images/main/main_r6_c2.jpg) no-repeat 0 33px;
	width: 100%;
	padding: 30px 0 0 20px;
	float: left
}

div.main-order {
	line-height: 30px;
	padding: 10px 0 0 0;
}

</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="main">
  <tr>
    <td colspan="2" align="left" valign="top">
    <span class="time"><strong>
    	<?php
    		//设置默认时区
			date_default_timezone_set('PRC');
			//根据当前登录时间小时数判断早上/中午/下午/晚上
			$h = date('G');
			if ($h < 11)
				echo '早上好!';
			else if ($h < 13)
				echo '中午好!';
			else if ($h < 18)
				echo '下午好!';
			else if ($h < 24)
				echo '晚上好!';
			else if ($h < 6)
				echo '晚上好!凌晨夜已深，注意休息!';
			echo "&nbsp;";
			echo $_SESSION['user']['name'];
		?>
		</strong><u>[
    	<?php 
		    $state = array("1"=>"超级管理员","2"=>"会员管理员");
		    echo $state[$_SESSION['user']['state']]; 
    	?>
    	]</u></span>
    <div class="top">
						<span class="left"> <?php
								if (!empty($_COOKIE['lastvisit'])) {	//先判断，是否存在cookie
									echo "您上次访问时间是：" . $_COOKIE['lastvisit'];
									setCookie("lastvisit", date("Y-m-d H:i:s"), time() + 3600 * 24 * 360);
								} else {
									echo "今天您是第一次登录，欢迎！";
									setCookie("lastvisit", date("Y-m-d H:i:s"), time() + 3600 * 24 * 360);
								}
								echo "&nbsp;&nbsp;&nbsp;&nbsp;";
								//获取当前登录者的IP地址
								$ip = $_SERVER["REMOTE_ADDR"];
								echo "当前登录IP地址为：".$ip;
						    ?>&nbsp;&nbsp;&nbsp;&nbsp;如非您本人操作，请及时 </span>
						<a href="../users/edit.php?id=<?php echo $_SESSION['user']['id']; ?>" target="mainFrame" onFocus="this.blur()">
							更改账号信息
						</a>
					</div>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" width="15%">
    	<div class="main-tit">用户信息</div>
   		<div class="main-con">
						ID：<strong><?php echo $_SESSION['user']['id']; ?></strong>
						<br/>
						账号：<strong><?php echo $_SESSION['user']['username']; ?></strong>
						<br/>
						姓名：<strong><?php echo $_SESSION['user']['name']; ?></strong>
						<br/>
						性别：<strong><?php 
						// 设置性别
						$sex = array("1"=>"男","2"=>"女");
						echo $sex[$_SESSION['user']['sex']]; ?></strong>
						<br/>
						住址：<strong><?php echo $_SESSION['user']['address']; ?></strong>
						<br/>
						电话：<strong><?php echo $_SESSION['user']['phone']; ?></strong>
						<br/>
					</div>
    </td>
    
    <td align="left" valign="top" width="70%">
    	<div class="main-tit">网站信息</div>
    	<div class="main-con">
						会员注册：开启
						<br/>
						访问本页面次数：<span class="num">
							<?php
								if (isset($_SESSION['uesr'])) {
									$_SESSION['uesr']++;
								} else {
									$_SESSION['uesr'] = 1;
								}
								echo $_SESSION['uesr'];
							?>
						</span>
						<br/>
						登陆者IP：<?php 
						if($_SERVER['REMOTE_ADDR']=='::1'){
							echo '127.0.0.1';
						}else{
							echo $_SERVER['REMOTE_ADDR'];
						}
						?>
					</div>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">
    <div class="main-corpy">系统提示</div>
    <div class="main-order">
						1=>如您在使用过程有发现出错请及时与我们取得联系！
						<br/>
						2=>强烈建议您使用IE7以上版本浏览器或谷歌、火狐的浏览器！
					</div>
    </td>
  </tr>
</table>
</body>
</html>
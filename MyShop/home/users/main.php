<?php session_start();	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="../../admin/include/css/css.css" type="text/css" rel="stylesheet" />
<link href="../../admin/include/css/main.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="../include/css/base.css"/>
<link rel="stylesheet" href="../include/css/back-common.css"/>
<link rel="stylesheet" href="../include/css/back-index.css"/>
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
	
	<!--会员信息开始-->
                <div class='factory-info'>
                    <div class='factory-info-l'>
                        <div class='fl fac-head'>
                            <p class='fac-img'>
                                <img src="../include/img/head/<?php echo $_SESSION['user']['id']; ?>.jpg"  width="100" height="100" />
                            </p>
                            <div>
                                <ul class='fac-popularity'>
                                    <li >     
                                        <a href='javascript:;' class='line'><strong>8474</strong><span>关注</span></a>
                                    </li>
                                    <li>
                                        <a href='javascript:;'><strong>5744</strong><span>收藏</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class='fl'>
                            <p class='f-name'><span class='fac-name'><?php 
													echo $_SESSION['user']['name']; 
												?>
											</span><i class='icon-certificate'></i></p>
                            <p class='account'>
                                <span>余额：<em class='account-balance'>13145.20</em></span>
                                <a class="btn" title="充值"href="javascript:;" target="_blank">充 值</a>
                                <a class="btn" title="充值"href="javascript:;" target="_blank">提 现</a>
                            </p>
                            <p class='from'>
                                <i class='from-icon'></i><span>来自<?php 
													echo $_SESSION['user']['address']; 
												?></span>
                            </p>
                            <p class='shop-addr'>
                                <i class='addr-icon'></i><span>店铺地址：<a href='../index.php'>http://localhost/</a><span>
                            </p>
                        </div>
                    </div>
                    <div class='factory-info-r'>
                        <p>会员等级：<i class='purchase-star4'></i></p>
                        <p>信誉等级：<i class='supply-star3'></i></p>
                        <p>网站积分：100000</p>
                        <div class='safe-level'>
                            <p>我的账户安全级别:</p>
                            <i class='safe-low'></i><span class='level-text'>低</span>
                        </div>
                    </div>
                </div>
                <!-- 会员信息结束 -->
	
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="main">
  <tr>
    <td colspan="2" align="left" valign="top">
    <span class="time">
    	<strong>
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
				echo '凌晨夜已深，注意休息!';
			echo "&nbsp;";
			echo $_SESSION['user']['name'];
		?>
		</strong>
		<u>[
    	<?php 
		    $state = array("1"=>"超级管理员","2"=>"TCTY会员","3"=>"普通用户");
		    echo $state[$_SESSION['user']['state']]; 
    	?>
    	]</u>
    	<?php
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
		?>&nbsp;&nbsp;&nbsp;&nbsp;如非您本人操作，请及时
    	<a href="../edit.php?id=<?php echo $_SESSION['user']['id']; ?>" target="_black" onFocus="this.blur()">更改密码</a>
    </span>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" width="50%">
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
						登陆者IP：<?php echo $_SERVER['REMOTE_ADDR']; ?>
					</div>
    </td>
    <td align="left" valign="top" width="49%">
    <div class="main-tit">服务器信息</div>
   	<div class="main-con">
						服务器软件：Apache/2.2.6 (Win32) PHP/5.2.5
						<br/>
						PHP版本：5.2.5
						<br/>
						MYSQL版本：5.0.45-community-nt
						<br/>
						魔术引用：开启 (建议开启)
						<br/>
						使用域名：192.168.1.124
						<br/>
					</div>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">
    <div class="main-corpy">系统提示</div>
    <div class="main-order">
						1=>如您在使用过程有发现出错请及时与我们取得联系；为保证您得到我们的后续服务，强烈建议您购买我们的正版系统或向我们定制系统！
						<br/>
						2=>强烈建议您将IE7以上版本或其他的浏览器
					</div>
    </td>
  </tr>
</table>
</body>
</html>
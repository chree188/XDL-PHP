<?php
	session_start();
	//首先执行登录验证
	if(empty($_SESSION['user'])){
		header('Location:../login.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>用户中心</title>
    <link rel="shortcut icon" href="../../favicon.ico" />
    <script type="text/javascript" src="../include/js/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="../include/css/base.css"/>
    <link rel="stylesheet" href="../include/css/back-common.css"/>
    <link rel="stylesheet" href="../include/css/back-index.css"/>
</head>
<!--框架样式-->
<frameset rows="95,*,30" cols="*" frameborder="no" border="0" framespacing="0">
<!--top样式-->
	<frame src="./top.php" name="topframe" scrolling="no" noresize id="topframe" title="topframe" />
<!--contact样式-->
	<frameset id="attachucp" framespacing="0" border="0" frameborder="no" cols="194,12,*" rows="*">
		<frame scrolling="no"  noresize="" frameborder="no" name="leftFrame" src="./left.php"></frame>
		<frame id="leftbar" scrolling="no" noresize="" name="switchFrame" src="./swich.php"></frame>
		<frame scrolling="auto" noresize="" border="0" name="mainFrame" src="./main.php"></frame>
	</frameset>
<!--bottom样式-->
	<frame src="./bottom.php" name="bottomFrame" scrolling="No" noresize="noresize" id="bottomFrame" title="bottomFrame" />
</frameset>
<noframes></noframes>
<!--不可以删除-->
</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>左侧导航menu</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><a href="./main.php" target="mainFrame" ><img src="./images/login/<?php echo $_SESSION['user']['id']; ?>.jpg" width="44" height="44" /></a></div>
    <span>用户：<?php echo $_SESSION['user']['name']; ?><br>角色：
    	<?php 
		    $state = array("1"=>"超级管理员","2"=>"TCTY会员","3"=>"普通用户");
		    echo $state[$_SESSION['user']['state']]; 
    	?>
    </span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>用户模块</span>
        <a href="../users/add.php" target="mainFrame" onFocus="this.blur()">添加用户</a>
        <a href="../users/index.php" target="mainFrame" onFocus="this.blur()">查看用户</a>
      </div>
      <div>
        <span>类别模块</span>
        <a href="../type/add.php" target="mainFrame" onFocus="this.blur()">添加类别</a>
        <a href="../type/index.php" target="mainFrame" onFocus="this.blur()">查看类别</a>
        <!--<a href="../type/index2.php" target="mainFrame" onFocus="this.blur()">查看类别2</a>-->
      </div>
      <div>
        <span>商品模块</span>
        <a href="../goods/add.php" target="mainFrame" onFocus="this.blur()">添加商品</a>
        <a href="../goods/index.php" target="mainFrame" onFocus="this.blur()">查看商品</a>
      </div>
      <div>
        <span>订单模块</span>
        <a href="../orders/index.php" target="mainFrame" onFocus="this.blur()">查看用户订单</a>
        <a href="../orders/index2.php" target="mainFrame" onFocus="this.blur()">查看发货订单</a>
      </div>
    </div>
</body>
</html>
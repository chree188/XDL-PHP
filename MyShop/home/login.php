<!DOCTYPE html>
<html>
<head runat="server">
	<meta charset=utf-8 />
    <title>用户登录界面</title>
	<link href="./include/css/common.css" rel="stylesheet" />
	<link href="./include/css/style.css" rel="stylesheet" />
</head>
<body>
<div class="top">
	<div class="link">
		<a class="a" href="register.php">
			注册
		</a>
	</div>
	<div class="logo">
		<a href="index.php"></a>
	</div>
</div>
 <div class="inner">
    	<div class="logon">
        	<div class="logonl">
            	<div class="hd">
                	<div class="tt">用户登录</div>
                    <div class="c">登录用户，尽享VIP购物。</div>
                    <div class="c">还没有账号？请点击右上角的注册按钮进行注册。</div>
                </div>
                <div class="bd">
                	<form action="dologin.php" method="post">
					用户名：<input type="text" name="name" /><br /><br />
					密&nbsp;码：<input type="password" name="password" /><br /><br />
					验证码：<input type="text" name="code" size="5"/>
						  <img src="../public/code.php" onclick="this.src='../public/code.php?id='+Math.random();"/><br /><br />
					<input type="submit" value="登录" class="button03" />
					<input type="reset" class="button03" />
                </div>
                <div>
                	<?php	
				//输出错误信息
					$_GET['errno'] = empty($_GET['errno'])? '':$_GET['errno'];
					switch($_GET['errno']){
						case 1:
							echo "<h2 style='color:red; margin:0px auto;'>账户或密码错误</h2>";
						break;
						case 2:
							echo "<h2 style='color:red; margin:0px auto;'>账户或密码错误</h2>";
						break;
						case 3:
							echo "<h2 style='color:red; margin:0px auto;'>验证码错误</h2>";
						break;
					}
				?>
                </div>
            </div>
            <div class="logonr"><img src="./include/img/carm.jpg" />
            </div>
        </div>
    </div>
    <div class="footer">
    	<?php	
    		include'./include/footer.php';
    	?>
    </div>
</body>
</html>
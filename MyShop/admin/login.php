<!DOCTYPE html>
<html>
<head runat="server">
	<meta charset=utf-8 />
    <title>后台管理登录界面</title>
    <link href="./include/css/alogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <form id="form1" runat="server" action="dologin.php" method="post">
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB"><span><img src="./include/images/login/logo.jpg" alt="" style="" /></span></li>
            <li class="topC"></li>
            <li class="topD">
                <ul class="login">
                                                       用户名：<input type="text" name="name" /><br /><br />
					密&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" /><br /><br />
					验证码：<input type="text" name="code" size="5"/>
				  			<img src="../public/code.php" onclick="this.src='../public/code.php?id='+Math.random();"/><br /><br />
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C"><span class="btn"><input name="" type="image" src="./include/images/login/btnlogin.gif" /></span></li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">
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
			</li>
        </ul>
    </div>
    </form>
</body>
</html>
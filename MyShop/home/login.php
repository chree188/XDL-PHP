<link href="../public/css/common.css" rel="stylesheet" />
<link href="../public/css/style.css" rel="stylesheet" />

<div class="top">
	<div class="logo">
		<a href="#_"></a>
	</div>
</div>
 <div class="inner">
    	<div class="logon">
        	<div class="logonl">
            	<div class="hd">
                	<div class="tt">用户登录</div>
                    <div class="c">登录用户，尽享VIP购物。</div>
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
            </div>
            <div class="logonr"><img src="../public/img/carm.jpg" />
            </div>
        </div>
    </div>
    <div class="footer">
    	<?php	
    		include'footer.php';
    	?>
    </div>
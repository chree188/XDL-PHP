<link link rel="shortcut icon" type="imagex-icon" href="../favicon.ico" />
<link href="../public/css/common.css" rel="stylesheet" />
<link href="../public/css/style.css" rel="stylesheet" />
<style>
	b {
		color: red;
		font-size: 20px;
	}
</style>
<div class="top">
	<div class="logo">
		<a href="index.php"></a>
	</div>
</div>
 <div class="inner">
    	<div class="logon">
        	<div class="logonl">
            	<div class="hd">
                	<div class="tt">用户注册</div>
                    <div class="c">成为VIP，尽享更多优惠，就差这一步。。。</div>
                </div>
                <div class="bd">
                	<form action="./users/action.php?a=insert" method="post">
							账&nbsp;&nbsp;号: <input type="text" name="username" class="text05"><b>*</b><br><br>
							真实姓名: <input type="text" name="name" class="text05"><br><br>
							密&nbsp;&nbsp;码: <input type="text" name="pass" class="text05"><b>*</b><br><br>
							<label>性&nbsp;&nbsp;别: <input type="radio" name="sex" value="1" checked>男</label>
							<label><input type="radio" name="sex" value="2">女</label><br><br>
							地&nbsp;&nbsp;址: <input type="text" name="address" class="text05"><br><br>
							邮&nbsp;&nbsp;编: <input type="text" name="code" class="text05"><br><br>
							电&nbsp;&nbsp;话: <input type="text" name="phone" class="text05"><br><br>
							Email :&nbsp; <input type="text" name="email" class="text05"><b>*</b><br><br>
							<input type="hidden" name="state" value="3" />	<!--隐藏域传前台注册用户默认权限为3_普通用户-->
							验证码：&nbsp;<input type="text" name="mycode" size="5"/>
							<img src="../public/code.php" class="text06" onclick="this.src='../public/code.php?id='+Math.random();"/><br /><br />
							<input type="submit" value="提交注册" class="button03"> <input type="reset" class="button03">
					</form>
					<?php
						//处理注册表单的错误信息
						switch(@$_GET['errno']){
							case 1: 
							echo "<h2 style='color:red; '>注册失败</h2>";
							break;
							case 2: 
							echo "<h2 style='color:red; '>带<b>*</b>项不能为空</h2>";
							break;
							case 3: 
							echo "<h2 style='color:red; '>验证码错误</h2>";
						}
					?>
                </div>
            </div>
            <div class="logonr"><img src="./include/img/carm.jpg" />
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
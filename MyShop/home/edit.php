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
		<a href="#_"></a>
	</div>
</div>
 <div class="inner">
    	<div class="logon">
        	<div class="logonl">
            	<div class="hd">
                	<div class="tt">修改注册信息</div>
                    <div class="c">带<b>*</b>项为必填项，不能为空。。。</div>
                </div>
                <div class="bd">
                	<?php
					//需要获得被修改的用户信息
					//1 导入配置文件 
					
					if(@$_GET['id']){
			
						include("../../public/sql/dbconfig.php");
						//2 连接数据库
						$link = @mysqli_connect(HOST,USER,PASS) or die("数据库连接失败");
						//3 选择数据库 设置字符集
						mysqli_set_charset($link,"utf8");
						mysqli_select_db($link,DBNAME);
						//4 写sql语句 执行sql
						$sql = "select * from users where id={$_GET['id']}";
						$result = mysqli_query($link,$sql);
			
						//5 解析结果集 
						$row = mysqli_fetch_assoc($result);
			
					}
					?>
                	<form action="./users/action.php?a=update" method="post">
							账&nbsp;&nbsp;号: <input type="text" name="username" class="text05"><b>*</b><br><br>
							真实姓名: <input type="text" name="name" class="text05"><br><br>
							密&nbsp;&nbsp;码: <input type="text" name="pass" class="text05"><b>*</b><br><br>
							<label>性&nbsp;&nbsp;别: <input type="radio" name="sex" value="1" checked>男</label>
							<label><input type="radio" name="sex" value="0">女</label><br><br>
							地&nbsp;&nbsp;址: <input type="text" name="address" class="text05"><br><br>
							邮&nbsp;&nbsp;编: <input type="text" name="code" class="text05"><br><br>
							电&nbsp;&nbsp;话: <input type="text" name="phone" class="text05"><br><br>
							Email :&nbsp; <input type="text" name="email" class="text05"><b>*</b><br><br>
							<input type="submit" value="修改" class="button03"> <input type="reset" class="button03">
					</form>
					<?php
						//处理修改表单的错误信息
						switch(@$_GET['errno']){
							case 1: 
							echo "<h2 style='color:red; '>修改失败</h2>";
							break;
							case 2: 
							echo "<h2 style='color:red; '>带<b>*</b>项不能为空</h2>";
							break;
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
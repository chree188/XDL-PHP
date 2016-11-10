<h2><a href="index.php">cookie模拟用户登录</a></h2>
	
	<h3>
		<a href="index.php">首页</a> | 
	<?php
		$_COOKIE['users'] = empty($_COOKIE['users'])? '':$_COOKIE['users'];
		if(empty($_COOKIE['users'])){
			echo "<a href=\"login.php\">登录</a> | ";//没有登录信息的时候显示登录表单
		}else{
			echo "你好:{$_COOKIE['users']}, <a href='logout.php'>退出</a> | ";//有登录信息的时候显示用户信息和退出
		}
	?>
		<a href="show.php">查看信息</a>  
	</h3>
	<hr>
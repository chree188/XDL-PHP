<!DOCTYPE HTML >
<html>
	<head>
		<meta charset="utf-8" />
		<title>Document</title>
	</head>
	<body>
		<h1><a href="1-1.php" style="text-decoration: none;">8 get方式传值</a></h1>
		<form action="1-1.php" method="get">
			<input type="hidden" name="a" value="add" />
			用户名：<input type="text" name="username" /><br /><br />
			密码：<input type="password" name="userpwd" /><br /><br />
			<input type="submit" />
		</form>
		<hr />
		
		<?php
			echo "<pre>";
			echo "<h3>处理和接收表单传递的值</h3>";
			echo "<h4>1 表单以get方式提交username=123</h4>";
//			print_r($_GET);	//1 如果表单method的不填默认是get方式提交值
//			2 get方式传值 get方式接收
//			Array
//			(
//			    [a] => add
//			    [username] => 741741
//			    [userpwd] => 741741
//			)
			echo "<h4>2 表单以post方式提交username=741741 & 提交一个添加动作叫做add</h4>";
//			print_r($_POST);
// 			1.php?a=add 这种方式传值叫url传值 ,使用get方式接收,a在框架中是一个动作的表示是action 
// 			1.php?a=add&id=10 url方式传值 ,
// 			传多个值 传值使用url?下标=值&下标2=值2
// 			print_r($_GET);

			echo "<h4>3 表单以get方式提交username=123 & 提交一个添加的动作叫做add</h4>";
			print_r($_GET);
// 			1 如果表单的提交方式是get方式 url上面的传值就会被覆盖掉
// 			2 如果还希望传过去 使用表单项的type属性值 hidden\

// 			get方式传值的特点 
// 			1 url可见  长度受限  相对不安全 
// 			post方式传值的特点 
// 			2 url不可见 长度不受限 相对安全 
		?>
	</body>
</html>
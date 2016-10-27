<?php
	//验证是否有此会员

	header("Content-Type:text/html;charset=utf-8");
    error_reporting(0);

	//包含配置文件
	include 'config.php';
	//MySQL操作类
	include 'include/Mysql.class.php';

	$sql="select * from lamp_member where name=?";

	$user=Mysql::find($sql,$_POST['user']);
	if(!$user){
		die('没有此会员');
	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>找回密码</title>
</head>
<body>
	<h3>找回密码</h3>
	<form action="action.php?a=findpwd" method="post">
		<input type="hidden" name="user"
		value="<?php echo $user['name'] ?>"/>
		问题: <?php echo $user['question'] ?><br>
		答案： 	<input type="text" name="answer" value=""/><br>
		<input type="radio" name="type" value="email" checked/>邮件
		<input type="radio" name="type" value="sms"/>手机 <br>
		<input type="submit" value="下一步" />
	</form>

</body>
</html>

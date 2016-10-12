<!DOCTYPE HTML >
<html>
	<head>
		<meta charset="utf-8" />
		<title>留言板</title>
	</head>
	<body>
		<center>
			<form action="" method="post" enctype="multipart/form-data">
				<h2>文件式留言板</h2>
				<a href="liuyan.php">添加留言</a>|<a href="show.php">查看留言</a>
				<hr>
				<h3>我要留言</h3>
				留言标题:<input type="text" name="tit" autofocus/><br /><br />
				留言的人:<input type="text" name="use" /><br /><br />
				留言内容:<textarea  name="con" cols="20px" rows="7px"/></textarea><br />
				<input type="submit" value="提交" />
				<input type="reset" value="重置" />
			</form>
		</center>
		
		<?php
			$cont=$_POST;
//			echo "<pre>";	
//			print_r($cont);
			$_POST['ip']=$_SERVER['REMOTE_ADDR'];
			$str=implode('@_@', $cont).'*#_#*';
//			print_r($str);
			file_put_contents('./msg.txt', $str,FILE_APPEND);
		?>
	</body>
</html>
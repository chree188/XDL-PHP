<?php	
	include"./head.php";
?>

<center>
	<h3>我要留言</h3>
	<form action="./doAdd.php" method="post">
		留言标题：<input type="text" name="title" /><br/><br />
		留言的人：<input type="text" name="author" /><br/><br />
		留言内容：<textarea name="content" cols="20px" rows="7px"></textarea><br />
		<input type="submit" value="提交" />
		<input type="reset" value="重置" />
	</form>
</center>

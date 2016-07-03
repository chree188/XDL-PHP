<?php	
	include "./head.php";
?>
<center>
	<h3>我要留言</h3>
	<form action="./doAdd.php" method="post">
		留言标题：<input type="text" name="title" /><br><br>
		留言的人：<input type="text" name="author" /><br><br>
		留言内容：<textarea name="content" cols="20" rows="7"></textarea><br><br>
		<input type="submit" value="提交" />
		<input type="submit" value="重置" />
	</form>
</center>
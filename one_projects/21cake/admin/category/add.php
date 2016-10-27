<?php 
	$pid = empty($_GET['id'])?0:$_GET['id'];
	$path = empty($_GET['path'])? '0,' : $_GET['path'].$pid.',';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<fieldset>
		<legend>新增分类</legend>
		<form action="action.php?bz=add" method='post'>
			<p>分类名: <input type="text" name='name' placeholder='分类名'></p>
			<p>PID: <input type="text" name='pid' value='<?= $pid ?>' readonly></p>
			<p>PATH: <input type="text" name='path' value='<?= $path ?>'  readonly></p>
			<p>Display: 
				<label> <input type="radio" name="display" value=1 checked>隐藏</label>
				<label> <input type="radio" name="display" value=2 >显示</label>
			</p>
			<p> <input type="submit" value='新增' ></p>
		</form>
	</fieldset>
</body>
</html>
<?php 
	include '../init.php';

	$id = $_GET['id'];

	$sql = 'select `id`,`name`,`pid`,`path`,`display` from category where id='.$id;
	$result = query($sql)[0];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<fieldset>
		<legend>编辑分类</legend>
		<form action="action.php?bz=edit" method='post'>
			<input type="hidden" name='id' value='<?= $result['id']?>'>
			<p>分类名: <input type="text" name='name' placeholder='分类名' value='<?= $result['name']?>'></p>
			<p>PID: <input type="text" name='pid' value='<?= $result['pid']?>' readonly></p>
			<p>PATH: <input type="text" name='path' value='<?= $result['path']?>'  readonly></p>
			<p>Display: 
				<label> <input type="radio" name="display" value='1' <?= $result['display'] == 1?'checked':''  ?>>显示</label>
				<label> <input type="radio" name="display" value='2' <?= $result['display'] == 2?'checked':''  ?>>隐藏</label>
			</p>
			<p> <input type="submit" value='保存' ></p>
		</form>
	</fieldset>
</body>
</html>
<?php
	include '../init.php';

	$sql = 'select g.name, g.price, g.uptime  
			from goods g
			where g.id='.$_GET['id'];
	$result = query($sql);

	$goods_list = $result[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<fieldset>
		<legend>编辑商品</legend>
		<form action="action.php?bz=edit&id=<?= $_GET['id']?>" method='post' enctype='multipart/form-data'>
			
<!-- 			<p>分类:
				<select name="cid">
					<?php foreach($list as $v): ?>
						<?php 
							// 分类的排版
							$nbsp = str_repeat('---', substr_count($v['path'],',')-1) ;   
						 ?>
						<option value="<?= $v['id']?>"><?= $nbsp.$v['name']?></option>
					<?php endforeach; ?>
				</select>
			</p> -->
			<p>商品名: <input type="text" name='name' value="<?=$goods_list['name']?>"></p>
			<p>价格: <input type="text" name='price' value="<?= $goods_list['price']?>"></p>
			<p> <input type="submit" value='修改' ></p>
		</form>
	</fieldset>
</body>
</html>
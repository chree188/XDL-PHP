<?php 
	include '../init.php'; 

	$sql1= 'select name from goods';


	$sql = 'select d.id, d.gid, d.gname, d.desc1, d.desc2, d.desc3, d.desc4, d.desc5
		from goods g, detail d 
		where g.id=d.gid and g.name=d.gname';

	$list = query($sql1);
	// var_dump($list);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
</head>
<body>
	<fieldset>
		<legend>商品描述</legend>
		<form action="action.php?bz=goodsdetail" method='post' >
			<!-- <input type="hidden" name='gid'> -->
			<p>商品名:
				<select name="gname">
					<?php foreach($list as $k=>$v): ?>
						<option value="<?= $v['name']?>"><?= htmlentities($v['name'])?></option>
					<?php endforeach; ?>
				</select>
			</p>
			<p>描述1: <input type="textarea" name='detail1'></p>
			<p>描述2: <input type="textarea" name='detail2'></p>
			<p>描述3: <input type="textarea" name='detail3'></p>
			<p>描述4: <input type="textarea" name='detail4'></p>
			<p>描述5: <input type="textarea" name='detail5'></p>
			<p>口味: <input type="textarea" name='taste'></p>
			<p>原材料: <input type="textarea" name='stuff'></p>
			<p> <input type="submit" value='提交' ></p>
		</form>
	</fieldset>
</body>
</html>
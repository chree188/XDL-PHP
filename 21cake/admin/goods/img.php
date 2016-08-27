<?php 
	include '../init.php';
	$gid = $_GET['id'];

	$sql = 'select `id`,`icon`,`face`,`gid` from goodsImg  where  gid='.$gid;

	$img_list = query($sql);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?= PUB_CSS?>commond.css">
	<link rel="stylesheet" href="<?= PUB_CSS?>iconfont/iconfont.css">
</head>
<body>
	<center><h1>图片管理</h1></center>
	<!-- 上传图片 -->
	<form action="action.php?bz=add_img" method='post' enctype='multipart/form-data'>
		<input type="hidden" name='gid' value='<?= $gid?>'>
		<input type="file" name="icon">
		<input type="submit" value='上传图片'>
	</form>
	<table class='table'>
		<tr>
			<th>图片编号</th>
			<th>商品编号</th>
			<th>图片名</th>
			<th>封面</th>
			<th>操作</th>
		</tr>
		<?php foreach($img_list as $v): ?>
			<tr>
				<td><?= $v['id']?></td>
				<td><?= $v['gid']?></td>
				<td>
					<?php if(empty($v['icon'])): ?>
						<img src="<?= PUB_IMG?>icon.jpg" width=50>
					<?php else: ?>
						<img src="<?= img_url($v['icon'])?>" width=50>
					<?php endif; ?>
				</td>
				<td><a href='action.php?bz=face&gid=<?= $v['gid']?>&id=<?= $v['id']?>' class='iconfont'><?= $v['face']==1?'&#xe603;':'&#xe61e;';?></a></td>
				<td>
					<a href="action.php?bz=delimg&id=<?= $v['id']?>&icon=<?= $v['icon']?>">删除</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
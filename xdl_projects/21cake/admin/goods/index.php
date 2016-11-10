<?php 
	include '../init.php';

	$name = $_POST['name'];
	var_dump($_GET);
	if(empty($name)){
		$sql = '
				select g.id, g.name, g.cid, g.price, g.sales, g.up ,g.hot, g.addtime, g.uptime, i.icon
				from  goods g, goodsImg i
				where g.id = i.gid and i.face = 1
				';
	}else{
		$sql = '
				select g.id, g.name, g.cid, g.price, g.sales, g.up ,g.hot, g.addtime, g.uptime, i.icon
				from  goods g, goodsImg i
				where g.id = i.gid and i.face = 1 and name like "%'.htmlentities($name).'%"
				';
	}

	// echo $sql;exit;
	// var_dump ($sql);
	// exit;

	$up = $_GET['a'];

	if(empty($up)){
		$sql = '
				select g.id, g.name, g.cid, g.price, g.sales, g.up ,g.hot, g.addtime, g.uptime, i.icon
				from  goods g, goodsImg i
				where g.id = i.gid and i.face = 1
				';
	}else{
		$sql = '
				select g.id, g.name, g.cid, g.price, g.sales, g.up ,g.hot, g.addtime, g.uptime, i.icon
				from  goods g, goodsImg i
				where g.id = i.gid and i.face = 1 and g.up = '.$up.' and name like "%'.htmlentities($name).'%"
				';
	}

	$result = page($sql);
	$user_list = $result[1];
	$page = $result[0];

	
	
	
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
	<div class="container">
	    <div id="search">
	      <form action="index.php" method='post'>
	      	 Name : <input type="text" name="name" class='search'>
	      	<input class="button" type="submit" value="Search" >
	      </form>
	    </div>
	</div>
	<a href="index.php?a=1">[ 在售商品 ]</a>
	<a href="index.php?a=2">[ 下架商品 ]</a>
	<table class='table'>
		<tr>
			<th>图片封面</th>
			<th>商品编号</th>
			<th>分类编号</th>
			<th>商品名</th>
			<th>价格</th>
			<th>销量</th>
			<th>上架</th>
			<th>热销</th>
			<th>添加时间</th>
			<th>更新时间</th>
			<th>操作</th>
		</tr>
		<?php if(empty($user_list)): ?>
			<tr><td colspan=13>找不到您搜索的内容....</td></tr>
		<?php else: ?>
			<?php foreach($user_list as $v): ?>
				<tr>
					<td>
						<?php if(empty($v['icon'])): ?>
							<img src="<?= PUB_IMG?>icon.jpg" width=50>
						<?php else: ?>
							<img src="<?= img_url($v['icon'])?>" width=50>
						<?php endif; ?>
					</td>
					<td><?= $v['id']?></td>
					<td><?= $v['cid']?></td>
					<td><?= $v['name']?></td>
					<td><?= $v['price']?></td>
					<td><?= $v['sales']?></td>
					<td><a href='action.php?bz=isup&id=<?= $v['id']?>&up=<?= $v['up']?>"' class='iconfont'><?= $v['up']==1?'&#xe603;':'&#xe61e;';?></a></td>
					<td><a href='action.php?bz=ishot&id=<?= $v['id']?>&hot=<?= $v['hot']?>"' class='iconfont'><?= $v['hot']==1?'&#xe603;':'&#xe61e;';?></a></td>
					<td><?= date('Y-m-d H:i:s',$v['addtime'])?></td>
					<td><?=  empty($v['uptime']) ?'暂无更新'  : date('Y-m-d H:i:s',$v['uptime'])?></td>
					<td>
						<a href="edit.php?id=<?= $v['id']?>">编辑</a>
						<a href="action.php?bz=del&id=<?= $v['id']?>&img=<?=$v['img']?>">删除</a>
						<a href="img.php?id=<?= $v['id']?>">图片管理</a>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>

		
	</table>
	<?= $page ?>
</body>
</html>
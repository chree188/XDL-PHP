<?php 
	include '../init.php';

	$name = $_POST['gname'];
	if(empty($name)){
		$sql = '
				select d.id, d.gid, d.gname, d.detail1, d.detail2, d.detail3, d.detail4, d.detail5, d.taste, d.stuff
				from  goods g, goodsDetail d
				where g.id = d.gid
				';
	}else{
		$sql = '
				select d.id, d.gid, d.gname, d.detail1, d.detail2, d.detail3, d.detail4, d.detail5, d.taste, d.stuff
				from  goods g, goodsDetail d
				where g.id = d.gid and g.name like "%'.htmlentities($name).'%"
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
	      <form action="show-detail.php" method='post'>
	      	 Name : <input type="text" name="gname" class='search'>
	      	<input class="button" type="submit" value="Search" >
	      </form>
	    </div>
	</div>
	<table class='table'>
		<tr>
			<th>商品名</th>
			<th>商品id</th>
			<th>详情id</th>
			<th>描述1</th>
			<th>描述2</th>
			<th>描述3</th>
			<th>描述4</th>
			<th>描述5</th>
			<th>口味</th>
			<th>原材料</th>
			<th>链接</th>
		</tr>
		<?php if(empty($user_list)): ?>
			<tr><td colspan=13>找不到您搜索的内容....</td></tr>
		<?php else: ?>
			<?php foreach($user_list as $v): ?>
				<tr>
					<td><?= $v['gname']?></td>
					<td><?= $v['gid']?></td>
					<td><?= $v['id']?></td>
					<td><?= $v['detail1']?></td>
					<td><?= $v['detail2']?></td>
					<td><?= $v['detail3']?></td>
					<td><?= $v['detail4']?></td>
					<td><?= $v['detail5']?></td>
					<td><?= $v['taste']?></td>
					<td><?= $v['stuff']?></td>
					<td><a href="<?=URL?>home/goods-details-pages.php?id=<?=$v['gid']?>" target="_blank">前台商品详情</a>
					</td>

<!-- 					<td><a href='action.php?bz=isup&id=<?= $v['id']?>&up=<?= $v['up']?>"' class='iconfont'><?= $v['up']==1?'&#xe603;':'&#xe61e;';?></a></td> -->
<!-- 					<td><a href='action.php?bz=ishot&id=<?= $v['id']?>&hot=<?= $v['hot']?>"' class='iconfont'><?= $v['hot']==1?'&#xe603;':'&#xe61e;';?></a></td>
					<td><?= date('Y-m-d H:i:s',$v['addtime'])?></td>
					<td><?=  empty($v['uptime']) ?'暂无更新'  : date('Y-m-d H:i:s',$v['uptime'])?></td>
					<td>
						<a href="edit.php?id=<?= $v['id']?>">编辑</a>
						<a href="action.php?bz=del&id=<?= $v['id']?>&img=<?=$v['img']?>">删除</a>
					</td> -->
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>

		
	</table>
	<?= $page ?>
</body>
</html>
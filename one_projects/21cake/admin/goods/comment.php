<?php 
	include '../init.php';

	$uid = $_POST['uid'];
	if(empty($name)){
		$sql = '
				select id, oid, gid, gname, uid, comment from goodscomment order by gid asc
				';
	}else{
		$sql = '
				select id, oid, gid, gname, uid, comment from goodscomment like "%'.htmlentities($uid).'%" order by gid asc
				';
	}


	$result = page($sql);
	$comment_list = $result[1];
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
			<th>id</th>
			<th>订单id</th>
			<th>商品id</th>
			<th>商品名</th>
			<th>用户id</th>
			<th>评论内容</th>
			<th>操作</th>
		</tr>
		<?php if(empty($comment_list)): ?>
			<tr><td colspan=13>找不到您搜索的内容....</td></tr>
		<?php else: ?>
			<?php foreach($comment_list as $v): ?>
				<tr>
					<td><?= $v['id']?></td>
					<td><?= $v['oid']?></td>
					<td><?= $v['gid']?></td>
					<td><?= $v['gname']?></td>
					<td><?= $v['uid']?></td>
					<td><?= $v['comment']?></td>
					<td><a href="action.php?bz=del-comment&id=<?= $v['id']?>">删除</a></td>

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
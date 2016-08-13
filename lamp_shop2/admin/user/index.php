<?php 
	include '../init.php';

	if(empty($_POST['tel'])){
		$sql = 'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`,`icon`,`status`,`regtime`  from user';
	}else{
		$sql =  'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`,`icon`,`status`,`regtime`  from user   where tel like "%'.$_POST['tel'].'%"   ';
	}
	// echo $sql;exit;

	$result = page($sql);
	// var_dump($result);
	$user_list = $result[1];
	$page = $result[0];
	
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?= CSS?>index.css">
</head>
<body>
	<div class="container">
	    <div id="search">
	      <form action="index.php" method='post'>
	      	 Tel : <input type="text" name="tel" class='search'>
	      	<input class="button" type="submit" value="提交" >
	      </form>
	    </div>
	</div>
	<table class='table'>
		<tr>
			<th>头像</th>
			<th>编号</th>
			<th>昵称</th>

			<th>性别</th>
			<th>手机号</th>
			<!-- <th>生日</th> -->
			<th>邮箱</th>
			<th>状态</th>
			<th>注册时间</th>
			<th>操作</th>
		</tr>
		<?php if(empty($user_list)): ?>
				<tr><td colspan=10>找不到你搜索的内容...</td></tr>
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
				<td><?= $v['nickname']?></td>
				<td><?= $v['sex']==1?'男':'女'; ?></td>
				<td><?= $v['tel']?></td>
				<!-- <td><?= $v['birthday']?></td> -->
				<td><?= $v['email']?></td>
				<td><a href='action.php?bz=status&id=<?= $v['id']?>&status=<?= $v['status']?>'><?= $v['status']==1?'激活':'禁用';     ?></a></td>
				<td><?= $v['regtime']?></td>
				<td>
					<a href="./edit.php?id=<?= $v['id']?>">编辑</a>
					<a href="./action.php?bz=del&id=<?= $v['id']?>">删除</a>
				</td>
			</tr>
			<?php endforeach; ?>
		<?php endif; ?>
		
		
	</table>
	<?= $page ?>
</body>
</html>
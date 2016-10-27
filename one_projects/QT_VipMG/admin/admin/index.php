<?php 
	include '../init.php';

	$sql = 'select * from admin order by id';
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
	<title>管理员列表</title>
	<style>
		.table {
			border-collapse: collapse;
			border-style: solid;
			border-width: 2px;
			width: 100%;
			/*height:800px;*/
		}

		.table tr{height:120px;}
		.table tr:first-child{height:50px;}

		.table th{
			background:#EFF4F7;
			border:2px solid #C7D0D7;
		}
		.table td {
			border:2px solid #C7D0D7;
			text-align:center;
			color:#4C5154;
			font-family:Arial;
			font-size:14px;
			padding:5px
		}

		.table tr:hover{background-color: #EFF4F7;}

		.pc{
			color:red;height:34px;border:1px solid #e1e2e3;
			display:inline-block;cursor:pointer;text-align:center;
			color:blue;margin:0 2px;padding:0 10px;line-height:34px;
		}

		.pc:hover{
		    border:1px solid #3388FF;
		    background: #F2F8FF;
		}

		.page{
		    text-align: right;
		    margin-top: 15px;
		}
		
		a{text-decoration:none;}
		
		span.num {
			font-size: 30px;
			color: #538ec6;
			font-family: "Georgia", "Tahoma", "Arial";
		}
		
	</style>
</head>
<body>
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：管理员管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;">
  		  	<a href="add.php" target="main" onFocus="this.blur()" class="add">新增用户</a>
  		  </td>
  		</tr>
	</table>
	<table class='table'>
		<tr>
			<th>头像</th>
			<th>编号</th>
			<th>昵称</th>
			<th>姓名</th>
			<th>性别</th>
			<th>住址</th>
			<th>手机</th>
			<th>类型</th>
			<th>状态</th>
			<th>最后登录时间</th>
			<th>操作</th>
		</tr>
		<?php foreach($user_list as $v): ?>
			<tr>
				<td>
					<?php if(empty($v['icon'])): ?>
						<img src="<?= PUB_IMG?>icon.jpg" width=50>
					<?php else: ?>
						<img src="<?= img_url($v['icon'],50)?>" width=50>
					<?php endif; ?>
				</td>
				<td><?= $v['id']?></td>
				<td><?= $v['username']?></td>
				<td><?= $v['name']?></td>
				<td><?= $v['sex']==1?'男':'女';?></td>
				<td><?= $v['address']?></td>
				<td><?= $v['phone']?></td>
				<td><?= $v['state']==1?'<font color=red>超级管理员</font>':'管理员';?></td>
				<td>
					<?= $v['state']==1?'<font color=red>超管</font>':'<a href=action.php?bz=status&id='.$v['id'].'&status='.$v['status'].'>'.($v['status']==1?'激活':'禁用').'</a>';?>
				</td>
				<td><?= date("Y-m-d H:i:s",$v['logintime'])?></td>
				<td>
					<?= $v['state']==1?'<a href=edit.php?id='.$v['id'].'>编辑</a>':'<a href=edit.php?id='.$v['id'].'>编辑</a>
					<a href=action.php?bz=del&id='.$v['id'].'>删除</a>';?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?= $page ?>
</body>
</html>
<?php 
	include '../init.php';

	$sql = 'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`,`icon`,`status`,`regtime`  from user';
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

		.pc{color:red;height:34px;border:1px solid #e1e2e3;display:inline-block;cursor:pointer;text-align:center;color:blue;margin:0 2px;padding:0 10px;line-height:34px;}

		.pc:hover{
		    border:1px solid #3388FF;
		    background: #F2F8FF;
		}

		.page{
		    text-align: right;
		    margin-top: 15px;
		}

	</style>
</head>
<body>
	<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：用户管理</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form action="index.php">
			 <?php $_GET['name'] = empty($_GET['name'])? "":$_GET['name']; ?>
	         <span>关键字：</span>
	         <input type="text" name="name" value="<?php echo $_GET['name']; ?>" class="text-word">
			<span>性别：
			<select name="sex">
				<option value="">--请选择--</option>
				<?php	$_GET['sex']=empty($_GET['sex']) ? 0 : $_GET['sex'] ?>
				<option value="1" <?php echo $_GET['sex']=="1" ? "selected" : "";  ?>>--男--</option>
				<option value="2" <?php echo $_GET['sex']=="2" ? "selected" : "";  ?>>--女--</option>
			</select>
			</span>
	         <input name="" type="submit" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.php" target="mainFrame" onFocus="this.blur()" class="add">新增用户</a></td>
  		</tr>
	</table>
	<table class='table'>
		<tr>
			<th>头像</th>
			<th>编号</th>
			<th>昵称</th>
			<th>性别</th>
			<th>生日</th>
			<th>手机号</th>
			<th>邮箱</th>
			<th>状态</th>
			<th>注册时间</th>
			<th>操作</th>
		</tr>
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
				<td><?= $v['sex']==1?'男':'女';?></td>
				<td><?= $v['birthday']?></td>
				<td><?= $v['tel']?></td>
				<td><?= $v['email']?></td>
				<td><a href=''><?= $v['status']==1?'激活':'禁用';?></a></td>
				<td><?= date("Y-m-d H:i:s",$v['regtime'])?></td>
				<td>
					<a href="edit.php?id=<?= $v['id']?>">编辑</a>
					<a href="action.php?bz=del&id=<?= $v['id']?>">删除</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?= $page ?>
</body>
</html>
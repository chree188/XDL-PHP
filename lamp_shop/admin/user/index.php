<?php 
	include '../init.php';

	$sql = 'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`,`icon`,`status`,`regtime`  from user';
	// echo $sql;exit;

	$result = page($sql);
	// var_dump($result);
	$user_list = $result[1];
	$page = $result[0];

	// insert into user values
	// (null,'13345678890','何亚飞',md5('123456'),2, '1991-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678891','曾侃熙',md5('123456'),1, '1992-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678892','张亮',md5('123456'),2, '1993-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678893','徐剑',md5('123456'),1, '1994-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678894','德总',md5('123456'),2, '1995-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP()),
	// (null,'13345678895','吴总',md5('123456'),2, '1996-10-25', 'heyafei125927@163.com',default,default, UNIX_TIMESTAMP());


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
		<?php 
			foreach($user_list as $v): 
			// 设置性别
			$sex = array("1"=>"男","2"=>"女");
			// 设置状态
			$status = array("1"=>"激活","2"=>"禁用");
		?>
			<tr>
				<td>
					<?php if(empty($v['icon'])): ?>
						<img src="<?= PUB_IMG?>icon.jpg" width=50>
					<?php else: ?>
					<?php endif; ?>
					


				</td>
				<td><?= $v['id']?></td>
				<td><?= $v['nickname']?></td>
				<td><?= $sex[$v['sex']]?></td>
				<td><?= $v['birthday']?></td>
				<td><?= $v['tel']?></td>
				<td><?= $v['email']?></td>
				<td><?= $status[$v['status']]?></td>
				<td><?= date("Y-m-d H:i:s",$v['regtime'])?></td>
				<td>
					<a href="">编辑</a>
					<a href="">删除</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?= $page ?>
</body>
</html>
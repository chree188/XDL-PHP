<?php 
	include 'head.php';

	$sql = 'select `id`,`pwd`  from user where id='.$_GET['id'];
	$result = query($sql);
	$user_list = $result[0];
	$id=$_SESSION['home']['id'];
 ?>

 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>完善个人信息</title>
 	<link rel="stylesheet" href="<?= CSS?>member-setting.css">
 </head>
 <body>
 	<div id="bread-crumbs">
		<span><a href="index.php">首页</a></span>
		<span>&nbsp;>&nbsp;</span>
		<span>修改密码</span>
		<span>&nbsp;>&nbsp;</span>
		<span class="now">我的廿一客</span>
		<div class="clear"></div>
		<div class="clear"></div>
	</div>
	<div id="member_information">
		<div class="member-title">
			<text style="font-size:20px; float:left;">修改密码</text>
		</div>
		<div class="member-mod">
			<form action="action.php?bz=pwd&id=<?=$id?>" method="post">
				<ul>
					<li class="form-item">
						<label for="" class="form-label">
							<span style=" color: #ef4521;">*</span>
							旧密码：
						</label>
						<span class="form-act">
							<input type="password" name='opwd' class="x-input" required>
						</span>
					</li>
					<li class="form-item">
					<li class="form-item">
						<label for="" class="form-label">
							<span style=" color: #ef4521;">*</span>
							新密码：
						</label>
						<span class="form-act">
							<input type="password" name='npwd' class="x-input" required>
						</span>
					</li>
					<li class="form-item">
					<li class="form-item">
						<label for="" class="form-label">
							<span style=" color: #ef4521;">*</span>
							确认新密码：
						</label>
						<span class="form-act">
							<input type="password" name='rpwd' class="x-input" required>
						</span>
					</li>
					<li class="form-item">
						
					<li class="form-item">
							<button name="id" value="<?=$id?>" style="height:30px;margin:10px 0;margin-left: 393px;text-align:center;border:none; padding:0;">
								<span style="background: #866a51; padding-left:15px;width:43px;height:30px;display:block;">
									<span style="background: #866a51; color:white; padding-right: 15px;height:30px;display:block;line-height:30px;">保存</span>
								</span>
							</button>
					</li>
				</ul>
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<?php include 'foot.php';?>
 </body>
 </html>
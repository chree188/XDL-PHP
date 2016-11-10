<?php 
	include 'head.php';

	$sql = 'select `id`,`tel`,`nickname`,`sex`,`birthday`,`email`  from user where id='.$_GET['id'];
	// var_dump($sql);

	$result = query($sql);
	$user_list = $result[0];
	// var_dump ($_GET['id']);

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
		<span><a href="user-center.php">我的廿一客</a></span>
		<span>&nbsp;>&nbsp;</span>
		<span class="now">个人信息</span>
		<div class="clear"></div>
		<div class="clear"></div>
	</div>
	<div id="member_information">
		<div class="member-title">

			<text style="font-size:20px; float:left;">个人信息</text>
			<p style="float:left; margin-left:10px;font-size:10px;line-height: 42px;color:#754c24;">| 立即完善个人信息</p>
		</div>
		<div class="member-mod">
			<form action="action.php?bz=user-edit" method="post">
				<input type="hidden" name='id' value='<?= $user_list['id']?>'>
				<ul>

					<li class="form-item">
						<label for="" class="form-label">
							<span style=" color: #ef4521;">*</span>
							姓名：
						</label>
						<span class="form-act">
							<input type="text" name='nickname' value='<?= $user_list['nickname']?>' class="x-input" required maxlength=30>
						</span>
					</li>
					<li class="form-item">
						<label for="" class="form-label">
							<span style="    color: #ef4521;">*</span>
							性别：
						</label>
						<div class="sex-c">
							<label for="" class="sex-chose">
								<input type="radio" name="sex" value=1 <?= $user_list['sex'] == 1? 'checked':'' ?>>男
							</label>
							<label for="" class="sex-chose">
								<input type="radio" name="sex" value=2 <?= $user_list['sex'] == 2? 'checked':'' ?>>女
							</label>
						</div>
					</li>
					<li class="form-item">
						<label for="" class="form-label">
							<span style="color: #ef4521;">*</span>
							手机：
						</label>
						<span class="form-act" >
							<input type="text" name="tel" class="x-input" maxlength=11 value='<?= $user_list['tel']?>' required>
						</span>
					</li>
					<li class="form-item">
						<label for="" class="form-label">
							<span style="color: #ef4521;">*</span>
							E-mail：
						</label>
						<span class="form-act">
							<input type="text" name='email' class="x-input" value='<?= $user_list['email']?>' required>
						</span>
					</li>
					</li>
					<li class="form-item">
						<label for="" class="form-label">
							生日：
						</label>
						<span class="form-act">
							<input type="date" class="x-input" name="birthday" value='<?= $user_list['birthday']?>'>
						</span>
					</li>
					<li style="margin-left:150px;">
	 					<span style="higeht:20px;color:red;">
	 						<?php echo empty($_GET['notice'])?'':$_GET['notice']?>
	 					</span>
 					</li>
					<li class="form-item">
							<button style="height:30px;margin:10px 0;margin-left: 393px;text-align:center;border:none; padding:0;">
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
	<?php include 'foot.php';
	?>
 </body>
 </html>
<?php 
	include 'head.php';
	$sql = 'select  from '

 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>用户中心</title>
 	<link rel="stylesheet" href="<?= CSS ?>user-center.css">
 </head>
 <body>
 	<div id="bread-crumbs">
		<span><a href="index.php">首页</a></span>
		<span>&nbsp;>&nbsp;</span>
		<span class="now">我的廿一客</span>
		<div class="clear"></div>
		<div class="clear1"></div>
	</div>
	<div id="BIG-BOX">
		<!--个人信息部分-->
		<div id="top">
			<!--个人信息-->
			<div class="edit_info">
				<!--更换头像-->
				<form action="action.php?bz=icon&id=<?=($_SESSION['home']['id'])?>" method='post' enctype='multipart/form-data'>
					<div class="avator_img" style="background:">
						<?php
							$sql = 'select icon from user where id ='.$_SESSION['home']['id'];
							$icon = query($sql)[0]['icon'];
						?>
						<?php if(empty($icon)): ?>
							<img src="<?= PUB_IMG?>tx.png" width=100>
						<?php else: ?>
						
						<img src="<?= img_url($icon)?>" width=100>
						<?php endif; ?>
						<!-- <input type="file" name="icon" style="width:70px;border:0px;background-color:#f1f1f1;outline:none;"> -->
					</div>
					<div style="position: absolute;left:60px;top:190px;">
						<input type="file" name="icon" id="file" size="1" style="width:70px;border:1px solid #fff;" required>
						<input type="submit" value='上传' style="cursor:pointer;height:21px;width:72px;background:#fff;border:1px solid #fff;outline:none;">
					</div>
				</form>
				<!--信息-->
				<div class="account-mes">
					<div class="ac-name">
						<p style="font-size:16px;">姓名：<?= $_SESSION['home']['nickname']?></p>
					</div>
					<p class="ac-num">
						<span><?= $_SESSION['home']['tel']?></span>
						<a href="alter-pwd.php?id=<?=($_SESSION['home']['id'])?>">修改密码</a>
					</p>
					<a href="member-setting.php?id=<?=($_SESSION['home']['id'])?>" class="a"><p>编辑个人资料</p></a>
					<p style="height:40px;display:block;line-height:40px;"><img src="<?= IMG ?>jf.png">&nbsp;&nbsp;<??></p>
				</div>
			</div>
			<!--卡券-->
			<div class="cash-coupou">
				<ul>
					<li class="ac_item">
						<a href="1.php" target="_blank">
							<div>
								<img src="<?= IMG ?>user-center/ac_balance.png" alt="">
								<p>余额: &yen; <span>0</span>&nbsp;&nbsp;<span class="cz">充值</span></p>
							</div>
						</a>
					</li>
					<li class="ac_item">
						<a href="1.php" target="_blank">
							<div>
								<img src="<?= IMG ?>user-center/ac_coupon.png" alt="">
								<p>优惠券: <span> 0 </span>张可用</p>
							</div>
						</a>
					</li>
					<li class="ac_item">
						<a href="1.php" target="_blank">
							<div>
								<img src="<?= IMG ?>user-center/ac_card.png" alt="">
								<p>代金卡:<span> 0 </span>张已用</p>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!--会员中心部分-->
		<div id="bottom">
			<p class="ca-title">会员中心</p>
			<p class="current-identity">
				您当前的身份是 :
				<span class='normal-user'>注册会员</span>
			</p>
			<div class="vip-area">
				<div class="tl-c">
					<img src="<?= IMG ?>user-center/new_membership.png" alt="">
				</div>
				<p class="fruit-rule-title">果实规则 : </p>
				<p class="fruit-rule">1、订单实际支付金额每满100元，则将自动获得1颗果实，以此类推。累积果实可升级，并享受各级会员权益。订单中使用优惠券、订单促销等优惠抵扣的金额不参与消费金额的累积。</p>
				<p class="fruit-rule">2、每90天内未产生购买，果实减一颗，若果实减少为下一等级数量时，等级相应降低，上一级别的固定权益失效。</p>
				<p class="fruit-rule">3、所获得的权益自获得日起，一年内有效。</p>
				<p class="fruit-rule">
					<a href="1.php" target="_blank">了解更多>></a>
				</p>
			</div>
		</div>
		<div class="clear1"></div>
	</div>
	<?php include 'foot.php';?>
 </body>
 </html>
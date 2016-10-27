<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>百度天气查询</title>
	<link rel="stylesheet" href="/s51/object06/api_demo/think_demo/Public/Dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="/s51/object06/api_demo/think_demo/Public/Dist/css/bootstrap-theme.min.css"> -->
	<style>

	</style>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>百度天气查询</h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="post" class="form">
					<div class="input-group">
						<span class="input-group-addon">请输入城市名称</span>
						<input type="text" class="form-control" name="city" placeholder="<?php echo ($_POST['city']); ?>">
						<span class="input-group-btn">
							<button class="btn btn-default">提交</button>
						</span>
					</div>
				</form>
			</div>

		</div>

		<div style="height:20px;"></div>

		<div class="row">

			<div class="col-md-12">
				<?php
 if (!empty($error)) { ?>
				<p class="alert alert-danger">城市错误！</p>
				<?php
 } ?>

				<p>
					<?php echo ($results->retData->city); ?>
					<?php echo ($results->retData->today->date); ?>
					<?php echo ($results->retData->today->week); ?>
				</p>

				<p>
					<?php echo ($results->retData->today->type); ?>
					<?php echo ($results->retData->today->curTemp); ?>
					<?php echo ($results->retData->today->lowtemp); ?> ~ <?php echo ($results->retData->today->hightemp); ?>
				</p>
				<p>
					<?php echo ($results->retData->today->fengxiang); ?>
					<?php echo ($results->retData->today->fengli); ?>
				</p>
				<div class="row" style="height:10px"></div>
				<div class="row">
				<?php
 foreach($results->retData->forecast as $v): ?>

					<div class="col-md-3">
					<p><?php echo ($v->date); ?> <?php echo ($v->week); ?></p>
					<p><?php echo ($v->type); ?></p>
					<p><?php echo ($v->lowtemp); ?> ~ <?php echo ($v->hightemp); ?></p>
					<p><?php echo ($v->fengxiang); ?>  <?php echo ($v->fengli); ?></p>
					</div>
				<?php
 endforeach; ?>
				<div>


			</div>
		</div>
	</div>

</body>
</html>
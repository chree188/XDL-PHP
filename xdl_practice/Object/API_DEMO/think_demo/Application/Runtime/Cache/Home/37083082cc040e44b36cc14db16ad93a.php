<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>图灵机器人</title>
	<link rel="stylesheet" href="/practice/Object/API_DEMO/think_demo/Public/Dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="/practice/Object/API_DEMO/think_demo/Public/Dist/css/bootstrap-theme.min.css"> -->
	<script src="/practice/Object/API_DEMO/think_demo/Public/Js/jquery-2.1.4.min.js"></script>
	<style>

	</style>
</head>
<body>

	<div class="container">
		<div class="page-header">
			<h1>图灵机器人</h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p class="alert alert-info" id="walk_info"></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<form action="" method="post" class="form" id="walk_data">
					<div class="form-group">
						<textarea name="info" id="info" cols="30" rows="10" class="form-control">

						</textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-default btn-lg col-md-12">发送</button>
					</div>
				</form>
			</div>
			<script>
				$('#walk_info').hide();
				$("#info").focus();
				$('#walk_data').submit(function(){
					$.ajax({
						url:"<?php echo U('Robot/ajaxTuling');?>",
						data:"info="+$('#info').val().replace(/\s/g,''),
						type:'post',
						success:function(data){
							// var text = "";
							// for (var i in data){
							// 	if (i === 'code') {
							// 		continue;
							// 	}
							// 	text += data[i]+'<br>';
							// }
							//alert(text);
							$('#walk_info').html(data.text).hide().fadeIn(1000);
							$('#info').focus();
						},
						dataType:'json',
					});
					return false;
				})
			</script>

		</div>
		<div class="row" style="height:20px"></div>
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>


	</div>

</body>
</html>
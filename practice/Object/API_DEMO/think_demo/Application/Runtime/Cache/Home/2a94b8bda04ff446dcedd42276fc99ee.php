<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="cn">
<head>
	<meta charset="UTF-8">
	<title>API 和 扩展</title>
	<link rel="stylesheet" href="/practice/Object/API_DEMO/think_demo/Public/Dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/practice/Object/API_DEMO/think_demo/Public/Dist/css/bootstrap-theme.min.css">
	<style>

	</style>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1>API和扩展</h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="list-group">
					<a href="<?php echo U('Ip/taobao');?>" class="list-group-item list-group-item-info">淘宝IP地址库</a>
					<a href="<?php echo U('Ip/thinkIp');?>" class="list-group-item list-group-item-info">thinkPHP自带ip库</a>
					<a href="<?php echo U('Ip/selectArea');?>" class="list-group-item list-group-item-info">根据客户端地址自动选择省份</a>
				</div>

				<div class="list-group">
					<a href="<?php echo U('Weather/getWeather');?>" class="list-group-item list-group-item-warning">天气接口</a>
					<a href="<?php echo U('Weather/baiduWeather');?>" class="list-group-item list-group-item-warning">百度天气接口</a>
				</div>

				<div class="list-group">
					<a href="<?php echo U('Robot/tuling');?>" class="list-group-item list-group-item-danger">图灵机器人</a>
				</div>

				<div class="list-group">
					<a href="<?php echo U('Map/baidu');?>" class="list-group-item list-group-item-primary">百度地图API</a>
				</div>

				<div class="list-group">
					<a href="<?php echo U('Share/baidu');?>" class="list-group-item list-group-item-success">百度分享</a>
					<a href="<?php echo U('Share/bshare');?>" class="list-group-item list-group-item-success">bShare</a>
				</div>

			</div>
			<div class="col-md-6">
				<div class="list-group">
					<a href="<?php echo U('PHPMailer/index');?>" class="list-group-item">邮件发送服务</a>
					<a href="../Extends/PHPMailer/memberModule/index.php" class="list-group-item">邮箱激活 密码找回</a>
				</div>
				<div class="list-group">
					<a href="<?php echo U('PHPExcel/setHeader');?>" class="list-group-item">设置header</a>
					<a href="<?php echo U('PHPExcel/excel');?>" class="list-group-item">PHPExcel导出测试</a>
					<a href="<?php echo U('PHPExcel/table');?>" class="list-group-item">PHPExcel导出数据库数据</a>					<a href="<?php echo U('PHPExcel/readExcel');?>" class="list-group-item">PHPExcel读取excel中内容</a>

				</div>
				<div class="list-group">
					<a href="http://apistore.baidu.com/" target="_blank" class="list-group-item">百度APIStore平台</a>
					<a href="https://www.juhe.cn/" target="_blank" class="list-group-item">聚合数据API平台</a>
					<a href="http://www.tianapi.com/" target="_blank" class="list-group-item">天行数据API平台</a>
					<a href="http://ueditor.baidu.com/website/index.html" target="_blank" class="list-group-item">百度富文本编辑器(UEditor)</a>
				</div>
				<div class="list-group">
					<a href="<?php echo U('Bitcoin/index');?>" target="_blank" class="list-group-item">BTC交易行情</a>
				</div>

			</div>
		</div>
	</div>

</body>
</html>
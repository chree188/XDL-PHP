<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="智乎 - 挑战向" />
<meta name="keywords" content="智乎 ,挑战向,问题,题目,解答,难题" />
<meta name="author" content="xi4oz3ro">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo ($site_title); ?> - 智乎 - 挑战向</title>

<link href="__PUBLIC__/statics/bootstrap/css/bootstrap.css"
	rel="stylesheet" media="screen" />
<link href="__PUBLIC__/statics/styles/main.css" rel="stylesheet"
	media="screen" />
<script type="text/javascript">
	//全局js常量
	var __LoginErrorCount = <?php echo ($login_error_count); ?>;
	var __IsLogin = <?php echo ($is_login); ?>;
	var __LoginUserName = "<?php echo ($login_user_name); ?>";
</script>
<script type="text/javascript"
	src="__PUBLIC__/statics/javascripts/jquery-1.9.1.min.js"></script>
<script type="text/javascript"
	src="__PUBLIC__/statics/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript"
	src="__PUBLIC__/statics/javascripts/common.js"></script>
</head>
<body style="padding-top: 48px;">
<div class="navbar  navbar-fixed-top">
<div class="navbar-inner">
<div class="container">
<button type="button" class="btn btn-navbar" data-toggle="collapse"
	data-target=".nav-collapse"><span class="icon-bar"></span> <span
	class="icon-bar"></span> <span class="icon-bar"></span></button>
<a class="brand top-logo" href="<?php echo ($site_domain); ?>" title="智乎 - 挑战向">智乎</a>
<div class="nav-collapse collapse">
<ul class="nav">
	<li><a href="<?php echo U('Index/Index/index');?>">首页</a></li>
	<li><a href="<?php echo U('Index/Index/newquestion');?>">添加问题</a></li>
	<li class="dropdown"><a href="#" class="dropdown-toggle"
		data-toggle="dropdown">领域 <b class="caret"></b></a>
	<ul class="dropdown-menu">
		<?php if(is_array($question_categories)): foreach($question_categories as $key=>$c): if(!$c['parentNumber']): ?><li class="nav-header"><?php echo ($c["title"]); ?></li>
			<?php else: ?>
				<li><a value="<?php echo ($c["number"]); ?>" href="<?php echo U('Index/Index/qsearch',array('c'=>$c['title'],'n'=>$c['number']));?>"><?php echo ($c["title"]); ?></a></li><?php endif; endforeach; endif; ?>
	</ul>
	</li>
	<li><a href="<?php echo U('Index/Index/about');?>">关于</a></li>
</ul>
<?php if(isset($user)): ?><ul class="nav" style="float:right">
	<li class="dropdown"><a href="#" class="dropdown-toggle"
		data-toggle="dropdown"><?php echo ($user["userName"]); ?> <b class="caret"></b></a>
	<ul class="dropdown-menu" style="min-width:100px">
		<li><a href="#"><i class="icon-home"></i> 我的主页</a></li>
		<li><a href="#"><i class=" icon-inbox"></i> 与我相关(<?php echo ($user["tipsCount"]); ?>)</a></li>
		<li><a href="#"><i class="icon-cog"></i> 个人设置</a></li>
		<li><a href="<?php echo U('Index/User/logout');?>"><i class="icon-off"></i> 退出</a></li>
	</ul>
	</li>
</ul>
<?php else: ?>
<ul class="nav" style="float:right">
	<li><a href="<?php echo U('Index/User/register');?>">注册</a></li>
</ul>
<form class="navbar-form pull-right" id="header-login-form" method="post" action="<?php echo U('Index/User/ajaxlogin');?>">

	<input class="span2"
	type="text" name="u" placeholder="昵称/邮箱"> <input class="span2"
	type="password" name="p" placeholder="密码">
<button type="button" class="btn btn-primary">登录</button>
</form><?php endif; ?>
</div>
<!--/.nav-collapse --></div>
</div>
</div>
<div id="main">
<script type="text/javascript" src="__PUBLIC__/statics/javascripts/jquery.validate.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/statics/javascripts/user.js"></script>
    <div class="container-fluid">
    <div class="span9">
    <div class="user-register">
    <form id="zh_userregister" class="form-horizontal" action="<?php echo U('Index/User/register','','');?>" method="post">
    <div class="control-group">
    <label class="control-label" for="userEmail">邮箱</label>
    <div class="controls">
      <input id="userEmail" class="input-large" rel="<?php echo U('Index/User/checkuseremail','','');?>" name="userEmail" type="text">
      <span class="help-inline" for="userEmail"></span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="userName">昵称</label>
    <div class="controls">
      <input id="userName" class="input-large" rel="<?php echo U('Index/User/checkusername','','');?>" name="userName" type="text">
      <span class="help-inline" for="userName"></span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="userPass">密码</label>
    <div class="controls">
      <input id="userPass" class="input-large" name="userPass" type="password">
      <span class="help-inline" for="userPass"></span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="userConfirmPass">确认密码</label>
    <div class="controls">
      <input id="userConfirmPass" class="input-large" name="userConfirmPass" type="password">
      <span class="help-inline" for="userPass"></span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  rel="<?php echo U('Index/Public/checkverifycode','','');?>" for="verifyCode">验证码</label>
    <div class="controls">
      <input id="verifyCode" class="input-small" rel="__APP__/Public/checkverifycode/" name="verifyCode" type="text">
      <img alt="点击图片刷新验证码" class="verify-code" src="__APP__/Public/verify/">
      <span class="help-inline" for="userPass"></span>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" name="registeruser" class="btn btn-primary" data-loading-text="Loading...">立即注册</button>
    </div>
  </div>
</form>
    </div>
    </div>
    <div class="span3 open-login">
    	<h4>用以下方式登录</h4>
    	<a class="sina-weibo-login" href="#"></a>
    	<a class="qq-login" href="#"></a>
    </div>
    </div>
</div>
<div id="footer" class="container">
		<ul class="inline">
			<li>&copy;2013 xi4oz3ro</li>
			<li><a href="<?php echo U('Index/Index/about');?>">关于本站</a></li>
			<li><a href="#">服务协议</a></li>
			<li><a href="#">建议反馈</a></li>
			<li><a href="#">使用帮助</a></li>
		</ul>
	<!-- <p>
		佛笑众生苦，却不知众生皆笑佛执迷不悟
	</p> -->
</div>
<div id="__showMessage" class="alert <?php echo ($message_style); ?>">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php echo ($message_content); ?></strong>
</div>
</html>
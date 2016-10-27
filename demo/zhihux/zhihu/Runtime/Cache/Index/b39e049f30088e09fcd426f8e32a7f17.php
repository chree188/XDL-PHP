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
<script type="text/javascript" src="__PUBLIC__/statics/javascripts/question.js"></script>
<script type="text/javascript" src="__PUBLIC__/statics/ueditor/editor_config.js"></script>
<script type="text/javascript" src="__PUBLIC__/statics/ueditor/editor_all_min.js"></script>
<script type="text/javascript">
	var addFollowUrl = "<?php echo U('Index/Index/addfollow');?>";
	var addGoodReputationUrl = "<?php echo U('Index/Index/addgoodreputation');?>";
	var addBadReputationUrl = "<?php echo U('Index/Index/addbadreputation');?>";
	var loadCommentUrl = "<?php echo U('Index/Index/loadcomment');?>";
	var addCommentUrl = "<?php echo U('Index/Index/addquestioncomment');?>";
</script>
<div class="container">
	<div class="row-fluid">
		<div class="span9">
			<div class="q-container">
				<div class="q-c-search">
					<form id="qSearchParameter" method="post" action="<?php echo U('Index/Index/qlist');?>" >
						<input type="hidden" name="p" value="<?php echo ($page); ?>"/>
						<input type="hidden" name="t" value="<?php echo ($tag); ?>"/>
						<input type="hidden" name="n" value="<?php echo ($number); ?>"/>
						<input type="hidden" name="w" value="<?php echo ($word); ?>"/>
						<input type="hidden" name="o" value="<?php echo ($order); ?>"/>
					</form>
				</div>
				<div class="q-c-main" id="itemContainer">
				</div>
				<div class="q-c-result">
					<button id="btnLoadingMore" class="btn btn-block " type="button" style="display:none">显示更多</button>
					<div id="qLoading" class="alert alert-info" style="text-align:center;"><img src="__PUBLIC__/statics/images/ajax-loader.gif"/><strong>正在加载...</strong></div>
				</div>
			</div>
		</div>
		<div class="span3">
			
		</div>
	</div>
</div>
<!-- Modal -->
<!-- 需要先引入UEditor编辑器JS 和 question.js -->
<div id="addAnswerWindow" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="addAnswerWindowLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="addAnswerWindowLabel">我知道答案</h3>
  </div>
  <div class="modal-body">
    <form method="post" id="form_addAnswer" action="<?php echo U('Index/Index/addAnswer');?>">
    	<div class="control-group">
        <label class="control-label" for="answerContent">我的答案</label>
        <div class="controls">
          <textarea id="answerContent" name="answerContent"></textarea>
          <script type="text/javascript">
          var editorAnswerContent = new UE.ui.Editor();
          editorAnswerContent.render("answerContent");
        </script>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="answerExplanation">答案详解</label>
        <div class="controls">
          <textarea id="answerExplanation" name="answerExplanation"></textarea>
          <script type="text/javascript">
          var editorAnswerExplanation = new UE.ui.Editor();
          editorAnswerExplanation.render("answerExplanation");
        </script>
        </div>
      </div>
      <input type="hidden" id="questionID" name="questionID" value="" />
    </form>
  </div>
  <div class="modal-footer">
    <span id="answerValidateInfo" class="label label-important" style="display:none"></span>
    <button id="btnAddAnswer" class="btn btn-primary">提交</button>
  </div>
</div>
<script type="text/javascript">
  _initAddAnswerWindow();
</script>
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
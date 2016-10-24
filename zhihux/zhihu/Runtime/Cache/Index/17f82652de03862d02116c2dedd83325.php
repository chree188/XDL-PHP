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
<div class="container-fluid">
    <div class="span9">
    	<form class="form-horizontal" id="add-question-form" method="post" action="">
  <fieldset>
    <legend>发布问题</legend>
    <?php if(isset($user)): else: ?>
    <div class="alert alert-info">请先 <strong>注册 / 登录</strong> 后才能发布问题</div><?php endif; ?>
    <div class="control-group">
    <label class="control-label" for="answerType">题目类型</label>
    <div class="controls">
      <label class="radio inline"><input type="radio" name="answerType" value="1" checked> 判断题</label>
      <label class="radio inline"><input type="radio" name="answerType" value="2"> 选择题</label>
      <label class="radio inline"><input type="radio" name="answerType" value="3"> 填空题</label>
      <label class="radio inline"><input type="radio" name="answerType" value="4"> 解答题</label>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="category">所属领域</label>
    <div class="controls">
      <div class="input-append">
  <input class="span2" id="categoryName" type="text" value="<?php echo ($question["categoryName"]); ?>" name="categoryName"/>
  <input type="hidden" id="category" value="<?php echo ($question["category"]); ?>" name="category"/>
  <div class="btn-group">
    <button class="btn dropdown-toggle" data-toggle="dropdown">
      选择
      <span class="caret"></span>
    </button>
    <ul id="dropdown-choose-category" class="dropdown-menu">
    	<?php if(is_array($question_categories)): foreach($question_categories as $key=>$c): if(!$c['parentNumber']): ?><li class="nav-header"><?php echo ($c["title"]); ?></li>
        <?php else: ?>
          <li><a value="<?php echo ($c["number"]); ?>" href="javascript:void(0)"><?php echo ($c["title"]); ?></a></li><?php endif; endforeach; endif; ?>
      <li class="divider"></li>
      <li><a value="0" href="<?php echo U('Index/Index/about');?>">没有我想选的领域</a></li>
    </ul>
  </div>
</div>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="questionContent">问题内容</label>
    <div class="controls">
    	<textarea id="questionContent" name="questionContent"><?php echo ($question["questionContent"]); ?></textarea>
    	<script type="text/javascript">
      var editorQuestionContent = new UE.ui.Editor();
      editorQuestionContent.render("questionContent");
		</script>
    </div>
  </div>
  <div class="control-group" for="alternativeAnswer">
    <label class="control-label" for="alternativeAnswer">备选答案</label>
    <div class="controls">
      <textarea  rows="3" class="span6" id="alternativeAnswer" name="alternativeAnswer"><?php echo ($question["alternativeAnswer"]); ?></textarea>
      <span class="help-block">判断题和选择题请提供备选答案，如：是/否、对/错、A.答案1 B.答案2 C.答案3</span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="answerContent">答案</label>
    <div class="controls">
    	<textarea id="answerContent" name="answerContent"><?php echo ($question["answerContent"]); ?></textarea>
    	<script type="text/javascript">
      var editorAnswerContent = new UE.ui.Editor();
      editorAnswerContent.render("answerContent");
		</script>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="questionSummary">问题摘要</label>
    <div class="controls">
      <textarea rows="3" class="span6" id="questionSummary" name="questionSummary"><?php echo ($question["questionSummary"]); ?></textarea>
      <span class="help-block">140文字以内，用于推广到微博、微信等平台，可为空</span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="questionPoint">考点/提示</label>
    <div class="controls">
      <input class="span3" name="questionPoint" value="<?php echo ($question["questionPoint"]); ?>" id="questionPoint" type="text">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="tag">标签</label>
    <div class="controls">
      <input class="span3" name="tag" value="<?php echo ($question["tag"]); ?>" id="tag" type="text">
      <span class="help-block">快捷定位到您的问题，多个标签请用 空格 隔开</span>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="answerExplanation">答案详解</label>
    <div class="controls">
    	<textarea id="answerExplanation" name="answerExplanation"><?php echo ($question["answerExplanation"]); ?></textarea>
    	<script type="text/javascript">
      var editorAnswerExplanation = new UE.ui.Editor();
      editorAnswerExplanation.render("answerExplanation");
		</script>
    </div>
  </div>
  <div class="control-group error">
    <div class="controls">
      <button type="submit" id="btn_add_question" class="btn btn-large btn-primary">发布</button>
      <span id="validate-info" class="label label-important" style="display:none"></span>
    </div>
  </div>
  </fieldset>
</form>
    </div>
    <div class="span3">

    </div>
    </div>
<script type="text/javascript">
  _initAddQuestionValidate();
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
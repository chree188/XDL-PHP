<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发私信_支招网</title>
<link rel="Shortcut Icon" href="__IMG__/favicon.ico" type="image/x-icon"/>
<link type="text/css" href="__STATIC__/Style/Css/base.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/public.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/letter.css" rel="stylesheet" />
<script type="text/javascript" src="__STATIC__/Autogrow/jquery-1.8.0.min.js"></script>
<script type="text/javascript" language="javascript" charset="utf-8" src="__STATIC__/editor/kindeditor.js"></script>
<script type="text/javascript" language="javascript" charset="utf-8" src="__STATIC__/editor/lang/zh_CN.js"></script>
<script type="text/javascript" language="javascript">
/* 编辑器配置 */

	/* 富文本编辑器（不带分隔符） */
	function getEditor(textareaName) {
		KindEditor.ready(function(K) {
			var editor = K.create('textarea[name="'+textareaName+'"]', {
				allowFileManager : false,
				minWidth : 400,
				minHeight : 220,
				items : [
					 'fontsize','forecolor','fontname', 'formatblock', 'bold',
					'italic', 'underline', 'link', '|', 'image', 
					'hr','justifyleft', 'justifycenter', 'justifyright',

				]
			});
		});
	}
</script>

</head>
<body>
<div id="all">
    <div id="header" class="mb20">
    <!-- header start -->
		<div class="topBox mc cls">
  <div class="logoBox fl">
    <h1><a href="/" title="首页_支招网"><img src="__IMG__/logo.png" alt="首页_支招网" /></a></h1>
  </div>
  <div class="navBox fl">
    <ul>
      <li><a href="/" title="首页" <?php if((MODULE_NAME) == "Index"): ?>class="cur"<?php endif; ?>>首页</a></li>
      <li><a href="<?php echo U(APP_NAME.'/List/index',array('sid'=>1,'sort'=>1));?>" title="生活" <?php if(($_GET['sid']== 1) or ($askCon['sort_name'] == '生活')): ?>class="cur"<?php endif; ?>>生活</a></li>
      <li><a href="<?php echo U(APP_NAME.'/List/index',array('sid'=>2,'sort'=>1));?>" title="情感" <?php if(($_GET['sid']== 2) or ($askCon['sort_name'] == '情感')): ?>class="cur"<?php endif; ?>>情感</a></li>
      <li><a href="<?php echo U(APP_NAME.'/List/index',array('sid'=>3,'sort'=>1));?>" title="健康" <?php if(($_GET['sid']== 3) or ($askCon['sort_name'] == '健康')): ?>class="cur"<?php endif; ?>>健康</a></li>
      <li><a href="<?php echo U(APP_NAME.'/List/index',array('sid'=>4,'sort'=>1));?>" title="职场" <?php if(($_GET['sid']== 4) or ($askCon['sort_name'] == '职场')): ?>class="cur"<?php endif; ?>>职场</a></li>
      <li><a href="<?php echo U(APP_NAME.'/List/index',array('sid'=>5,'sort'=>1));?>" title="公益" <?php if(($_GET['sid']== 5) or ($askCon['sort_name'] == '公益')): ?>class="cur"<?php endif; ?>>公益</a></li>
    </ul>
  </div>
  <div class="searchBox fl">
    <form action="__APP__/search" method="GET" class="search_form">
      <input type="text" name="word" class="sinput" placeholder="输入 回车搜索" x-webkit-speech />
      <input type="submit" value="搜索" class="sbtn" id="searchTrigger" />
    </form>
  </div>
  <div class="loginBox fr">
    <?php if(empty($userInfo)): ?><div class="loginFalse"> <a href="<?php echo U(APP_NAME .'/Login/index');?>" title="登录">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U(APP_NAME .'/Login/register');?>" title="注册">注册</a> </div>
      <?php else: ?>
      <div class="loginTrue">
        <div class="loginMess fl">
          <div class="loginMessCon"><a href="javascript:;" class="tongzhi" title="通知中心"><img src="__IMG__/message.jpg" alt="" /><span class="tipNum <?php if(($tipNums) <= "0"): ?>none<?php endif; ?>
            "><?php echo ($tipNums); ?></span></a></div>
          <div class="loginMessSon">
            <ul>
              <li><a href="<?php echo U(APP_NAME.'/Member/comment');?>" title="我的消息">我的消息&nbsp;(&nbsp;<span class="alinkred"><?php echo ($commentNum); ?></span>&nbsp;)</a></li>
              <li><a href="<?php echo U(APP_NAME.'/Member/letter');?>" title="我的私信">我的私信&nbsp;(&nbsp;<span class="alinkred"><?php echo ($letterNum); ?></span>&nbsp;)</a></li>
              <li><a href="<?php echo U(APP_NAME.'/Member/tobest');?>" title="我被采纳">我被采纳&nbsp;(&nbsp;<span class="alinkred"><?php echo ($bestNum); ?></span>&nbsp;)</a></li>
            </ul>
          </div>
        </div>
        <div class="loginMan fr">
          <div class="loginManCon"><a href="__APP__/User/index/uid/<?php echo session('uid');?>.html" title="到我的个人主页"><img src="<?php echo ($userInfo["face"]); ?>" alt="" /><i class="no_pic"></i></a></div>
          <div class="loginManConSon">
            <ul>
              <li><a href="<?php echo U(APP_NAME.'/Member/index');?>" title="账户信息">账户信息</a></li>
              <li><a href="<?php echo U(APP_NAME.'/Member/article');?>" title="我的文章">我的提问</a></li>
              <li><a href="<?php echo U(APP_NAME.'/Member/comment');?>" title="我的评论">我的评论</a></li>
              <li><a href="<?php echo U(APP_NAME.'/Member/letter');?>" title="我的私信">我的私信</a></li>
              <li><a href="<?php echo U(APP_NAME.'/Member/answer');?>" title="我的回答">我的回答</a></li>
              <li><a href="<?php echo U(APP_NAME .'/Login/logout');?>" title="">退出登录</a></li>
            </ul>
          </div>
        </div>
        <div class="cb"></div>
      </div><?php endif; ?>
  </div>
  <div class="cb"></div>
</div>
<!--头部消息下拉菜单--> 
<script type="text/javascript">
            $(function(){
                var loginMessSon = $('.loginMessSon');
                $('.loginMess').mouseenter(function(){
                    loginMessSon.show();
                }).mouseleave(function(){
                    loginMessSon.hide();
                });
                var loginManConSon = $('.loginManConSon');
                $('.loginMan').mouseenter(function(){
                    loginManConSon.show();
                }).mouseleave(function(){
                    loginManConSon.hide();
                });
                //搜索 
                $('#searchTrigger').click(function(){
                    if($('.sinput').val() == ''){
                        return false;	
                    }
                });
            });
        </script> 

    <!-- header end -->
    </div>
    <div id="page" class="mc  cls">
    <!-- page start -->
    	<div class="leftBox fl">
        <!--左边盒子开始-->
        	<div class="addBoxWrap">
            	<div class="addBox">
                	<div class="addBoxTop">
                    	<div class="addBoxTopL fl"><img src="<?php echo ($userInfo["face"]); ?>" alt="" /></div>
                        <div class="addBoxTopR fr">
                        	<h5><?php echo ($userInfo["username"]); ?></h5>
                            <p>发私信</p>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="addBoxCon">
                    	<form action="__APP__/member/addLetter" method="post">
                        <input type="hidden" name="uid" value="<?php echo session('uid');?>" />
                        <input type="hidden" name="send_user" value="<?php echo ($userInfo['username']); ?>" />
                    	<ul>
                        	<li>
                            	<span class="item3 fl"><b>*</b>用户名</span>
                            	<input type="text" name="username" class="text1 fl" value="<?php echo ($username); ?>" />
                                <div class="msgContent fl none"></div>
                                <div class="cb"></div>
                            </li>
                        	<li>
                            	<span class="item3 fl"><b>*</b>类&nbsp;&nbsp;型</span>
                            	<p class="letterP">用户私信</p>
                                <div class="msgContent fl none"></div>
                                <div class="cb"></div>
                            </li>
                        	<li>
                            	<span class="item3 fl"><b>*</b>标&nbsp;&nbsp;题</span>
                            	<input type="text" name="title" class="text1 fl" />
                                <div class="msgContent fl none"></div>
                                <div class="cb"></div>
                            </li>
                        	<li>
                            	<span class="item3 fl"><b>*</b>内&nbsp;&nbsp;容</span>
                            	<textarea name="content" class="textarea2 fl" id="content"></textarea>
                                <script type="text/javascript" language="javascript">getEditor("content");</script>
                                <div class="msgContent fl none"></div>
                                <div class="cb"></div>
                            </li>
                        	<li>
                            	<span class="item3 fl"></span>
                            	<input type="submit" value="提交" class="sub1 fl" />
                                <div class="cb"></div>
                            </li>
                        </ul>
                        </form>
                    </div>
                </div>
            </div>
        <!--左边盒子结束-->
        </div>
        <div class="rightBox fr">
        <!--右边盒子开始-->
        	<div class="tipBox">
            	<div class="tipTitle">发私信</div>
                <div class="tipCon">
                	<ul>
                        <li>请确保用户名真实存在；</li>
                        <li>标题请简要概括私信的目的；</li>
                        <li>自己无法给自己发私信；</li>
                        <li>用户名,标题,内容都不能为空；</li>
                    </ul>
                </div>
            </div>
        <!--右边盒子结束-->
        </div>
        <div class="cb"></div>
    <!-- page end -->
    </div>
    <div id="footer" class="mc cls">
    <!-- footer start -->
        	<div class="footerCon mc cls">
  <div class="linkBox fl">
    <div class="linkTitle">
      <h4>友情链接</h4>
    </div>
    <div class="linkCon">
      <ul>
          <?php if(is_array($linkList)): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($va["link_url"]); ?>" title="<?php echo ($va["link_name"]); ?>" target="_blank"><?php echo ($va["link_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
  <div class="aboutBox fl">
    <div class="aboutTitle">
      <h4>关于我们</h4>
    </div>
    <div class="aboutCon">
      <p><?php echo (strip_tags($aboutUs)); ?></p>
    </div>
  </div>
  <div class="weixinBox fl">
    <div class="weixinTitle">
      <h4>扫码关注微信</h4>
    </div>
    <div class="weixinCon"> <img src="<?php echo ($weixin); ?>" alt="微信" /> </div>
  </div>
  <div class="cb"></div>
</div>
<div class="copyBox">
  <div class="copyCon mc cls"> Copyright © 2014 <?php echo ($siteInfo["site_name"]); ?> All Rights Reserved-<?php echo ($siteInfo["icp"]); ?> </div>
</div>
<script type="text/javascript" src="__STATIC__/Gototop/gotoTop.js"></script>
<script type="text/javascript">
	$(function(){
	    $(".backToTop").goToTop(); 
			$(window).bind('scroll resize',function(){ 
				$(".backToTop").goToTop(); 
		}); 
	});
</script>

    <!-- footer end -->
    </div>
</div>
</body>
</html>
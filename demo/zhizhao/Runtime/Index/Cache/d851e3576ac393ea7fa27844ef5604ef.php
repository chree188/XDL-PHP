<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($pageTitle); ?></title>
<link rel="Shortcut Icon" href="__IMG__/favicon.ico" type="image/x-icon"/>
<link type="text/css" href="__STATIC__/Style/Css/base.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/public.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/user.css" rel="stylesheet" />
<script type="text/javascript" src="__STATIC__/Autogrow/jquery-1.8.0.min.js"></script>
</head>
<body>
<div id="all">
    <div id="header" class="mb15">
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
    	<div class="user_header">
        	<div class="user_imgae pr  mb15">
            	<img src="__IMG__/default_bg.jpg" alt="" />
                <a href="javascript:;" class="pr z20" title="点击更换背景(未开放)">
                	<i class="setIcon"></i>
                </a>
            </div>
            <div class="user_info">
				<div class="user_infoL fl   pr z20">
                	<div class="user_face">
                    	<img src="<?php echo ($userMessage["face"]); ?>" alt="<?php echo ($userMessage["username"]); ?>" />
                   </div>
                </div>
                <div class="user_infoR fr">
                	<h5><?php echo ($userMessage["username"]); ?></h5>
                    <p>等级：LV<?php echo (exp_to_level($userMessage["exp"])); ?> &nbsp;&nbsp;金币：<?php echo ($userMessage["point"]); ?> &nbsp;&nbsp;<a href="<?php echo U(APP_NAME.'/Member/addLetter',array('user_id'=>$userMessage["id"]));?>" title="私信TA" target="_blank">私信TA</a></p>
                    <p"><?php echo ($userMessage["introduce"]); ?></p>
                </div>
                <div class="cb"></div>
            </div>
        </div>
        <div class="user_list">
			<div class="user_list_title">
            	<div class="user_list_titleL fl">
                	<a href="__APP__/User/index/uid/<?php echo ($_GET['uid']); ?>.html" class="current article">TA的提问</a><a href="__APP__/User/review/uid/<?php echo ($_GET['uid']); ?>.html" class="comment" title="">TA的评论</a>
                </div>
                <div class="user_list_titleR fr pr z20 none">
					<div class="right_choose">
                        <div class="choose_title fl">选择分类：</div>
                        <div class="choose_menu fr">
                            <i class="arrow"></i>
                            <span class="choose_current"></span>
                            <ul>
                                <li><a href="__APP__/User/index/uid/<?php echo ($_GET['uid']); ?>.html"  class="selected">泰讨论</a></li>
                                <li><a href="__APP__/User/study/uid/<?php echo ($_GET['uid']); ?>.html">泰学习</a></li>
                                <li><a href="__APP__/User/travel/uid/<?php echo ($_GET['uid']); ?>.html">泰好玩</a></li>
                            </ul>
                        </div>
                        <div class="cb"></div>
                        <script type="text/javascript">
							$(function(){
								$('.choose_menu').hover(function(){
									$(this).find('ul').show();
								},function(){
									$(this).find('ul').hide();
								});
								var Text = $('.choose_menu').find('.selected').text();
								$('.choose_current').text(Text);
							});
						</script>
                    </div>
                </div>
				<div class="cb"></div>
            </div>
            <!--列表--内容开始-->
            <div class="user_list_con">
            	<ul>
                	<?php if(is_array($discussList)): $i = 0; $__LIST__ = $discussList;if( count($__LIST__)==0 ) : echo "还未发表提问" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><li>
                            <div class="articleTitle fl"><a href="__APP__/List/detail/id/<?php echo ($va["id"]); ?>.html" title="<?php echo ($va["ask_name"]); ?>"><?php echo ($va["ask_name"]); ?></a></div>
                            <div class="articleTime fr"><?php echo (date("Y-m-d H:i:s",$va["add_time"])); ?></div>
                            <div class="cb"></div>
                        </li><?php endforeach; endif; else: echo "还未发表提问" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="fpage">
        	<?php echo ($page); ?>
        </div>
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
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($pageTitle); ?></title>
<meta name="keywords" content="泰部落，泰语学习，泰语入门，泰语资料下载，泰语词汇阅读，泰国旅游攻略，游记分享，泰语问答交流"/>
<meta name="description" content="泰部落，致力于打造成一个发现、分享只关于泰语学习，泰国旅游的社区。"/>
<link type="text/css" href="__STATIC__/Style/Css/base.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/public.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/list.css" rel="stylesheet" />
<script type="text/javascript" src="__STATIC__/Autogrow/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="__STATIC__/Jquery-tabs/jquery.tabs.js"></script>
<script type="text/javascript">
	$(function(){
		$('.recommendBox').tabs({
			togger : '.recommendTitle li',  //触发器class
			toggerFocus : 'currentRec',  //触发器焦点class
			tabs : '.recommendCon li',  //选项卡class，支持多选项卡操作，选项卡间用",'分隔
			toggerMode : 'mouseenter',  //触发模式，默认为click，可以填入jQuery事件名称
			defaultTabs : '0'  //默认开启选项卡，默认开启第一个
		});
	});
</script>
</head>
<body>
<div id="all">
	<div id="header">
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

    </div>
    <div id="page" class="mc  cls mt20">
    	<!--page开始-->
        <div class="bannerList mb20"><img src="<?php echo ($listBanner); ?>" alt="banner" /></div>
		<div class="leftBox fl">
			<div class="sortBox">
            	<a href="__APP__/list/index/sid/<?php echo ($_GET['sid']); ?>/sort/1.html" title="最新" <?php if(($_GET['sort']) == "1"): ?>class="currentSort"<?php endif; ?>>最新</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="__APP__/list/index/sid/<?php echo ($_GET['sid']); ?>/sort/2.html" title="最悬赏" <?php if(($_GET['sort']) == "2"): ?>class="currentSort"<?php endif; ?>>最悬赏</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="__APP__/list/index/sid/<?php echo ($_GET['sid']); ?>/sort/3.html" title="最支招" <?php if(($_GET['sort']) == "3"): ?>class="currentSort"<?php endif; ?>>最支招</a>
            </div>
            <div class="listBox">
            	<ul>
                    <?php if(is_array($askList)): $i = 0; $__LIST__ = $askList;if( count($__LIST__)==0 ) : echo "该栏目还没有人求支招" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><li>
                            <a href="__APP__/List/detail/id/<?php echo ($va["id"]); ?>.html" title="<?php echo ($va["ask_name"]); ?>"><?php echo (msubstr($va["ask_name"],0,28)); ?></a>
                            <span class="otherItem"><?php echo ($va["comment_num"]); ?>人支招&nbsp;&nbsp;<?php echo ($va["username"]); ?>&nbsp;&nbsp;<?php echo (time_format($va["add_time"])); ?></span>
                       </li><?php endforeach; endif; else: echo "该栏目还没有人求支招" ;endif; ?>
                </ul>
            </div>
            <div class="fpageBox">
            	<?php echo ($page); ?>
            </div>
        </div>
		<div class="rightBox fr">
        	<!--发布问题BOX-->
<div class="publishBox">
	<a href="<?php echo U(APP_NAME.'/List/addAsk');?>" title="发布问题">&nbsp;+ 发布问题</a>
</div>
<!--TAB选项卡推荐开始-->
<div class="recommendBox">
    <div class="recommendTitle">		
        <ul>
            <li class="currentRec">最新. . .</li>
            <li>最悬赏. . .</li>
            <li>最支招. . .</li>
        </ul>
    </div>
    <div class="recommendCon">
        <ul>
            <li class="recommendBest">
                <div class="tabContent">
                    <dl>
                        <?php if(is_array($newAllList)): $i = 0; $__LIST__ = $newAllList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><dd><a href="__APP__/List/detail/id/<?php echo ($va["id"]); ?>.html" title="<?php echo ($va["ask_name"]); ?>"><?php echo (msubstr($va["ask_name"],0,18)); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </div>
            </li>
            <li class="recommendBest none">
                <div class="tabContent">
                    <dl>
                        <?php if(is_array($rewardAllList)): $i = 0; $__LIST__ = $rewardAllList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><dd><a href="__APP__/List/detail/id/<?php echo ($va["id"]); ?>.html" title="<?php echo ($va["ask_name"]); ?>"><?php echo (msubstr($va["ask_name"],0,18)); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </div>
            </li>
            <li class="recommendBest none">
                <div class="tabContent">
                    <dl>
                        <?php if(is_array($commentAllList)): $i = 0; $__LIST__ = $commentAllList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><dd><a href="__APP__/List/detail/id/<?php echo ($va["id"]); ?>.html" title="<?php echo ($va["ask_name"]); ?>"><?php echo (msubstr($va["ask_name"],0,18)); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--TAB选项卡推荐结束-->
        </div>
        <div class="cb"></div>
        <!--page结束-->
    </div>
    <div id="footer">
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

    </div>
</div>
</body>
</html>
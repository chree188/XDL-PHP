<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的消息_会员中心_支招网</title>
<link rel="Shortcut Icon" href="__IMG__/favicon.ico" type="image/x-icon"/>
<link type="text/css" href="__STATIC__/Style/Css/base.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/public.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/member.css" rel="stylesheet" />
<script type="text/javascript" src="__STATIC__/Autogrow/jquery-1.8.0.min.js"></script>
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
    <div id="left">
		<div class='userinfo'>
<dl>
  <dt> <a href=""><img src="<?php echo ($userInfo["face"]); ?>" width='56' height='56'/></a> </dt>
  <dd class='username'><?php echo ($userInfo["username"]); ?></dd>
  <dd>金币：<a href="javascript:;"><?php echo ($userInfo["point"]); ?></a></dd>
  <dd>等级：<a href="javascript:;">LV<?php echo (exp_to_level($userInfo["exp"])); ?></a></dd>
</dl>
<table>
  <tr>
    <td>提问数</td>
    <td>回答数</td>
    <td class='last'>采纳率</td>
  </tr>
  <tr>
    <td><a href=""><?php echo ($userInfo["ask_num"]); ?></a></td>
    <td><a href=""><?php echo ($answerNumAll); ?></a></td>
    <td class='last'><a href=""><?php echo ($adoptNumAll / $answerNumAll) * 100 .'%'; ?></a></td>
  </tr>
</table>
</div>
<ul>
<li class='mysetup <?php if(ACTION_NAME == 'index'): ?>cur<?php endif; ?>'><a href="<?php echo U(APP_NAME .'/Member/index');?>">账户信息</a> </li>
<li class='myarticle <?php if(ACTION_NAME == 'comment'): ?>cur<?php endif; ?>'><a href="<?php echo U(APP_NAME .'/Member/comment');?>">我的消息</a> </li>
<li class='mymessage <?php if(ACTION_NAME == 'article'): ?>cur<?php endif; ?>'><a href="<?php echo U(APP_NAME .'/Member/article');?>">我的提问</a> </li>
<li class='myletter <?php if(ACTION_NAME == 'answer'): ?>cur<?php endif; ?>'><a href="<?php echo U(APP_NAME .'/Member/answer');?>">我的回答</a> </li>
<li class='myletter <?php if(ACTION_NAME == 'letter'): ?>cur<?php endif; ?>'><a href="<?php echo U(APP_NAME .'/Member/letter');?>">我的私信</a> </li>
    <li class='myletter <?php if(ACTION_NAME == 'tobest'): ?>cur<?php endif; ?>'><a href="<?php echo U(APP_NAME .'/Member/tobest');?>">我的被采纳</a> </li>
<li class='mycollect <?php if(ACTION_NAME == 'collect'): ?>cur<?php endif; ?>'> <a href="<?php echo U(APP_NAME .'/Member/collect');?>">我的金币</a> </li>
</ul>
 
    </div>
    <div id="right">
    	<div class="artcileBox">
        	<div class="artcileTitle"><h4 style="border-bottom:1px solid #EEE; padding-bottom:10px;">我的消息&nbsp;&nbsp;<a href="javascript:;" class="deleteRead">[共<?php echo ($commentNum); ?>条]</a></h4></div>
            <div class="article_tab">
                <div class="comment_tab_con mt20">
                	<!--调十二条-->
                	<ul>
                    	<?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><li>
                            	<div class="imgBox fl"><a href=""><img src="<?php echo ($va["comment_user_face"]); ?>" alt="<?php echo ($va["comment_user"]); ?>" /></a></div>
                                <div class="textBox fr">
                                	<p><?php echo ($va["comment_user"]); ?>&nbsp;<?php echo (time_format($va["time"])); ?>&nbsp;在&nbsp;&nbsp;&nbsp;<a href="<?php echo U(APP_NAME.'/Member/mcStatus',array('aid'=>$va["aid"],'cid'=>$va["id"]));?>"><?php echo ($va["article_name"]); ?></a></p>
                                    <p><?php if(($va['pid']) == "0"): ?>评论了你&nbsp;&nbsp;<?php else: ?>回复了你&nbsp;&nbsp;<?php endif; echo (msubstr($va["comment"],0,80)); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U(APP_NAME.'/Member/mcStatus',array('aid'=>$va["aid"],'cid'=>$va["id"]));?>" style="color:#13a4fe;" class="commentStatus">查看</a></p>
                                </div>
                                <div class="cb"></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
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
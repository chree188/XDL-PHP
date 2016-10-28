<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>账户信息_会员中心_支招网</title>
<link rel="Shortcut Icon" href="__IMG__/favicon.ico" type="image/x-icon"/>
<link type="text/css" href="__STATIC__/Style/Css/base.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/public.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/member.css" rel="stylesheet" />
<link type="text/css" href="__STATIC__/Uploadify/uploadify.css" rel="stylesheet" />
<script type="text/javascript" src="__STATIC__/Autogrow/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="__STATIC__/Jquery-tabs/jquery.tabs.js"></script>
<script type="text/javascript" src="__STATIC__/Uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript">
	var STATIC = '__STATIC__';
	var uploadUrl = '<?php echo U(APP_NAME ."/Member/uploadFace");?>';
	var sid = '<?php echo session_id();?>';
	var UPLOAD = '__ROOT__/Uploads/';
</script>
<script type="text/javascript" src="__JS__/member.js"></script>
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
      <div class="setup_title">
        <h4>账户信息</h4>
      </div>
      <div class="setup_tab">
        <div class="setup_tab_title">
          <ul>
            <li class="current">基本信息</li>
            <li>修改头像</li>
            <li>修改密码</li>
            <li>经验等级</li>
          </ul>
        </div>
        <div class="setup_tab_con">
          <ul>
            <li>
              <div class="messageBox">
                <dl>
                  <dd>用户名 ： <?php echo ($userInfo["username"]); ?><span class="modifyName">修改用户名</span></dd>
                  <dd>注册时间 ： <?php echo (date("Y-m-d H:i:s",$userInfo["reg_time"])); ?></dd>
                  <dd>上一次登录时间 ： <?php echo (date("Y-m-d H:i:s",$userInfo["login_time"])); ?></dd>
                  <dd>绑定邮箱 ： <?php echo ($userInfo["email"]); ?></dd>
                  <dd>个性签名 ： <?php echo ($userInfo["introduce"]); ?> <br/><span class="modifyInt">修改签名</span></dd>
                </dl>
              </div>
            </li>
            <li>
              <div class="avatarBox">
                <form action="__APP__/Member/editFace" method="POST">
                  <div class="editFace"> <img src="<?php if(($userInfo["face"]) == "__IMG__/face.jpg"): ?>__IMG__/noface.gif<?php else: echo ($userInfo["face"]); endif; ?>" width="180" height="180" id="faceImg" />
                    <p>
                      <input type="file" name="face" id="face" />
                    </p>
                    <p>
                      <input type="hidden" name="facePath" value="">
                      <input type="submit" value="保存修改" class="sub1" />
                    </p>
                  </div>
                </form>
              </div>
            </li>
            <li>
              <div class="passwordBox">
                <form action="__APP__/Member/pwdNew" method="POST">
                <input type="hidden" name="uid" value="<?php echo session('uid');?>">
                  <dl>
                    <dd><span class="item1">当前密码：</span>
                      <input type="text" name="oldpass" class="text1" />
                    </dd>
                    <dd><span class="item1">新密码：</span>
                      <input type="text" name="newpass" class="text1" />
                    </dd>
                    <dd><span class="item1">重复新密码：</span>
                      <input type="text" name="renewpass" class="text1" />
                    </dd>
                    <dd><span class="item1"></span>
                      <input type="submit" value="保存修改" class="sub1" />
                    </dd>
                  </dl>
                </form>
              </div>
            </li>
            <li>
              <div class="leveBox">
              	<p class="title">我的等级</p>
                <p class="con">恭喜您已经升到<span class="orange">LV<?php echo (exp_to_level($userInfo["exp"])); ?></span>级啦，当前经验值<span class="orange"><?php echo ($userInfo["exp"]); ?></span>，距下一级还需<span class="orange"><?php echo C('LV' .(exp_to_level($userInfo['exp']) + 1)) - $userInfo['exp'];?></span>经验值！</p>
                <div class="leveTitle">
                	<h5>等级规则</h5>
                </div>
                <div class="leveContent mb15">
                	<table class="table">
                    	<tr>
                        	<th>等级</th>
                            <th>经验值</th>
                        </tr>
                        <?php $__FOR_START_879__=1;$__FOR_END_879__=21;for($i=$__FOR_START_879__;$i < $__FOR_END_879__;$i+=1){ if(exp_to_level($userInfo['exp']) != $i): ?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><?php echo C('LV'.$i);?></td>
                                </tr>
                           	<?php else: ?>
                                <tr class="dangqian">
                                    <td>您现在<span style="color:#0ab18f"> <?php echo (exp_to_level($userInfo["exp"])); ?> </span>级</td>
                                    <td><span style="color:#0ab18f;"><?php echo C('LV'.$i);?></span></td>
                                </tr><?php endif; } ?> 
                    </table>
                </div>
                <div class="leveTitle">
                	<h5>经验获取</h5>
                </div>
                <div class="leveContent mb10">
                	<table class="table">
                    	<tr>
                        	<th>操作</th>
                            <th>获得经验值</th>
                        </tr>
                        <tr>
                        	<td>每天登录</td>
                            <td><?php echo (C("POINT_LOGIN")); ?></td>
                        </tr>
                        <tr>
                        	<td>发布文章</td>
                            <td><?php echo (C("POINT_ARTICLE")); ?></td>
                        </tr>
                        <tr>
                        	<td>评论</td>
                            <td><?php echo (C("POINT_COMMENT")); ?></td>
                        </tr>
                        <tr>
                        	<td>私信</td>
                            <td><?php echo (C("POINT_LETTER")); ?></td>
                        </tr>
                    </table>
                </div>

            </li>
          </ul>
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
  <!--弹出框-->
  	<!--修改用户名-->
  	<div id="popName" class="none">
    	<div class="popNameTitle pr z20">
			<p>修改用户名</p>
			<a href="" title='关闭' class='close-window'></a>
        </div>
        <div class="popNameCon">
        	<form action="__APP__/Member/nameNew" method="POST" name="nameNew">
            <input type="hidden" name="uid" value="<?php echo session('uid');?>">
            <table>
            	<tr>
                	<td>用户名：</td>
                	<td><input type="text" name="username" class="text2" /></td>
                </tr>
            	<tr>
                	<td></td>
                	<td><input type="submit" class="sub2" value="提交" /></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
    <!--修改个性签名-->
    <div id="popintr" class="none">
    	<div class="popintrTitle pr z20">
			<p>修改个性签名</p>
			<a href="" title='关闭' class='close-window'></a>
        </div>
        <div class="popintrCon">
        	<form action="<?php echo U(APP_NAME .'/Member/introduceNew');?>" method="POST">
            <input type="hidden" name="uid" value="<?php echo session('uid');?>">
            <table>
            	<tr>
                	<td>签名：</td>
                	<td><textarea name="introduce" class="textarea1"></textarea></td>
                </tr>
            	<tr>
                	<td></td>
                	<td><input type="submit" class="sub2" value="提交" /></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</body>
</html>
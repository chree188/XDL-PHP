<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($askCon["ask_name"]); ?>_支招网</title>
<link rel="Shortcut Icon" href="__IMG__/favicon.ico" type="image/x-icon"/>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<link type="text/css" href="__STATIC__/Style/Css/base.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/public.css" rel="stylesheet" />
<link type="text/css" href="__CSS__/detail.css" rel="stylesheet" />
<link type="text/css" href="__STATIC__/jNotify/jNotify.jquery.css" rel="stylesheet" />
<script type="text/javascript" src="__STATIC__/Autogrow/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="__STATIC__/Jquery-tabs/jquery.tabs.js"></script>
<script type="text/javascript" src="__STATIC__/Autogrow/jquery.autogrow.js"></script>
<script type="text/javascript">
    var CONTROL = "__APP__/List/";
    var ArticleId = "<?php echo ($askCon["id"]); ?>";
    var UserId = "<?php echo session('uid');?>";
</script>
<script type="text/javascript" src="__JS__/detail.js"></script>
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
      <div class="titleBox">
        <h2><?php echo ($askCon["ask_name"]); ?></h2>
        <p><a href=""><?php echo ($askCon["username"]); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;发布于：<?php echo (time_format($askCon["add_time"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;被围观：<?php echo ($askCon["click_number"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;悬赏：<font color="#F30"><?php echo ($askCon["reward"]); ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['uid']) && isset($_SESSION['username']) && $_SESSION['uid'] == $askCon['uid']): ?><a href="<?php echo U(APP_NAME.'/List/editAsk/',array('id'=>$askCon['id']));?>" class="editA">[&nbsp;编辑&nbsp;]</a><?php endif; ?></p>
      </div>
      <div class="contentBox">
        <?php echo ($askCon["content"]); ?>
      </div>
      <!--采纳最佳答案盒子-->
        <?php if(!empty($bestList)): ?><div class="bestBox">
         <div class="bestTitle"><h4>最佳支招</h4></div>
         <div class="bestCon">
             <div class="bestConL fl">
                <img src="<?php echo ($bestList["face"]); ?>" alt="<?php echo ($bestList["username"]); ?>" />
             </div>
             <div class="bestConR fr">
                <div class="bestConRTop"><span class="username"><?php echo ($bestList["username"]); ?></span><span class="date"><?php echo (time_format($bestList["time"])); ?></span></div>
                <div class="bestConRCon">
                    <?php echo ($bestList["comment"]); ?>
                </div>
             </div>
             <div class="cb"></div>
         </div>
      </div><?php endif; ?>
      <!--评论盒子-->
      <div class="commentBox">
        <div class="commentTitle">支招（<?php echo ($askCon["comment_num"]); ?>人）</div>
        <div class="commentCon" id="commentList">
        <?php if(!empty($commentList)): ?><!--评论列表开始-->
            <ul>
            	<?php if(is_array($commentList)): $i = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><li class="commentParent">
                    <div class="imgBox fl"><a href="__APP__/User/index/uid/<?php echo ($va["comment_uid"]); ?>.html"><img src="<?php echo ($va["comment_face"]); ?>" alt="" /></a></div>
                    <div class="textBox fr">
                      <p class="name"><a href="__APP__/User/index/uid/<?php echo ($va["comment_uid"]); ?>.html"><?php echo ($va["comment_username"]); ?></a></p>
                      <p class="word"><?php echo ($va["comment"]); ?></p>
                      <p class="other"><?php echo (time_format($va["time"])); ?> <?php if(isset($_SESSION[uid]) && isset($_SESSION['username'])): ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;"  class="answer_btn">回复</a><?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['uid']) && $va['comment_uid'] == $_SESSION['uid']): ?><a href="<?php echo U(APP_NAME.'/List/deleteComment',array('cid'=>$va["id"],'aid'=>$askCon["id"],'item'=>md5($va['time'])));?>" class="delete_btn">删除</a><?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['uid']) && ($askCon['uid'] == $_SESSION['uid']) && ($askCon['solve'] == '0')): ?><a href="<?php echo U(APP_NAME.'/List/handleBest',array('aid'=>$askCon['id'],'cid'=>$va["id"],'uid'=>$va['comment_uid'],'auid'=>$askCon['uid'],'reward'=>$askCon['reward']));?>" title="最佳支招">最佳支招</a><?php endif; ?>
                      </p>
                      <div class="answerBox none">
                      	<form action="__APP__/List/handleCommentS" method="post" name="commentSon">
                        	<div class="answerBoxCon">
                            	<div class="answerFace fl"><img src="<?php echo ($userInfo["face"]); ?>" alt="" /></div>
                            	<div class="answerText fr">
                                	<input type="hidden" name="aid" value="<?php echo ($askCon["id"]); ?>"/>
                    				<input type="hidden" name="commentUid" value="<?php echo session('uid');?>"/>
									<input type="hidden" name="pid" value="<?php echo ($va["id"]); ?>"/>
                                    <input type="hidden" name="replyUid" value="<?php echo ($va["comment_uid"]); ?>"/>
                                	<textarea name="comment" class="answerTextCon"></textarea>
                               	</div>
                           		<div class="cb"></div>
                            </div>
                            <div class="answerBtnBox"><a href="javascript:;" title="取消" class="answer_cancel">取消</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" title="评论" class="answer_sub"  parentID="<?php echo ($va["id"]); ?>">提交</a>
                            </div>
                       	</form>
                      </div>
                    </div>
                    <div class="cb"></div>
                  </li>
                  <?php if(is_array($va["child"])): $i = 0; $__LIST__ = $va["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="commentSon">
                        <div class="imgBox fl"><a href="__APP__/User/index/uid/<?php echo ($value["comment_uid"]); ?>.html"><img src="<?php echo ($value["comment_face"]); ?>" alt="" /></a></div>
                        <div class="textBox fr">
                          <p class="name"><a href="__APP__/User/index/uid/<?php echo ($value["comment_uid"]); ?>.html"><?php echo ($value["comment_username"]); ?></a> 回复 <a href="__APP__/User/index/uid/<?php echo ($value["reply_uid"]); ?>.html"><?php echo ($value["reply_username"]); ?></a></p>
                          <p class="word"><?php echo ($value["comment"]); ?></p>
                          <p class="other"><?php echo (time_format($value["time"])); ?> <?php if(isset($_SESSION[uid]) && isset($_SESSION['username'])): ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;"  class="answer_btn">回复</a><?php endif; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(isset($_SESSION['uid']) && $value['comment_uid'] == $_SESSION['uid']): ?><a href="<?php echo U(APP_NAME.'/List/deleteComment',array('cid'=>$value["id"],'aid'=>$askCon["id"],'item'=>md5($value['time'])));?>" class="delete_btn">删除</a><?php endif; ?></p>
                          <div class="answerBox none">
                            <form action="__APP__/List/handleCommentS" method="post" name="commentSon">
                                <div class="answerBoxCon">
                                    <div class="answerFace fl"><img src="<?php echo ($userInfo["face"]); ?>" alt="" /></div>
                                    <div class="answerText fr">
                                        <input type="hidden" name="aid" value="<?php echo ($askCon["id"]); ?>"/>
                                        <input type="hidden" name="commentUid" value="<?php echo session('uid');?>"/>
                                        <input type="hidden" name="pid" value="<?php echo ($va["id"]); ?>"/>
                                        <input type="hidden" name="replyUid" value="<?php echo ($value["comment_uid"]); ?>"/>
                                        <textarea name="comment" class="answerTextCon"></textarea>
                                    </div>
                                    <div class="cb"></div>
                                </div>
                                <div class="answerBtnBox"><a href="javascript:;" title="取消" class="answer_cancel">取消</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" title="提交" class="answer_sub">提交</a>
                                </div>
                            </form>
                          </div>            
                        </div>
                        <div class="cb"></div>
                      </li><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <!--评论列表结束-->
        <?php else: ?>
        <div class="noComment">还没有人支招，快来抢沙发...</div><?php endif; ?>
      </div>
      <div class="replyBox"> 
        <!--回复盒子开始-->
        <?php if(isset($_SESSION[uid]) && isset($_SESSION['username'])): ?><form action="<?php echo U('/List/handleCommentP');?>" method="POST" id="commentParent">
            <div class="replyCon">
              <div class="replyFace fl"> <a href="javascript:;" title=""><img src="<?php echo ($userInfo["face"]); ?>" alt="" /></a> </div>
              <div class="replyText fr">
                    <input type="hidden" name="aid" value="<?php echo ($askCon["id"]); ?>"/>
                    <input type="hidden" name="commentUid" value="<?php echo session('uid');?>"/>
                    <input type="hidden" name="replyUid" value="<?php echo ($askCon["uid"]); ?>"/>
                    <textarea name="comment" class="replyTexCon" onfocus="if(this.value == '我有更好的答案...') this.value = ''" onblur="if(this.value =='') this.value = '我有更好的答案...'">我有更好的答案...</textarea>
              </div>
              <div class="cb"></div>
            </div>
            <div class="replyBtnBox"><a href="javascript:;" title="评论" id="reply_sub">提交</a> </div>
        </form>
        <?php else: ?>
        <p class="noLogin">您需要登录后才可以支招 <a href="<?php echo U(APP_NAME.'/Login/index');?>">登录</a> | <a href="<?php echo U(APP_NAME.'/Login/register');?>">立即注册</a></p><?php endif; ?>
        <!--回复盒子结束--> 
      </div>
    </div>
    <!--左边盒子结束--> 
  </div>
  <div class="rightBox fr"> 
    <!--右边盒子开始-->
      <div class="authorBox">
          <div class="authorBoxL fl"><a href="__APP__/User/index/uid/<?php echo ($askCon["uid"]); ?>.html" title="前往<?php echo ($askCon["username"]); ?>的个人主页"><img src="<?php echo ($askCon["face"]); ?>" alt="<?php echo ($askCon["username"]); ?>" /></a></div>
          <div class="authorBoxR fr">
              <p class="author_name"><?php echo ($askCon["username"]); ?></p>
              <p class="author_level">金币：<?php echo ($askCon["point"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;等级：LV<?php echo (exp_to_level($askCon["exp"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo U(APP_NAME.'/Member/addLetter',array('user_id'=>$askCon["uid"]));?>" title="私信他">私信TA</a></p>
          </div>
          <div class="cb"></div>
      </div>
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
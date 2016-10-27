<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>发布问题_支招网</title>
    <link rel="Shortcut Icon" href="__IMG__/favicon.ico" type="image/x-icon"/>
    <meta name="keywords" content="泰部落，泰语学习教程，泰语入门，泰语资料下载，泰语词汇阅读，学习经验故事"/>
    <meta name="description" content="用户可以在泰语学习版块，分享关于泰语的学习资料、教程，学习的经验故事，帮助喜欢泰语的朋友"/>
    <link type="text/css" href="__STATIC__/Style/Css/base.css" rel="stylesheet" />
    <link type="text/css" href="__CSS__/public.css" rel="stylesheet" />
    <link type="text/css" href="__CSS__/list.css" rel="stylesheet" />
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
	/* 精简版富文本编辑器 */
	function getMiniEditor(textareaName) {
		KindEditor.ready(function(K) {
			var editor = K.create('textarea[name="'+textareaName+'"]', {
				allowFileManager : true,
				minWidth : 650,
				minHeight : 200,
				items : [
					'link', 'unlink', 'formatblock', 'fontname', 'fontsize', '|', 
					'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', '|',
					'strikethrough', 'lineheight', 'removeformat', '|', 'fullscreen',
				]
			});
		});
	}

	/* 富文本编辑器（带分隔符） */
	function getEditor2(textareaName) {
		KindEditor.ready(function(K) {
			var editor = K.create('textarea[name="'+textareaName+'"]', {
				allowFileManager : true,
				minWidth : 650,
				minHeight : 200,
				items : [
					'source', '|', 'undo', 'redo', '|', 'print', 'code', 'cut', 'copy', 'paste',
					'plainpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
					'justifyfull', 'subscript',
					'superscript', 'clearhtml', 'selectall', '|', 'pagebreak',
					'link', 'unlink', '|', 'fullscreen', '/',
					'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
					'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
					'flash', 'media', 'insertfile', '|', 'table', 'hr', 'emoticons', 'baidumap', '|', 'about'
				]
			});
		});
	}

	/* 上传图片按钮(网络上传+本地上传) */
	function getImage(inputName, buttonId, fn) {
		KindEditor.ready(function(K) {
			var editor = K.editor({
				allowFileManager : true
			});
			K('#'+buttonId).click(function() {
				editor.loadPlugin('image', function() {
					editor.plugin.imageDialog({
						imageUrl : K('input[name="'+inputName+'"]').val(),
						clickFn : function(url, title, width, height, border, align) {
							K('input[name="'+inputName+'"]').val(url);
							K('#url').attr('src', url);
							if (typeof fn == 'function') fn(url);
							editor.hideDialog();
						}
					});
				});
			});
		});
	}

	/* 颜色选择器 */
	function getColorPicker(inputName, buttonId) {
		KindEditor.ready(function(K) {
			var colorpicker;
			K('#'+buttonId).bind('click', function(e) {
				e.stopPropagation();
				if (colorpicker) {
					colorpicker.remove();
					colorpicker = null;
					return;
				}
				var colorpickerPos = K('#'+buttonId).pos();
				colorpicker = K.colorpicker({
					x : colorpickerPos.x,
					y : colorpickerPos.y + K('#'+buttonId).height(),
					z : 19811214,
					selectedColor : 'default',
					noColor : '无颜色',
					click : function(color) {
						K('input[name="'+inputName+'"]').val(color);
						colorpicker.remove();
						colorpicker = null;
					}
				});
			});
			K(document).click(function() {
				if (colorpicker) {
					colorpicker.remove();
					colorpicker = null;
				}
			});
		});
	}
</script>
<script type="text/javascript" language="javascript">
	/* 确定执行删除操作 */
	function getDelete(string) {
		if (confirm(string)) {
			return true;
		} else {
			return false;
		}
	}

	/* 按钮点击提交到指定页面 */
	function btnSubmit(form, url) {
		$(form).attr('action', url).submit();
	}
</script>
<script type="text/javascript">
	var validate = {
		title : false,
		sort_id : false,
        reward : false,
		content : false
	};
	$(function(){
		//js验证
		var addArticle = $('form[name=addArticle]');
		addArticle.submit(function(){
			var isOk = validate.title && validate.sort_id && validate.reward;
			if( isOk ){
				return true;		
			}
			$('input[name=title]' , addArticle).trigger('blur');
			$('select[name=sort_id]' , addArticle).trigger('blur');
            $('select[name=reward]' , addArticle).trigger('blur');
			return false; 
		});
		//验证标题
		$('input[name=title]',addArticle).blur(function(){
			var title = $(this).val();
			var msgContent = $(this).next('.msgContent');
			if(title == ''){
				msg = '标题不能为空';
				msgContent.html(msg).removeClass('none');
				validate.title = false;
				return;	
			}else {
				msg = '';
				msgContent.html(msg).addClass('none');
				validate.title = true;
				return;	
			}
		}).keyup(function(){
			$(this).triggerHandler('blur');	
		});
		//验证分类
		$('select[name=sort_id]',addArticle).blur(function(){
			var sort_id = $(this).val();
			var msgContent = $(this).next('.msgContent');
			if(sort_id == 0){
				msg = '请选择分类';
				msgContent.html(msg).removeClass('none');
				validate.sort_id = false;
				return;	
			}else {
				msg = '';
				msgContent.html(msg).addClass('none');
				validate.sort_id = true;
				return;	
			}
		}).keyup(function(){
			$(this).triggerHandler('blur');	
		}).focus(function(){
			$(this).triggerHandler('blur');	
		});
        //验证悬赏金币
        $('select[name=reward]',addArticle).blur(function(){
            var reward = $(this).val();
            var msgContent = $(this).next('.msgContent');
            if(reward == -1){
                msg = '请选择悬赏的金币';
                msgContent.html(msg).removeClass('none');
                validate.reward = false;
                return;
            }else {
                msg = '';
                msgContent.html(msg).addClass('none');
                validate.reward = true;
                return;
            }
        }).keyup(function(){
                    $(this).triggerHandler('blur');
                }).focus(function(){
                    $(this).triggerHandler('blur');
                });
	})
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
                            <p>发布新问题</p>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="addBoxCon">
                        <form action="<?php echo U(APP_NAME .'/List/handleAddAsk');?>" method="POST" name="addArticle">
                            <input type="hidden" name="uid" value="<?php echo session('uid');?>">
                            <ul>
                                <li>
                                    <span class="item3 fl"><b>*</b>标题</span>
                                    <input type="text" name="title" class="text1 fl" />
                                    <div class="msgContent fl none"></div>
                                    <div class="cb"></div>
                                </li>
                                <li>
                                    <span class="item3 fl"><b>*</b>分类</span>
                                    <select name="sort_id" class="select">
                                        <option value="0">请选择分类</option>
                                        <?php if(is_array($sortList)): $i = 0; $__LIST__ = $sortList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><option value="<?php echo ($va["id"]); ?>"><?php echo ($va["sort_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    <div class="msgContent fl none"></div>
                                    <div class="cb"></div>
                                </li>
                                <li>
                                    <span class="item3 fl"><b>*</b>悬赏</span>
                                    <select name="reward" class="select2">
                                        <option value="-1">请选择悬赏金币( 当前金币 <?php echo ($userInfo["point"]); ?> )</option>
                                        <option value="0" <?php if(($userInfo['point']) <= "0"): ?>disabled="disabled"<?php endif; ?>>0</option>
                                        <option value="5" <?php if(($userInfo['point']) <= "5"): ?>disabled="disabled"<?php endif; ?>>5</option>
                                        <option value="10" <?php if(($userInfo['point']) <= "10"): ?>disabled="disabled"<?php endif; ?>>10</option>
                                        <option value="15" <?php if(($userInfo['point']) <= "15"): ?>disabled="disabled"<?php endif; ?>>15</option>
                                        <option value="20" <?php if(($userInfo['point']) <= "20"): ?>disabled="disabled"<?php endif; ?>>20</option>
                                        <option value="30" <?php if(($userInfo['point']) <= "30"): ?>disabled="disabled"<?php endif; ?>>30</option>
                                        <option value="50" <?php if(($userInfo['point']) <= "50"): ?>disabled="disabled"<?php endif; ?>>50</option>
                                        <option value="100" <?php if(($userInfo['point']) <= "100"): ?>disabled="disabled"<?php endif; ?>>100</option>
                                    </select>
                                    <div class="msgContent fl none"></div>
                                    <div class="cb"></div>
                                </li>
                                <li>
                                    <span class="item3 fl"><b>*</b>内容</span>
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
                <div class="tipTitle">发布问题</div>
                <div class="tipCon">
                    <ul>
                        <li>请完整输入问题的标题，悬赏，内容，并选择恰当的分类；</li>
                        <li>乱发问题，干扰网站内容的用户，会受到文章删除，账号锁定的惩罚；</li>
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
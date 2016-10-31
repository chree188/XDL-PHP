<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>添加友情链接</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__CSS__/base.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/basic.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/study.css" rel="stylesheet" type="text/css" />
<link href='__STATIC__/editor/themes/default/default.css' rel='stylesheet' type='text/css' />
<script type="text/javascript" language="javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript" language="javascript" src="__JS__/common.js"></script>
<script type="text/javascript" language="javascript" charset="utf-8" src="__STATIC__/editor/kindeditor.js"></script>
<script type="text/javascript" language="javascript" charset="utf-8" src="__STATIC__/editor/lang/zh_CN.js"></script>
<script type="text/javascript" language="javascript">
	/* 上传图片按钮(网络上传+本地上传) */
	function getImage(inputName, buttonId) {
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
							editor.hideDialog();
						}
					});
				});
			});
		});
	}
</script>
</head>
<body leftmargin="8" topmargin="8" background='__IMG__/allbg.gif'>
    <!--快捷操作导航开始-->
    <div class="kuaijie">
        <div class="kuaijieTitle">&nbsp;栏目快捷操作</div>
        <div class="caozuo">
        &nbsp;&nbsp;&nbsp;<a href="<?php echo U(APP_NAME .'/Link/detailslist');?>" title="" class="kjcontent" target="main">友情链接列表</a>&nbsp;&nbsp;&nbsp;
            <a href="<?php echo U(APP_NAME .'/Link/adddetails');?>" title="" class="kjsort">添加友情链接</a>
        </div>
    </div>
    <!--快捷操作导航结束-->
    <div class="art_list_title">
    	<div class="sort_left">&nbsp;栏目详情管理--添加友情链接</div>
    </div>
    <div class="addsort_content">
    	<form action="<?php echo U(APP_NAME.'/Link/runadddetails');?>" method="POST">
        	<table>
            	<tr>
                	<td>友情链接名称：</td>
                    <td><input type="text" class="input1 w300" name="link_name" /></td>
                </tr>
                <tr>
                	<td>友情链接状态：</td>
                    <td>
                    	<input type="radio" name="status" value="1" checked="checked" />&nbsp;启用&nbsp;
                        <input type="radio" name="status" value="0" />&nbsp;禁用&nbsp;
                        <span class="note">* 友情链接被禁用以后，前台将不会显示该条友情链接</span>
                    </td>
                </tr>
<!--                <tr>
                	<td>友情链接图片：</td>
                    <td><input type="text" class="input1 w250" name="link_pic" id="picid" />&nbsp;&nbsp;<input type="button" name="upload_pic" class="input1 w70" style="cursor:pointer;" value="上传图片" id="image1" /><script type="text/javascript" language="javascript">getImage("link_pic", "image1");</script></td>
                </tr>
-->                <tr>
                	<td>友情链接链接地址：</td>
                    <td><input type="text" class="input1 w250" name="link_url"/></td>
                </tr>
                <tr>
                	<td>友情链接备注：</td>
                    <td><input type="text" class="input1 w250" name="explain" /><span class="note">* 友情链接备注</span></td>
                </tr>
                <tr>
                	<td colspan="2" align="center"><input type="submit" value="保存添加" class="input1w70" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
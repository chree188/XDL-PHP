<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>添加广告</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__CSS__/base.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/basic.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/ad.css" rel="stylesheet" type="text/css" />
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
<link rel="stylesheet" type="text/css" href="__STATIC__/Jquery-ui/css/jquery.ui.core.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/Jquery-ui/css/jquery.ui.all.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/Jquery-ui/css/jquery.ui.datepicker.css" />
<script type="text/javascript" src="__STATIC__/Jquery-ui/ui/jquery.ui.core.js"></script><script type="text/javascript" src="__STATIC__/Jquery-ui/ui/jquery.ui.widget.js"></script><script type="text/javascript" src="__STATIC__/Jquery-ui/ui/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="__STATIC__/Jquery-ui/ui/i18n/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" language="javascript">
	$(function(){
		$(":input[name='start_time']").datepicker({
			dateFormat:'yy-mm-dd', //日期格式
			minDate:0, //可选格式 1. -n 表示距离今天前多少天 2. +n 表示距离今天之后多少天 3. W 表示周，D 表示天，Y 表示年，M表示月
			//maxDate:"",
			numberOfMonths: 1, //默认显示几个日历
			showButtonPanel: false, //是否显示按钮控件帮助用户选择日期
			changeMonth: true, //是否开启下拉，让用户选择月份
			changeYear: true, //是否开启下拉，让用户选择年份
			onSelect: function( selectedDate ) {
				$(":input[name='end_time']").datepicker( "option", "minDate", selectedDate );
			}
		});
		$(":input[name='end_time']").datepicker({
			dateFormat:'yy-mm-dd', //日期格式
			minDate:0, //可选格式 1. -n 表示距离今天前多少天 2. +n 表示距离今天之后多少天 3. W 表示周，D 表示天，Y 表示年，M表示月
			//maxDate:"",
			numberOfMonths: 1, //默认显示几个日历
			showButtonPanel: false, //是否显示按钮控件帮助用户选择日期
			changeMonth: true, //是否开启下拉，让用户选择月份
			changeYear: true, //是否开启下拉，让用户选择年份
			onSelect: function( selectedDate ) {
				$(":input[name='start_time']").datepicker( "option", "maxDate", selectedDate );
			}
		});
	});
</script>
</head>
<body leftmargin="8" topmargin="8" background='__IMG__/allbg.gif'>
    <!--快捷操作导航开始-->
    <div class="kuaijie">
        <div class="kuaijieTitle">&nbsp;栏目快捷操作</div>
        <div class="caozuo">
        	&nbsp;&nbsp;<a href="<?php echo U(APP_NAME .'/Ad/sortlist');?>" title="" class="kjsort" target="main">栏目分类管理</a>&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href="<?php echo U(APP_NAME .'/Ad/detailslist');?>" title="" class="kjcontent" target="main">栏目详情管理</a>
        </div>
    </div>
    <!--快捷操作导航结束-->
    <div class="art_list_title">
    	<div class="sort_left">&nbsp;栏目详情管理--添加广告</div>
    </div>
    <div class="addsort_content">
    	<form action="<?php echo U(APP_NAME.'/Ad/runadddetails');?>" method="POST">
        	<table>
            	<tr>
                	<td>广告名称：</td>
                    <td><input type="text" class="input1 w300" name="ad_name" /></td>
                </tr>
                <tr>
                    <td class="tl">所属分类：</td>
                    <td>
                        <select name="parent_id" class="select1 w280">
                            <?php if(is_array($sortList)): $i = 0; $__LIST__ = $sortList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sort): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sort["id"]); ?>"><?php echo ($sort["html"]); ?>|--<?php echo ($sort["sort_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                	<td>广告状态：</td>
                    <td>
                    	<input type="radio" name="status" value="1" checked="checked" />&nbsp;启用&nbsp;
                        <input type="radio" name="status" value="0" />&nbsp;禁用&nbsp;
                        <span class="note">* 广告被禁用以后，前台将不会显示该条广告</span>
                    </td>
                </tr>
                <tr>
                	<td>广告图片：</td>
                    <td><input type="text" class="input1 w250" name="ad_pic" id="picid" />&nbsp;&nbsp;<input type="button" name="upload_pic" class="input1 w70" style="cursor:pointer;" value="上传图片" id="image1" /><script type="text/javascript" language="javascript">getImage("ad_pic", "image1");</script></td>
                </tr>
                <tr>
                	<td>广告链接地址：</td>
                    <td><input type="text" class="input1 w250" name="ad_url"/></td>
                </tr>
                <tr>
                	<td>广告说明文字：</td>
                    <td><input type="text" class="input1 w250" name="ad_explain" /><span class="note">* 广告的说明文字，鼠标悬停在广告上时显示</span></td>
                </tr>
                <tr>
                    <td width="120" class="tr">广告起止时间：</td>
                    <td><input type="text" name="start_time" class="input1 w100" value="<?php echo (date('Y-m-d',$data["start_time"])); ?>" /> 至 <input type="text" name="end_time" class="input1 w100" value="<?php echo (date('Y-m-d',$data["end_time"])); ?>" /></td>
                </tr>
                <tr>
                	<td colspan="2" align="center"><input type="submit" value="保存添加" class="input1w70" /></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
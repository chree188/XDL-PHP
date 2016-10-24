<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>指定分类下详情列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__CSS__/base.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/basic.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/article.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript" language="javascript" src="__JS__/common.js"></script>
<script type="text/javascript">
	$(function(){
		$('.checkAll').click(function(){
			var checkOne = $('.checkone');
			$(this).attr('checked') ? checkOne.attr('checked','checked') : checkOne.removeAttr('checked');
		});
	})
</script>
</head>
<body leftmargin="8" topmargin="8" background='__IMG__/allbg.gif'>
    <!--快捷操作导航开始-->
    <div class="kuaijie">
        <div class="kuaijieTitle">&nbsp;栏目快捷操作</div>
        <div class="caozuo">
        	&nbsp;&nbsp;<a href="<?php echo U(APP_NAME .'/Single/singlelist');?>" title="" class="kjsort" target="main">单页列表管理</a>&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href="<?php echo U(APP_NAME .'/Single/singleadd');?>" title="" class="kjcontent" target="main">添加单页</a>
        </div>
    </div>
    <!--快捷操作导航结束-->
    <div class="art_list_title">
    	<div class="sort_left fl">&nbsp;单页列表管理</div>
        <div class="sort_right fr"><!--<input type="button" value="添加图文" name="addSort" onclick="javascript:;" />-->&nbsp;&nbsp;</div>
        <div class="cb"></div>
    </div>
    <div class="art_list">
    	<form method="POST" action="<?php echo U(APP_NAME.'/Single/deleteDetails');?>" name="form">
        	<table class="tableList">
            	<thead>
                	<tr class="top_thead">
                    	<th width="60">&nbsp;选择</th>
                        <th width="40" align="center">ID</th>
                        <th align="left">单页名称</th>
                        <th width="80" align="left">状态</th>
                        <th align="left" width="250">所属分类</th>
                         <th align="left" width="200">添加时间</th>
                        <th width="200" align="left">操作</th>
                    </tr>
                </thead>
                <tbody>
                	<?php if(is_array($list)): foreach($list as $key=>$data): ?><tr>
                            <td align="left"><input type="checkbox" name="id[]" value="<?php echo ($data["id"]); ?>" class="checkone"/></td>
                            <td align="center"><?php echo ($data["id"]); ?></td>
                            <td align="left"><?php echo ($data["title"]); ?></td>
                            <td align="left"><?php if(in_array(($data['status']), explode(',',"1"))): ?>启用<?php else: ?>禁用<?php endif; ?></td>
                            <td align="left"><?php if(in_array(($data['sort_id']), explode(',',"1"))): ?>默认分类<?php endif; ?></td>
                            <td align="left"><?php echo (date('Y-m-d H:i:s',$data["add_time"])); ?></td>
                            <td align="left">&nbsp;<a href="<?php echo U(APP_NAME .'/Single/singleedit/',array('id'=>$data['id']));?>" title="编辑数据">编辑数据</a><!--&nbsp;|&nbsp;<a href="<?php echo U(APP_NAME .'/Study/deleteStudy/',array('id'=>$data['id']));?>" title="删除数据">删除数据</a>--></td>
                        </tr><?php endforeach; endif; ?>
                </tbody>
                <tfoot>
                	<tr>
                    	<td align="left"><input type="checkbox" class="checkAll"  /></td>
                        <td colspan="6"><input type="submit"  value="删除所选" class="deleteAll" /></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <div class="fpage">
    	<?php echo ($page); ?>
    </div>
</body>
</html>
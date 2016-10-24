<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>分类列表</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__CSS__/base.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/basic.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/study.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript" language="javascript" src="__JS__/common.js"></script>
</head>
<body leftmargin="8" topmargin="8" background='__IMG__/allbg.gif'>
    <!--快捷操作导航开始-->
    <div class="kuaijie">
        <div class="kuaijieTitle">&nbsp;栏目快捷操作</div>
        <div class="caozuo">
        	&nbsp;&nbsp;<a href="<?php echo U(APP_NAME .'/Ask/sortlist');?>" title="" class="kjsort">栏目分类管理</a>&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href="<?php echo U(APP_NAME .'/Ask/detailslist');?>" title="" class="kjcontent">栏目详情管理</a>
        </div>
    </div>
    <!--快捷操作导航结束-->
    <div class="art_list_title">
    	<div class="sort_left fl">&nbsp;图文分类管理</div>
        <div class="sort_right fr"><input type="button" value="添加分类" name="addSort" onclick="location.href='<?php echo U(APP_NAME .'/Ask/addSort');?>'" />&nbsp;&nbsp;</div>
        <div class="cb"></div>
    </div>
    <!--图文列表开始 -->
    <div class="art_list">
    	<form method="POST" action="<?php echo U(APP_NAME .'/Ask/sortsequence');?>">
        	<table class="tableList">
            	<thead>
                	<tr class="top_thead">
                    	<th width="60">&nbsp;排序</th>
                        <th width="40" align="center">ID</th>
                        <th align="left">分类名称</th>
                        <th width="320" align="left">操作</th>
                    </tr>
                </thead>
                <tbody>
                	<?php if(is_array($sortList)): foreach($sortList as $key=>$data): ?><tr>
                            <td>&nbsp;<input type="text" name="<?php echo ($data["id"]); ?>" value="<?php echo ($data["sequence"]); ?>" class="input1 w20" /></td>
                            <td align="center"><?php echo ($data["id"]); ?></td>
                            <td align="left"><?php echo ($data["html"]); ?>|--<?php echo ($data["sort_name"]); ?></td>
                            <td align="left">
                            	<a href="<?php echo U(APP_NAME .'/Ask/sortdetail/',array('id'=>$data['id']));?>" title="栏目信息列表">栏目信息列表</a>&nbsp;|
                                &nbsp;<a href="<?php echo U(APP_NAME .'/Ask/editsort/',array('id'=>$data['id']));?>" title="编辑修改">编辑修改</a>&nbsp;|
                                &nbsp;<a href="<?php echo U(APP_NAME.'/Ask/deletesort',array('id'=>$data['id']));?>" title="删除">删除</a>
                                &nbsp;</td>
                        </tr><?php endforeach; endif; ?>
                </tbody>
                <tfoot>
                	<tr>
                    	<td><input type="submit" class="btn1" value="保存排序" /></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <!--图文列表结束 -->
</body>
</html>
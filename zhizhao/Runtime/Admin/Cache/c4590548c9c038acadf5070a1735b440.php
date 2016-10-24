<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>后台用户管理员列表</title>
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
        	&nbsp;&nbsp;<a href="<?php echo U(APP_NAME .'/Admin/adminlist');?>" title="" class="kjsort">后台管理员列表</a>&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href="<?php echo U(APP_NAME .'/Admin/addadmin');?>" title="" class="kjcontent">添加管理员</a>
        </div>
    </div>
    <!--快捷操作导航结束-->
    <div class="art_list_title">
    	<div class="sort_left fl">&nbsp;后台管理员列表</div>
        <div class="sort_right fr"><input type="button" value="添加管理员" name="addSort" onclick="location.href='<?php echo U(APP_NAME .'/Admin/addadmin');?>'" />&nbsp;&nbsp;</div>
        <div class="cb"></div>
    </div>
    <!--图文列表开始 -->
    <div class="art_list">
    	<form method="POST" action="<?php echo U(APP_NAME .'/Goods/sortsequence');?>">
        	<table class="tableList">
            	<thead>
                	<tr class="top_thead">
                        <th width="40" align="center">ID</th>
                        <th align="left">管理员名称</th>
                        <th align="left">注册时间</th>
                        <th align="left">上一次登录时间</th>
                        <th align="left">上一次登录IP</th>
                        <th width="320" align="left">操作</th>
                    </tr>
                </thead>
                <tbody>
                	<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><tr>
                            <td align="center"><?php echo ($data["id"]); ?></td>
                            <td align="left"><?php echo ($data["username"]); ?></td>
                            <td align="left"><?php echo (date("Y-m-d H:i:s",$data["createtime"])); ?></td>
                            <td align="left"><?php echo (date("Y-m-d H:i:s",$data["logintime"])); ?></td>
                            <td align="left"><?php echo ($data["loginip"]); ?></td>
                            <td align="left">
                                &nbsp;<a href="<?php echo U(APP_NAME .'/Admin/editAdmin/',array('id'=>$data['id']));?>" title="编辑修改">编辑查看</a>&nbsp;|
                                &nbsp;<a href="<?php echo U(APP_NAME .'/Admin/deleteAdmin/',array('id'=>$data['id']));?>" title="删除">删除</a>
                                &nbsp;</td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                <tfoot style="visibility:hidden; ">
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
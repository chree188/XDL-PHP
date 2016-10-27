<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>会员列表</title>
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
        	&nbsp;&nbsp;<a href="<?php echo U(APP_NAME .'/Admin/memberlist');?>" title="" class="kjsort">会员列表</a>&nbsp;&nbsp;&nbsp;&nbsp;
        	<a href="javascript:;" title="" class="kjcontent hidden">添加会员</a>
        </div>
    </div>
    <!--快捷操作导航结束-->
    <div class="art_list_title">
    	<div class="sort_left fl">&nbsp;后台管理员列表</div>
        <div class="sort_right fr"></div>
        <div class="cb"></div>
    </div>
    <!--图文列表开始 -->
    <div class="art_list">
    	<form method="POST" action="<?php echo U(APP_NAME .'/Goods/sortsequence');?>">
        	<table class="tableList">
            	<thead>
                	<tr class="top_thead">
                        <th width="40" align="center">ID</th>
                        <th align="left">会员名称</th>
                        <th align="left">注册时间</th>
                        <th align="left">上一次登录时间</th>
                        <th align="left">邮箱</th>
                        <th align="left">锁定状态</th>
                        <th width="320" align="left">操作</th>
                    </tr>
                </thead>
                <tbody>
                	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                            <td align="center"><?php echo ($data["id"]); ?></td>
                            <td align="left"><?php echo ($data["username"]); ?></td>
                            <td align="left"><?php echo (date("Y-m-d H:i:s",$data["reg_time"])); ?></td>
                            <td align="left"><?php if(empty($data['login_time'])): ?>还未登录过<?php else: echo (date("Y-m-d H:i:s",$data["login_time"])); endif; ?></td>
                            <td align="left"><?php echo ($data["email"]); ?></td>
                            <td align="left" style="color:#F00;"><?php if(in_array(($data['lock']), explode(',',"1"))): ?>未锁定<?php else: ?>锁定<?php endif; ?></td>
                            <td align="left">
                                <?php if(in_array(($data['lock']), explode(',',"1"))): ?><a href="<?php echo U(APP_NAME .'/Admin/memberLock/',array('lock'=>0,'id'=>$data['id']));?>" title="锁定">锁定</a><?php else: ?><a href="<?php echo U(APP_NAME .'/Admin/memberLock/',array('lock'=>1,'id'=>$data['id']));?>" title="解锁">解锁</a><?php endif; ?>
                                &nbsp;</td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                <tfoot>
                	<tr>
                    	<td colspan="7" align="center"><?php echo ($page); ?></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <!--图文列表结束 -->
</body>
</html>
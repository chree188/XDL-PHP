<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>添加后台管理员</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__CSS__/base.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/basic.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/site.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript" language="javascript" src="__JS__/common.js"></script>
</head>
<body leftmargin="8" topmargin="8" background='__IMG__/allbg.gif'>
    <!--快捷操作导航开始-->
    <div class="siteBox">
        <div class="siteTitle">&nbsp;添加后台管理员</div>
        <div class="siteContent pl50 pt30">
        	<form action="<?php echo U(APP_NAME.'/Admin/addadmin/');?>" method="POST">
            	<table>
                	<tr>
                    	<td>用户名：</td>
                        <td><input type="text" class="input1 w180" name="username" /></td>
                    </tr>
                	<tr>
                    	<td>密码：</td>
                        <td><input type="text" class="input1 w180" name="password" /></td>
                    </tr>
                	<tr>
                    	<td>确认密码：</td>
                        <td><input type="text" class="input1 w180" name="repassword" /></td>
                    </tr>
                    <tr>
                    	<td colspan="2" align="center"><input type="submit" value="提交保存" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <!--快捷操作导航结束-->
</body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="/www.w3.org/1999/xhtml">
<head>
<title>用户经验等级规则设置</title>
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
        <div class="siteTitle">&nbsp;用户经验等级规则设置</div>
        <div class="siteContent">
        	<form action="<?php echo U(APP_NAME.'/Admin/memberlevel/');?>" method="POST">
            	<table>
                	<tr>
                    	<td colspan="2" align="center">经验获取</td>
                    </tr>
                	<tr>
                    	<td>登录：</td>
                        <td><input type="text" class="input1 w250" name="level_login" value="<?php echo (C("level_login")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>发布文章：</td>
                        <td><input type="text" class="input1 w250" name="level_article" value="<?php echo (C("level_article")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>评论：</td>
                        <td><input type="text" class="input1 w250" name="level_comment" value="<?php echo (C("level_comment")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>私信：</td>
                        <td><input type="text" class="input1 w250" name="level_letter" value="<?php echo (C("level_letter")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td colspan="2" align="center">各等级所需经验</td>
                    </tr>
                	<tr>
                    	<td>LV1：</td>
                        <td><input type="text" class="input1 w250" name="lv1" value="<?php echo (C("lv1")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV2：</td>
                        <td><input type="text" class="input1 w250" name="lv2" value="<?php echo (C("lv2")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV3：</td>
                        <td><input type="text" class="input1 w250" name="lv3" value="<?php echo (C("lv3")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV4：</td>
                        <td><input type="text" class="input1 w250" name="lv4" value="<?php echo (C("lv4")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV5：</td>
                        <td><input type="text" class="input1 w250" name="lv5" value="<?php echo (C("lv5")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV6：</td>
                        <td><input type="text" class="input1 w250" name="lv6" value="<?php echo (C("lv6")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV7：</td>
                        <td><input type="text" class="input1 w250" name="lv7" value="<?php echo (C("lv7")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV8：</td>
                        <td><input type="text" class="input1 w250" name="lv8" value="<?php echo (C("lv8")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV9：</td>
                        <td><input type="text" class="input1 w250" name="lv9" value="<?php echo (C("lv9")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV10：</td>
                        <td><input type="text" class="input1 w250" name="lv10" value="<?php echo (C("lv10")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV11：</td>
                        <td><input type="text" class="input1 w250" name="lv11" value="<?php echo (C("lv11")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV12：</td>
                        <td><input type="text" class="input1 w250" name="lv12" value="<?php echo (C("lv12")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV13：</td>
                        <td><input type="text" class="input1 w250" name="lv13" value="<?php echo (C("lv13")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV14：</td>
                        <td><input type="text" class="input1 w250" name="lv14" value="<?php echo (C("lv14")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV15：</td>
                        <td><input type="text" class="input1 w250" name="lv15" value="<?php echo (C("lv15")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV16：</td>
                        <td><input type="text" class="input1 w250" name="lv16" value="<?php echo (C("lv16")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV17：</td>
                        <td><input type="text" class="input1 w250" name="lv17" value="<?php echo (C("lv17")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV18：</td>
                        <td><input type="text" class="input1 w250" name="lv18" value="<?php echo (C("lv18")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV19：</td>
                        <td><input type="text" class="input1 w250" name="lv19" value="<?php echo (C("lv19")); ?>" /></td>
                    </tr>
                	<tr>
                    	<td>LV20：</td>
                        <td><input type="text" class="input1 w250" name="lv20" value="<?php echo (C("lv20")); ?>" /></td>
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
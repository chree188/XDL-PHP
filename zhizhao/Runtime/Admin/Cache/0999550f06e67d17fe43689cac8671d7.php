<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<base target="_self" />
<link rel="stylesheet" href="__CSS__/basic.css" type="text/css" />
<link href="__CSS__/main.css" rel="stylesheet" type="text/css" />
<link href="__CSS__/style.css" rel="stylesheet" type="text/css" />
</head>
<body leftmargin="8" topmargin='8' bgcolor="#FFFFFF">
<div style="min-width:780px">
  <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><div style='float:left'> 您好：<?php if(($username) == "admin"): ?>超级管理员<?php else: echo ($username); endif; ?>&nbsp;欢迎登录网站后台系统 </div>
        <div id='' style='float:right;padding-right:8px;'> 
          <!--  //保留位置（顶右）  --> 
        </div></td>
    </tr>
    <tr>
      <td height="1" background="__IMG__/sp_bg.gif" style='padding:0px'></td>
    </tr>
  </table>
  <div id="__testEvn"></div>
  <div id='mainmsg'> 
    <!--左侧开始-->
    <div class="column" id="column1"> 
      <!--系统基本信息开始-->
      <dl class="dbox" id="item4">
        <dt class='lside'>
          <div class='l'>系统基本信息</div>
        </dt>
        <dd class='intable'>
          <table width="98%" class="dboxtable">
            <tr>
              <td width="25%" class='nline' style="text-align:left">系统名称&版本：</td>
              <td class='nline'><font color='red'>ZHIZHAO 1.0</font></td>
            </tr>
              <tr>
                <td width="25%" class='nline' style="text-align:left">服务器系统：</td>
                <td class='nline'><?php echo ($phpsys["php_uname"]); ?></td>
              </tr>
              <tr>
                <td width="25%" class='nline' style="text-align:left">系统运行端口：</td>
                <td class='nline'><?php echo ($phpsys['php_port']); ?></td>
              </tr>
              <tr>
                <td width="25%" class='nline' style="text-align:left">服务器引擎：</td>
                <td class='nline'><?php echo ($phpsys['php_software']); ?></td>
              </tr>
              <tr>
                <td width="25%" class='nline' style="text-align:left">PHP版本：</td>
                <td class='nline'><?php echo ($phpsys['php_version']); ?></td>
              </tr>
              <tr>
                <td width="25%" class='nline' style="text-align:left">程序存活时间：</td>
                <td class='nline'><?php echo ($phpsys['php_max_time']); ?></td>
              </tr>
              <tr>
                <td width="25%" class='nline' style="text-align:left">PHP运行方式：</td>
                <td class='nline'><?php echo ($phpsys['php_sapi_name']); ?></td>
              </tr>
          </table>
        </dd>
      </dl>
      <!--系统基本信息结束--> 
      
    </div>
    <!--左侧结束--> 
    
    <!--右边的快捷消息开始 -->
    <div class="column" id="column2" > 
      <dl class='dbox' id="item5">
        <dt class='lside'>
          <div class='l'>开发信息</div>
        </dt>
        <dd class='intable'>
          <table width="98%" class="dboxtable">
            <tr>
              <td width='25%' class='nline' style="text-align:center"> 开发者： </td>
              <td class='nline' style="text-align:left"><a href="javascript:;" target="_blank" style="color:blue">吴兴凤 易晋宇  </a></td>
            </tr>
            <tr>
              <td width='25%' class='nline' style="text-align:center"> 版权所有： </td>
              <td class='nline' style="text-align:left">吴兴凤 易晋宇  保留所有权利</td>
            </tr>
            <tr>
              <td width='25%' class='nline' style="text-align:center"> 开发团队： </td>
              <td class='nline' style="text-align:left">吴兴凤  易晋宇  </td>
            </tr>
            <tr>
              <td height='36' class='nline' style="text-align:center">在线帮助：</td>
              <td class='nline' style="text-align:left"><a href="javascript:;" target="_blank" style="color:blue">QQ帮助</a>&nbsp;&nbsp;<a href="tencent://message/?uin=2644387648&Menu=yes" title="点我在线咨询" target="_blank"><img src="__IMG__/qq.png"/></a></td>
            </tr>
          </table>
        </dd>
      </dl>
    </div>
  </div>
</div>
</body>
</html>
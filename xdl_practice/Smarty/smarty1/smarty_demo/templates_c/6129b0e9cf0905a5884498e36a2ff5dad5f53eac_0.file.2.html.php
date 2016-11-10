<?php /* Smarty version 3.1.27, created on 2016-10-12 12:31:06
         compiled from "D:\PHP\wamp64\www\practice\Smarty\smarty_demo\templates\2.html" */ ?>
<?php
/*%%SmartyHeaderCode:3173457fe2d0a6377b6_30018450%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6129b0e9cf0905a5884498e36a2ff5dad5f53eac' => 
    array (
      0 => 'D:\\PHP\\wamp64\\www\\practice\\Smarty\\smarty_demo\\templates\\2.html',
      1 => 1476274271,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3173457fe2d0a6377b6_30018450',
  'variables' => 
  array (
    'title' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57fe2d0a69ffc0_46953703',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57fe2d0a69ffc0_46953703')) {
function content_57fe2d0a69ffc0_46953703 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '3173457fe2d0a6377b6_30018450';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <style>
        h1{
            color: #f00;
        }
    </style>
</head>
<body>
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>

    

    <!--<p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
3</p>
    <p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
4</p>-->

    <p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>

    <hr>
    <p><?php echo time();?>
</p>

</body>
</html><?php }
}
?>
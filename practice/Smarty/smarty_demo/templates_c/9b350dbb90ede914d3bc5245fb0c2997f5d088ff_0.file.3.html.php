<?php /* Smarty version 3.1.27, created on 2016-10-12 12:40:01
         compiled from "D:\PHP\wamp64\www\practice\Smarty\smarty_demo\templates\3.html" */ ?>
<?php
/*%%SmartyHeaderCode:2763957fe2f21c20eb8_15609752%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b350dbb90ede914d3bc5245fb0c2997f5d088ff' => 
    array (
      0 => 'D:\\PHP\\wamp64\\www\\practice\\Smarty\\smarty_demo\\templates\\3.html',
      1 => 1476275753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2763957fe2f21c20eb8_15609752',
  'variables' => 
  array (
    'title' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57fe2f21c5c528_27184077',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57fe2f21c5c528_27184077')) {
function content_57fe2f21c5c528_27184077 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2763957fe2f21c20eb8_15609752';
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" href="./public/style.css">
</head>
<body>
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
    <p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
    <img src="./public/1.jpg" width="800">
</body>
</html><?php }
}
?>
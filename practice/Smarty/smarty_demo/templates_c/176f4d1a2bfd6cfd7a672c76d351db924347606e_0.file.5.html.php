<?php /* Smarty version 3.1.27, created on 2016-10-12 12:55:43
         compiled from "D:\PHP\wamp64\www\practice\Smarty\smarty_demo\templates\5.html" */ ?>
<?php
/*%%SmartyHeaderCode:2990157fe32cf4a67f1_19380806%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '176f4d1a2bfd6cfd7a672c76d351db924347606e' => 
    array (
      0 => 'D:\\PHP\\wamp64\\www\\practice\\Smarty\\smarty_demo\\templates\\5.html',
      1 => 1476276836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2990157fe32cf4a67f1_19380806',
  'variables' => 
  array (
    'title' => 0,
    'username' => 0,
    'age' => 0,
    'class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57fe32cf502189_43570980',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57fe32cf502189_43570980')) {
function content_57fe32cf502189_43570980 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2990157fe32cf4a67f1_19380806';
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body>
    <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
    <!-- 方式1 -->
    <?php $_smarty_tpl->tpl_vars['username'] = new Smarty_Variable('小艳艳', null, 0);?>
    <p><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</p>

    <!-- 方式2 -->
    <?php $_smarty_tpl->tpl_vars['age'] = new Smarty_Variable('18', null, 0);?>
    <p><?php echo $_smarty_tpl->tpl_vars['age']->value;?>
</p>

    <!-- 方式3 -->
    <?php $_smarty_tpl->tpl_vars['class'] = new Smarty_Variable('s50', null, 0);?>
    <p><?php echo $_smarty_tpl->tpl_vars['class']->value;?>
</p>

    
        <p><{$class}></p><p><{$class}></p><p><{$class}></p><p><{$class}></p><p><{$class}></p>
    
</body>
</html><?php }
}
?>
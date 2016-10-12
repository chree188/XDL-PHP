<?php /* Smarty version 3.1.27, created on 2016-10-12 12:49:43
         compiled from "D:\PHP\wamp64\www\practice\Smarty\smarty_demo\templates\4.html" */ ?>
<?php
/*%%SmartyHeaderCode:2723657fe316713b9a3_01567469%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c774a7d370edec1b8a3efd0fcc8a7658372bc46' => 
    array (
      0 => 'D:\\PHP\\wamp64\\www\\practice\\Smarty\\smarty_demo\\templates\\4.html',
      1 => 1476276206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2723657fe316713b9a3_01567469',
  'variables' => 
  array (
    'title' => 0,
    'b1' => 0,
    'b2' => 0,
    'arr' => 0,
    'list' => 0,
    'obj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57fe31671947c3_96424391',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57fe31671947c3_96424391')) {
function content_57fe31671947c3_96424391 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2723657fe316713b9a3_01567469';
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

    <p>b1: <?php echo $_smarty_tpl->tpl_vars['b1']->value;?>
</p>
    <p>b2: <?php echo $_smarty_tpl->tpl_vars['b2']->value;?>
</p>

    <!-- <p>arr: <?php echo $_smarty_tpl->tpl_vars['arr']->value;?>
</p> -->
    <p>arr: <?php echo $_smarty_tpl->tpl_vars['arr']->value[0];?>
</p>
    <p>arr: <?php echo $_smarty_tpl->tpl_vars['arr']->value[3];?>
</p>
    <p>arr: <?php echo $_smarty_tpl->tpl_vars['arr']->value[2];?>
</p>
    <p>arr: <?php echo $_smarty_tpl->tpl_vars['arr']->value[4];?>
</p>

    <p>list: <?php echo $_smarty_tpl->tpl_vars['list']->value['name'];?>
</p>
    <p>list: <?php echo $_smarty_tpl->tpl_vars['list']->value['sex'];?>
</p>

    <p>obj: <?php echo $_smarty_tpl->tpl_vars['obj']->value->name;?>
</p>
    <p>obj: <?php echo $_smarty_tpl->tpl_vars['obj']->value->getInfo();?>
</p>

    <p><?php echo time();?>
</p>
    <p><?php echo date('Y-m-d H:i:s');?>
</p>

    <p><?php echo substr($_smarty_tpl->tpl_vars['title']->value,0,6);?>
</p>
    <p><?php echo implode(',',$_smarty_tpl->tpl_vars['arr']->value);?>
</p>
</body>
</html><?php }
}
?>
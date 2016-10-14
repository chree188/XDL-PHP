<?php /* Smarty version 3.1.27, created on 2016-10-12 13:11:49
         compiled from "D:\PHP\wamp64\www\practice\Smarty\smarty_demo\templates\6.html" */ ?>
<?php
/*%%SmartyHeaderCode:2062757fe3695d3cea3_70197800%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '659af95d5065510dd09cc797d7e3f8d9f5b182e4' => 
    array (
      0 => 'D:\\PHP\\wamp64\\www\\practice\\Smarty\\smarty_demo\\templates\\6.html',
      1 => 1476277886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2062757fe3695d3cea3_70197800',
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57fe3695dd3222_66792332',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57fe3695dd3222_66792332')) {
function content_57fe3695dd3222_66792332 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2062757fe3695d3cea3_70197800';
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

    <table border="1" width="500" cellspacing="0" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>age</th>
            <th>sex</th>
        </tr>
        <?php
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$foreach_v_Sav = $_smarty_tpl->tpl_vars['v'];
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['v']->value['age'];?>
</td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['v']->value['sex'] == '0') {?>女
                <?php } elseif ($_smarty_tpl->tpl_vars['v']->value['sex'] == '1') {?>男
                <?php } else { ?>保密
                <?php }?>
            </td>
        </tr>
        <?php
$_smarty_tpl->tpl_vars['v'] = $foreach_v_Sav;
}
?>
    </table>
    <?php echo var_dump($_SERVER);?>


</body>
</html><?php }
}
?>
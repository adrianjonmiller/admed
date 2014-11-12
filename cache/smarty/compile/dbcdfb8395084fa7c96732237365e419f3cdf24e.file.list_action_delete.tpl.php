<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 16:21:01
         compiled from "/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2038189486540a1b2da720a6-19552662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbcdfb8395084fa7c96732237365e419f3cdf24e' => 
    array (
      0 => '/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_delete.tpl',
      1 => 1367906915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2038189486540a1b2da720a6-19552662',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'confirm' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a1b2da7dc31_96617547',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a1b2da7dc31_96617547')) {function content_540a1b2da7dc31_96617547($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="delete" <?php if (isset($_smarty_tpl->tpl_vars['confirm']->value)){?>onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')){ return true; }else{ event.stopPropagation(); event.preventDefault();};"<?php }?> title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/delete.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
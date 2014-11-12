<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:40
         compiled from "/home/admedon/public_html/6/admin/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15225081752b1f6b41f9707-11527481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '916cbd65a5b652e2746d2d09804ddc1b3a132839' => 
    array (
      0 => '/home/admedon/public_html/6/admin/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1387394214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15225081752b1f6b41f9707-11527481',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6b4205535_05812787',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6b4205535_05812787')) {function content_52b1f6b4205535_05812787($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" >
	<img src="../img/admin/details.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
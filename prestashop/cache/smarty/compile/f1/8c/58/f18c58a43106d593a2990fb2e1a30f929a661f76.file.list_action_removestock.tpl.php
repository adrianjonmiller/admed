<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:10
         compiled from "/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_removestock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85856235252aa396aca0d15-57580374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f18c58a43106d593a2990fb2e1a30f929a661f76' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_removestock.tpl',
      1 => 1386887324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85856235252aa396aca0d15-57580374',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa396acac5e9_82262437',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa396acac5e9_82262437')) {function content_52aa396acac5e9_82262437($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/remove_stock.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a>
<?php }} ?>
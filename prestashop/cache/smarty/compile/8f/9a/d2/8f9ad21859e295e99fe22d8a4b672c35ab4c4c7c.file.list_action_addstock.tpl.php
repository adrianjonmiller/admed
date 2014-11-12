<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:10
         compiled from "/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_addstock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140766335552aa396a945401-81658071%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f9ad21859e295e99fe22d8a4b672c35ab4c4c7c' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_addstock.tpl',
      1 => 1386887324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140766335552aa396a945401-81658071',
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
  'unifunc' => 'content_52aa396a951806_64451712',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa396a951806_64451712')) {function content_52aa396a951806_64451712($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/add_stock.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a>
<?php }} ?>
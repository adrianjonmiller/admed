<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:40
         compiled from "/home/admedon/public_html/6/admin/themes/default/template/helpers/list/list_action_supply_order_create_from_template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88715460852b1f6b4207382-21694199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4760baef0cc90045319fbecf2eeff3a659c04904' => 
    array (
      0 => '/home/admedon/public_html/6/admin/themes/default/template/helpers/list/list_action_supply_order_create_from_template.tpl',
      1 => 1387394214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88715460852b1f6b4207382-21694199',
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
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6b4216378_56255251',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6b4216378_56255251')) {function content_52b1f6b4216378_56255251($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" onclick="return confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
');" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a>
<?php }} ?>
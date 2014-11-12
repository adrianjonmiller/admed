<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:11
         compiled from "/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166873595052aa396b0ea800-87009448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80ca8a15f2f9c9e927d50943a7c51059608cdf8b' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_default.tpl',
      1 => 1386887324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166873595052aa396b0ea800-87009448',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa396b100e50_46562012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa396b100e50_46562012')) {function content_52aa396b100e50_46562012($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="default" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['name']->value)){?>name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php }?>>
	<img src="../img/admin/asterisk.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
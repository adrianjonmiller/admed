<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:10
         compiled from "/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:183918441552aa396a971428-39321600%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a90115acd0ad9f3acf61138d5efdd1661229489' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1386887324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183918441552aa396a971428-39321600',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'confirm' => 0,
    'location_ok' => 0,
    'location_ko' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa396a9834b6_32581289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa396a9834b6_32581289')) {function content_52aa396a9834b6_32581289($_smarty_tpl) {?>
<a class="pointer" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')) document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ok']->value;?>
'; else document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ko']->value;?>
';">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2014-09-02 11:06:36
         compiled from "/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20060832265405dcfcac5e84-68075938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9254927d8e625a871783faa58c3197923b8e19f' => 
    array (
      0 => '/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1367906915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20060832265405dcfcac5e84-68075938',
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
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5405dcfcacef29_75546766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5405dcfcacef29_75546766')) {function content_5405dcfcacef29_75546766($_smarty_tpl) {?>
<a class="pointer" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')) document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ok']->value;?>
'; else document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ko']->value;?>
';">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
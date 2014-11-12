<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:40
         compiled from "/home/admedon/public_html/6/admin/themes/default/template/helpers/list/list_action_duplicate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54491917852b1f6b42185f5-46316368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7254bbb0f7a95bd69fc9692682fcfb38dce25acf' => 
    array (
      0 => '/home/admedon/public_html/6/admin/themes/default/template/helpers/list/list_action_duplicate.tpl',
      1 => 1387394214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54491917852b1f6b42185f5-46316368',
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
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6b422ace2_05883299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6b422ace2_05883299')) {function content_52b1f6b422ace2_05883299($_smarty_tpl) {?>
<a class="pointer" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" onclick="if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm']->value;?>
')) document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ok']->value;?>
'; else document.location = '<?php echo $_smarty_tpl->tpl_vars['location_ko']->value;?>
';">
	<img src="../img/admin/duplicate.png" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
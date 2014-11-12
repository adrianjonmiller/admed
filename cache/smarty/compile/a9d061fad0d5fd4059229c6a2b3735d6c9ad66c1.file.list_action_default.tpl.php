<?php /* Smarty version Smarty-3.1.8, created on 2014-09-02 11:07:14
         compiled from "/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9757474015405dd22dd5737-04085625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9d061fad0d5fd4059229c6a2b3735d6c9ad66c1' => 
    array (
      0 => '/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_default.tpl',
      1 => 1367906915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9757474015405dd22dd5737-04085625',
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
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5405dd22e077e6_23592450',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5405dd22e077e6_23592450')) {function content_5405dd22e077e6_23592450($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="default" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['name']->value)){?>name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php }?>>
	<img src="../img/admin/asterisk.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
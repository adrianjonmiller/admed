<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 16:21:01
         compiled from "/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1731883252540a1b2da6a085-69710025%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e482b135dfd43ed0e6878575098cbdd5617cc2a0' => 
    array (
      0 => '/home/admedon/public_html/admedoffice/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1367906915,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1731883252540a1b2da6a085-69710025',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a1b2da6fea4_12820050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a1b2da6fea4_12820050')) {function content_540a1b2da6fea4_12820050($_smarty_tpl) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['href']->value;?>
" class="edit" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
	<img src="../img/admin/edit.gif" alt="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
" />
</a><?php }} ?>
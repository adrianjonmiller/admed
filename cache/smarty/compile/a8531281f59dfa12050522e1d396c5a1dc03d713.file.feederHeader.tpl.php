<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:01
         compiled from "/home/admedon/public_html/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1282174221540a3879f20029-35682254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8531281f59dfa12050522e1d396c5a1dc03d713' => 
    array (
      0 => '/home/admedon/public_html/modules/feeder/feederHeader.tpl',
      1 => 1367907135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1282174221540a3879f20029-35682254',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a3879f266f5_03587533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a3879f266f5_03587533')) {function content_540a3879f266f5_03587533($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>
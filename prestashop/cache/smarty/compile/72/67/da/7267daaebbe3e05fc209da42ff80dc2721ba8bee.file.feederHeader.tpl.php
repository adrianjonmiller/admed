<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 17:40:21
         compiled from "/home/admedon/public_html/prestashop/modules/feeder/feederHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205378263552aa3b55677490-27445685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7267daaebbe3e05fc209da42ff80dc2721ba8bee' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/feeder/feederHeader.tpl',
      1 => 1386887143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205378263552aa3b55677490-27445685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'feedUrl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa3b55686059_47877466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa3b55686059_47877466')) {function content_52aa3b55686059_47877466($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
?>

<link rel="alternate" type="application/rss+xml" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'html', 'UTF-8');?>
" href="<?php echo $_smarty_tpl->tpl_vars['feedUrl']->value;?>
" /><?php }} ?>
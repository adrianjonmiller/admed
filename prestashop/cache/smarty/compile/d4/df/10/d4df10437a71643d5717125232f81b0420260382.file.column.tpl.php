<?php /* Smarty version Smarty-3.1.13, created on 2014-05-23 14:10:03
         compiled from "/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/hook/column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:979989060537f8efb807a55-89527895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4df10437a71643d5717125232f81b0420260382' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/hook/column.tpl',
      1 => 1400868458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '979989060537f8efb807a55-89527895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'about_link' => 0,
    'logo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_537f8efb8ae272_71459758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f8efb8ae272_71459758')) {function content_537f8efb8ae272_71459758($_smarty_tpl) {?><div class="advertising_block">
	<p><a href="<?php echo $_smarty_tpl->tpl_vars['about_link']->value;?>
" rel="nofollow"><img src="<?php echo $_smarty_tpl->tpl_vars['logo']->value;?>
" alt="PayPal" title="<?php echo smartyTranslate(array('s'=>'Pay with PayPal','mod'=>'paypal'),$_smarty_tpl);?>
" /></a></p>
</div><?php }} ?>
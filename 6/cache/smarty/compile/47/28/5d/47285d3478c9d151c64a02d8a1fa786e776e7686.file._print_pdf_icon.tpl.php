<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:46
         compiled from "/home/admedon/public_html/6/admin/themes/default/template/controllers/outstanding/_print_pdf_icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63544051252b1f6ba5d6b09-20151634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47285d3478c9d151c64a02d8a1fa786e776e7686' => 
    array (
      0 => '/home/admedon/public_html/6/admin/themes/default/template/controllers/outstanding/_print_pdf_icon.tpl',
      1 => 1387394209,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63544051252b1f6ba5d6b09-20151634',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'id_invoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6ba5ea8d5_77977873',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6ba5ea8d5_77977873')) {function content_52b1f6ba5ea8d5_77977873($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/6/tools/smarty/plugins/modifier.escape.php';
?>


<span style="width:20px; margin-right:5px;">
	<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'), 'htmlall', 'UTF-8');?>
&submitAction=generateInvoicePDF&id_order_invoice=<?php echo $_smarty_tpl->tpl_vars['id_invoice']->value;?>
"><img src="../img/admin/tab-invoice.gif" alt="invoice" /></a>
</span><?php }} ?>
<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:47
         compiled from "/home/admedon/public_html/6/admin/themes/default/template/controllers/slip/_print_pdf_icon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:35997350152b1f6bb87abc2-41279952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c9a5252e513ceba13889fdf7d3caadd6211ca4' => 
    array (
      0 => '/home/admedon/public_html/6/admin/themes/default/template/controllers/slip/_print_pdf_icon.tpl',
      1 => 1387394212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '35997350152b1f6bb87abc2-41279952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'order_slip' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6bb88f2d9_35442810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6bb88f2d9_35442810')) {function content_52b1f6bb88f2d9_35442810($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/6/tools/smarty/plugins/modifier.escape.php';
?>


<span style="width:20px; margin-right:5px;">
<a target="_blank" href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminPdf'), 'htmlall', 'UTF-8');?>
&submitAction=generateOrderSlipPDF&id_order_slip=<?php echo $_smarty_tpl->tpl_vars['order_slip']->value->id;?>
"><img src="../img/admin/tab-invoice.gif" alt="order_slip" /></a>
</span>
<?php }} ?>
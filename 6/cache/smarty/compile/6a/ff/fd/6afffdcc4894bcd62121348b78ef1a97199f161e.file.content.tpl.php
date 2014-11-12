<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:47
         compiled from "/home/admedon/public_html/6/admin/themes/default/template/controllers/cms_content/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:80014215752b1f6bb359b13-26217537%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6afffdcc4894bcd62121348b78ef1a97199f161e' => 
    array (
      0 => '/home/admedon/public_html/6/admin/themes/default/template/controllers/cms_content/content.tpl',
      1 => 1387394205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80014215752b1f6bb359b13-26217537',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_breadcrumb' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6bb36f378_69653789',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6bb36f378_69653789')) {function content_52b1f6bb36f378_69653789($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)){?>
	<div class="cat_bar">
		<span style="color: #3C8534;"><?php echo smartyTranslate(array('s'=>'Current category'),$_smarty_tpl);?>
 :</span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>
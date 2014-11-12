<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:17
         compiled from "/home/admedon/public_html/prestashop/admin/themes/default/template/controllers/cms_content/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132030048952aa39711966e8-58973016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cfde596eb0002c0941cbd2da6f4c65d4ccc0022c' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin/themes/default/template/controllers/cms_content/content.tpl',
      1 => 1386887315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132030048952aa39711966e8-58973016',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_breadcrumb' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa39711ab607_12295617',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa39711ab607_12295617')) {function content_52aa39711ab607_12295617($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['cms_breadcrumb']->value)){?>
	<div class="cat_bar">
		<span style="color: #3C8534;"><?php echo smartyTranslate(array('s'=>'Current category'),$_smarty_tpl);?>
 :</span>&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['cms_breadcrumb']->value;?>

	</div>
<?php }?>

<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }} ?>
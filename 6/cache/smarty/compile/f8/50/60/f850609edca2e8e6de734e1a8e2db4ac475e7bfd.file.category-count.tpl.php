<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:52
         compiled from "/home/admedon/public_html/6/themes/default/category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:121165940252b1f6c0d1fa81-11355895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f850609edca2e8e6de734e1a8e2db4ac475e7bfd' => 
    array (
      0 => '/home/admedon/public_html/6/themes/default/category-count.tpl',
      1 => 1387394467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121165940252b1f6c0d1fa81-11355895',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6c0d49cb6_93458223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6c0d49cb6_93458223')) {function content_52b1f6c0d49cb6_93458223($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0){?>
	<?php echo smartyTranslate(array('s'=>'There are no products in  this category'),$_smarty_tpl);?>

<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1){?>
		<?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }?>
<?php }?><?php }} ?>
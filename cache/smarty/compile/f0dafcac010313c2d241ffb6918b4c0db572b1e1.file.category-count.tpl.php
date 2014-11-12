<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 16:03:38
         compiled from "/home/admedon/public_html/themes/dilecta/category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:710103921540a171a1b88b6-33745736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0dafcac010313c2d241ffb6918b4c0db572b1e1' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/category-count.tpl',
      1 => 1367907285,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '710103921540a171a1b88b6-33745736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a171a1cba73_95033543',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a171a1cba73_95033543')) {function content_540a171a1cba73_95033543($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0){?>
	<?php echo smartyTranslate(array('s'=>'There are no products.'),$_smarty_tpl);?>

<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1){?>
		<?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }?>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:14
         compiled from "/home/admedon/public_html/prestashop/themes/default/category-count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129583644252aa396ee3c3c7-75555795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b8cffa912af4d939846cc9aadbc03e463fc7aee' => 
    array (
      0 => '/home/admedon/public_html/prestashop/themes/default/category-count.tpl',
      1 => 1386887160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129583644252aa396ee3c3c7-75555795',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'nb_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa396ee5fc47_62346911',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa396ee5fc47_62346911')) {function content_52aa396ee5fc47_62346911($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['category']->value->id==1||$_smarty_tpl->tpl_vars['nb_products']->value==0){?>
	<?php echo smartyTranslate(array('s'=>'There are no products in  this category'),$_smarty_tpl);?>

<?php }else{ ?>
	<?php if ($_smarty_tpl->tpl_vars['nb_products']->value==1){?>
		<?php echo smartyTranslate(array('s'=>'There is %d product.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }else{ ?>
		<?php echo smartyTranslate(array('s'=>'There are %d products.','sprintf'=>$_smarty_tpl->tpl_vars['nb_products']->value),$_smarty_tpl);?>

	<?php }?>
<?php }?><?php }} ?>
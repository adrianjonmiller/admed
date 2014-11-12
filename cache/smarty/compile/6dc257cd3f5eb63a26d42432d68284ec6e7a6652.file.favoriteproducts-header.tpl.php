<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:01
         compiled from "/home/admedon/public_html/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117567561540a3879efdc72-64217100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6dc257cd3f5eb63a26d42432d68284ec6e7a6652' => 
    array (
      0 => '/home/admedon/public_html/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1367907229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117567561540a3879efdc72-64217100',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a3879f17462_10046765',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a3879f17462_10046765')) {function content_540a3879f17462_10046765($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),false);?>
';
	var favorite_products_url_remove = '<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),false);?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>
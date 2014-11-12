<?php /* Smarty version Smarty-3.1.14, created on 2014-05-23 14:05:51
         compiled from "/home/admedon/public_html/6/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1457696886537f8dffedeae8-00715130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d09f5932cfad121fe4383da4f3826cb2427d0eb' => 
    array (
      0 => '/home/admedon/public_html/6/modules/favoriteproducts/views/templates/hook/favoriteproducts-header.tpl',
      1 => 1387394462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1457696886537f8dffedeae8-00715130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_537f8e0004cdf1_49748138',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f8e0004cdf1_49748138')) {function content_537f8e0004cdf1_49748138($_smarty_tpl) {?>
<script type="text/javascript">
	var favorite_products_url_add = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'add'),false));?>
';
	var favorite_products_url_remove = '<?php echo addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),false));?>
';
<?php if (isset($_GET['id_product'])){?>
	var favorite_products_id_product = '<?php echo intval($_GET['id_product']);?>
';
<?php }?> 
</script>
<?php }} ?>
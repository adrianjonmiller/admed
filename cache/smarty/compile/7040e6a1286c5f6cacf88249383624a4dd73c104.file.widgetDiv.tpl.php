<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:02
         compiled from "/home/admedon/public_html/modules/yotpo/tpl/widgetDiv.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1801286576540a387af1f718-55402399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7040e6a1286c5f6cacf88249383624a4dd73c104' => 
    array (
      0 => '/home/admedon/public_html/modules/yotpo/tpl/widgetDiv.tpl',
      1 => 1367907204,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1801286576540a387af1f718-55402399',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'yotpoAppkey' => 0,
    'yotpoDomain' => 0,
    'yotpoProductId' => 0,
    'yotpoProductModel' => 0,
    'yotpoProductName' => 0,
    'link' => 0,
    'yotpoProductImageUrl' => 0,
    'yotpoProductDescription' => 0,
    'yotpoProductBreadCrumbs' => 0,
    'yotpoLanguage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387b005c49_36480351',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387b005c49_36480351')) {function content_540a387b005c49_36480351($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?><div class="yotpo reviews" 
   data-appkey="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoAppkey']->value, 'htmlall', 'UTF-8');?>
"
   data-domain="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoDomain']->value, 'htmlall', 'UTF-8');?>
"
   data-product-id="<?php echo intval($_smarty_tpl->tpl_vars['yotpoProductId']->value);?>
"
   data-product-models="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoProductModel']->value, 'htmlall', 'UTF-8');?>
" 
   data-name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoProductName']->value, 'htmlall', 'UTF-8');?>
" 
   data-url="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['link']->value->getProductLink($_GET['id_product'],$_GET['id_product']['link_rewrite']), 'htmlall', 'UTF-8');?>
" 
   data-image-url="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoProductImageUrl']->value, 'htmlall', 'UTF-8');?>
" 
   data-description="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoProductDescription']->value, 'htmlall', 'UTF-8');?>
" 
   data-bread-crumbs="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoProductBreadCrumbs']->value, 'htmlall', 'UTF-8');?>
"
   data-lang="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['yotpoLanguage']->value, 'htmlall', 'UTF-8');?>
"></div>
<?php }} ?>
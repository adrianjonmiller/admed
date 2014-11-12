<?php /* Smarty version Smarty-3.1.13, created on 2014-05-23 14:10:03
         compiled from "/home/admedon/public_html/prestashop/themes/theme526/modules/productscategory/productscategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1859826410537f8efb977af8-76708676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2df86d085f5621f61d3e0f075c3d8aa4dd83d176' => 
    array (
      0 => '/home/admedon/public_html/prestashop/themes/theme526/modules/productscategory/productscategory.tpl',
      1 => 1393474386,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1859826410537f8efb977af8-76708676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryProducts' => 0,
    'categoryProduct' => 0,
    'link' => 0,
    'ProdDisplayPrice' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'middlePosition' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_537f8efbaf1a66_25050569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f8efbaf1a66_25050569')) {function content_537f8efbaf1a66_25050569($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/function.math.php';
if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
?><?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>0&&$_smarty_tpl->tpl_vars['categoryProducts']->value!==false){?>
<div id="blockproductscategory" class="clearfix">
	<h2 class="bordercolor"><?php echo count($_smarty_tpl->tpl_vars['categoryProducts']->value);?>
 <?php echo smartyTranslate(array('s'=>'other products in the same category:','mod'=>'productscategory'),$_smarty_tpl);?>
</h2>
	<div id="<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>5){?>productscategory<?php }else{ ?>productscategory_noscroll<?php }?>">
	<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>5){?><a id="productscategory_scroll_left" title="<?php echo smartyTranslate(array('s'=>'Previous','mod'=>'productscategory'),$_smarty_tpl);?>
" href="javascript:{}"><?php echo smartyTranslate(array('s'=>'Previous','mod'=>'productscategory'),$_smarty_tpl);?>
</a><?php }?>
	<div id="productscategory_list">
		<ul <?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>5){?>style="width: <?php echo smarty_function_math(array('equation'=>"width * nbImages - 20",'width'=>144,'nbImages'=>count($_smarty_tpl->tpl_vars['categoryProducts']->value)),$_smarty_tpl);?>
px"<?php }?>>
			<?php  $_smarty_tpl->tpl_vars['categoryProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['categoryProduct']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['categoryProduct']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['categoryProduct']->key => $_smarty_tpl->tpl_vars['categoryProduct']->value){
$_smarty_tpl->tpl_vars['categoryProduct']->_loop = true;
 $_smarty_tpl->tpl_vars['categoryProduct']->iteration++;
 $_smarty_tpl->tpl_vars['categoryProduct']->last = $_smarty_tpl->tpl_vars['categoryProduct']->iteration === $_smarty_tpl->tpl_vars['categoryProduct']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categoryProduct']['last'] = $_smarty_tpl->tpl_vars['categoryProduct']->last;
?>
			<li class="bordercolor<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['categoryProduct']['last']){?> item_last<?php }?>">
				<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],$_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['category'],$_smarty_tpl->tpl_vars['categoryProduct']->value['ean13']);?>
" class="lnk_img" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
"><img class="bordercolor" src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['id_image'],'medium_default');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
" /></a>
				<h5><a class="product_link" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['categoryProduct']->value['id_product'],$_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['category'],$_smarty_tpl->tpl_vars['categoryProduct']->value['ean13']);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['categoryProduct']->value['name'],15,'...'), 'htmlall', 'UTF-8');?>
</a></h5>
				<?php if ($_smarty_tpl->tpl_vars['ProdDisplayPrice']->value&&$_smarty_tpl->tpl_vars['categoryProduct']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
				<p><span class="price pricecolor"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['displayed_price']),$_smarty_tpl);?>
</span></p>
				<?php }?>
			</li>
			<?php } ?>
		</ul>
	</div>
	<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>5){?><a id="productscategory_scroll_right" title="<?php echo smartyTranslate(array('s'=>'Next','mod'=>'productscategory'),$_smarty_tpl);?>
" href="javascript:{}"><?php echo smartyTranslate(array('s'=>'Next','mod'=>'productscategory'),$_smarty_tpl);?>
</a><?php }?>
	</div>
	<script type="text/javascript">
		$('#productscategory_list').trigger('goto', [<?php echo $_smarty_tpl->tpl_vars['middlePosition']->value;?>
-3]);
	</script>
</div>
<?php }?><?php }} ?>
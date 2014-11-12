<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:23:14
         compiled from "/home/admedon/public_html/themes/dilecta/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1549380767540a37d2e890b7-87436826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05b5b77597db9abe997c9ac3c643ad8a8b64a0f2' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/modules/homefeatured/homefeatured.tpl',
      1 => 1408694716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1549380767540a37d2e890b7-87436826',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'product' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'link' => 0,
    'priceDisplay' => 0,
    'add_prod_display' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a37d2f039b3_52576942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a37d2f039b3_52576942')) {function content_540a37d2f039b3_52576942($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?><div class="block">



	<h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'homefeatured'),$_smarty_tpl);?>
</h4>

	<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value){?>

				

				<?php if (Configuration::get('dilecta_product_scroll_featured')=='0'&&Configuration::get('dilecta_product_scroll_featured')!=''){?><?php }else{ ?>

				<!-- Pagination -->

				

				<div class="pagination-product clearfix">

				

					<a href="#" class="prev-products" id="module_05_prev"></a>

					<a href="#" class="next-products" id="module_05_next"></a>

				

				</div>

								

				<script type="text/javascript">

					jQuery(function($){

						paginacja('module_05');

					});

				</script> 

				<?php }?>

				

				<!-- Content -->

				

				<!-- Products -->

				

				<div class="overflow-products clearfix" id="module_05">

				

					<div class="products-grid<?php if (Configuration::get('dilecta_general_status')=='1'){?> product-<?php echo Configuration::get('dilecta_product_full');?>
 grid-9-product-<?php echo Configuration::get('dilecta_product_column');?>
<?php }?>">

					

					<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value){
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>	

					<!-- Product -->

						

						<div>

							

							<div class="left">

							

								<!-- Image -->

								

								<div class="image"><?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['reduction']){?><div class="sale"><?php echo smartyTranslate(array('s'=>'Sale','mod'=>'homefeatured'),$_smarty_tpl);?>
</div><?php }?><?php }?><a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['link'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'html', 'UTF-8');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'html', 'UTF-8');?>
" width="152" height="152"/></a></div>

							

							</div>

							

							<div class="right">

								

								<div class="off-hover">

																											

									<div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['product']->value['link'];?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['name'], 'html', 'UTF-8');?>
</a></div>

									<?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>

									<div class="price"><span style="padding-right:20px;">From</span><?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value){?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
<?php }else{ ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['reduction']){?> <span class="price-old"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>
</span><?php }?></div>

									<?php }?>

								

								</div>

								

								<div class="on-hover">

								

									<!-- Add to cart -->

									

									<?php if (($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']==1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>	

									

										<?php if (($_smarty_tpl->tpl_vars['product']->value['quantity']>0||$_smarty_tpl->tpl_vars['product']->value['allow_oosp'])){?>						

											<a  href="<?php echo $_smarty_tpl->tpl_vars['product']->value['link'];?>
" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'homefeatured'),$_smarty_tpl);?>
"  class="ajax_add_to_cart_button add-to-cart" rel="ajax_id_product_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"></a>

										<?php }else{ ?>

											<a class="add-to-cart" href="<?php echo $_smarty_tpl->tpl_vars['product']->value['link'];?>
"></a>

										<?php }?>

									

									<?php }?>

									

								</div>

																					

							</div>



						</div>

						

						<!-- End Product -->

						<?php } ?>

				

					</div>

				

					<!-- Products -->

				

				</div>

				

	 <?php }?>



</div>

<?php }} ?>
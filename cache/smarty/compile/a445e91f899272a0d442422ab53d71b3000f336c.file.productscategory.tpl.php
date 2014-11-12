<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:02
         compiled from "/home/admedon/public_html/themes/dilecta/modules/productscategory/productscategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1803673124540a387accde71-31462850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a445e91f899272a0d442422ab53d71b3000f336c' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/modules/productscategory/productscategory.tpl',
      1 => 1367907316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1803673124540a387accde71-31462850',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387ad13516_36619358',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387ad13516_36619358')) {function content_540a387ad13516_36619358($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?>

<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>0&&$_smarty_tpl->tpl_vars['categoryProducts']->value!==false){?>

<div class="block">

	<h4 class="title_block"><?php echo count($_smarty_tpl->tpl_vars['categoryProducts']->value);?>
 <?php echo smartyTranslate(array('s'=>'other products in the same category:','mod'=>'productscategory'),$_smarty_tpl);?>
</h4>
				
				<!-- Pagination -->
				
				<div class="pagination-product clearfix">
				
					<a href="#" class="prev-products" id="module_150_prev"></a>
					<a href="#" class="next-products" id="module_150_next"></a>
				
				</div>
								
				<script type="text/javascript">
					jQuery(function($){
						paginacja('module_150');
					});
				</script> 
				
				<!-- Content -->
				
				<!-- Products -->
				
				<div class="overflow-products clearfix" id="module_150">
				
					<div class="products-grid<?php if (Configuration::get('dilecta_general_status')=='1'){?> product-<?php echo Configuration::get('dilecta_product_full');?>
 grid-9-product-<?php echo Configuration::get('dilecta_product_column');?>
<?php }?>">
					
					<?php  $_smarty_tpl->tpl_vars['categoryProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryProduct']->key => $_smarty_tpl->tpl_vars['categoryProduct']->value){
$_smarty_tpl->tpl_vars['categoryProduct']->_loop = true;
?>
					<!-- Product -->
						
						<div>
							
							<div class="left">
							
								<!-- Image -->
								
								<div class="image"><a href="<?php echo $_smarty_tpl->tpl_vars['categoryProduct']->value['link'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['categoryProduct']->value['link_rewrite'],$_smarty_tpl->tpl_vars['categoryProduct']->value['id_image'],'home_default');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
" /></a></div>
							
							</div>
							
							<div class="right">
								
								<div class="off-hover" style="display: block !important">
																											
									<div class="name"><a href="<?php echo $_smarty_tpl->tpl_vars['categoryProduct']->value['link'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryProduct']->value['name']);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['categoryProduct']->value['name'],15,'...'), 'htmlall', 'UTF-8');?>
</a></div>
									<?php if ($_smarty_tpl->tpl_vars['ProdDisplayPrice']->value&&$_smarty_tpl->tpl_vars['categoryProduct']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value){?>
									<div class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['categoryProduct']->value['displayed_price']),$_smarty_tpl);?>
</div>
									<?php }?>
								
								</div>
																					
							</div>

						</div>
						
						<!-- End Product -->
						<?php } ?>
				
					</div>
				
					<!-- Products -->
				
				</div>
				
</div>
<?php }?>
<?php }} ?>
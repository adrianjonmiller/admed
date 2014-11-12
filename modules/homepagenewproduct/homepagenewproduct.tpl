<div class="block">

	<h4 class="title_block">{l s='New products' mod='homepagenewproduct'}</h4>
	{if isset($products) AND $products}
				
				{if Configuration::get('dilecta_product_scroll_new') == '0' && Configuration::get('dilecta_product_scroll_new') != ''}{else}
				<!-- Pagination -->
				
				<div class="pagination-product clearfix">
				
					<a href="#" class="prev-products" id="module_07_prev"></a>
					<a href="#" class="next-products" id="module_07_next"></a>
				
				</div>
								
				<script type="text/javascript">
					jQuery(function($){
						paginacja('module_07');
					});
				</script> 
				{/if}
				
				<!-- Content -->
				
				<!-- Products -->
				
				<div class="overflow-products clearfix" id="module_07">
				
					<div class="products-grid{if Configuration::get('dilecta_general_status') == '1'} product-{Configuration::get('dilecta_product_full')} grid-9-product-{Configuration::get('dilecta_product_column')}{/if}">
					
					{foreach from=$products item=product name=homenewProducts}	
					<!-- Product -->
						
						<div>
							
							<div class="left">
							
								<!-- Image -->
								
								<div class="image">{if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}{if isset($product.reduction) && $product.reduction}<div class="sale">{l s='Sale' mod='homepagenewproduct'}</div>{/if}{/if}<a href="{$product.link}" title="{$product.name|escape:html:'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.name|escape:html:'UTF-8'}" /></a></div>
							
							</div>
							
							<div class="right">
								
								<div class="off-hover">
																											
									<div class="name"><a href="{$product.link}">{$product.name|escape:html:'UTF-8'}</a></div>
									{if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
									<div class="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}{if isset($product.reduction) && $product.reduction} <span class="price-old">{convertPrice price=$product.price_without_reduction}</span>{/if}</div>
									{/if}
								
								</div>
								
								<div class="on-hover">
								
									<!-- Add to cart -->
									
									{if ($product.id_product_attribute == 0 OR (isset($add_prod_display) AND ($add_prod_display == 1))) AND $product.available_for_order AND !isset($restricted_country_mode) AND $product.minimal_quantity == 1 AND $product.customizable != 2 AND !$PS_CATALOG_MODE}	
									
										{if ($product.quantity > 0 OR $product.allow_oosp)}						
											<a rel="ajax_id_product_{$product.id_product}" href="{$link->getPageLink('cart')}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" title="{l s='Add to cart' mod='homefeatured'}"  class="ajax_add_to_cart_button add-to-cart"></a>
										{else}
											<a class="add-to-cart" href="{$product.link}"></a>
										{/if}
									
									{/if}
									
								</div>
																					
							</div>

						</div>
						
						<!-- End Product -->
						{/foreach}
				
					</div>
				
					<!-- Products -->
				
				</div>
				
	 {/if}

</div>

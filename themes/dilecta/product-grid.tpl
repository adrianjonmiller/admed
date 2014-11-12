{if isset($products)}	
  
<div class="overflow-products clearfix">

  <div class="products-grid{if Configuration::get('dilecta_general_status') == '1'} product-{Configuration::get('dilecta_product_full')} grid-9-product-{Configuration::get('dilecta_product_column')}{/if}">
    {foreach from=$products item=product name=products}

					<!-- Product -->
						
						<div>

							<div class="left">
								
								<div class="image">
	
								{if isset($comparator_max_item) && $comparator_max_item}
								<div class="wish-list"><input type="checkbox" class="comparator" id="comparator_item_{$product.id_product}" value="comparator_item_{$product.id_product}" {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked="checked"{/if} /></div>
								{/if}
								
								<a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.legend|escape:'htmlall':'UTF-8'}" /></a></div>
							
							</div>
													
							<div class="right">
							
								<div class="off-hover">

									<div class="name"><a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}</a></div>
									
						        {if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
						        
							        {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
								        <div class="price">
								        
								        {if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
								        		
								        		{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
								        		{if isset($product.reduction) && $product.reduction} <span class="price-old">{convertPrice price=$product.price_without_reduction}</span>{/if}
								        		
								        {else}
								        
								        	{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}
								        {/if}

								        </div>
							        {/if}
						        
						        {/if}
						        
						      </div>
						      
						      <!-- END OFF HOVER -->
						      
								<div class="on-hover">
								
									<!-- Add to cart -->
									
						        {if ($product.allow_oosp || $product.quantity > 0)}
						        
						        		{if isset($static_token)}
														
										<a rel="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}" title="{l s='Add to cart'}" class="ajax_add_to_cart_button add-to-cart"></a>
										
										{else}
										
										<a rel="ajax_id_product_{$product.id_product|intval}" href="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}", false)}" title="{l s='Add to cart'}" class="ajax_add_to_cart_button add-to-cart"></a>
										
										{/if}
										
									{else}
										<a class="add-to-cart" href="{$product.link}"></a>
								  	{/if}
									
								</div>

							</div>

						</div>
						
						<!-- End Product -->

						
    {/foreach}
  </div>	
</div>
{/if}

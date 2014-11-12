{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

{if count($categoryProducts) > 0 && $categoryProducts !== false}

<div class="block">

	<h4 class="title_block">{$categoryProducts|@count} {l s='other products in the same category:' mod='productscategory'}</h4>
				
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
				
					<div class="products-grid{if Configuration::get('dilecta_general_status') == '1'} product-{Configuration::get('dilecta_product_full')} grid-9-product-{Configuration::get('dilecta_product_column')}{/if}">
					
					{foreach from=$categoryProducts item='categoryProduct' name=categoryProduct}
					<!-- Product -->
						
						<div>
							
							<div class="left">
							
								<!-- Image -->
								
								<div class="image"><a href="{$categoryProduct.link}" title="{$categoryProduct.name|htmlspecialchars}"><img src="{$link->getImageLink($categoryProduct.link_rewrite, $categoryProduct.id_image, 'home_default')}" alt="{$categoryProduct.name|htmlspecialchars}" /></a></div>
							
							</div>
							
							<div class="right">
								
								<div class="off-hover" style="display: block !important">
																											
									<div class="name"><a href="{$categoryProduct.link}" title="{$categoryProduct.name|htmlspecialchars}">{$categoryProduct.name|truncate:15:'...'|escape:'htmlall':'UTF-8'}</a></div>
									{if $ProdDisplayPrice AND $categoryProduct.show_price == 1 AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
									<div class="price">{convertPrice price=$categoryProduct.displayed_price}</div>
									{/if}
								
								</div>
																					
							</div>

						</div>
						
						<!-- End Product -->
						{/foreach}
				
					</div>
				
					<!-- Products -->
				
				</div>
				
</div>
{/if}

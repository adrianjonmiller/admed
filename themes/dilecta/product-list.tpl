{if isset($products)}	

<div id="product_list">

  <div class="product-list">

    {foreach from=$products item=product name=products}



					<!-- Product -->

						

						<div>

						

							<div class="left">

								

								<div class="image">

								

								<a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.legend|escape:'htmlall':'UTF-8'}" /></a></div>



								<div class="name">

								

							  		<a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}</a>

									

									<p>{$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}</p>

      		

								</div>

							

							</div>

							

							<div class="right">

							

								<div class="name"><a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}</a></div>



					        {if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}

					        

						        {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}

							        <div class="price">From

							        

							        {if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}

							        

											{if isset($product.reduction) && $product.reduction} <span class="price-old">{convertPrice price=$product.price_without_reduction}</span>{/if}

							        		{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}

							        

							        {else}

							        

							        	{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}

							        {/if}



							        </div>

						        {/if}

					        

					        {/if}

								

					        {if ($product.allow_oosp || $product.quantity > 0)}

					        

					        		{if isset($static_token)}

													

									<div class="cart"><a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{l s='Add to cart'}" class="ajax_add_to_cart_button" rel="ajax_id_product_{$product.id_product|intval}"></a></div>

									

									{else}

									

									<div class="cart"><a rel="ajax_id_product_{$product.id_product|intval}" href="ajax_id_product_{$product.id_product|intval}" href="{$link->getPageLink('cart',false, NULL, "add&amp;id_product={$product.id_product|intval}", false)}" title="{l s='Add to cart'}" class="ajax_add_to_cart_button"></a></div>

									

									{/if}

							  

							  	{/if}

							  									

								{if isset($comparator_max_item) && $comparator_max_item}

								<div class="wish-list"><input type="checkbox" class="comparator" id="comparator_item_{$product.id_product}" value="comparator_item_{$product.id_product}" {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked="checked"{/if} /> <label for="comparator_item_{$product.id_product}">{l s='Select to compare'}</label></div>

								{/if}

																

							</div>

							

							<p class="clears"></p>



						</div>

						

						<!-- End Product -->



						

    {/foreach}

  </div>	



  

<div class="overflow-products clearfix" style="display:none">



  <div class="products-grid{if Configuration::get('dilecta_general_status') == '1'} product-{Configuration::get('dilecta_product_full')} grid-9-product-{Configuration::get('dilecta_product_column')}{/if}">

    {foreach from=$products item=product name=products}



					<!-- Product -->

						

						<div>



							<div class="left">

								

								<div class="image">

	

								{if isset($comparator_max_item) && $comparator_max_item}

								<div class="wish-list"><input type="checkbox" class="comparator" id="comparator_item_{$product.id_product}" value="comparator_item_{$product.id_product}" {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked="checked"{/if} /></div>

								{/if}

								

								<a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.name|escape:'htmlall':'UTF-8'}" /></a></div>

							

							</div>

													

							<div class="right">

							

								<div class="off-hover">



									<div class="name"><a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{$product.name|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}</a></div>

									

						        {if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}

						        

							        {if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}

								        <div class="price">From

								        

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

														

										<a href="{$product.link|escape:'htmlall':'UTF-8'}" title="{l s='Add to cart'}" class="ajax_add_to_cart_button add-to-cart"></a>

										

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

</div>

{/if}



<script type="text/javascript"><!--

function display(view) {



	if (view == 'list') {

		$('.overflow-products').css("display", "none");

		$('.product-list').css("display", "block");



		$('.display').html('<div class="active-display-list"></div><div class="display-grid" onclick="display(\'grid\');"></div>');

		

		$.cookie('display', 'list'); 

	} else {

	

		$('.overflow-products').css("display", "block");

		$('.product-list').css("display", "none");

					

		$('.display').html('<div class="display-list" onclick="display(\'list\');"></div><div class="active-display-grid"></div>');

		

		$.cookie('display', 'grid');

	}

}



$(document).ready(function () {



	view = $.cookie('display');

	

	if (view) {

		display(view);

	} else {

		display('{if Configuration::get('dilecta_default_list_grid') == '1' && Configuration::get('dilecta_general_status') == '1'}grid{else}list{/if}');

	}



});



//--></script> 


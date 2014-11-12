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

{*************************************************************************************************************************************}
{* IMPORTANT : If you change some data here, you have to report these changes in the ./blockcart-json.js (to let ajaxCart available) *}
{*************************************************************************************************************************************}
{if $ajax_allowed}
<script type="text/javascript">
var CUSTOMIZE_TEXTFIELD = {$CUSTOMIZE_TEXTFIELD};
var img_dir = '{$img_dir}';
</script>
{/if}
<script type="text/javascript">
var customizationIdMessage = '{l s='Customization #' mod='blockcart' js=1}';
var removingLinkText = '{l s='remove this product from my cart' mod='blockcart' js=1}';
var freeShippingTranslation = '{l s='Free shipping!' mod='blockcart' js=1}';
var freeProductTranslation = '{l s='Free!' mod='blockcart' js=1}';
var delete_txt = '{l s='Delete' mod='blockcart' js=1}';
var success_text = '{l s='Success: You have added' mod='blockcart'}';
var success_text1 = '{l s='product' mod='blockcart'}';
var success_text2 = '{l s='to your shopping cart!' mod='blockcart'}';
</script>


<!-- MODULE Block cart -->
<div id="cart_block">
	<!-- Cart heading --><div class="cart-heading"><span class="ajax_cart_quantity">{$cart_qties}</span></div>
	<div class="block_content">
		<div class="content-arrow"></div>

	<!-- block list of products -->
	<div id="cart_block_list" class="{if isset($colapseExpandStatus) && $colapseExpandStatus eq 'expanded' || !$ajax_allowed || !isset($colapseExpandStatus)}expanded{else}collapsed{/if}">
	{if $products}
		<dl class="products">
		{foreach from=$products item='product' name='myLoop'}
			{assign var='productId' value=$product.id_product}
			{assign var='productAttributeId' value=$product.id_product_attribute}
			<dt id="cart_block_product_{$product.id_product}_{if $product.id_product_attribute}{$product.id_product_attribute}{else}0{/if}_{if $product.id_address_delivery}{$product.id_address_delivery}{else}0{/if}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
				<div class="product-images"><a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category)}"><img class="cart_product_photo" src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')}" alt=""  title="{$product.name|escape:htmlall:'UTF-8'|truncate:20}" width="45" height="45"/></a></div>
				<a class="cart_block_product_name" href="{$link->getProductLink($product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)}" title="{$product.name|escape:html:'UTF-8'}">{$product.name|truncate:13:'...'|escape:html:'UTF-8'}</a>
				<span class="quantity-formated"><span class="quantity">{$product.cart_quantity}</span>x</span>

				<span class="price">
					{if $product.total > 0}
						{if $priceDisplay == $smarty.const.PS_TAX_EXC}{displayWtPrice p="`$product.total`"}{else}{displayWtPrice p="`$product.total_wt`"}{/if}
					{else}
						<b>{l s='Free!' mod='blockcart'}</b>
					{/if}
				</span>
				<span class="remove_link">{if !isset($customizedDatas.$productId.$productAttributeId) && ($product.total > 0)}<a rel="nofollow" class="ajax_cart_block_remove_link" href="{$link->getPageLink('cart', true, NULL, "delete&amp;id_product={$product.id_product}&amp;ipa={$product.id_product_attribute}&amp;id_address_delivery={$product.id_address_delivery}&amp;token={$static_token}", true)}" title="{l s='remove this product from my cart' mod='blockcart'}">&nbsp;</a>{/if}</span>
			</dt>
			{if isset($product.attributes_small)}
			<dd id="cart_block_combination_of_{$product.id_product}{if $product.id_product_attribute}_{$product.id_product_attribute}{/if}_{$product.id_address_delivery|intval}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
				<a href="{$link->getProductLink($product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)}" title="{l s='Product detail' mod='blockcart'}">{$product.attributes_small}</a>
			{/if}

			<!-- Customizable datas -->
			{if isset($customizedDatas.$productId.$productAttributeId[$product.id_address_delivery])}
				{if !isset($product.attributes_small)}<dd id="cart_block_combination_of_{$product.id_product}_{if $product.id_product_attribute}{$product.id_product_attribute}{else}0{/if}_{if $product.id_address_delivery}{$product.id_address_delivery}{else}0{/if}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">{/if}
				<ul class="cart_block_customizations" id="customization_{$productId}_{$productAttributeId}">
					{foreach from=$customizedDatas.$productId.$productAttributeId[$product.id_address_delivery] key='id_customization' item='customization' name='customizations'}
						<li name="customization">
							<div class="deleteCustomizableProduct" id="deleteCustomizableProduct_{$id_customization|intval}_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$product.id_address_delivery|intval}"><a class="ajax_cart_block_remove_link" href="{$link->getPageLink('cart', true, NULL, "delete&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_customization={$id_customization}&amp;token={$static_token}", true)}" rel="nofollow"> </a></div>
							<span class="quantity-formated"><span class="quantity">{$customization.quantity}</span>x</span>{if isset($customization.datas.$CUSTOMIZE_TEXTFIELD.0)}
							{$customization.datas.$CUSTOMIZE_TEXTFIELD.0.value|escape:html:'UTF-8'|replace:"<br />":" "|truncate:28}
							{else}
							{l s='Customization #%d:' sprintf=$id_customization|intval mod='blockcart'}
							{/if}
						</li>
					{/foreach}
				</ul>
				{if !isset($product.attributes_small)}</dd>{/if}
			{/if}

			{if isset($product.attributes_small)}</dd>{/if}

		{/foreach}
		</dl>
	{/if}
		<p {if $products}class="hidden"{/if} id="cart_block_no_products" style="padding:30px">{l s='No products' mod='blockcart'}</p>
	{if $discounts|@count > 0}
		<table id="vouchers">
			<tbody>
					{foreach from=$discounts item=discount}
						{if $discount.value_real > 0}
						<tr class="bloc_cart_voucher" id="bloc_cart_voucher_{$discount.id_discount}">
							<td class="quantity">1x</td>
							<td class="name" title="{$discount.description}">{$discount.name|cat:' : '|cat:$discount.description|truncate:18:'...'|escape:'htmlall':'UTF-8'}</td>
							<td class="price">-{if $priceDisplay == 1}{convertPrice price=$discount.value_tax_exc}{else}{convertPrice price=$discount.value_real}{/if}</td>
							<td class="delete">
								{if strlen($discount.code)}
									<a class="delete_voucher" href="{$link->getPageLink('$order_process', true)}?deleteDiscount={$discount.id_discount}" title="{l s='Delete' mod='blockcart'}" rel="nofollow"><img src="{$img_dir}icon/delete.gif" alt="{l s='Delete' mod='blockcart'}" class="icon" /></a>
								{/if}
							</td>
						</tr>
						{/if}
					{/foreach}
			</tbody>
		</table>
		{/if}
		
<div class="saldo-action">

	<div class="saldo">
	
		<ul>
		
			<li><p>{l s='Shipping' mod='blockcart'}</p><span id="cart_block_shipping_cost" class="price ajax_cart_shipping_cost">{$shipping_cost}</span></li>
			{if $show_wrapping}
				{assign var='cart_flag' value='Cart::ONLY_WRAPPING'|constant}
				<li><p>{l s='Wrapping' mod='blockcart'}</p><span id="cart_block_wrapping_cost" class="price cart_block_wrapping_cost">{if $priceDisplay == 1}{convertPrice price=$cart->getOrderTotal(false, $cart_flag)}{else}{convertPrice price=$cart->getOrderTotal(true, $cart_flag)}{/if}</span></li>
			{/if}
			{if $show_tax && isset($tax_cost)}
				<li><p>{l s='Tax' mod='blockcart'}</p><span id="cart_block_tax_cost" class="price ajax_cart_tax_cost">{$tax_cost}</span></li>
			{/if}
			<li><p>{l s='Total' mod='blockcart'}</p><span id="cart_block_total" class="price ajax_block_cart_total">{$total}</span></li>
		
		</ul>
	
	</div>

		{if $use_taxes && $display_tax_label == 1 && $show_tax}
			{if $priceDisplay == 0}
				<p id="cart-price-precisions">
					{l s='Prices are tax included' mod='blockcart'}
				</p>
			{/if}
			{if $priceDisplay == 1}
				<p id="cart-price-precisions">
					{l s='Prices are tax excluded' mod='blockcart'}
				</p>
			{/if}
		{/if}
		
	<div class="action">
	
			{if $order_process == 'order'}<a href="{$link->getPageLink("$order_process", true)}" class="button button-two" title="{l s='View my shopping cart' mod='blockcart'}" rel="nofollow">{l s='Cart' mod='blockcart'}</a>{/if}
			<a href="{$link->getPageLink("$order_process", true)}" id="button_order_cart" class="button" title="{l s='Check out' mod='blockcart'}" rel="nofollow"><span></span>{l s='Check out' mod='blockcart'}</a>
			
	</div>

		
</div>
		
		
	</div>
	</div>
</div>
<!-- /MODULE Block cart -->


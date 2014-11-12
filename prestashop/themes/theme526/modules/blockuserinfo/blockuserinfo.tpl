<!-- Block user information module HEADER -->
<ul id="header_user">
	{if !$PS_CATALOG_MODE}
	<li id="shopping_cart">
		<a href="{$link->getPageLink("$order_process", true)}" title="{l s='Your Shopping Cart' mod='blockuserinfo'}"><b>{l s='Cart:' mod='blockuserinfo'}</b>
		<span class="ajax_cart_quantity{if $cart_qties == 0} hidden{/if}">{$cart_qties}</span>
		<span class="ajax_cart_product_txt{if $cart_qties != 1} hidden{/if}">{l s='product' mod='blockuserinfo'}</span>
		<span class="ajax_cart_product_txt_s{if $cart_qties < 2} hidden{/if}">{l s='products' mod='blockuserinfo'}</span>
		<span class="ajax_cart_no_product{if $cart_qties > 0} hidden{/if}">{l s='(empty)' mod='blockuserinfo'}</span>
		</a>
	</li>
	{/if}
	<li id="user_info">
		{l s='Welcome' mod='blockuserinfo'}
		{if $logged}
			<a class="account" href="{$link->getPageLink('my-account', true)}">{$cookie->customer_firstname} {$cookie->customer_lastname}</a>
			(&nbsp;<a class="logout" href="{$link->getPageLink('index', true, NULL, "mylogout")}" title="{l s='Log me out' mod='blockuserinfo'}">{l s='Log out' mod='blockuserinfo'}</a>&nbsp;)
		{else}
			(&nbsp;<a class="login" href="{$link->getPageLink('my-account', true)}">{l s='Log in' mod='blockuserinfo'}</a>&nbsp;)
		{/if}
	</li>
</ul>
<!-- /Block user information module HEADER -->
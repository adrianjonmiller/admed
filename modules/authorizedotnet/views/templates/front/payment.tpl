{if $adn_payment_page == 0}
	<p class="payment_module" id="adn_container">
		<a href="{if $active}{$this_validation_link}{else}javascript:alert('{l s='The Merchant has not configures this payment method yet, Order will not be valid' mod='authorizedotnet'}');location.href='{$this_path_ssl}validation.php'{/if}" title="{l s='Pay with' mod='authorizedotnet'} {$adn_cards}">
			<img src="{$this_path}img/combo.jpg" alt="{$adn_cards}" />
			{l s='Pay with' mod='authorizedotnet'} {$adn_cards}
			<br style="clear:both;" />
		</a>
	</p>
{else}
<style>
#adn_container {ldelim}
	{if $adn_psv < 1.5}
		border: 1px solid #595A5E;
	{/if}
	padding: 0 10px 10px 0!important;
	margin: 0 0 0.7em 0.7em!important;
	overflow: hidden;
{rdelim}
</style>
	<p class="payment_module" id="adn_container">
		<iframe src='{$this_path}{$adn_filename}.php?content_only=1' seamless border="0" style = "border:0;" height="300" width="100%"></iframe>
	</p>
{/if}

{if $pppro_payment_page == 0}
<p class="payment_module" id="pppro_container">
	<a href="{if $active}{$this_validation_link}{else}javascript:alert('{l s='The Merchant has not configured this payment method yet, Order will not be valid' mod='paypalpro'}');location.href='{$this_validation_link}'{/if}" title="{l s='Pay with' mod='paypalpro'} {$pppro_cards}">
		<img src="{$this_path}img/combo.jpg" alt="{$pppro_cards}" />
		{l s='Pay with' mod='paypalpro'} {$pppro_cards}
		<br style="clear:both;" />
	</a>
</p>
{else}
    <style>
    #pppro_container {ldelim}
            {if $pppro_psv < 1.5}
                    border: 1px solid #595A5E;
            {/if}
            padding: 0 10px 10px 0!important;
            margin: 0 0 0.7em 0.7em!important;
            overflow: hidden;
    {rdelim}
    </style>
    <p class="payment_module" id="pppro_container">
            <iframe src='{$this_path}validation.php?content_only=1' seamless border="0" style = "border:0;" height="{if $pppro_psv < 1.5}300{else}610{/if}" width="100%"></iframe>
    </p>
{/if}
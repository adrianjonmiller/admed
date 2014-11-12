<!-- MODULE Block contact infos -->
<div id="block_contact_infos">
	<h4>{l s='Contact us' mod='blockcontactinfos'}</h4>
	<ul>
		{if $blockcontactinfos_company != ''}<li class="contact_infos_company"><strong>{$blockcontactinfos_company|escape:'htmlall':'UTF-8'}</strong></li>{/if}
		{if $blockcontactinfos_address != ''}<li class="contact_infos_address">{$blockcontactinfos_address}</li>{/if}
		{if $blockcontactinfos_phone != ''}<li class="contact_infos_phone">{l s='Tel:' mod='blockcontactinfos'} {$blockcontactinfos_phone|escape:'htmlall':'UTF-8'}</li>{/if}
		{if $blockcontactinfos_email != ''}<li class="contact_infos_email">{l s='Email:' mod='blockcontactinfos'} {mailto address=$blockcontactinfos_email|escape:'htmlall':'UTF-8' encode="hex"}</li>{/if}
	</ul>
</div>
<!-- /MODULE Block contact infos -->
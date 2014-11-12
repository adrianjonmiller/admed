
</div>
	

		<!-- Copyright -->
		
		<div class="copyright clearfix">
		
			{if isset($payment_status) && $payment_status == 0}
			
			<ul>
			
				<li>{if isset($image_url)}<a href="{$image_url}">{/if}<img src="modules/blockcopyright/{$payment_image}" alt="Payment images" />{if isset($image_url)}</a>{/if}</li>
			
			</ul>
			
			{/if}
						
			<p style="float:left">{l s=$copyright mod='blockcopyright'}</p>
			{if $page_name==index or $page_name==category}<p style="float:right"><a href="http://dh42.com/prestashop/prestashop-support/">prestashop support by dh42</a></p>{/if}
		</div>
		
		<!-- End copyright -->
		
<div>
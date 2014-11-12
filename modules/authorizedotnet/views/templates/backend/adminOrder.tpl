<br />
<fieldset {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
	<legend><img src="../modules/authorizedotnet/logo.gif"> {l s='Authorize Refund Transaction'}</legend>
	<div id="refund_order_details" {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
		
	</div>
</fieldset>

{if ($isCanCapture)}
	<br />
	<fieldset {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
		<legend><img src="../modules/authorizedotnet/logo.gif"> {l s='Authorize Capture Transaction'}</legend>
		<div id="capture_order_details" {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
			
		</div>	
	</fieldset>
{/if}
	<script type="text/javascript">
		var baseDir = '{$module_basedir}';
		function search_orders(type)
		{
			// var type = 2;
			var orderId = {$order_id};

			if (type == 1)
			{
				$.ajax({
					type: "POST",
					url: baseDir + "authorizedotnet-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang={$cookie->id_lang}&id_employee={$cookie->id_employee}&type="+ type + "&secure_key={$_adn_secure_key}",
					success: function(html){ $("#capture_order_details").html(html); },
					error: function() { alert("ERROR:");  }
				});
			}



			if (type == 2)
			{
				$.ajax({
					type: "POST",
					url: baseDir + "authorizedotnet-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang={$cookie->id_lang}&id_employee={$cookie->id_employee}&type="+ type + "&secure_key={$_adn_secure_key}",
					success: function(html){ $("#refund_order_details").html(html); },
					error: function() { alert("ERROR:"); }
				});
			}
		}
	
		$(document).ready(function() {
				search_orders(2);
			{if ($isCanCapture)}
				search_orders(1);
			{/if}
		});
	</script>

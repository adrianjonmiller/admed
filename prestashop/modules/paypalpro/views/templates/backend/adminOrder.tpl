<br />
<fieldset {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
	<legend><img src="../modules/paypalpro/logo.gif"> {l s='PaypalPro Refund Transaction'}</legend>
	<div id="refund_order_details" {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
		
	</div>
</fieldset>

{if ($isCanCapture)}
	<br />
	<fieldset {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
		<legend><img src="../modules/paypalpro/logo.gif"> {l s='PaypalPro Capture Transaction'}</legend>
		<div id="capture_order_details" {if ($ps_version < 1.5)}  style="width: 400px;"  {/if}>
			
		</div>	
	</fieldset>
{/if}
	<script type="text/javascript">
		var baseDir = '{$module_basedir}';
		function search_orders(type)
		{ldelim}
			// var type = 2;
			var orderId = {$order_id};

			if (type == 1)
			{ldelim}
				$.ajax({ldelim}
					type: "POST",
					url: baseDir + "paypalpro-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang={$cookie->id_lang}&id_employee={$cookie->id_employee}&type="+ type + "&secure_key={$_pppro_secure_key}",
					success: function(html){ldelim} $("#capture_order_details").html(html); {rdelim},
					error: function() {ldelim} alert("ERROR:");  {rdelim}
				{rdelim});
			{rdelim}



			if (type == 2)
			{ldelim}
				$.ajax({ldelim}
					type: "POST",
					url: baseDir + "paypalpro-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang={$cookie->id_lang}&id_employee={$cookie->id_employee}&type="+ type + "&secure_key={$_pppro_secure_key}",
					success: function(html){ldelim} $("#refund_order_details").html(html); {rdelim},
					error: function() {ldelim} alert("ERROR:"); {rdelim}
				{rdelim});
			{rdelim}
		{rdelim}
	
		$(document).ready(function() {
				search_orders(2);
			{if ($isCanCapture)}
				search_orders(1);
			{/if}
		});
	</script>

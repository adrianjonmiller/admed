{if !$content_only}



				</div>

							

		{$grid_left = 3}

		{if $page_name == 'product' && Configuration::get('dilecta_width_product') == '1'}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'search' && Configuration::get('dilecta_width_search') == '1'}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'prices-drop' && Configuration::get('dilecta_width_prices_drop') == '1'}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'new-products' && Configuration::get('dilecta_width_new_products') == '1'}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'best-sales' && Configuration::get('dilecta_width_best_sales') == '1'}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'manufacturer' && Configuration::get('dilecta_width_manufacturer') == '1'}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'supplier' && Configuration::get('dilecta_width_supplier') == '1'}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'index'}{$grid_left = '3 hidden'}{/if}

								

		{if Configuration::get('dilecta_column_position') == '1' && Configuration::get('dilecta_general_status') == '1'}

		<div id="left_column" class="grid-{$grid_left} float-left">

			{$HOOK_LEFT_COLUMN}

		</div>

		{/if}

								

	</section>



	<!-- Footer -->

			

	<footer>



		<div class="set-size clearfix">

		

			<div class="footer-navigation clearfix">

			

					{$HOOK_FOOTER}

			

			</div>

			

		</div>

			

	</footer>

			

	<!-- End Footer -->

	

	<div id="toTop"></div>

			

{/if}
{literal}
<!--clicky -->
<script type="text/javascript">
var clicky_site_ids = clicky_site_ids || [];
clicky_site_ids.push(100602948);
(function() {
  var s = document.createElement('script');
  s.type = 'text/javascript';
  s.async = true;
  s.src = '//static.getclicky.com/js';
  ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
})();
</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100602948ns.gif" /></p></noscript>


{/literal}
</body>

</html>


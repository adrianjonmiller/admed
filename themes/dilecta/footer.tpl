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
</body>

</html>


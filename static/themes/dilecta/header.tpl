<!DOCTYPE html>

<!--[if IE 7]>                  <html class="ie7 no-js"  dir="ltr" lang="en" xmlns:fb="http://ogp.me/ns/fb#">     <![endif]-->

<!--[if lte IE 8]>              <html class="ie8 no-js"  dir="ltr" lang="en" xmlns:fb="http://ogp.me/ns/fb#">    <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" dir="ltr" lang="en" xmlns:fb="http://ogp.me/ns/fb#">  <!--<![endif]-->

<head>

	<title>{$meta_title|escape:'htmlall':'UTF-8'}</title>

	{if isset($meta_description) AND $meta_description}

	<meta name="description" content="{$meta_description|escape:html:'UTF-8'}" />

	{/if}

	{if isset($meta_keywords) AND $meta_keywords}

	<meta name="keywords" content="{$meta_keywords|escape:html:'UTF-8'}" />

	{/if}

	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

	<meta http-equiv="content-language" content="{$meta_language}" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />

	<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />

	<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />

	<script type="text/javascript">

		var baseDir = '{$content_dir}';

		var baseUri = '{$base_uri}';

		var static_token = '{$static_token}';

		var token = '{$token}';

		var priceDisplayPrecision = {$priceDisplayPrecision*$currency->decimals};

		var priceDisplayMethod = {$priceDisplay};

		var roundMode = {$roundMode};

	</script>

		

	<!--Google Webfont -->

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css">

	<!-- CSS -->

	<link href="{$css_dir}stylesheet.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="{$css_dir}carousel.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="{$css_dir}jquery.jqzoom.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="{$css_dir}slider/settings.css" media="screen" />

	

	{if isset($css_files)}

		{foreach from=$css_files key=css_uri item=media}

		<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />

		{/foreach}

	{/if}

	

	<!-- Javascript -->

	{if isset($js_files)}

		{foreach from=$js_files item=js_uri}

		<script type="text/javascript" src="{$js_uri}"></script>

		{/foreach}

	{/if}

	<script type="text/javascript" src="{$js_dir}slider/jquery.themepunch.plugins.min.js"></script>

	<script type="text/javascript" src="{$js_dir}slider/jquery.themepunch.revolution.min.js"></script>

	<script type="text/javascript"> var column = 1; {if Configuration::get('dilecta_general_status') == '1' && Configuration::get('dilecta_column_navigation') > 0}var column = {Configuration::get('dilecta_column_navigation')};{/if} </script>

	<script type="text/javascript" src="{$js_dir}jquery.jqzoom.js"></script>

	<script type="text/javascript" src="{$js_dir}jquery-workarounds.js"></script>

	<script type="text/javascript" src="{$js_dir}jquery.tweet.js"></script> 

	<script type="text/javascript" src="{$js_dir}jquery.cookie.js"></script>

	

	{$HOOK_HEADER}

	

		{if Configuration::get('dilecta_color') == '1'}

		<link href="{$css_dir}color_2.css" rel="stylesheet" type="text/css" />

		{/if}

		{if Configuration::get('dilecta_color') == '2'}

		<link href="{$css_dir}color_3.css" rel="stylesheet" type="text/css" />

		{/if}

		{if Configuration::get('dilecta_color') == '3'}

		<link href="{$css_dir}color_4.css" rel="stylesheet" type="text/css" />

		{/if}

		{if Configuration::get('dilecta_color') == '4'}

		<link href="{$css_dir}color_5.css" rel="stylesheet" type="text/css" />

		{/if}

		{if Configuration::get('dilecta_color') == '5'}

		<link href="{$css_dir}color_1.css" rel="stylesheet" type="text/css" />

		{/if}

	

		{if Configuration::get('dilecta_font_status') == '1' || Configuration::get('dilecta_color_status') == '1'}

		

			{if Configuration::get('dilecta_categories_bar') != '' && Configuration::get('dilecta_categories_bar') != 'standard'}

			<link href='//fonts.googleapis.com/css?family={Configuration::get('dilecta_categories_bar')}&v1' rel='stylesheet' type='text/css' />

			{/if}

			

			{if Configuration::get('dilecta_headlines') != '' && Configuration::get('dilecta_headlines') != 'standard'}

			<link href='//fonts.googleapis.com/css?family={Configuration::get('dilecta_headlines')}&v1' rel='stylesheet' type='text/css' />

			{/if}

			{if Configuration::get('dilecta_footer_headlines') != '' && Configuration::get('dilecta_footer_headlines') != 'standard'}

			<link href='//fonts.googleapis.com/css?family={Configuration::get('dilecta_footer_headlines')}&v1' rel='stylesheet' type='text/css' />

			{/if}

			{if Configuration::get('dilecta_custom_price') != '' && Configuration::get('dilecta_custom_price') != 'standard'}

			<link href='//fonts.googleapis.com/css?family={Configuration::get('dilecta_custom_price')}&v1' rel='stylesheet' type='text/css' />

			{/if}

			{if Configuration::get('dilecta_product_name_font') != '' && Configuration::get('dilecta_product_name_font') != 'standard'}

			<link href='//fonts.googleapis.com/css?family={Configuration::get('dilecta_product_name_font')}&v1' rel='stylesheet' type='text/css' />

			{/if}

			{if Configuration::get('dilecta_page_name') != '' && Configuration::get('dilecta_page_name') != 'standard'}

			<link href='//fonts.googleapis.com/css?family={Configuration::get('dilecta_page_name')}&v1' rel='stylesheet' type='text/css' />

			{/if}

			{if Configuration::get('dilecta_button_font') != '' && Configuration::get('dilecta_button_font') != 'standard'}

			<link href='//fonts.googleapis.com/css?family={Configuration::get('dilecta_button_font')}&v1' rel='stylesheet' type='text/css' />

			{/if}

			

			<style type="text/css">

			

				{if Configuration::get('dilecta_font_status') == '1'}

					

					{if Configuration::get('dilecta_body_font') != 'standard' && Configuration::get('dilecta_body_font') != ''}	

					body, a { font-family:{Configuration::get('dilecta_body_font')} !important; }

					{/if}

					{if Configuration::get('dilecta_body_font_px') != ''}	

					body, a { font-size:{Configuration::get('dilecta_body_font_px')}px !important;line-height:{Configuration::get('dilecta_body_font')+6}>px !important; }

					{/if}

					{if Configuration::get('dilecta_body_font_smaller_px') != ''}	

					header .top .top-right .wishlist a, header .top .top-right #cart_block .cart-heading, header .top .top-right .language-currency .switcher p a, .products-grid > div .sale, .product-list > div .sale { font-size:{Configuration::get('dilecta_body_font_smaller_px')}px !important; }

					{/if}

					{if Configuration::get('dilecta_categories_bar') != '' && Configuration::get('dilecta_categories_bar') != 'standard'}	

				   .navigation_container nav > ul > li > a { font-family:{Configuration::get('dilecta_categories_bar')} !important; }

					{/if}

					

					{if Configuration::get('dilecta_categories_bar_px') != ''}	

					.navigation_container nav > ul > li > a { font-size:{Configuration::get('dilecta_categories_bar_px')}px !important; }

					{/if}

					

					{if Configuration::get('dilecta_custom_price') != '' && Configuration::get('dilecta_custom_price') != 'standard'}	

					header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price, .product-list > div .price, .products-grid > div .price, .product-info .right .price { font-family:{Configuration::get('dilecta_custom_price')} !important; }

					{/if}

					

					{if Configuration::get('dilecta_custom_price_px') != ''}	

					.product-info .right .price p { font-size:{Configuration::get('dilecta_custom_price_px')}px !important; }

					{/if}

					

					{if Configuration::get('dilecta_custom_price_px_medium') != ''}	

					.product-list > div .price, .products-grid > div .price { font-size:{Configuration::get('dilecta_custom_price_px_medium')}px !important; }

					{/if}

					

					{if Configuration::get('dilecta_custom_price_px_small') != ''}	

					header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price { font-size:{Configuration::get('dilecta_custom_price_px_small')}px !important; }

					{/if}

					

					{if Configuration::get('dilecta_custom_price_px_old_price') != ''}	

					.price-old { font-size:{Configuration::get('dilecta_custom_price_px_old_price')}px !important; }

					{/if}



 					{if Configuration::get('dilecta_product_name_font') != '' && Configuration::get('dilecta_product_name_font') != 'standard'}		

					.name a { font-family:{Configuration::get('dilecta_product_name_font')} !important; }

					{/if}

					

					{if Configuration::get('dilecta_product_name_font_px') != ''}	

					.name a { font-size:{Configuration::get('dilecta_product_name_font_px')}px !important; }

					{/if}

					

 					{if Configuration::get('dilecta_headlines') != '' && Configuration::get('dilecta_headlines') != 'standard'}	

					#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .custom-font, .box-heading, .title_block { font-family:{Configuration::get('dilecta_headlines')} !important; }

 					{/if}	

 					

					{if Configuration::get('dilecta_headlines_px') != ''}	

					#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .custom-font, .box-heading, .title_block { font-size:{Configuration::get('dilecta_headlines_px')}px !important; }

					{/if}



 					{if Configuration::get('dilecta_footer_headlines') != '' && Configuration::get('dilecta_footer_headlines') != 'standard'}	

					footer .title_block, footer .title_block a { font-family:{Configuration::get('dilecta_footer_headlines')} !important; }

 					{/if}

 					

					{if Configuration::get('dilecta_footer_headlines_px') != ''}	

					footer .title_block, footer .title_block a { font-size:{Configuration::get('dilecta_footer_headlines_px')}px !important; }

					{/if}

					

 					{if Configuration::get('dilecta_page_name') != '' && Configuration::get('dilecta_page_name') != 'standard'}	

					#page-title h2 { font-family:{Configuration::get('dilecta_page_name')} !important; }

 					{/if}

 					

					{if Configuration::get('dilecta_page_name_px') != ''}	

					#page-title h2 { font-size:{Configuration::get('dilecta_page_name_px')}px !important; }

					{/if}

					

 					{if Configuration::get('dilecta_button_font') != '' && Configuration::get('dilecta_button_font') != 'standard'}

					.button, .button_large, .exclusive, .button_small, .exclusive_large, .button_mini, .button_mini_disabled, .button_small_disabled.button_disabled, .button_large_disabled, .exclusive_mini, .exclusive_small, .exclusive_mini_disabled, .exclusive_small_disabled, .exclusive_disabled, .exclusive_large_disabled, .qty .button-not-active { font-family:{Configuration::get('dilecta_button_font')} !important; }

 					{/if}	

 					

					{if Configuration::get('dilecta_button_font_px') != ''}	

					.button, .button_large, .exclusive, .button_small, .exclusive_large, .button_mini, .button_mini_disabled, .button_small_disabled.button_disabled, .button_large_disabled, .exclusive_mini, .exclusive_small, .exclusive_mini_disabled, .exclusive_small_disabled, .exclusive_disabled, .exclusive_large_disabled, .qty .button-not-active { font-size:{Configuration::get('dilecta_button_font_px')}px !important; }

					{/if}

				

				{/if}

				

				{if Configuration::get('dilecta_color_status') == '1'}

						

					{if Configuration::get('dilecta_headlines_text') != ''}	

					h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color:#{Configuration::get('dilecta_headlines_text')} !important; }

					{/if}

					{if Configuration::get('dilecta_body_text') != ''}

					body { color:#{Configuration::get('dilecta_body_text')} !important; }

					{/if}

					{if Configuration::get('dilecta_links') != ''}

					a { color:#{Configuration::get('dilecta_links')} !important; }

					{/if}

					{if Configuration::get('dilecta_links_hover') != ''}

					a:hover, header .top .top-right .language-currency .switcher .option ul li a:hover, .navigation_container nav > ul > li > .sub-menu > ul > li:hover > a, .navigation_container nav > ul > li > .sub-menu > ul > li > .sub-menu a:hover, .navigation_container nav > ul > li > .sub-menu > ul > li > .sub-menu a:hover, #categories_block_left li a.selected, div.notification b { color:#{Configuration::get('dilecta_links_hover')} !important; }

					header .top .top-right #cart_block .block_content .products dt .remove_link a:hover, .cart_delete a.cart_quantity_delete:hover, a.price_discount_delete:hover, div.notification .close:hover { background-color:#{Configuration::get('dilecta_links_hover')} !important; }

					.product-list > div:hover, .products-grid > div:hover { border:1px solid #{Configuration::get('dilecta_links_hover')} !important; }

					{/if}

					{if Configuration::get('dilecta_price') != ''}

					header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price, header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price, header .top .top-right #cart_block .content .saldo-action .saldo ul li span, .cart-total td.right, .cart-info tbody .price, .cart-info tbody .total, .checkout-product tfoot .total, .product-list > div .price, .products-grid > div .price, .product-right .price p, header .top .top-right #cart_block .block_content .products dt .price, header .top .top-right #cart_block .block_content .saldo-action .saldo ul li span, ul.step li.step_current span, .product-info .right .price p { color:#{Configuration::get('dilecta_price')} !important; }

					.product-list > div .cart a, .products-grid > div .sale, .product-list > div .sale, .product-info .right .add-to-cart, .products-grid > div .on-hover .add-to-cart { background-color:#{Configuration::get('dilecta_price')} !important; }

					{/if}

					{if Configuration::get('dilecta_product_name') != ''}

					.name a { color:#{Configuration::get('dilecta_product_name')} !important; }

					{/if}

					{if Configuration::get('dilecta_custom_footer_bg') != ''}

					footer #custom-footer { background:#{Configuration::get('dilecta_custom_footer_bg')} !important; }

					{/if}

					{if Configuration::get('dilecta_custom_footer_border') != ''}

					footer #custom-footer { border-top:1px solid #{Configuration::get('dilecta_custom_footer_border')} !important;border-bottom:1px solid #{Configuration::get('dilecta_custom_footer_border')} !important; }

					{/if}

					{if Configuration::get('dilecta_custom_footer_headlines') != ''}

					footer #custom-footer > div > div > div h3 { color:#{Configuration::get('dilecta_custom_footer_headlines')} !important; }

					{/if}

					{if Configuration::get('dilecta_custom_footer_body') != ''}

					footer #custom-footer > div > div > div { color:#{Configuration::get('dilecta_custom_footer_body')} !important; }

					{/if}

					{if Configuration::get('dilecta_custom_footer_links') != ''}

					footer #custom-footer > div > div > div a, ul.tweet_list li .tweet_text a { color:#{Configuration::get('dilecta_custom_footer_links')} !important; }

					{/if}

					{if Configuration::get('shopping_cart_icon') != ''}

					header .top .top-right #cart_block { background-color:#{Configuration::get('shopping_cart_icon')} !important; }

					{/if}



					{if Configuration::get('dilecta_categories_background') != ''}

					.navigation_container { background:#{Configuration::get('dilecta_categories_background')} !important; }

					{/if}

					{if Configuration::get('dilecta_categories_border_top') != ''}

					.navigation_container, .mobile-navigation .categories-mobile-links ul li { border-top:1px solid #{Configuration::get('dilecta_categories_border_top')} !important; }

					{/if}

					{if Configuration::get('dilecta_categories_links') != ''}

					.navigation_container nav > ul > li > a, .mobile-navigation .click-menu, .mobile-navigation .categories-mobile-links > ul > li > a, .mobile-navigation .categories-mobile-links > ul > li > ul > li > a { color:#{Configuration::get('dilecta_categories_links')} !important; }

					{/if}

					{if Configuration::get('dilecta_categories_links_hover') != ''}

					.navigation_container nav > ul > li:hover > a { color:#{Configuration::get('dilecta_categories_links_hover')} !important; }

					{/if}

					{if Configuration::get('dilecta_input_background') != ''}

					input[type=text], input[type=password], textarea { background:#{Configuration::get('dilecta_input_background')} !important; }

					{/if}

					{if Configuration::get('dilecta_input_border') != ''}

					input[type=text], input[type=password], textarea { border:1px solid #{Configuration::get('dilecta_input_border')} !important; }

					{/if}

					{if Configuration::get('dilecta_input_border_hover') != ''}

					input[type=text]:focus, input[type=password]:focus, textarea:focus { border:1px solid #{Configuration::get('dilecta_input_border_hover')} !important; }

					.ac_over { background-color:#{Configuration::get('dilecta_input_border_hover')} !important; }

					{/if}

					{if Configuration::get('dilecta_background_page_title') != ''}

					#page-title { background:#{Configuration::get('dilecta_background_page_title')} !important; }

					{/if}

					{if Configuration::get('dilecta_border_page_title') != ''}

					#page-title { border-top:1px solid #{Configuration::get('dilecta_border_page_title')} !important;border-bottom:1px solid #{Configuration::get('dilecta_border_page_title')} !important; }

					{/if}

					{if Configuration::get('dilecta_background_banners') != ''}

					.bg-banners { background:#{Configuration::get('dilecta_background_banners')} !important; }

					{/if}

					{if Configuration::get('dilecta_border_banners') != ''}

					.bg-banners { border-bottom:1px solid #{Configuration::get('dilecta_border_banners')} !important; }

					{/if}

					{if Configuration::get('dilecta_border_5px_color') != ''}

					header .top .top-right #cart_block .content, header .top .top-right .language-currency .switcher .option ul, .navigation_container nav > ul > li > .sub-menu, div.notification, .cart-module > div, .product-info .custom-block-product, header .top .top-right #cart_block .block_content, header .top .top-right .language-currency .switcher .option ul, .navigation_container nav > ul > li > .sub-menu, .ac_results { border-top:5px solid #{Configuration::get('dilecta_border_5px_color')} !important; }

					.navigation_container nav > ul > li > .sub-menu .sub-menu { border-left:5px solid #{Configuration::get('dilecta_border_5px_color')} !important; }

					{/if}

					{if Configuration::get('dilecta_background_slider') != ''}

					.fullwidthbanner-container { background:#{Configuration::get('dilecta_background_slider')} !important; }

					{/if}

					{if Configuration::get('dilecta_st_button_background') != ''}

					.button, .button-slider2, .button, input.button_mini, input.button_small, input.button, input.button_large,

input.button_mini_disabled, input.button_small_disabled, input.button_disabled, input.button_large_disabled,

input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large,

input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled,

a.button_mini, a.button_small, a.button, a.button_large,

a.exclusive_mini, a.exclusive_small, a.exclusive, a.exclusive_large,

span.button_mini, span.button_small, span.button, span.button_large,

span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled, input.button_mini, input.button_small, input.button, input.button_large,

input.button_mini_disabled, input.button_small_disabled, input.button_disabled, input.button_large_disabled,

input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large,

input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled, input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large,

input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled,

a.exclusive_mini, a.exclusive_small, a.exclusive, a.exclusive_large,

span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled { background:#{Configuration::get('dilecta_st_button_background')} !important; }

					{/if}

					{if Configuration::get('dilecta_st_button_bg_hover') != ''}

					.button:hover, .button-slider2:hover, .button:hover, input.button_mini:hover, input.button_small:hover, input.button:hover, input.button_large:hover,

input.exclusive_mini:hover, input.exclusive_small:hover, input.exclusive:hover, input.exclusive_large:hover,

a.button_mini:hover, a.button_small:hover, a.button:hover, a.button_large:hover,

a.exclusive_mini:hover, a.exclusive_small:hover, a.exclusive:hover, a.exclusive_large:hover, input.exclusive_mini:hover, input.exclusive_small:hover, input.exclusive:hover, input.exclusive_large:hover, a.exclusive_mini:hover, a.exclusive_small:hover, a.exclusive:hover, a.exclusive_large:hover { background:#{Configuration::get('dilecta_st_button_bg_hover')} !important; }

					{/if}

					{if Configuration::get('dilecta_st_button_font') != ''}

					.button, .button-slider2, .button, input.button_mini, input.button_small, input.button, input.button_large,

input.button_mini_disabled, input.button_small_disabled, input.button_disabled, input.button_large_disabled,

input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large,

input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled,

a.button_mini, a.button_small, a.button, a.button_large,

a.exclusive_mini, a.exclusive_small, a.exclusive, a.exclusive_large,

span.button_mini, span.button_small, span.button, span.button_large,

span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled, input.button_mini, input.button_small, input.button, input.button_large,

input.button_mini_disabled, input.button_small_disabled, input.button_disabled, input.button_large_disabled,

input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large,

input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled, input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large,

input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled,

a.exclusive_mini, a.exclusive_small, a.exclusive, a.exclusive_large,

span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled { color:#{Configuration::get('dilecta_st_button_font')} !important; }

					{/if}

					{if Configuration::get('dilecta_nd_button_background') != ''}

					a.button-two, .buttons .left .button, .buttons .center .button, .button-slider, .button_large { background:#{Configuration::get('dilecta_nd_button_background')} !important; }

					{/if}

					{if Configuration::get('dilecta_nd_button_bg_hover') != ''}

					a.button-two:hover, .buttons .left .button:hover, .buttons .center .button:hover, .button-slider:hover, .button_large:hover { background:#{Configuration::get('dilecta_nd_button_bg_hover')} !important; }

					{/if}

					{if Configuration::get('dilecta_nd_button_font') != ''}

					a.button-two, .buttons .left .button, .buttons .center .button, .button-slider, .button_large { color:#{Configuration::get('dilecta_nd_button_font')} !important; }

					{/if}

				

				{/if}

			

			</style>

			

		{/if}

	

	{if Configuration::get('dilecta_custom_code_status') == '1' && Configuration::get('custom_code_css') != ''}

		<style type="text/css">

			

			{Configuration::get('custom_code_css')}

			

		</style>

	{/if}

	{if Configuration::get('dilecta_custom_code_status') == '1' && Configuration::get('custom_code_js') != ''}

		<script type="text/javascript">

			

			{Configuration::get('custom_code_js')}

			

		</script>

	{/if}

	

	<!--[if lt IE 9]> 

	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> 

	<![endif]--> 

	<!--[if IE 7]>

	<link rel="stylesheet" type="text/css" href="{$css_dir}ie7.css" />

	<![endif]-->
{literal}
<script type="text/javascript">
(function() {
  var t = document.createElement('script'); t.type = 'text/javascript'; t.async = true;
  t.src = "//turnsocial.com/bar/cd222dfb3d14ff342966e3c45dcbca2e.js";
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(t, s);
})();
</script>{/literal}
<meta name="google-site-verification" content="QSFFCZoqJrtA2ONtqGiebTEo-R7Xg9mXhoWa9s5QtPc" />
</head>

<body {if isset($page_name)}id="{$page_name|escape:'htmlall':'UTF-8'}"{/if} class="{if $hide_left_column}hide-left-column{/if} {if $hide_right_column}hide-right-column{/if} {if $hide_left_column && $hide_right_column}hide-left-right-column{/if}">



<div id="notification"></div>



<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



	{if !$content_only}

	

		{if isset($restricted_country_mode) && $restricted_country_mode}

		<div id="restricted-country">

			<p>{l s='You cannot place a new order from your country.'} <span class="bold">{$geolocation_country}</span></p>

		</div>

		{/if}

		

	<header>

	

		<!-- Top -->

		

		<div class="top set-size clearfix">

			

			<!-- Logo -->

			

			<h1><a href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}"><img src="{$logo_url}" alt="{$shop_name|escape:'htmlall':'UTF-8'}" {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height}height="{$logo_image_height}" {/if} style="display:block" /></a></h1>

			

			<!-- Top Right -->

			

			<div class="top-right">

			

				{$HOOK_TOP}

								

			</div>

			

			<!-- End Top Right -->

					

		</div>

		

		<!-- End Top -->

			

	</header>

	

	{if isset($smarty.capture.path)}{assign var='path' value=$smarty.capture.path}{/if}

	{if isset($path) AND $path}

		

	<!-- Page Title -->

	

	<section id="page-title">

	

		<div class="set-size-grid">

		<div class="bread" style="display:none;">

			<a href="{$base_dir}" title="{l s='return to'} {l s='Home'}">{l s='Home'}</a>

				{if isset($path) AND $path}

					<span class="navigation-pipe" {if isset($category) && isset($category->id_category) && $category->id_category == 1}style="display:none;"{/if}>{$navigationPipe|escape:html:'UTF-8'}</span>

					{if !$path|strpos:'span'}

						<span class="navigation_page">{$path}</span>

					{else}

						{$path}

					{/if}

				{/if}
</div>
			<h2>{$path}</h2>

		

		</div>

	

	</section>

	

	<!-- End Page Title -->

	{/if}

	

	<!-- Content -->

	

	<section id="content" class="set-size clearfix">

		

		<!-- Left -->

		{$grid_center = 9}

		{$grid_left = 3}

		{if $page_name == 'category' && Configuration::get('dilecta_width_category') == '1'}{$grid_center = 12}{$grid_left = '12'}{/if}

		{if $page_name == 'product' && Configuration::get('dilecta_width_product') == '1'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'search' && Configuration::get('dilecta_width_search') == '1'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'prices-drop' && Configuration::get('dilecta_width_prices_drop') == '1'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'new-products' && Configuration::get('dilecta_width_new_products') == '1'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'best-sales' && Configuration::get('dilecta_width_best_sales') == '1'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'manufacturer' && Configuration::get('dilecta_width_manufacturer') == '1'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'supplier' && Configuration::get('dilecta_width_supplier') == '1'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		{if $page_name == 'index'}{$grid_center = 12}{$grid_left = '3 hidden'}{/if}

		

		{if !(Configuration::get('dilecta_column_position') == '1' && Configuration::get('dilecta_general_status') == '1')}

		<div id="left_column" class="grid-{$grid_left} float-left">

			{$HOOK_LEFT_COLUMN}

		</div>

		{/if}

		

		<div id="center_column" class="grid-{$grid_center} float-left">

	

	{/if}


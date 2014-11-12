<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:03
         compiled from "/home/admedon/public_html/themes/dilecta/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62879248540a387b9b4130-99949508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a2d56e834771b51c601b649ffa49e888f2a2c6f' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/header.tpl',
      1 => 1408036266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62879248540a387b9b4130-99949508',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'meta_language' => 0,
    'nobots' => 0,
    'nofollow' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'content_dir' => 0,
    'base_uri' => 0,
    'static_token' => 0,
    'token' => 0,
    'priceDisplayPrecision' => 0,
    'currency' => 0,
    'priceDisplay' => 0,
    'roundMode' => 0,
    'css_dir' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_files' => 0,
    'js_uri' => 0,
    'js_dir' => 0,
    'HOOK_HEADER' => 0,
    'page_name' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'base_dir' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
    'HOOK_TOP' => 0,
    'path' => 0,
    'category' => 0,
    'navigationPipe' => 0,
    'grid_left' => 0,
    'HOOK_LEFT_COLUMN' => 0,
    'grid_center' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387bd30ac8_16358191',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387bd30ac8_16358191')) {function content_540a387bd30ac8_16358191($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?><!DOCTYPE html>

<!--[if IE 7]>                  <html class="ie7 no-js"  dir="ltr" lang="en" xmlns:fb="http://ogp.me/ns/fb#">     <![endif]-->

<!--[if lte IE 8]>              <html class="ie8 no-js"  dir="ltr" lang="en" xmlns:fb="http://ogp.me/ns/fb#">    <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--> <html class="not-ie no-js" dir="ltr" lang="en" xmlns:fb="http://ogp.me/ns/fb#">  <!--<![endif]-->

<head>

	<title><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
</title>

	<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value){?>

	<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'html', 'UTF-8');?>
" />

	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)&&$_smarty_tpl->tpl_vars['meta_keywords']->value){?>

	<meta name="keywords" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_keywords']->value, 'html', 'UTF-8');?>
" />

	<?php }?>

	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />

	<meta http-equiv="content-language" content="<?php echo $_smarty_tpl->tpl_vars['meta_language']->value;?>
" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)){?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['nofollow']->value)&&$_smarty_tpl->tpl_vars['nofollow']->value){?>no<?php }?>follow" />

	<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />

	<script type="text/javascript">

		var baseDir = '<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
';

		var baseUri = '<?php echo $_smarty_tpl->tpl_vars['base_uri']->value;?>
';

		var static_token = '<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
';

		var token = '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
';

		var priceDisplayPrecision = <?php echo $_smarty_tpl->tpl_vars['priceDisplayPrecision']->value*$_smarty_tpl->tpl_vars['currency']->value->decimals;?>
;

		var priceDisplayMethod = <?php echo $_smarty_tpl->tpl_vars['priceDisplay']->value;?>
;

		var roundMode = <?php echo $_smarty_tpl->tpl_vars['roundMode']->value;?>
;

	</script>

		

	<!--Google Webfont -->

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">

	<link href="https://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css">

	<!-- CSS -->

	<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
stylesheet.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
carousel.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
jquery.jqzoom.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
slider/settings.css" media="screen" />

	

	<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)){?>

		<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value){
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>

		<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />

		<?php } ?>

	<?php }?>

	

	<!-- Javascript -->

	<?php if (isset($_smarty_tpl->tpl_vars['js_files']->value)){?>

		<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>

		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>

		<?php } ?>

	<?php }?>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
slider/jquery.themepunch.plugins.min.js"></script>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
slider/jquery.themepunch.revolution.min.js"></script>

	<script type="text/javascript"> var column = 1; <?php if (Configuration::get('dilecta_general_status')=='1'&&Configuration::get('dilecta_column_navigation')>0){?>var column = <?php echo Configuration::get('dilecta_column_navigation');?>
;<?php }?> </script>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
jquery.jqzoom.js"></script>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
jquery-workarounds.js"></script>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
jquery.tweet.js"></script> 

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_dir']->value;?>
jquery.cookie.js"></script>

	

	<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>


	

		<?php if (Configuration::get('dilecta_color')=='1'){?>

		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
color_2.css" rel="stylesheet" type="text/css" />

		<?php }?>

		<?php if (Configuration::get('dilecta_color')=='2'){?>

		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
color_3.css" rel="stylesheet" type="text/css" />

		<?php }?>

		<?php if (Configuration::get('dilecta_color')=='3'){?>

		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
color_4.css" rel="stylesheet" type="text/css" />

		<?php }?>

		<?php if (Configuration::get('dilecta_color')=='4'){?>

		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
color_5.css" rel="stylesheet" type="text/css" />

		<?php }?>

		<?php if (Configuration::get('dilecta_color')=='5'){?>

		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
color_1.css" rel="stylesheet" type="text/css" />

		<?php }?>

	

		<?php if (Configuration::get('dilecta_font_status')=='1'||Configuration::get('dilecta_color_status')=='1'){?>

		

			<?php if (Configuration::get('dilecta_categories_bar')!=''&&Configuration::get('dilecta_categories_bar')!='standard'){?>

			<link href='//fonts.googleapis.com/css?family=<?php echo Configuration::get('dilecta_categories_bar');?>
&v1' rel='stylesheet' type='text/css' />

			<?php }?>

			

			<?php if (Configuration::get('dilecta_headlines')!=''&&Configuration::get('dilecta_headlines')!='standard'){?>

			<link href='//fonts.googleapis.com/css?family=<?php echo Configuration::get('dilecta_headlines');?>
&v1' rel='stylesheet' type='text/css' />

			<?php }?>

			<?php if (Configuration::get('dilecta_footer_headlines')!=''&&Configuration::get('dilecta_footer_headlines')!='standard'){?>

			<link href='//fonts.googleapis.com/css?family=<?php echo Configuration::get('dilecta_footer_headlines');?>
&v1' rel='stylesheet' type='text/css' />

			<?php }?>

			<?php if (Configuration::get('dilecta_custom_price')!=''&&Configuration::get('dilecta_custom_price')!='standard'){?>

			<link href='//fonts.googleapis.com/css?family=<?php echo Configuration::get('dilecta_custom_price');?>
&v1' rel='stylesheet' type='text/css' />

			<?php }?>

			<?php if (Configuration::get('dilecta_product_name_font')!=''&&Configuration::get('dilecta_product_name_font')!='standard'){?>

			<link href='//fonts.googleapis.com/css?family=<?php echo Configuration::get('dilecta_product_name_font');?>
&v1' rel='stylesheet' type='text/css' />

			<?php }?>

			<?php if (Configuration::get('dilecta_page_name')!=''&&Configuration::get('dilecta_page_name')!='standard'){?>

			<link href='//fonts.googleapis.com/css?family=<?php echo Configuration::get('dilecta_page_name');?>
&v1' rel='stylesheet' type='text/css' />

			<?php }?>

			<?php if (Configuration::get('dilecta_button_font')!=''&&Configuration::get('dilecta_button_font')!='standard'){?>

			<link href='//fonts.googleapis.com/css?family=<?php echo Configuration::get('dilecta_button_font');?>
&v1' rel='stylesheet' type='text/css' />

			<?php }?>

			

			<style type="text/css">

			

				<?php if (Configuration::get('dilecta_font_status')=='1'){?>

					

					<?php if (Configuration::get('dilecta_body_font')!='standard'&&Configuration::get('dilecta_body_font')!=''){?>	

					body, a { font-family:<?php echo Configuration::get('dilecta_body_font');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_body_font_px')!=''){?>	

					body, a { font-size:<?php echo Configuration::get('dilecta_body_font_px');?>
px !important;line-height:<?php echo Configuration::get('dilecta_body_font')+6;?>
>px !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_body_font_smaller_px')!=''){?>	

					header .top .top-right .wishlist a, header .top .top-right #cart_block .cart-heading, header .top .top-right .language-currency .switcher p a, .products-grid > div .sale, .product-list > div .sale { font-size:<?php echo Configuration::get('dilecta_body_font_smaller_px');?>
px !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_categories_bar')!=''&&Configuration::get('dilecta_categories_bar')!='standard'){?>	

				   .navigation_container nav > ul > li > a { font-family:<?php echo Configuration::get('dilecta_categories_bar');?>
 !important; }

					<?php }?>

					

					<?php if (Configuration::get('dilecta_categories_bar_px')!=''){?>	

					.navigation_container nav > ul > li > a { font-size:<?php echo Configuration::get('dilecta_categories_bar_px');?>
px !important; }

					<?php }?>

					

					<?php if (Configuration::get('dilecta_custom_price')!=''&&Configuration::get('dilecta_custom_price')!='standard'){?>	

					header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price, .product-list > div .price, .products-grid > div .price, .product-info .right .price { font-family:<?php echo Configuration::get('dilecta_custom_price');?>
 !important; }

					<?php }?>

					

					<?php if (Configuration::get('dilecta_custom_price_px')!=''){?>	

					.product-info .right .price p { font-size:<?php echo Configuration::get('dilecta_custom_price_px');?>
px !important; }

					<?php }?>

					

					<?php if (Configuration::get('dilecta_custom_price_px_medium')!=''){?>	

					.product-list > div .price, .products-grid > div .price { font-size:<?php echo Configuration::get('dilecta_custom_price_px_medium');?>
px !important; }

					<?php }?>

					

					<?php if (Configuration::get('dilecta_custom_price_px_small')!=''){?>	

					header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price { font-size:<?php echo Configuration::get('dilecta_custom_price_px_small');?>
px !important; }

					<?php }?>

					

					<?php if (Configuration::get('dilecta_custom_price_px_old_price')!=''){?>	

					.price-old { font-size:<?php echo Configuration::get('dilecta_custom_price_px_old_price');?>
px !important; }

					<?php }?>



 					<?php if (Configuration::get('dilecta_product_name_font')!=''&&Configuration::get('dilecta_product_name_font')!='standard'){?>		

					.name a { font-family:<?php echo Configuration::get('dilecta_product_name_font');?>
 !important; }

					<?php }?>

					

					<?php if (Configuration::get('dilecta_product_name_font_px')!=''){?>	

					.name a { font-size:<?php echo Configuration::get('dilecta_product_name_font_px');?>
px !important; }

					<?php }?>

					

 					<?php if (Configuration::get('dilecta_headlines')!=''&&Configuration::get('dilecta_headlines')!='standard'){?>	

					#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .custom-font, .box-heading, .title_block { font-family:<?php echo Configuration::get('dilecta_headlines');?>
 !important; }

 					<?php }?>	

 					

					<?php if (Configuration::get('dilecta_headlines_px')!=''){?>	

					#content h1, #content h2, #content h3, #content h4, #content h5, #content h6, .custom-font, .box-heading, .title_block { font-size:<?php echo Configuration::get('dilecta_headlines_px');?>
px !important; }

					<?php }?>



 					<?php if (Configuration::get('dilecta_footer_headlines')!=''&&Configuration::get('dilecta_footer_headlines')!='standard'){?>	

					footer .title_block, footer .title_block a { font-family:<?php echo Configuration::get('dilecta_footer_headlines');?>
 !important; }

 					<?php }?>

 					

					<?php if (Configuration::get('dilecta_footer_headlines_px')!=''){?>	

					footer .title_block, footer .title_block a { font-size:<?php echo Configuration::get('dilecta_footer_headlines_px');?>
px !important; }

					<?php }?>

					

 					<?php if (Configuration::get('dilecta_page_name')!=''&&Configuration::get('dilecta_page_name')!='standard'){?>	

					#page-title h2 { font-family:<?php echo Configuration::get('dilecta_page_name');?>
 !important; }

 					<?php }?>

 					

					<?php if (Configuration::get('dilecta_page_name_px')!=''){?>	

					#page-title h2 { font-size:<?php echo Configuration::get('dilecta_page_name_px');?>
px !important; }

					<?php }?>

					

 					<?php if (Configuration::get('dilecta_button_font')!=''&&Configuration::get('dilecta_button_font')!='standard'){?>

					.button, .button_large, .exclusive, .button_small, .exclusive_large, .button_mini, .button_mini_disabled, .button_small_disabled.button_disabled, .button_large_disabled, .exclusive_mini, .exclusive_small, .exclusive_mini_disabled, .exclusive_small_disabled, .exclusive_disabled, .exclusive_large_disabled, .qty .button-not-active { font-family:<?php echo Configuration::get('dilecta_button_font');?>
 !important; }

 					<?php }?>	

 					

					<?php if (Configuration::get('dilecta_button_font_px')!=''){?>	

					.button, .button_large, .exclusive, .button_small, .exclusive_large, .button_mini, .button_mini_disabled, .button_small_disabled.button_disabled, .button_large_disabled, .exclusive_mini, .exclusive_small, .exclusive_mini_disabled, .exclusive_small_disabled, .exclusive_disabled, .exclusive_large_disabled, .qty .button-not-active { font-size:<?php echo Configuration::get('dilecta_button_font_px');?>
px !important; }

					<?php }?>

				

				<?php }?>

				

				<?php if (Configuration::get('dilecta_color_status')=='1'){?>

						

					<?php if (Configuration::get('dilecta_headlines_text')!=''){?>	

					h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a { color:#<?php echo Configuration::get('dilecta_headlines_text');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_body_text')!=''){?>

					body { color:#<?php echo Configuration::get('dilecta_body_text');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_links')!=''){?>

					a { color:#<?php echo Configuration::get('dilecta_links');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_links_hover')!=''){?>

					a:hover, header .top .top-right .language-currency .switcher .option ul li a:hover, .navigation_container nav > ul > li > .sub-menu > ul > li:hover > a, .navigation_container nav > ul > li > .sub-menu > ul > li > .sub-menu a:hover, .navigation_container nav > ul > li > .sub-menu > ul > li > .sub-menu a:hover, #categories_block_left li a.selected, div.notification b { color:#<?php echo Configuration::get('dilecta_links_hover');?>
 !important; }

					header .top .top-right #cart_block .block_content .products dt .remove_link a:hover, .cart_delete a.cart_quantity_delete:hover, a.price_discount_delete:hover, div.notification .close:hover { background-color:#<?php echo Configuration::get('dilecta_links_hover');?>
 !important; }

					.product-list > div:hover, .products-grid > div:hover { border:1px solid #<?php echo Configuration::get('dilecta_links_hover');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_price')!=''){?>

					header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price, header .top .top-right #cart_block .content ul.items-in-shopping-cart li .price, header .top .top-right #cart_block .content .saldo-action .saldo ul li span, .cart-total td.right, .cart-info tbody .price, .cart-info tbody .total, .checkout-product tfoot .total, .product-list > div .price, .products-grid > div .price, .product-right .price p, header .top .top-right #cart_block .block_content .products dt .price, header .top .top-right #cart_block .block_content .saldo-action .saldo ul li span, ul.step li.step_current span, .product-info .right .price p { color:#<?php echo Configuration::get('dilecta_price');?>
 !important; }

					.product-list > div .cart a, .products-grid > div .sale, .product-list > div .sale, .product-info .right .add-to-cart, .products-grid > div .on-hover .add-to-cart { background-color:#<?php echo Configuration::get('dilecta_price');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_product_name')!=''){?>

					.name a { color:#<?php echo Configuration::get('dilecta_product_name');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_custom_footer_bg')!=''){?>

					footer #custom-footer { background:#<?php echo Configuration::get('dilecta_custom_footer_bg');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_custom_footer_border')!=''){?>

					footer #custom-footer { border-top:1px solid #<?php echo Configuration::get('dilecta_custom_footer_border');?>
 !important;border-bottom:1px solid #<?php echo Configuration::get('dilecta_custom_footer_border');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_custom_footer_headlines')!=''){?>

					footer #custom-footer > div > div > div h3 { color:#<?php echo Configuration::get('dilecta_custom_footer_headlines');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_custom_footer_body')!=''){?>

					footer #custom-footer > div > div > div { color:#<?php echo Configuration::get('dilecta_custom_footer_body');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_custom_footer_links')!=''){?>

					footer #custom-footer > div > div > div a, ul.tweet_list li .tweet_text a { color:#<?php echo Configuration::get('dilecta_custom_footer_links');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('shopping_cart_icon')!=''){?>

					header .top .top-right #cart_block { background-color:#<?php echo Configuration::get('shopping_cart_icon');?>
 !important; }

					<?php }?>



					<?php if (Configuration::get('dilecta_categories_background')!=''){?>

					.navigation_container { background:#<?php echo Configuration::get('dilecta_categories_background');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_categories_border_top')!=''){?>

					.navigation_container, .mobile-navigation .categories-mobile-links ul li { border-top:1px solid #<?php echo Configuration::get('dilecta_categories_border_top');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_categories_links')!=''){?>

					.navigation_container nav > ul > li > a, .mobile-navigation .click-menu, .mobile-navigation .categories-mobile-links > ul > li > a, .mobile-navigation .categories-mobile-links > ul > li > ul > li > a { color:#<?php echo Configuration::get('dilecta_categories_links');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_categories_links_hover')!=''){?>

					.navigation_container nav > ul > li:hover > a { color:#<?php echo Configuration::get('dilecta_categories_links_hover');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_input_background')!=''){?>

					input[type=text], input[type=password], textarea { background:#<?php echo Configuration::get('dilecta_input_background');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_input_border')!=''){?>

					input[type=text], input[type=password], textarea { border:1px solid #<?php echo Configuration::get('dilecta_input_border');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_input_border_hover')!=''){?>

					input[type=text]:focus, input[type=password]:focus, textarea:focus { border:1px solid #<?php echo Configuration::get('dilecta_input_border_hover');?>
 !important; }

					.ac_over { background-color:#<?php echo Configuration::get('dilecta_input_border_hover');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_background_page_title')!=''){?>

					#page-title { background:#<?php echo Configuration::get('dilecta_background_page_title');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_border_page_title')!=''){?>

					#page-title { border-top:1px solid #<?php echo Configuration::get('dilecta_border_page_title');?>
 !important;border-bottom:1px solid #<?php echo Configuration::get('dilecta_border_page_title');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_background_banners')!=''){?>

					.bg-banners { background:#<?php echo Configuration::get('dilecta_background_banners');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_border_banners')!=''){?>

					.bg-banners { border-bottom:1px solid #<?php echo Configuration::get('dilecta_border_banners');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_border_5px_color')!=''){?>

					header .top .top-right #cart_block .content, header .top .top-right .language-currency .switcher .option ul, .navigation_container nav > ul > li > .sub-menu, div.notification, .cart-module > div, .product-info .custom-block-product, header .top .top-right #cart_block .block_content, header .top .top-right .language-currency .switcher .option ul, .navigation_container nav > ul > li > .sub-menu, .ac_results { border-top:5px solid #<?php echo Configuration::get('dilecta_border_5px_color');?>
 !important; }

					.navigation_container nav > ul > li > .sub-menu .sub-menu { border-left:5px solid #<?php echo Configuration::get('dilecta_border_5px_color');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_background_slider')!=''){?>

					.fullwidthbanner-container { background:#<?php echo Configuration::get('dilecta_background_slider');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_st_button_background')!=''){?>

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

span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled { background:#<?php echo Configuration::get('dilecta_st_button_background');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_st_button_bg_hover')!=''){?>

					.button:hover, .button-slider2:hover, .button:hover, input.button_mini:hover, input.button_small:hover, input.button:hover, input.button_large:hover,

input.exclusive_mini:hover, input.exclusive_small:hover, input.exclusive:hover, input.exclusive_large:hover,

a.button_mini:hover, a.button_small:hover, a.button:hover, a.button_large:hover,

a.exclusive_mini:hover, a.exclusive_small:hover, a.exclusive:hover, a.exclusive_large:hover, input.exclusive_mini:hover, input.exclusive_small:hover, input.exclusive:hover, input.exclusive_large:hover, a.exclusive_mini:hover, a.exclusive_small:hover, a.exclusive:hover, a.exclusive_large:hover { background:#<?php echo Configuration::get('dilecta_st_button_bg_hover');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_st_button_font')!=''){?>

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

span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled { color:#<?php echo Configuration::get('dilecta_st_button_font');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_nd_button_background')!=''){?>

					a.button-two, .buttons .left .button, .buttons .center .button, .button-slider, .button_large { background:#<?php echo Configuration::get('dilecta_nd_button_background');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_nd_button_bg_hover')!=''){?>

					a.button-two:hover, .buttons .left .button:hover, .buttons .center .button:hover, .button-slider:hover, .button_large:hover { background:#<?php echo Configuration::get('dilecta_nd_button_bg_hover');?>
 !important; }

					<?php }?>

					<?php if (Configuration::get('dilecta_nd_button_font')!=''){?>

					a.button-two, .buttons .left .button, .buttons .center .button, .button-slider, .button_large { color:#<?php echo Configuration::get('dilecta_nd_button_font');?>
 !important; }

					<?php }?>

				

				<?php }?>

			

			</style>

			

		<?php }?>

	

	<?php if (Configuration::get('dilecta_custom_code_status')=='1'&&Configuration::get('custom_code_css')!=''){?>

		<style type="text/css">

			

			<?php echo Configuration::get('custom_code_css');?>


			

		</style>

	<?php }?>

	<?php if (Configuration::get('dilecta_custom_code_status')=='1'&&Configuration::get('custom_code_js')!=''){?>

		<script type="text/javascript">

			

			<?php echo Configuration::get('custom_code_js');?>


			

		</script>

	<?php }?>

	

	<!--[if lt IE 9]> 

	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> 

	<![endif]--> 

	<!--[if IE 7]>

	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
ie7.css" />

	<![endif]-->

<meta name="google-site-verification" content="QSFFCZoqJrtA2ONtqGiebTEo-R7Xg9mXhoWa9s5QtPc" />
</head>

<body <?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)){?>id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['page_name']->value, 'htmlall', 'UTF-8');?>
"<?php }?> class="<?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value){?>hide-left-column<?php }?> <?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value){?>hide-right-column<?php }?> <?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value&&$_smarty_tpl->tpl_vars['hide_right_column']->value){?>hide-left-right-column<?php }?>">



<div id="notification"></div>



<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>



	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>

	

		<?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value){?>

		<div id="restricted-country">

			<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['geolocation_country']->value;?>
</span></p>

		</div>

		<?php }?>

		

	<header>

	

		<!-- Top -->

		

		<div class="top set-size clearfix">

			

			<!-- Logo -->

			

			<h1><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['shop_name']->value, 'htmlall', 'UTF-8');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['shop_name']->value, 'htmlall', 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['logo_image_width']->value){?>width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['logo_image_height']->value){?>height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
" <?php }?> style="display:block" /></a></h1>

			

			<!-- Top Right -->

			

			<div class="top-right">

			

				<?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>


								

			</div>

			

			<!-- End Top Right -->

					

		</div>

		

		<!-- End Top -->

			

	</header>

	

	<?php if (isset(Smarty::$_smarty_vars['capture']['path'])){?><?php $_smarty_tpl->tpl_vars['path'] = new Smarty_variable(Smarty::$_smarty_vars['capture']['path'], null, 0);?><?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['path']->value)&&$_smarty_tpl->tpl_vars['path']->value){?>

		

	<!-- Page Title -->

	

	<section id="page-title">

	

		<div class="set-size-grid">

		<div class="bread" style="display:none;">

			<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'return to'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>
</a>

				<?php if (isset($_smarty_tpl->tpl_vars['path']->value)&&$_smarty_tpl->tpl_vars['path']->value){?>

					<span class="navigation-pipe" <?php if (isset($_smarty_tpl->tpl_vars['category']->value)&&isset($_smarty_tpl->tpl_vars['category']->value->id_category)&&$_smarty_tpl->tpl_vars['category']->value->id_category==1){?>style="display:none;"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['navigationPipe']->value, 'html', 'UTF-8');?>
</span>

					<?php if (!strpos($_smarty_tpl->tpl_vars['path']->value,'span')){?>

						<span class="navigation_page"><?php echo $_smarty_tpl->tpl_vars['path']->value;?>
</span>

					<?php }else{ ?>

						<?php echo $_smarty_tpl->tpl_vars['path']->value;?>


					<?php }?>

				<?php }?>
</div>
			<h2><?php echo $_smarty_tpl->tpl_vars['path']->value;?>
</h2>

		

		</div>

	

	</section>

	

	<!-- End Page Title -->

	<?php }?>

	

	<!-- Content -->

	

	<section id="content" class="set-size clearfix">

		

		<!-- Left -->

		<?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(9, null, 0);?>

		<?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable(3, null, 0);?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='category'&&Configuration::get('dilecta_width_category')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('12', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product'&&Configuration::get('dilecta_width_product')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='search'&&Configuration::get('dilecta_width_search')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='prices-drop'&&Configuration::get('dilecta_width_prices_drop')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='new-products'&&Configuration::get('dilecta_width_new_products')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='best-sales'&&Configuration::get('dilecta_width_best_sales')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='manufacturer'&&Configuration::get('dilecta_width_manufacturer')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='supplier'&&Configuration::get('dilecta_width_supplier')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?><?php $_smarty_tpl->tpl_vars['grid_center'] = new Smarty_variable(12, null, 0);?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		

		<?php if (!(Configuration::get('dilecta_column_position')=='1'&&Configuration::get('dilecta_general_status')=='1')){?>

		<div id="left_column" class="grid-<?php echo $_smarty_tpl->tpl_vars['grid_left']->value;?>
 float-left">

			<?php echo $_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value;?>


		</div>

		<?php }?>

		

		<div id="center_column" class="grid-<?php echo $_smarty_tpl->tpl_vars['grid_center']->value;?>
 float-left">

	

	<?php }?>

<?php }} ?>
<?php

if (!defined('_PS_VERSION_'))
	exit;

class Dilectathemesettings extends Module
{
	public function __construct()
	{
		$this->name = 'dilectathemesettings';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'tiquet';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Dilecta theme settings');
		$this->description = $this->l('colors, fonts, backrounds');
	}

	public function install()
	{	
		if (!Configuration::updateValue('custom_block_text', '<h3>Custom Block</h3> <p><strong>Returns</strong><br />You can return the product within 14 days of purchase.</p> <p><strong>Quaranty</strong><br />2 Years for all products</p> <p><img src="themes/dilecta/img/custom-block.png" alt="" /></p>', true) OR !Configuration::updateValue('dilecta_width_product', '1') OR !Configuration::updateValue('dilecta_custom_block_status', '1'))
			return false;
		if (!parent::install())
			return false;
		return true;
	}
	
	public function uninstall()
	{
		return parent::uninstall();
	}

	public function getContent()
	{
		$output = '';
		if (Tools::isSubmit('submitSaveSettings'))
		{
			
			if (!Configuration::updateValue('dilecta_general_status', Tools::getValue('dilecta_general_status')) OR !Configuration::updateValue('dilecta_product_full', Tools::getValue('dilecta_product_per_pow_full_width')) OR !Configuration::updateValue('dilecta_product_column', Tools::getValue('dilecta_product_per_pow_width_column'))   OR !Configuration::updateValue('dilecta_column_navigation', Tools::getValue('dilecta_column_navigation'))  OR !Configuration::updateValue('dilecta_default_list_grid', Tools::getValue('dilecta_default_list_grid'))  OR !Configuration::updateValue('dilecta_column_position', Tools::getValue('dilecta_column_position')) OR !Configuration::updateValue('dilecta_width_category', Tools::getValue('dilecta_width_category')) OR !Configuration::updateValue('dilecta_width_product', Tools::getValue('dilecta_width_product')) OR !Configuration::updateValue('dilecta_width_search', Tools::getValue('dilecta_width_search')) OR !Configuration::updateValue('dilecta_width_prices_drop', Tools::getValue('dilecta_width_prices_drop')) OR !Configuration::updateValue('dilecta_width_new_products', Tools::getValue('dilecta_width_new_products')) OR !Configuration::updateValue('dilecta_width_best_sales', Tools::getValue('dilecta_width_best_sales')) OR !Configuration::updateValue('dilecta_width_manufacturer', Tools::getValue('dilecta_width_manufacturer')) OR !Configuration::updateValue('dilecta_width_supplier', Tools::getValue('dilecta_width_supplier')) OR !Configuration::updateValue('dilecta_product_social_share', Tools::getValue('dilecta_product_social_share')) OR !Configuration::updateValue('dilecta_product_scroll_new', Tools::getValue('dilecta_product_scroll_new')) OR !Configuration::updateValue('dilecta_product_scroll_featured', Tools::getValue('dilecta_product_scroll_featured')) OR !Configuration::updateValue('dilecta_color', Tools::getValue('dilecta_color')) OR !Configuration::updateValue('dilecta_color_status', Tools::getValue('dilecta_color_status'))  OR !Configuration::updateValue('dilecta_headlines_text', Tools::getValue('dilecta_headlines_text')) OR !Configuration::updateValue('dilecta_body_text', Tools::getValue('dilecta_body_text')) OR !Configuration::updateValue('dilecta_links', Tools::getValue('dilecta_links')) OR !Configuration::updateValue('dilecta_links_hover', Tools::getValue('dilecta_links_hover')) OR !Configuration::updateValue('dilecta_price', Tools::getValue('dilecta_price')) OR !Configuration::updateValue('dilecta_product_name', Tools::getValue('dilecta_product_name')) OR !Configuration::updateValue('dilecta_custom_footer_bg', Tools::getValue('dilecta_custom_footer_bg')) OR !Configuration::updateValue('dilecta_custom_footer_border', Tools::getValue('dilecta_custom_footer_border')) OR !Configuration::updateValue('dilecta_custom_footer_headlines', Tools::getValue('dilecta_custom_footer_headlines')) OR !Configuration::updateValue('dilecta_custom_footer_body', Tools::getValue('dilecta_custom_footer_body')) OR !Configuration::updateValue('dilecta_custom_footer_links', Tools::getValue('dilecta_custom_footer_links')) OR !Configuration::updateValue('shopping_cart_icon', Tools::getValue('shopping_cart_icon')) OR !Configuration::updateValue('icon_wishlist', Tools::getValue('icon_wishlist')) OR !Configuration::updateValue('dilecta_categories_background', Tools::getValue('dilecta_categories_background')) OR !Configuration::updateValue('dilecta_categories_border_top', Tools::getValue('dilecta_categories_border_top')) OR !Configuration::updateValue('dilecta_categories_links', Tools::getValue('dilecta_categories_links')) OR !Configuration::updateValue('dilecta_categories_links_hover', Tools::getValue('dilecta_categories_links_hover')) OR !Configuration::updateValue('dilecta_input_background', Tools::getValue('dilecta_input_background')) OR !Configuration::updateValue('dilecta_input_border', Tools::getValue('dilecta_input_border')) OR !Configuration::updateValue('dilecta_input_border_hover', Tools::getValue('dilecta_input_border_hover')) OR !Configuration::updateValue('dilecta_background_page_title', Tools::getValue('dilecta_background_page_title')) OR !Configuration::updateValue('dilecta_border_page_title', Tools::getValue('dilecta_border_page_title')) OR !Configuration::updateValue('dilecta_background_banners', Tools::getValue('background_banners')) OR !Configuration::updateValue('dilecta_border_banners', Tools::getValue('dilecta_border_banners')) OR !Configuration::updateValue('dilecta_border_5px_color', Tools::getValue('dilecta_border_5px_color')) OR !Configuration::updateValue('dilecta_background_slider', Tools::getValue('dilecta_background_slider')) OR !Configuration::updateValue('dilecta_st_button_background', Tools::getValue('dilecta_st_button_background')) OR !Configuration::updateValue('dilecta_st_button_bg_hover', Tools::getValue('dilecta_st_button_bg_hover')) OR !Configuration::updateValue('dilecta_st_button_font', Tools::getValue('dilecta_st_button_font')) OR !Configuration::updateValue('dilecta_nd_button_background', Tools::getValue('dilecta_nd_button_background')) OR !Configuration::updateValue('dilecta_nd_button_bg_hover', Tools::getValue('dilecta_nd_button_bg_hover')) OR !Configuration::updateValue('dilecta_nd_button_font', Tools::getValue('dilecta_nd_button_font')) OR !Configuration::updateValue('dilecta_font_status', Tools::getValue('dilecta_font_status')) OR !Configuration::updateValue('dilecta_body_font', Tools::getValue('dilecta_body_font')) OR !Configuration::updateValue('dilecta_body_font_px', Tools::getValue('dilecta_body_font_px')) OR !Configuration::updateValue('dilecta_body_font_smaller_px', Tools::getValue('dilecta_body_font_smaller_px')) OR !Configuration::updateValue('dilecta_categories_bar', Tools::getValue('dilecta_categories_bar')) OR !Configuration::updateValue('dilecta_categories_bar_px', Tools::getValue('dilecta_categories_bar_px')) OR !Configuration::updateValue('dilecta_custom_price', Tools::getValue('dilecta_custom_price')) OR !Configuration::updateValue('dilecta_custom_price_px', Tools::getValue('dilecta_custom_price_px')) OR !Configuration::updateValue('dilecta_custom_price_px_medium', Tools::getValue('dilecta_custom_price_px_medium')) OR !Configuration::updateValue('dilecta_custom_price_px_small', Tools::getValue('dilecta_custom_price_px_small')) OR !Configuration::updateValue('dilecta_custom_price_px_old_pric', Tools::getValue('dilecta_custom_price_px_old_price')) OR !Configuration::updateValue('dilecta_product_name_font', Tools::getValue('dilecta_product_name_font')) OR !Configuration::updateValue('dilecta_product_name_font_px', Tools::getValue('dilecta_product_name_font_px')) OR !Configuration::updateValue('dilecta_headlines', Tools::getValue('dilecta_headlines')) OR !Configuration::updateValue('dilecta_headlines_px', Tools::getValue('dilecta_headlines_px')) OR !Configuration::updateValue('dilecta_footer_headlines', Tools::getValue('dilecta_footer_headlines')) OR !Configuration::updateValue('dilecta_footer_headlines_px', Tools::getValue('dilecta_footer_headlines_px')) OR !Configuration::updateValue('dilecta_page_name', Tools::getValue('dilecta_page_name')) OR !Configuration::updateValue('dilecta_page_name_px', Tools::getValue('dilecta_page_name_px')) OR !Configuration::updateValue('dilecta_button_font', Tools::getValue('dilecta_button_font')) OR !Configuration::updateValue('dilecta_button_font_px', Tools::getValue('dilecta_button_font_px')) OR !Configuration::updateValue('dilecta_background_status', Tools::getValue('dilecta_background_status')) OR !Configuration::updateValue('dilecta_general_background_color', Tools::getValue('dilecta_general_background_color')) OR !Configuration::updateValue('dilecta_footer_background_color', Tools::getValue('dilecta_footer_background_color')) OR !Configuration::updateValue('dilecta_custom_code_status', Tools::getValue('dilecta_custom_code_status')) OR !Configuration::updateValue('custom_code_css', Tools::getValue('custom_code_css')) OR !Configuration::updateValue('custom_code_js', Tools::getValue('custom_code_js')) OR !Configuration::updateValue('dilecta_custom_block_status', Tools::getValue('dilecta_custom_block_status')) OR !Configuration::updateValue('custom_block_text', Tools::getValue('custom_block_text'), true))
				return false;
				
			if (isset($errors) AND sizeof($errors))
				$output .= $this->displayError(implode('<br />', $errors));
			else
				$output .= $this->displayConfirmation($this->l('Settings updated'));
		}

		return $output.$this->displayForm();
	}
	
	public function fontslist() {
		include_once(dirname(__FILE__).'/fontlist.php');
		return get_fonts();
	}

	public function displayForm()
	{
	
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'text&#194;&#164;title';
      	
      	$output = '<script type="text/javascript" src="'.$this->_path.'js/tabs.js"></script>';
      	$output .= '<script type="text/javascript" src="'.$this->_path.'js/colorpicker.js"></script>';
      	
      	$output .= '<link rel="stylesheet" href="'.$this->_path.'css/dilecta.css" />';
      	$output .= '<link rel="stylesheet" href="'.$this->_path.'css/colorpicker.css" />';
      	$output .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet" type="text/css">
';
      	$output .= '<!-- Theme Options -->

<div class="set-size" id="theme-options">

	<h3>Dilecta Theme Options</h3>
	
	<!-- Content -->
	
	<div class="content">
	
		<div>
		
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
		
		<div class="bg-tabs">
		
			<div id="tabs" class="main-tabs">
			
				<a href="#tab_general" id="general"><span>General</span></a>
				<a href="#tab_design" id="design"><span>Design</span></a>
				<a href="#tab_width_column" id="tcustommenu"><span>Width column</span></a>
				<a href="#tab_custom_code" id="tcustomcode"><span>Custom code</span></a>
				<a href="#tab_custom_block" id="tcustomblock"><span>Custom block</span></a>
			
			</div>';

      	// General
      	
      	$output .= '<div id="tab_general" class="tab-content">';

				if((Configuration::get('dilecta_general_status')) == '1') { 
				
					$output .= '<div class="status status-on" title="1" rel="dilecta_general_status"></div>'; 
				
				} else { 
				
					$output .= '<div class="status status-off" title="0" rel="dilecta_general_status"></div>'; 
					
				} 
				
				$output .= '<input name="dilecta_general_status" value="'.(Configuration::get('dilecta_general_status')).'" id="dilecta_general_status" type="hidden" />';
      	
      		$output .= '<div id="general" style="float:left;width:330px"><h4>General settings</h4>';
      		
      			// Input
      			
      			$output .= '<div class="input"><p>Product number per row full width</p><select name="dilecta_product_per_pow_full_width">';
      			
      			if((Configuration::get('dilecta_product_full')) > 2) { 
      			
      				$output .= '<option value="3"'.(Configuration::get('dilecta_product_full') == 3 ? ' selected="selected"' : '').'>3</option>';
      				$output .= '<option value="4"'.(Configuration::get('dilecta_product_full') == 4 ? ' selected="selected"' : '').'>4</option>';
      				$output .= '<option value="5"'.(Configuration::get('dilecta_product_full') == 5 ? ' selected="selected"' : '').'>5</option>';
      				$output .= '<option value="6"'.(Configuration::get('dilecta_product_full') == 6 ? ' selected="selected"' : '').'>6</option>';
      				$output .= '<option value="7"'.(Configuration::get('dilecta_product_full') == 7 ? ' selected="selected"' : '').'>7</option>';
      				
					} else {
					
      				$output .= '<option value="3">3</option>';
      				$output .= '<option value="4" selected="selected">4</option>';
      				$output .= '<option value="5">5</option>';
      				$output .= '<option value="6">6</option>';
      				$output .= '<option value="7">7</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>Product number per row with column</p><select name="dilecta_product_per_pow_width_column">';
      			
      			if((Configuration::get('dilecta_product_column')) > 1) { 
      			
      				$output .= '<option value="2"'.(Configuration::get('dilecta_product_column') == 2 ? ' selected="selected"' : '').'>2</option>';
      				$output .= '<option value="3"'.(Configuration::get('dilecta_product_column') == 3 ? ' selected="selected"' : '').'>3</option>';
      				$output .= '<option value="4"'.(Configuration::get('dilecta_product_column') == 4 ? ' selected="selected"' : '').'>4</option>';
      				$output .= '<option value="5"'.(Configuration::get('dilecta_product_column') == 5 ? ' selected="selected"' : '').'>5</option>';
      				
					} else {
					
      				$output .= '<option value="2">2</option>';
      				$output .= '<option value="3" selected="selected">3</option>';
      				$output .= '<option value="4">4</option>';
      				$output .= '<option value="5">5</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>Column navigation</p><select name="dilecta_column_navigation">';
      			
      			if((Configuration::get('dilecta_column_navigation')) > 0) { 
      			
      				$output .= '<option value="1"'.(Configuration::get('dilecta_column_navigation') == 1 ? ' selected="selected"' : '').'>1</option>';
      				$output .= '<option value="2"'.(Configuration::get('dilecta_column_navigation') == 2 ? ' selected="selected"' : '').'>2</option>';
      				$output .= '<option value="3"'.(Configuration::get('dilecta_column_navigation') == 3 ? ' selected="selected"' : '').'>3</option>';
      				$output .= '<option value="4"'.(Configuration::get('dilecta_column_navigation') == 4 ? ' selected="selected"' : '').'>4</option>';
      				
					} else {
					
      				$output .= '<option value="1" selected="selected">1</option>';
      				$output .= '<option value="2">2</option>';
      				$output .= '<option value="3">3</option>';
      				$output .= '<option value="4">4</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>Default list/grid</p><select name="dilecta_default_list_grid">';
      			
      			if((Configuration::get('dilecta_default_list_grid')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">List</option>';
      				
					} else {
					
      				$output .= '<option value="0">List</option>';
					
					}
      			if((Configuration::get('dilecta_default_list_grid')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
    		      		      		      		      		      		      		      		      		
      			// Input
      			
      			$output .= '<div class="input"><p>Column position</p><select name="dilecta_column_position">';
      			
      			if((Configuration::get('dilecta_column_position')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Left</option>';
      				
					} else {
					
      				$output .= '<option value="0">Left</option>';
					
					}
      			if((Configuration::get('dilecta_column_position')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Right</option>';
      				
					} else {
					
      				$output .= '<option value="1">Right</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
    		      		      		      		      		      		      		      		
      		$output .= '</div>';
      		
      		// Functions
      		
      		$output .= '<div class="functions"><h4>Functions</h4>';
	      		
	      		// Input
	      		
	      		$output .= '<div class="input"><p>Product social share</p>';
	      		
					if((Configuration::get('dilecta_product_social_share')) == '0' && (Configuration::get('dilecta_product_social_share')) != '') { 
					
						$output .= '<div class="status status-off" title="0" rel="dilecta_product_social_share"></div>'; 
					
					} else { 
					
						$output .= '<div class="status status-on" title="1" rel="dilecta_product_social_share"></div>'; 
						
					} 
					
					$output .= '<input name="dilecta_product_social_share" value="'.(Configuration::get('dilecta_product_social_share')).'" id="dilecta_product_social_share" type="hidden" />';
					
					$output .= '<div class="clear"></div></div>';
					
					// End Input
					
					$output .= '<div class="input"><p>Product scroll:</p><div class="clear"></div></div>';
					
	      		// Input
	      		
	      		$output .= '<div class="input"><p>&nbsp;&nbsp;&nbsp;&nbsp;- new</p>';
	      		
					if((Configuration::get('dilecta_product_scroll_new')) == '0' && (Configuration::get('dilecta_product_scroll_new')) != '') { 
					
						$output .= '<div class="status status-off" title="0" rel="dilecta_product_scroll_new"></div>'; 
					
					} else { 
					
						$output .= '<div class="status status-on" title="1" rel="dilecta_product_scroll_new"></div>'; 
						
					} 
					
					$output .= '<input name="dilecta_product_scroll_new" value="'.(Configuration::get('dilecta_product_scroll_new')).'" id="dilecta_product_scroll_new" type="hidden" />';
					
					$output .= '<div class="clear"></div></div>';
					
					// End Input
					
	      		// Input
	      		
	      		$output .= '<div class="input"><p>&nbsp;&nbsp;&nbsp;&nbsp;- featured</p>';
	      		
					if((Configuration::get('dilecta_product_scroll_featured')) == '0' && (Configuration::get('dilecta_product_scroll_featured')) != '') { 
					
						$output .= '<div class="status status-off" title="0" rel="dilecta_product_scroll_featured"></div>'; 
					
					} else { 
					
						$output .= '<div class="status status-on" title="1" rel="dilecta_product_scroll_featured"></div>'; 
						
					} 
					
					$output .= '<input name="dilecta_product_scroll_featured" value="'.(Configuration::get('dilecta_product_scroll_featured')).'" id="dilecta_product_scroll_featured" type="hidden" />';
					
					$output .= '<div class="clear"></div></div>';
					
					// End Input


      		
      		$output .= '</div>';
      	
      	$output .= '</div>';
      	
      	// Design
      	
      	$output .= '<div id="tab_design" class="tab-content2">';
      	
      		$output .= '						<div id="tabs_design" class="htabs tabs-design">
						
							<a href="#tab_font" id="tfont"><span>Font</span></a>
							<a href="#tab_colors" id="tcolors"><span>Colors</span></a>
						
						</div>';
						
						
				// Font
						
				$output .= '<div id="tab_font" class="tab-content">';
				
					if((Configuration::get('dilecta_font_status')) == '1') { 
					
						$output .= '<div class="status status-on" title="1" rel="dilecta_font_status"></div>'; 
					
					} else { 
					
						$output .= '<div class="status status-off" title="0" rel="dilecta_font_status"></div>'; 
						
					} 
					
					$output .= '<input name="dilecta_font_status" value="'.(Configuration::get('dilecta_font_status')).'" id="dilecta_font_status" type="hidden" />';
					
					$output .= '<h4>Font settings</h4>';
					
					// Body font
					
					$output .= '<div class="input"><p>Body font</p>';
					
						$output .= '<select name="dilecta_body_font">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_body_font') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<select name="dilecta_body_font_px" style="width:80px;margin-right:25px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_body_font_px') == $x || ($x == 12 && Configuration::get('dilecta_body_font_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						$output .= '<p style="width:60px">Smaller</p>';
						$output .= '<select name="dilecta_body_font_smaller_px" style="width:80px;margin-right:35px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_body_font_smaller_px') == $x || ($x == 11 && Configuration::get('dilecta_body_font_smaller_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
					
					// Categories bar
					
					$output .= '<div class="input"><p>Categories bar</p>';
					
						$output .= '<select name="dilecta_categories_bar">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_categories_bar') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<select name="dilecta_categories_bar_px" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_categories_bar_px') == $x || ($x == 14 && Configuration::get('dilecta_categories_bar_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
					
					// Price
					
					$output .= '<div class="input"><p>Price</p>';
					
						$output .= '<select name="dilecta_custom_price">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_custom_price') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<p style="width:51px">Big</p>';
						$output .= '<select name="dilecta_custom_price_px" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_custom_price_px') == $x || ($x == 40 && Configuration::get('dilecta_custom_price_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						$output .= '<p style="width:71px">Medium</p>';
						$output .= '<select name="dilecta_custom_price_px_medium" style="width:80px;margin-right:0px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_custom_price_px_medium') == $x || ($x == 17 && Configuration::get('dilecta_custom_price_px_medium') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						$output .= '<div class="clear" style="height:15px"></div>';
						$output .= '<div style="float:left;width:340px;height:10px"></div><p style="width:51px">Small</p>';
						$output .= '<select name="dilecta_custom_price_px_small" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_custom_price_px_small') == $x || ($x == 12 && Configuration::get('dilecta_custom_price_px_small') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						$output .= '<p style="width:71px">Old price</p>';
						$output .= '<select name="dilecta_custom_price_px_old_price" style="width:80px;margin-right:0px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_custom_price_px_old_price') == $x || ($x == 12 && Configuration::get('dilecta_custom_price_px_old_price') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
					
					// Product name
					
					$output .= '<div class="input"><p>Product name</p>';
					
						$output .= '<select name="dilecta_product_name_font">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_product_name_font') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<select name="dilecta_product_name_font_px" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_product_name_font_px') == $x || ($x == 12 && Configuration::get('dilecta_product_name_font_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
					
					// Headlines
					
					$output .= '<div class="input"><p>Headlines</p>';
					
						$output .= '<select name="dilecta_headlines">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_headlines') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<select name="dilecta_headlines_px" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_headlines_px') == $x || ($x == 18 && Configuration::get('dilecta_headlines_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
					
					// Headlines
					
					$output .= '<div class="input"><p>Footer headlines</p>';
					
						$output .= '<select name="dilecta_footer_headlines">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_footer_headlines') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<select name="dilecta_footer_headlines_px" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_footer_headlines_px') == $x || ($x == 18 && Configuration::get('dilecta_footer_headlines_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
					
					// Page name
					
					$output .= '<div class="input"><p>Page name</p>';
					
						$output .= '<select name="dilecta_page_name">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_page_name') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<select name="dilecta_page_name_px" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_page_name_px') == $x || ($x == 30 && Configuration::get('dilecta_page_name_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
							
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
					
					// Button
					
					$output .= '<div class="input"><p>Button</p>';
					
						$output .= '<select name="dilecta_button_font">';
						foreach ($this->fontslist() as $key => $font) {
						
							if (Configuration::get('dilecta_button_font') == $font) {
								$selected = "selected";
							} else {
							  $selected = "";
							}
							
							$output .= '<option '.$selected.' value="'.$font.'">'.$font.'</option>';	
			
						}
						$output .= '</select>';
						$output .= '<select name="dilecta_button_font_px" style="width:80px">';
						
							for( $x = 9; $x <= 50; $x++ ) {
							
								if (Configuration::get('dilecta_button_font_px') == $x || ($x == 12 && Configuration::get('dilecta_button_font_px') < 6) ) {
									$selected = "selected";
								} else {
								  $selected = "";
								}
							
							$output .= '<option '.$selected.' value="'.$x.'">'.$x.' px</option>';	
							
							}
						$output .= '</select>';
						
					$output .= '<div class="clear"></div></div>';
											
				$output .= '</div>';
				
				// Colors
				
				$output .= '<div id="tab_colors" class="tab-content"><h4>Colors settings</h4>';
				
					$output .= '<ul class="select-color-settings">';
						
						if(Configuration::get('dilecta_color') < 1) {
						
							$output .= '<li><a href="javascript:;" rel="0" class="active"><img src="../modules/dilectathemesettings/img/version_1.png" alt=""></a></li>';
						
						} else {
						
							$output .= '<li><a href="javascript:;" rel="0"><img src="../modules/dilectathemesettings/img/version_1.png" alt=""></a></li>';
						
						}
						if(Configuration::get('dilecta_color') == 1) {
						
							$output .= '<li><a href="javascript:;" rel="1" class="active"><img src="../modules/dilectathemesettings/img/version_2.png" alt=""></a></li>';
						
						} else {
						
							$output .= '<li><a href="javascript:;" rel="1"><img src="../modules/dilectathemesettings/img/version_2.png" alt=""></a></li>';
						
						}
						if(Configuration::get('dilecta_color') == 2) {
						
							$output .= '<li><a href="javascript:;" rel="2" class="active"><img src="../modules/dilectathemesettings/img/version_3.png" alt=""></a></li>';
						
						} else {
						
							$output .= '<li><a href="javascript:;" rel="2"><img src="../modules/dilectathemesettings/img/version_3.png" alt=""></a></li>';
						
						}
						if(Configuration::get('dilecta_color') == 3) {
						
							$output .= '<li><a href="javascript:;" rel="3" class="active"><img src="../modules/dilectathemesettings/img/version_4.png" alt=""></a></li>';
						
						} else {
						
							$output .= '<li><a href="javascript:;" rel="3"><img src="../modules/dilectathemesettings/img/version_4.png" alt=""></a></li>';
						
						}
						if(Configuration::get('dilecta_color') == 4) {
						
							$output .= '<li><a href="javascript:;" rel="4" class="active"><img src="../modules/dilectathemesettings/img/version_5.png" alt=""></a></li>';
						
						} else {
						
							$output .= '<li><a href="javascript:;" rel="4"><img src="../modules/dilectathemesettings/img/version_5.png" alt=""></a></li>';
						
						}						
						if(Configuration::get('dilecta_color') == 5) {
						
							$output .= '<li><a href="javascript:;" rel="5" class="active"><img src="../modules/dilectathemesettings/img/version_6.png" alt=""></a></li>';
						
						} else {
						
							$output .= '<li><a href="javascript:;" rel="5"><img src="../modules/dilectathemesettings/img/version_6.png" alt=""></a></li>';
						
						}
												
						
					$output .= '</ul>';
					
					$output .= '<input name="dilecta_color" value="'.(Configuration::get('dilecta_color')).'" id="dilecta_color" type="hidden" />';

					if((Configuration::get('dilecta_color_status')) == '1') { 
					
						$output .= '<div class="status status-on" title="1" rel="dilecta_color_status"></div>'; 
					
					} else { 
					
						$output .= '<div class="status status-off" title="0" rel="dilecta_color_status"></div>'; 
						
					} 
					
					$output .= '<input name="dilecta_color_status" value="'.(Configuration::get('dilecta_color_status')).'" id="dilecta_color_status" type="hidden" />';
					
					// Body Fonts
					
					$output .= '<div class="colors_left"><h5>Body fonts</h5>';
					
						$output .= '<div class="color_input"><p>Headlines</p><div><input type="text" value="'.(Configuration::get('dilecta_headlines_text')).'" id="headlines_text" name="dilecta_headlines_text" /></div></div>';
						$output .= '<div class="color_input"><p>Body text</p><div><input type="text" value="'.(Configuration::get('dilecta_body_text')).'" id="body_text" name="dilecta_body_text" /></div></div>';
						$output .= '<div class="color_input"><p>Links</p><div><input type="text" value="'.(Configuration::get('dilecta_links')).'" id="links" name="dilecta_links" /></div></div>';
						$output .= '<div class="color_input"><p>Links hover</p><div><input type="text" value="'.(Configuration::get('dilecta_links_hover')).'" id="links_hover" name="dilecta_links_hover" /></div></div>';
						$output .= '<div class="color_input"><p>Price</p><div><input type="text" value="'.(Configuration::get('dilecta_price')).'" id="price" name="dilecta_price" /></div></div>';
						$output .= '<div class="color_input"><p>Product name</p><div><input type="text" value="'.(Configuration::get('dilecta_product_name')).'" id="product_name" name="dilecta_product_name" /></div></div>';
					
					$output .= '</div>';
					
					// Colors center
					
					$output .= '<div class="colors_center"><h5>Custom Footer</h5>';
					
						$output .= '<div class="color_input"><p>Background</p><div><input type="text" value="'.(Configuration::get('dilecta_custom_footer_bg')).'" id="custom_footer_bg" name="dilecta_custom_footer_bg" /></div></div>';
						$output .= '<div class="color_input"><p>Border</p><div><input type="text" value="'.(Configuration::get('dilecta_custom_footer_border')).'" id="custom_footer_border" name="dilecta_custom_footer_border" /></div></div>';
						$output .= '<div class="color_input"><p>Headlines</p><div><input type="text" value="'.(Configuration::get('dilecta_custom_footer_headlines')).'" id="custom_footer_headlines" name="dilecta_custom_footer_headlines" /></div></div>';
						$output .= '<div class="color_input"><p>Body</p><div><input type="text" value="'.(Configuration::get('dilecta_custom_footer_body')).'" id="custom_footer_body" name="dilecta_custom_footer_body" /></div></div>';
						$output .= '<div class="color_input"><p>Links</p><div><input type="text" value="'.(Configuration::get('dilecta_custom_footer_links')).'" id="custom_footer_links" name="dilecta_custom_footer_links" /></div></div>';

					$output .= '</div>';
					
					// Colors Right
					
					$output .= '<div class="colors_right"><h5>Header</h5>';
					
						$output .= '<div class="color_input"><p>Shopping cart icon</p><div><input type="text" value="'.(Configuration::get('shopping_cart_icon')).'" id="shopping_cart_icon" name="shopping_cart_icon" /></div></div>';

					$output .= '</div>';
					
					$output .= '<p style="font-size:1px;line-height:1px;height:1px;clear:both;margin:0px;padding:0px;"></p>';
					
					// Colors Left
					
					$output .= '<div class="colors_left"><h5>Categories</h5>';
					
						$output .= '<div class="color_input"><p>Background</p><div><input type="text" value="'.(Configuration::get('dilecta_categories_background')).'" id="categories_background" name="dilecta_categories_background" /></div></div>';
						$output .= '<div class="color_input"><p>Border top</p><div><input type="text" value="'.(Configuration::get('dilecta_categories_border_top')).'" id="categories_border_top" name="dilecta_categories_border_top" /></div></div>';
						$output .= '<div class="color_input"><p>Categories links</p><div><input type="text" value="'.(Configuration::get('dilecta_categories_links')).'" id="categories_links" name="dilecta_categories_links" /></div></div>';
						$output .= '<div class="color_input"><p>Categories links hover</p><div><input type="text" value="'.(Configuration::get('dilecta_categories_links_hover')).'" id="categories_links_hover" name="dilecta_categories_links_hover" /></div></div>';
					
					$output .= '</div>';
					
					// Colors center
					
					$output .= '<div class="colors_center"><h5>Inputs</h5>';
					
						$output .= '<div class="color_input"><p>Background</p><div><input type="text" value="'.(Configuration::get('dilecta_input_background')).'" id="input_background" name="dilecta_input_background" /></div></div>';
						$output .= '<div class="color_input"><p>Border</p><div><input type="text" value="'.(Configuration::get('dilecta_input_border')).'" id="input_border" name="dilecta_input_border" /></div></div>';
						$output .= '<div class="color_input"><p>Border hover</p><div><input type="text" value="'.(Configuration::get('dilecta_input_border_hover')).'" id="input_border_hover" name="dilecta_input_border_hover" /></div></div>';

					$output .= '</div>';
					
					// Colors Right
					
					$output .= '<div class="colors_right"><h5>Rest elements</h5>';
					
						$output .= '<div class="color_input"><p>Background page title</p><div><input type="text" value="'.(Configuration::get('dilecta_background_page_title')).'" id="background_page_title" name="dilecta_background_page_title" /></div></div>';
						$output .= '<div class="color_input"><p>Border page title</p><div><input type="text" value="'.(Configuration::get('dilecta_border_page_title')).'" id="border_page_title" name="dilecta_border_page_title" /></div></div>';
						$output .= '<div class="color_input"><p>Background banners</p><div><input type="text" value="'.(Configuration::get('dilecta_background_banners')).'" id="background_banners" name="background_banners" /></div></div>';
						$output .= '<div class="color_input"><p>Border banners</p><div><input type="text" value="'.(Configuration::get('dilecta_border_banners')).'" id="border_banners" name="dilecta_border_banners" /></div></div>';
						$output .= '<div class="color_input"><p>Border 5px color</p><div><input type="text" value="'.(Configuration::get('dilecta_border_5px_color')).'" id="border_5px_color" name="dilecta_border_5px_color" /></div></div>';
						$output .= '<div class="color_input"><p>Background slider</p><div><input type="text" value="'.(Configuration::get('dilecta_background_slider')).'" id="background_slider" name="dilecta_background_slider" /></div></div>';

					$output .= '</div>';
					
					$output .= '<p style="font-size:1px;line-height:1px;height:1px;clear:both;margin:0px;padding:0px;"></p>';
					
					// Colors Left
					
					$output .= '<div class="colors_left"><h5>1st Button</h5>';
					
						$output .= '<div class="color_input"><p>Background</p><div><input type="text" value="'.(Configuration::get('dilecta_st_button_background')).'" id="st_button_background" name="dilecta_st_button_background" /></div></div>';
						$output .= '<div class="color_input"><p>Background hover</p><div><input type="text" value="'.(Configuration::get('dilecta_st_button_bg_hover')).'" id="st_button_background_hover" name="dilecta_st_button_bg_hover" /></div></div>';
						$output .= '<div class="color_input"><p>Font</p><div><input type="text" value="'.(Configuration::get('dilecta_st_button_font')).'" id="st_button_font" name="dilecta_st_button_font" /></div></div>';

					$output .= '</div>';
					
					// Colors Center
					
					$output .= '<div class="colors_center"><h5>2nd Button</h5>';
					
						$output .= '<div class="color_input"><p>Background</p><div><input type="text" value="'.(Configuration::get('dilecta_nd_button_background')).'" id="nd_button_background" name="dilecta_nd_button_background" /></div></div>';
						$output .= '<div class="color_input"><p>Background hover</p><div><input type="text" value="'.(Configuration::get('dilecta_nd_button_bg_hover')).'" id="nd_button_background_hover" name="dilecta_nd_button_bg_hover" /></div></div>';
						$output .= '<div class="color_input"><p>Font</p><div><input type="text" value="'.(Configuration::get('dilecta_nd_button_font')).'" id="nd_button_font" name="dilecta_nd_button_font" /></div></div>';
					
					$output .= '</div>';
				
				$output .= '</div>';				
      	
      	$output .= '</div>';
      	
      	// Width column
      	
      	$output .= '<div id="tab_width_column" class="tab-content">';
      	
      			
      			// Width column center
      			
      			$output .= '<div class="clear" style="height:10px"></div><h4>Width column center</h4>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page category</p><select name="dilecta_width_category">';
      			
      			if((Configuration::get('dilecta_width_category')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_category')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page product</p><select name="dilecta_width_product">';
      			
      			if((Configuration::get('dilecta_width_product')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_product')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page search</p><select name="dilecta_width_search">';
      			
      			if((Configuration::get('dilecta_width_search')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_search')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page prices drop</p><select name="dilecta_width_prices_drop">';
      			
      			if((Configuration::get('dilecta_width_prices_drop')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_prices_drop')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page new products</p><select name="dilecta_width_new_products">';
      			
      			if((Configuration::get('dilecta_width_new_products')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_new_products')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page best sales</p><select name="dilecta_width_best_sales">';
      			
      			if((Configuration::get('dilecta_width_best_sales')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_best_sales')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page manufacturer</p><select name="dilecta_width_manufacturer">';
      			
      			if((Configuration::get('dilecta_width_manufacturer')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_manufacturer')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>On page supplier</p><select name="dilecta_width_supplier">';
      			
      			if((Configuration::get('dilecta_width_supplier')) == '0') { 
      			
      				$output .= '<option value="0" selected="selected">Grid 9</option>';
      				
					} else {
					
      				$output .= '<option value="0">Grid 9</option>';
					
					}
      			if((Configuration::get('dilecta_width_supplier')) == '1') { 
      			
      				$output .= '<option value="1" selected="selected">Grid 12</option>';
      				
					} else {
					
      				$output .= '<option value="1">Grid 12</option>';
					
					}

      			$output .= '</select><div class="clear"></div></div>';
      	
      	$output .= '</div>';
      	
      	// END WIDTH COLUMN
      	
      	// CUSTOM CODE
      	
      	$output .= '<div id="tab_custom_code" class="tab-content">';

				if((Configuration::get('dilecta_custom_code_status')) == '1') { 
				
					$output .= '<div class="status status-on" title="1" rel="dilecta_custom_code_status"></div>'; 
				
				} else { 
				
					$output .= '<div class="status status-off" title="0" rel="dilecta_custom_code_status"></div>'; 
					
				} 
				
				$output .= '<input name="dilecta_custom_code_status" value="'.(Configuration::get('dilecta_custom_code_status')).'" id="dilecta_custom_code_status" type="hidden" />';
				
				$output .= '<h4>Custom code</h4>';
				
      			// Input
      			
      			$output .= '<div class="input"><p>Custom CSS code</p>';
      			
      			
      				$output .= '<textarea rows="0" cols="0" name="custom_code_css">'.(Configuration::get('custom_code_css')).'</textarea>';

      			$output .= '<div class="clear"></div></div>';
      			
      			// Input
      			
      			$output .= '<div class="input"><p>Custom JavaScript code</p>';
      			
      			
      				$output .= '<textarea rows="0" cols="0" name="custom_code_js">'.(Configuration::get('custom_code_js')).'</textarea>';

      			$output .= '<div class="clear"></div></div>';
      	
      	$output .= '</div>';
      	
      	// END CUSTOM CODE
      	
      	// CUSTOM BLOCK
      	
      	$output .= '<div id="tab_custom_block" class="tab-content">';

				if((Configuration::get('dilecta_custom_block_status')) == '1') { 
				
					$output .= '<div class="status status-on" title="1" rel="dilecta_custom_block_status"></div>'; 
				
				} else { 
				
					$output .= '<div class="status status-off" title="0" rel="dilecta_custom_block_status"></div>'; 
					
				} 
				
				$output .= '<input name="dilecta_custom_block_status" value="'.(Configuration::get('dilecta_custom_block_status')).'" id="dilecta_custom_block_status" type="hidden" />';
				
				$output .= '<h4>Custom block on product page</h4>';
				
				$output .= '<p class="text">Shown only when product page is in full width mode.</p>';
				
      			// Input
      			
      			$output .= '<div class="input"><p>Text</p>';
      			
      			
      				$output .= '<textarea rows="0" cols="0" name="custom_block_text">'.(Configuration::get('custom_block_text')).'</textarea>';

      			$output .= '<div class="clear"></div></div>';
      	
      	$output .= '</div>';
      	
      	// END CUSTOM BLOCK
      	
      	$output .= '<div class="buttons"><input type="submit" name="submitSaveSettings" value="'.$this->l('Save').'" class="button-save" /></div>';
      	
      	$output .= '</div></form></div></div></div>';
      	      	      	
		return $output;
	}

}

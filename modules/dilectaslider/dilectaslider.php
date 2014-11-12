<?php

if (!defined('_PS_VERSION_'))
	exit;

class Dilectaslider extends Module
{
	public function __construct()
	{
		$this->name = 'dilectaslider';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'tiquet';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Dilecta slider');
		$this->description = $this->l('beautiful slider');
	}

	public function install()
	{	
			if ( !Configuration::updateValue('slider_height', '450') OR !Configuration::updateValue('slider_speed', '9') OR !Configuration::updateValue('slider_layout_type', '0') OR !Configuration::updateValue('slider_1_1_status', '1') OR !Configuration::updateValue('slider_1_1_image', 'slider2.jpg') OR !Configuration::updateValue('slider_1_1_transition_effect', 'slideleft') OR !Configuration::updateValue('slider_1_1_1_status', '1') OR !Configuration::updateValue('slider_1_1_1_style', 'small_header') OR !Configuration::updateValue('slider_1_1_1_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_1_1_1_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_1_1_1_text', 'OPENCART THEME') OR !Configuration::updateValue('slider_1_1_1_speed', '300') OR !Configuration::updateValue('slider_1_1_1_start', '300')  OR !Configuration::updateValue('slider_1_1_1_x', '596') OR !Configuration::updateValue('slider_1_1_1_y', '83') OR !Configuration::updateValue('slider_1_1_2_status', '1') OR !Configuration::updateValue('slider_1_1_2_style', 'large_description') OR !Configuration::updateValue('slider_1_1_2_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_1_1_2_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_1_1_2_text', 'New Beauty&<br />Responsive', true) OR !Configuration::updateValue('slider_1_1_2_speed', '300') OR !Configuration::updateValue('slider_1_1_2_start', '800')  OR !Configuration::updateValue('slider_1_1_2_x', '588') OR !Configuration::updateValue('slider_1_1_2_y', '123') OR !Configuration::updateValue('slider_1_1_3_status', '1') OR !Configuration::updateValue('slider_1_1_3_style', 'none') OR !Configuration::updateValue('slider_1_1_3_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_1_1_3_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_1_1_3_text', '<a href="#" class="button-slider">BUY NOW</a>', true) OR !Configuration::updateValue('slider_1_1_3_speed', '300') OR !Configuration::updateValue('slider_1_1_3_start', '1100')  OR !Configuration::updateValue('slider_1_1_3_x', '596') OR !Configuration::updateValue('slider_1_1_3_y', '313') OR !Configuration::updateValue('slider_2_1_status', '1') OR !Configuration::updateValue('slider_2_1_image', 'slider3.jpg') OR !Configuration::updateValue('slider_2_1_transition_effect', 'papercut') OR !Configuration::updateValue('slider_2_1_1_status', '1') OR !Configuration::updateValue('slider_2_1_1_style', 'small_header') OR !Configuration::updateValue('slider_2_1_1_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_2_1_1_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_2_1_1_text', 'ALL IN ONE') OR !Configuration::updateValue('slider_2_1_1_speed', '300') OR !Configuration::updateValue('slider_2_1_1_start', '300')  OR !Configuration::updateValue('slider_2_1_1_x', '40') OR !Configuration::updateValue('slider_2_1_1_y', '83') OR !Configuration::updateValue('slider_2_1_2_status', '1') OR !Configuration::updateValue('slider_2_1_2_style', 'large_description') OR !Configuration::updateValue('slider_2_1_2_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_2_1_2_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_2_1_2_text', 'Unlimited colors<br />google fonts', true) OR !Configuration::updateValue('slider_2_1_2_speed', '300') OR !Configuration::updateValue('slider_2_1_2_start', '800')  OR !Configuration::updateValue('slider_2_1_2_x', '34') OR !Configuration::updateValue('slider_2_1_2_y', '123') OR !Configuration::updateValue('slider_2_1_3_status', '1') OR !Configuration::updateValue('slider_2_1_3_style', 'none') OR !Configuration::updateValue('slider_2_1_3_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_2_1_3_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_2_1_3_text', '<a href="#" class="button-slider2">BUY NOW</a>', true) OR !Configuration::updateValue('slider_2_1_3_speed', '300') OR !Configuration::updateValue('slider_2_1_3_start', '1140')  OR !Configuration::updateValue('slider_2_1_3_x', '40') OR !Configuration::updateValue('slider_2_1_3_y', '317') OR !Configuration::updateValue('slider_3_1_status', '1') OR !Configuration::updateValue('slider_3_1_image', 'slider4.jpg') OR !Configuration::updateValue('slider_3_1_transition_effect', 'cube') OR !Configuration::updateValue('slider_3_1_1_status', '1') OR !Configuration::updateValue('slider_3_1_1_style', 'small_header') OR !Configuration::updateValue('slider_3_1_1_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_3_1_1_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_3_1_1_text', 'MORE...') OR !Configuration::updateValue('slider_3_1_1_speed', '300') OR !Configuration::updateValue('slider_3_1_1_start', '300')  OR !Configuration::updateValue('slider_3_1_1_x', '10') OR !Configuration::updateValue('slider_3_1_1_y', '157') OR !Configuration::updateValue('slider_3_1_2_status', '1') OR !Configuration::updateValue('slider_3_1_2_style', 'medium_description') OR !Configuration::updateValue('slider_3_1_2_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_3_1_2_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_3_1_2_text', 'CustomFooter<br>Module', true) OR !Configuration::updateValue('slider_3_1_2_speed', '300') OR !Configuration::updateValue('slider_3_1_2_start', '800')  OR !Configuration::updateValue('slider_3_1_2_x', '7') OR !Configuration::updateValue('slider_3_1_2_y', '199') OR !Configuration::updateValue('slider_3_1_3_status', '1') OR !Configuration::updateValue('slider_3_1_3_style', 'small_header_align_right') OR !Configuration::updateValue('slider_3_1_3_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_3_1_3_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_3_1_3_text', '...AND MORE', true) OR !Configuration::updateValue('slider_3_1_3_speed', '300') OR !Configuration::updateValue('slider_3_1_3_start', '300')  OR !Configuration::updateValue('slider_3_1_3_x', '1040') OR !Configuration::updateValue('slider_3_1_3_y', '157') OR !Configuration::updateValue('slider_3_1_4_status', '1') OR !Configuration::updateValue('slider_3_1_4_style', 'medium_description_align_right') OR !Configuration::updateValue('slider_3_1_4_easing', 'easeOutExpo') OR !Configuration::updateValue('slider_3_1_4_endeasing', 'easeInSine') OR !Configuration::updateValue('slider_3_1_4_text', 'CustomFooter<br>Module', true) OR !Configuration::updateValue('slider_3_1_4_speed', '300') OR !Configuration::updateValue('slider_3_1_4_start', '800')  OR !Configuration::updateValue('slider_3_1_4_x', '840') OR !Configuration::updateValue('slider_3_1_4_y', '199') )
				return false;
			
			if (!parent::install() || !$this->registerHook('displayHome') || !$this->registerHook('displayHeader'))
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
	
	$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
	$languages = Language::getLanguages(false);
			
		if (Tools::isSubmit('submitSaveSettings'))
		{

			for ($n = 1; $n <= 6; $n++) { 
			
				foreach ($languages as $language) { if($language['active'] == 1) {
				
					if ( !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_status', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_status')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_transition_effect', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_transition_effect')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_link', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_link')) ) { return false; }
					
					for ($s = 1; $s <= 6; $s++) { 
					
						if ( !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_status', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_status')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_style', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_style')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_easing', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_easing')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_endeasing', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_endeasing')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_text', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_text'), true) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_speed', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_speed')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_start', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_start')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_x', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_x')) OR !Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_y', Tools::getValue('slider_'.$n.'_'.$language['id_lang'].'_'.$s.'_y')) ) { return false; }
				
					}
				
				} }
			
			}
			
			if ( !Configuration::updateValue('slider_height', Tools::getValue('slider_height')) OR !Configuration::updateValue('slider_speed', Tools::getValue('slider_speed')) OR !Configuration::updateValue('slider_layout_type', Tools::getValue('slider_layout_type')) ) { return false; }
				
			if (isset($errors) AND sizeof($errors)) {
				$output .= $this->displayError(implode('<br />', $errors));
			} else {
				$output .= $this->displayConfirmation($this->l('Settings updated'));
			}
			
		}
				
			// UPLOAD IMAGE
				
			for ($n = 1; $n <= 6; $n++) { 
			
				foreach ($languages as $language) { if($language['active'] == 1) {
								
					if (Tools::isSubmit('slider_'.$n.'_'.$language['id_lang'].'_image')) {
									
						if (isset($_FILES['slider_'.$n.'_'.$language['id_lang'].'_image_field']) && isset($_FILES['slider_'.$n.'_'.$language['id_lang'].'_image_field']['tmp_name']) && !empty($_FILES['slider_'.$n.'_'.$language['id_lang'].'_image_field']['tmp_name'])) {

							if ($error = ImageManager::validateUpload($_FILES['slider_'.$n.'_'.$language['id_lang'].'_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))

								$errors .= $error;
							
			else {

								Configuration::updateValue('slider_'.$n.'_'.$language['id_lang'].'_image', $_FILES['slider_'.$n.'_'.$language['id_lang'].'_image_field']['name']);
								if (!move_uploaded_file($_FILES['slider_'.$n.'_'.$language['id_lang'].'_image_field']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/sliders/' . Configuration::get('slider_'.$n.'_'.$language['id_lang'].'_image')))
									$errors .= $this -> l('Error move uploaded file');
				  
								
								if($errors != '') { $output .= '<div class="error">'.$errors.'</div>'; } else { $output .= '<div class="conf confirm">' . $this -> l('Image uploaded') . '</div>'; }
								
							}
							
						}
						
					} // if (Tools::isSubmit('slider_'.$n.'_'.$language['id_lang'].'_image')) {
				
				} } // foreach ($languages as $language) {
			
			} // for ($n = 1; $n <= 6; $n++) { 
			
			// END UPLOAD IMAGE

		return $output.$this->displayForm();
	}

	public function displayForm()
	{
	
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'text&#194;&#164;title';
      	
      	$output = '<script type="text/javascript" src="'.$this->_path.'js/tabs.js"></script>';
      	
      	$output .= '<link rel="stylesheet" href="'.$this->_path.'css/dilecta.css" />';
      	$output .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet" type="text/css">
';
      	$output .= '<!-- Theme Options -->

<div class="set-size" id="theme-options">

	<h3>Dilecta slider</h3>
	
	<!-- Content -->
	
	<div class="content">
	
		<div>
		
		<form action="' . Tools::safeOutput($_SERVER['REQUEST_URI']) . '" method="post" enctype="multipart/form-data">
		
		<div class="bg-tabs">
		
			<div id="tabs" class="main-tabs">
			
				<a href="#tab_general" id="general"><span>General</span></a>
				<a href="#tab_slider_1" id="tfooter"><span>Slider 1</span></a>
				<a href="#tab_slider_2" id="tfooter"><span>Slider 2</span></a>
				<a href="#tab_slider_3" id="tfooter"><span>Slider 3</span></a>
				<a href="#tab_slider_4" id="tfooter"><span>Slider 4</span></a>
				<a href="#tab_slider_5" id="tfooter"><span>Slider 5</span></a>
				<a href="#tab_slider_6" id="tfooter"><span>Slider 6</span></a>
			
			</div>';

      	// TAB General
      	
      	$output .= '<div id="tab_general" class="tab-content">';
				
				// #GENERAL
				
      		$output .= '<div id="general" style="width:auto"><h4>General settings</h4>';
      		
      			// Input
      			
      			$output .= '<div class="input"><p>Height slider (px)</p>';

      			if((Configuration::get('slider_height')) == '') { 
      			
      				$output .= '<input type="text" name="slider_height" value="450" style="width:155px" />';
      				
					} else {
					
      				$output .= '<input type="text" name="slider_height" value="'.Configuration::get('slider_height').'" style="width:155px" />';
					
					}

      			$output .= '<div class="clear"></div></div>';
      			
      			// END INPUT
      			
      			// Input
      			
      			$output .= '<div class="input"><p>Slideshow speed</p><select name="slider_speed">';
      			      			
      				$output .= '<option value="4" '.(Configuration::get('slider_speed') == '4' ? 'selected="selected"' : '').'>4000</option>';
      				$output .= '<option value="5" '.(Configuration::get('slider_speed') == '5' ? 'selected="selected"' : '').'>5000</option>';
      				$output .= '<option value="6" '.(Configuration::get('slider_speed') == '6' ? 'selected="selected"' : '').'>6000</option>';
      				$output .= '<option value="7" '.(Configuration::get('slider_speed') == '7' ? 'selected="selected"' : '').'>7000</option>';
      				$output .= '<option value="8" '.(Configuration::get('slider_speed') == '8' ? 'selected="selected"' : '').'>8000</option>';
      				$output .= '<option value="9" '.(Configuration::get('slider_speed') == '9' || Configuration::get('slider_speed') < 4 ? 'selected="selected"' : '').'>9000</option>';
      				$output .= '<option value="10" '.(Configuration::get('slider_speed') == '10' ? 'selected="selected"' : '').'>10000</option>';
      				$output .= '<option value="11" '.(Configuration::get('slider_speed') == '11' ? 'selected="selected"' : '').'>11000</option>';
      				$output .= '<option value="12" '.(Configuration::get('slider_speed') == '12' ? 'selected="selected"' : '').'>12000</option>';

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// END INPUT
      			
      			// Input
      			
      			$output .= '<div class="input"><p>Layout Type</p><select name="slider_layout_type">';
      			      			
      				$output .= '<option value="0" '.(Configuration::get('slider_layout_type') == '0' ? 'selected="selected"' : '').'>Full width</option>';
      				$output .= '<option value="1" '.(Configuration::get('slider_layout_type') == '1' ? 'selected="selected"' : '').'>Fixed</option>';

      			$output .= '</select><div class="clear"></div></div>';
      			
      			// END INPUT
      			
      		$output .= '</div>';
      		
      		// END #GENERAL
      		      	
      	$output .= '</div>';
      	
      	// END TAB GENERAL
      	
      	// TABS SLIDERS
      	
      	for ($i = 1; $i <= 6; $i++) { 
      		
      		$output .= '<div id="tab_slider_'.$i.'" class="tab-content3">';
      			// FOOTER LEFT
      			$output .= '<div class="footer_left">';
      				$output .= '<div id="tabs_slider_'.$i.'_language" class="htabs main-tabs">';
      					foreach ($languages as $language) {
      						if($language['active'] == 1) {
      					  		$output .= '<a href="#tab_slider_'.$i.'_language_'.$language['id_lang'].'">'.$this->displayFlags($languages, $language['id_lang'], $divLangName, 'text', true).'<span>'.$language['name'].'</span></a>';
      						}
      					}
      				$output .= '</div>';
      			$output .= '</div>';
      			// END FOOTER LEFT
      			// FOOTER RIGHT
      			foreach ($languages as $language) { if($language['active'] == 1) {
      			
      				$output .= '<div id="tab_slider_'.$i.'_language_'.$language['id_lang'].'" class="tab-content4">';
		      			if((Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_status')) == '1') {
		      				$output .= '<div class="status status-on" title="1" rel="slider_'.$i.'_'.$language['id_lang'].'_status"></div>';
		      			} else {
		      				$output .= '<div class="status status-off" title="0" rel="slider_'.$i.'_'.$language['id_lang'].'_status"></div>';
		      			}
		      			$output .= '<input name="slider_'.$i.'_'.$language['id_lang'].'_status" value="'.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_status')).'" id="slider_'.$i.'_'.$language['id_lang'].'_status" type="hidden" />';
		      			$output .= '<div style="height:25px"></div><input id="slider_'.$i.'_'.$language['id_lang'].'_image_field" type="file" name="slider_'.$i.'_'.$language['id_lang'].'_image_field" /><input id="slider_'.$i.'_'.$language['id_lang'].'_image" type="submit" class="button" name="slider_'.$i.'_'.$language['id_lang'].'_image" /><div style="height:25px"></div><img class="sliderimg" src="' . $this -> _path .'sliders/' . Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_image') . '" /><div style="height:20px"></div>';
		      			// Input
		      			
		      			$output .= '<div class="input"><p>Transition slider effect</p><select name="slider_'.$i.'_'.$language['id_lang'].'_transition_effect" style="float:right;margin-right:0px;width:250px">';
		      			      			
		      				$output .= '<option value="boxslide" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'boxslide' ? 'selected="selected"' : '').'>boxslide</option>';
		      				$output .= '<option value="boxfade" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'boxfade' ? 'selected="selected"' : '').'>boxfade</option>';
		      				$output .= '<option value="slotzoom-horizontal" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slotzoom-horizontal' ? 'selected="selected"' : '').'>slotzoom-horizontal</option>';
		      				$output .= '<option value="slotslide-horizontal" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slotslide-horizontal' ? 'selected="selected"' : '').'>slotslide-horizontal</option>';
		      				$output .= '<option value="slotfade-horizontal" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slotfade-horizontal' ? 'selected="selected"' : '').'>slotfade-horizontal</option>';
		      				$output .= '<option value="slotzoom-vertical" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slotzoom-vertical' ? 'selected="selected"' : '').'>slotzoom-vertical</option>';
		      				$output .= '<option value="slotslide-vertical" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slotslide-vertical' ? 'selected="selected"' : '').'>slotslide-vertical</option>';
		      				$output .= '<option value="slotfade-vertical" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slotfade-vertical' ? 'selected="selected"' : '').'>slotfade-vertical</option>';
		      				$output .= '<option value="curtain-1" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'curtain-1' ? 'selected="selected"' : '').'>curtain-1</option>';
		      				$output .= '<option value="curtain-2" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'curtain-2' ? 'selected="selected"' : '').'>curtain-2</option>';
		      				$output .= '<option value="curtain-3" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'curtain-3' ? 'selected="selected"' : '').'>curtain-3</option>';
		      				$output .= '<option value="slideleft" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slideleft' ? 'selected="selected"' : '').'>slideleft</option>';
		      				$output .= '<option value="slideright" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slideright' ? 'selected="selected"' : '').'>slideright</option>';
		      				$output .= '<option value="slideup" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slideup' ? 'selected="selected"' : '').'>slideup</option>';
		      				$output .= '<option value="slidedown" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slidedown' ? 'selected="selected"' : '').'>slidedown</option>';
		      				$output .= '<option value="fade" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'fade' ? 'selected="selected"' : '').'>fade</option>';
		      				$output .= '<option value="random" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'random' ? 'selected="selected"' : '').'>random</option>';
		      				$output .= '<option value="slidehorizontal" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slidehorizontal' ? 'selected="selected"' : '').'>slidehorizontal</option>';
		      				$output .= '<option value="slidevertical" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'slidevertical' ? 'selected="selected"' : '').'>slidevertical</option>';
		      				$output .= '<option value="papercut" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'papercut' ? 'selected="selected"' : '').'>papercut</option>';
		      				$output .= '<option value="flyin" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'flyin' ? 'selected="selected"' : '').'>flyin</option>';
		      				$output .= '<option value="turnoff" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'turnoff' ? 'selected="selected"' : '').'>turnoff</option>';
		      				$output .= '<option value="cube" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == 'cube' ? 'selected="selected"' : '').'>cube</option>';
		      				$output .= '<option value="3dcurtain-vertical" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == '3dcurtain-vertical' ? 'selected="selected"' : '').'>3dcurtain-vertical</option>';
		      				$output .= '<option value="3dcurtain-horizontal" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_transition_effect') == '3dcurtain-horizontal' ? 'selected="selected"' : '').'>3dcurtain-horizontal</option>';

		      			$output .= '</select><div class="clear"></div></div>';
		      			
		      			// END INPUT
		      			// Input
		      			
		      			$output .= '<div class="input"><p>Link</p>';
		      			      			
		      				$output .= '<input type="text" name="slider_'.$i.'_'.$language['id_lang'].'_link" value="'.Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_link').'" style="float:right;margin-right:0px;width:232px" />';

		      			$output .= '<div class="clear"></div></div>';
		      			
		      			// END INPUT
		      			$output .= '<div class="clear" style="height:20px;"></div>';
		      			// ADD ELEMENTS
		      			$output .= '<h4>Add elements to the slider</h4>';
		      			$output .= '<div id="tabs_slider_elements_'.$i.'_'.$language['id_lang'].'" class="tabs_add_element">';
		      				$output .= '<a href="#tab_add_element_'.$i.'_'.$language['id_lang'].'_1">1</a>';
		      				$output .= '<a href="#tab_add_element_'.$i.'_'.$language['id_lang'].'_2">2</a>';
		      				$output .= '<a href="#tab_add_element_'.$i.'_'.$language['id_lang'].'_3">3</a>';
		      				$output .= '<a href="#tab_add_element_'.$i.'_'.$language['id_lang'].'_4">4</a>';
		      				$output .= '<a href="#tab_add_element_'.$i.'_'.$language['id_lang'].'_5">5</a>';
		      				$output .= '<a href="#tab_add_element_'.$i.'_'.$language['id_lang'].'_6">6</a>';
		      			$output .= '</div>';
		      			
		      			for ($m = 1; $m <= 6; $m++) {
		      				$output .= '<div id="tab_add_element_'.$i.'_'.$language['id_lang'].'_'.$m.'">';
		      					$output .= '<div class="clear" style="height:20px;"></div>';
				      			if((Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_status')) == '1') {
				      				$output .= '<div class="status status-on" title="1" rel="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_status"></div>';
				      			} else {
				      				$output .= '<div class="status status-off" title="0" rel="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_status"></div>';
				      			}
				      			$output .= '<input name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_status" value="'.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_status')).'" id="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_status" type="hidden" />';
				      			// INPUT
				      			$output .= '<div class="input">';
					      			$output .= '<p>Style</p><select name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_style" style="float:right;margin-right:0px;width:250px">';
		      						$output .= '<option value="none" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_style') == 'none' ? 'selected="selected"' : '').'>none</option>';
		      						$output .= '<option value="small_header" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_style') == 'small_header' ? 'selected="selected"' : '').'>small_header</option>';
		      						$output .= '<option value="small_header_align_right" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_style') == 'small_header_align_right' ? 'selected="selected"' : '').'>small_header_align_right</option>';
		      						$output .= '<option value="large_description" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_style') == 'large_description' ? 'selected="selected"' : '').'>large_description</option>';
		      						$output .= '<option value="medium_description" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_style') == 'medium_description' ? 'selected="selected"' : '').'>medium_description</option>';
		      						$output .= '<option value="medium_description_align_right" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_style') == 'medium_description_align_right' ? 'selected="selected"' : '').'>medium_description_align_right</option>';
					      			$output .= '</select><div class="clear"></div>';
				      			$output .= '</div>';
				      			// END INPUT
				      			// INPUT
				      			$output .= '<div class="input">';
					      			$output .= '<p>Easing</p><select name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing" style="float:right;margin-right:0px;width:250px">';
		      							$output .= '<option value="easeOutBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutBack' ? 'selected="selected"' : '').'>easeOutBack</option>';
		      							$output .= '<option value="easeInQuad" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInQuad' ? 'selected="selected"' : '').'>easeInQuad</option>';
		      							$output .= '<option value="easeOutQuad" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutQuad' ? 'selected="selected"' : '').'>easeOutQuad</option>';
		      							$output .= '<option value="easeInOutQuad" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutQuad' ? 'selected="selected"' : '').'>easeInOutQuad</option>';
		      							$output .= '<option value="easeInCubic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInCubic' ? 'selected="selected"' : '').'>easeInCubic</option>';
		      							$output .= '<option value="easeOutCubic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutCubic' ? 'selected="selected"' : '').'>easeOutCubic</option>';
		      							$output .= '<option value="easeInOutCubic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutCubic' ? 'selected="selected"' : '').'>easeInOutCubic</option>';
		      							$output .= '<option value="easeInQuart" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInQuart' ? 'selected="selected"' : '').'>easeInQuart</option>';
		      							$output .= '<option value="easeOutQuart" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutQuart' ? 'selected="selected"' : '').'>easeOutQuart</option>';
		      							$output .= '<option value="easeInOutQuart" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutQuart' ? 'selected="selected"' : '').'>easeInOutQuart</option>';
		      							$output .= '<option value="easeInQuint" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInQuint' ? 'selected="selected"' : '').'>easeInQuint</option>';
		      							$output .= '<option value="easeOutQuint" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutQuint' ? 'selected="selected"' : '').'>easeOutQuint</option>';
		      							$output .= '<option value="easeInOutQuint" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutQuint' ? 'selected="selected"' : '').'>easeInOutQuint</option>';
		      							$output .= '<option value="easeInSine" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInSine' ? 'selected="selected"' : '').'>easeInSine</option>';
		      							$output .= '<option value="easeOutSine" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutSine' ? 'selected="selected"' : '').'>easeOutSine</option>';
		      							$output .= '<option value="easeInOutSine" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutSine' ? 'selected="selected"' : '').'>easeInOutSine</option>';
		      							$output .= '<option value="easeInExpo" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInExpo' ? 'selected="selected"' : '').'>easeInExpo</option>';
		      							$output .= '<option value="easeOutExpo" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutExpo' ? 'selected="selected"' : '').'>easeOutExpo</option>';
		      							$output .= '<option value="easeInOutExpo" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutExpo' ? 'selected="selected"' : '').'>easeInOutExpo</option>';
		      							$output .= '<option value="easeInCirc" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInCirc' ? 'selected="selected"' : '').'>easeInCirc</option>';
		      							$output .= '<option value="easeOutCirc" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutCirc' ? 'selected="selected"' : '').'>easeOutCirc</option>';
		      							$output .= '<option value="easeInOutCirc" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutCirc' ? 'selected="selected"' : '').'>easeInOutCirc</option>';
		      							$output .= '<option value="easeInElastic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInElastic' ? 'selected="selected"' : '').'>easeInElastic</option>';
		      							$output .= '<option value="easeOutElastic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutElastic' ? 'selected="selected"' : '').'>easeOutElastic</option>';
		      							$output .= '<option value="easeInOutElastic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutElastic' ? 'selected="selected"' : '').'>easeInOutElastic</option>';
		      							$output .= '<option value="easeInBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInBack' ? 'selected="selected"' : '').'>easeInBack</option>';
		      							$output .= '<option value="easeOutBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutBack' ? 'selected="selected"' : '').'>easeOutBack</option>';
		      							$output .= '<option value="easeInOutBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutBack' ? 'selected="selected"' : '').'>easeInOutBack</option>';
		      							$output .= '<option value="easeInBounce" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInBounce' ? 'selected="selected"' : '').'>easeInBounce</option>';
		      							$output .= '<option value="easeOutBounce" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeOutBounce' ? 'selected="selected"' : '').'>easeOutBounce</option>';
		      							$output .= '<option value="easeInOutBounce" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_easing') == 'easeInOutBounce' ? 'selected="selected"' : '').'>easeInOutBounce</option>';
					      			$output .= '</select><div class="clear"></div>';
				      			$output .= '</div>';
				      			// END INPUT
				      			// INPUT
				      			$output .= '<div class="input">';
					      			$output .= '<p>Endeasing</p><select name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing" style="float:right;margin-right:0px;width:250px">';
		      							$output .= '<option value="easeOutBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutBack' ? 'selected="selected"' : '').'>easeOutBack</option>';
		      							$output .= '<option value="easeInQuad" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInQuad' ? 'selected="selected"' : '').'>easeInQuad</option>';
		      							$output .= '<option value="easeOutQuad" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutQuad' ? 'selected="selected"' : '').'>easeOutQuad</option>';
		      							$output .= '<option value="easeInOutQuad" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutQuad' ? 'selected="selected"' : '').'>easeInOutQuad</option>';
		      							$output .= '<option value="easeInCubic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInCubic' ? 'selected="selected"' : '').'>easeInCubic</option>';
		      							$output .= '<option value="easeOutCubic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutCubic' ? 'selected="selected"' : '').'>easeOutCubic</option>';
		      							$output .= '<option value="easeInOutCubic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutCubic' ? 'selected="selected"' : '').'>easeInOutCubic</option>';
		      							$output .= '<option value="easeInQuart" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInQuart' ? 'selected="selected"' : '').'>easeInQuart</option>';
		      							$output .= '<option value="easeOutQuart" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutQuart' ? 'selected="selected"' : '').'>easeOutQuart</option>';
		      							$output .= '<option value="easeInOutQuart" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutQuart' ? 'selected="selected"' : '').'>easeInOutQuart</option>';
		      							$output .= '<option value="easeInQuint" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInQuint' ? 'selected="selected"' : '').'>easeInQuint</option>';
		      							$output .= '<option value="easeOutQuint" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutQuint' ? 'selected="selected"' : '').'>easeOutQuint</option>';
		      							$output .= '<option value="easeInOutQuint" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutQuint' ? 'selected="selected"' : '').'>easeInOutQuint</option>';
		      							$output .= '<option value="easeInSine" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInSine' ? 'selected="selected"' : '').'>easeInSine</option>';
		      							$output .= '<option value="easeOutSine" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutSine' ? 'selected="selected"' : '').'>easeOutSine</option>';
		      							$output .= '<option value="easeInOutSine" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutSine' ? 'selected="selected"' : '').'>easeInOutSine</option>';
		      							$output .= '<option value="easeInExpo" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInExpo' ? 'selected="selected"' : '').'>easeInExpo</option>';
		      							$output .= '<option value="easeOutExpo" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutExpo' ? 'selected="selected"' : '').'>easeOutExpo</option>';
		      							$output .= '<option value="easeInOutExpo" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutExpo' ? 'selected="selected"' : '').'>easeInOutExpo</option>';
		      							$output .= '<option value="easeInCirc" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInCirc' ? 'selected="selected"' : '').'>easeInCirc</option>';
		      							$output .= '<option value="easeOutCirc" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutCirc' ? 'selected="selected"' : '').'>easeOutCirc</option>';
		      							$output .= '<option value="easeInOutCirc" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutCirc' ? 'selected="selected"' : '').'>easeInOutCirc</option>';
		      							$output .= '<option value="easeInElastic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInElastic' ? 'selected="selected"' : '').'>easeInElastic</option>';
		      							$output .= '<option value="easeOutElastic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutElastic' ? 'selected="selected"' : '').'>easeOutElastic</option>';
		      							$output .= '<option value="easeInOutElastic" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutElastic' ? 'selected="selected"' : '').'>easeInOutElastic</option>';
		      							$output .= '<option value="easeInBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInBack' ? 'selected="selected"' : '').'>easeInBack</option>';
		      							$output .= '<option value="easeOutBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutBack' ? 'selected="selected"' : '').'>easeOutBack</option>';
		      							$output .= '<option value="easeInOutBack" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutBack' ? 'selected="selected"' : '').'>easeInOutBack</option>';
		      							$output .= '<option value="easeInBounce" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInBounce' ? 'selected="selected"' : '').'>easeInBounce</option>';
		      							$output .= '<option value="easeOutBounce" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeOutBounce' ? 'selected="selected"' : '').'>easeOutBounce</option>';
		      							$output .= '<option value="easeInOutBounce" '.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_endeasing') == 'easeInOutBounce' ? 'selected="selected"' : '').'>easeInOutBounce</option>';
					      			$output .= '</select><div class="clear"></div>';
				      			$output .= '</div>';
				      			// END INPUT
				      			// INPUT
				      			$output .= '<div class="input"><p>Text / html</p>';
				      				$output .= '<textarea rows="0" cols="0" name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_text">'.Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_text').'</textarea>';
				      			$output .= '<div class="clear"></div></div>';
				      			// END INPUT
				      			// INPUT
				      			$output .= '<div class="input"><p>Speed</p>';
				      				$output .= '<input type="text" name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_speed" value="'.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_speed') == '' ? '300' : Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_speed')).'" style="float:right;margin-right:0px;width:232px" />';
				      			$output .= '<div class="clear"></div></div>';
				      			// END INPUT
				      			// INPUT
				      			$output .= '<div class="input"><p>Start</p>';
				      				$output .= '<input type="text" name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_start" value="'.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_start') == '' ? '300' : Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_start')).'" style="float:right;margin-right:0px;width:232px" />';
				      			$output .= '<div class="clear"></div></div>';
				      			// END INPUT
				      			// INPUT
				      			$output .= '<div class="input"><p>X</p>';
				      				$output .= '<input type="text" name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_x" value="'.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_x') == '' ? '100' : Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_x')).'" style="float:right;margin-right:0px;width:232px" />';
				      			$output .= '<div class="clear"></div></div>';
				      			// END INPUT
				      			// INPUT
				      			$output .= '<div class="input"><p>Y</p>';
				      				$output .= '<input type="text" name="slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_y" value="'.(Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_y') == '' ? '100' : Configuration::get('slider_'.$i.'_'.$language['id_lang'].'_'.$m.'_y')).'" style="float:right;margin-right:0px;width:232px" />';
				      			$output .= '<div class="clear"></div></div>';
				      			// END INPUT
		      				$output .= '</div>';
		      			}
		      			
		      			$output .= '<script type="text/javascript">$(document).ready(function () { $("#tabs_slider_elements_'.$i.'_'.$language['id_lang'].' a").tabs(); });</script> ';
		      			// END ADD ELEMENTS
		      			
      				$output .= '</div>';
      			
      			} }
      			// END FOOTER RIGHT
      		$output .= '</div>';
				$output .= '<script type="text/javascript">$(document).ready(function () { $("#tabs_slider_'.$i.'_language a").tabs(); });</script> ';
      		
      	}
      	
      	// TABS SLIDER
      	
      	$output .= '<div class="clear"></div>';
      	
      	$output .= '<div class="buttons"><input type="submit" name="submitSaveSettings" value="'.$this->l('Save').'" class="button-save" /></div>';
      	
      	$output .= '</div></form></div></div></div>';
      	      	      	
		return $output;
	}
	

	public function hookDisplayHome($params)
	{
		$defaultLanguage = $this->context->language->id;
		global $smarty;
		
		$element_1_1 = array(
			'status' => Configuration::get('slider_1_'.$defaultLanguage.'_1_status'),
			'style' => Configuration::get('slider_1_'.$defaultLanguage.'_1_style'),
			'easing' => Configuration::get('slider_1_'.$defaultLanguage.'_1_easing'),
			'endeasing' => Configuration::get('slider_1_'.$defaultLanguage.'_1_endeasing'),
			'text' => Configuration::get('slider_1_'.$defaultLanguage.'_1_text'),
			'speed' => Configuration::get('slider_1_'.$defaultLanguage.'_1_speed'),
			'start' => Configuration::get('slider_1_'.$defaultLanguage.'_1_start'),
			'x' => Configuration::get('slider_1_'.$defaultLanguage.'_1_x'),
			'y' => Configuration::get('slider_1_'.$defaultLanguage.'_1_y'),
		);
		$element_1_2 = array(
			'status' => Configuration::get('slider_1_'.$defaultLanguage.'_2_status'),
			'style' => Configuration::get('slider_1_'.$defaultLanguage.'_2_style'),
			'easing' => Configuration::get('slider_1_'.$defaultLanguage.'_2_easing'),
			'endeasing' => Configuration::get('slider_1_'.$defaultLanguage.'_2_endeasing'),
			'text' => Configuration::get('slider_1_'.$defaultLanguage.'_2_text'),
			'speed' => Configuration::get('slider_1_'.$defaultLanguage.'_2_speed'),
			'start' => Configuration::get('slider_1_'.$defaultLanguage.'_2_start'),
			'x' => Configuration::get('slider_1_'.$defaultLanguage.'_2_x'),
			'y' => Configuration::get('slider_1_'.$defaultLanguage.'_2_y'),
		);
		$element_1_3 = array(
			'status' => Configuration::get('slider_1_'.$defaultLanguage.'_3_status'),
			'style' => Configuration::get('slider_1_'.$defaultLanguage.'_3_style'),
			'easing' => Configuration::get('slider_1_'.$defaultLanguage.'_3_easing'),
			'endeasing' => Configuration::get('slider_1_'.$defaultLanguage.'_3_endeasing'),
			'text' => Configuration::get('slider_1_'.$defaultLanguage.'_3_text'),
			'speed' => Configuration::get('slider_1_'.$defaultLanguage.'_3_speed'),
			'start' => Configuration::get('slider_1_'.$defaultLanguage.'_3_start'),
			'x' => Configuration::get('slider_1_'.$defaultLanguage.'_3_x'),
			'y' => Configuration::get('slider_1_'.$defaultLanguage.'_3_y'),
		);
		$element_1_4 = array(
			'status' => Configuration::get('slider_1_'.$defaultLanguage.'_4_status'),
			'style' => Configuration::get('slider_1_'.$defaultLanguage.'_4_style'),
			'easing' => Configuration::get('slider_1_'.$defaultLanguage.'_4_easing'),
			'endeasing' => Configuration::get('slider_1_'.$defaultLanguage.'_4_endeasing'),
			'text' => Configuration::get('slider_1_'.$defaultLanguage.'_4_text'),
			'speed' => Configuration::get('slider_1_'.$defaultLanguage.'_4_speed'),
			'start' => Configuration::get('slider_1_'.$defaultLanguage.'_4_start'),
			'x' => Configuration::get('slider_1_'.$defaultLanguage.'_4_x'),
			'y' => Configuration::get('slider_1_'.$defaultLanguage.'_4_y'),
		);
		$element_1_5 = array(
			'status' => Configuration::get('slider_1_'.$defaultLanguage.'_5_status'),
			'style' => Configuration::get('slider_1_'.$defaultLanguage.'_5_style'),
			'easing' => Configuration::get('slider_1_'.$defaultLanguage.'_5_easing'),
			'endeasing' => Configuration::get('slider_1_'.$defaultLanguage.'_5_endeasing'),
			'text' => Configuration::get('slider_1_'.$defaultLanguage.'_5_text'),
			'speed' => Configuration::get('slider_1_'.$defaultLanguage.'_5_speed'),
			'start' => Configuration::get('slider_1_'.$defaultLanguage.'_5_start'),
			'x' => Configuration::get('slider_1_'.$defaultLanguage.'_5_x'),
			'y' => Configuration::get('slider_1_'.$defaultLanguage.'_5_y'),
		);
		$element_1_6 = array(
			'status' => Configuration::get('slider_1_'.$defaultLanguage.'_6_status'),
			'style' => Configuration::get('slider_1_'.$defaultLanguage.'_6_style'),
			'easing' => Configuration::get('slider_1_'.$defaultLanguage.'_6_easing'),
			'endeasing' => Configuration::get('slider_1_'.$defaultLanguage.'_6_endeasing'),
			'text' => Configuration::get('slider_1_'.$defaultLanguage.'_6_text'),
			'speed' => Configuration::get('slider_1_'.$defaultLanguage.'_6_speed'),
			'start' => Configuration::get('slider_1_'.$defaultLanguage.'_6_start'),
			'x' => Configuration::get('slider_1_'.$defaultLanguage.'_6_x'),
			'y' => Configuration::get('slider_1_'.$defaultLanguage.'_6_y'),
		);
		
		$elements1 = array(
			'1' => $element_1_1,
			'2' => $element_1_2,
			'3' => $element_1_3,
			'4' => $element_1_4,
			'5' => $element_1_5,
			'6' => $element_1_6,
		);
		
		$slider1 = array(
			'status' => Configuration::get('slider_1_'.$defaultLanguage.'_status'),
			'transition_effect' => Configuration::get('slider_1_'.$defaultLanguage.'_transition_effect'),
			'link' => Configuration::get('slider_1_'.$defaultLanguage.'_link'),
			'image' => $this->_path.'sliders/'.Configuration::get('slider_1_'.$defaultLanguage.'_image'),
			'add_elements' => $elements1,
		);
		
		$element_2_1 = array(
			'status' => Configuration::get('slider_2_'.$defaultLanguage.'_1_status'),
			'style' => Configuration::get('slider_2_'.$defaultLanguage.'_1_style'),
			'easing' => Configuration::get('slider_2_'.$defaultLanguage.'_1_easing'),
			'endeasing' => Configuration::get('slider_2_'.$defaultLanguage.'_1_endeasing'),
			'text' => Configuration::get('slider_2_'.$defaultLanguage.'_1_text'),
			'speed' => Configuration::get('slider_2_'.$defaultLanguage.'_1_speed'),
			'start' => Configuration::get('slider_2_'.$defaultLanguage.'_1_start'),
			'x' => Configuration::get('slider_2_'.$defaultLanguage.'_1_x'),
			'y' => Configuration::get('slider_2_'.$defaultLanguage.'_1_y'),
		);
		$element_2_2 = array(
			'status' => Configuration::get('slider_2_'.$defaultLanguage.'_2_status'),
			'style' => Configuration::get('slider_2_'.$defaultLanguage.'_2_style'),
			'easing' => Configuration::get('slider_2_'.$defaultLanguage.'_2_easing'),
			'endeasing' => Configuration::get('slider_2_'.$defaultLanguage.'_2_endeasing'),
			'text' => Configuration::get('slider_2_'.$defaultLanguage.'_2_text'),
			'speed' => Configuration::get('slider_2_'.$defaultLanguage.'_2_speed'),
			'start' => Configuration::get('slider_2_'.$defaultLanguage.'_2_start'),
			'x' => Configuration::get('slider_2_'.$defaultLanguage.'_2_x'),
			'y' => Configuration::get('slider_2_'.$defaultLanguage.'_2_y'),
		);
		$element_2_3 = array(
			'status' => Configuration::get('slider_2_'.$defaultLanguage.'_3_status'),
			'style' => Configuration::get('slider_2_'.$defaultLanguage.'_3_style'),
			'easing' => Configuration::get('slider_2_'.$defaultLanguage.'_3_easing'),
			'endeasing' => Configuration::get('slider_2_'.$defaultLanguage.'_3_endeasing'),
			'text' => Configuration::get('slider_2_'.$defaultLanguage.'_3_text'),
			'speed' => Configuration::get('slider_2_'.$defaultLanguage.'_3_speed'),
			'start' => Configuration::get('slider_2_'.$defaultLanguage.'_3_start'),
			'x' => Configuration::get('slider_2_'.$defaultLanguage.'_3_x'),
			'y' => Configuration::get('slider_2_'.$defaultLanguage.'_3_y'),
		);
		$element_2_4 = array(
			'status' => Configuration::get('slider_2_'.$defaultLanguage.'_4_status'),
			'style' => Configuration::get('slider_2_'.$defaultLanguage.'_4_style'),
			'easing' => Configuration::get('slider_2_'.$defaultLanguage.'_4_easing'),
			'endeasing' => Configuration::get('slider_2_'.$defaultLanguage.'_4_endeasing'),
			'text' => Configuration::get('slider_2_'.$defaultLanguage.'_4_text'),
			'speed' => Configuration::get('slider_2_'.$defaultLanguage.'_4_speed'),
			'start' => Configuration::get('slider_2_'.$defaultLanguage.'_4_start'),
			'x' => Configuration::get('slider_2_'.$defaultLanguage.'_4_x'),
			'y' => Configuration::get('slider_2_'.$defaultLanguage.'_4_y'),
		);
		$element_2_5 = array(
			'status' => Configuration::get('slider_2_'.$defaultLanguage.'_5_status'),
			'style' => Configuration::get('slider_2_'.$defaultLanguage.'_5_style'),
			'easing' => Configuration::get('slider_2_'.$defaultLanguage.'_5_easing'),
			'endeasing' => Configuration::get('slider_2_'.$defaultLanguage.'_5_endeasing'),
			'text' => Configuration::get('slider_2_'.$defaultLanguage.'_5_text'),
			'speed' => Configuration::get('slider_2_'.$defaultLanguage.'_5_speed'),
			'start' => Configuration::get('slider_2_'.$defaultLanguage.'_5_start'),
			'x' => Configuration::get('slider_2_'.$defaultLanguage.'_5_x'),
			'y' => Configuration::get('slider_2_'.$defaultLanguage.'_5_y'),
		);
		$element_2_6 = array(
			'status' => Configuration::get('slider_2_'.$defaultLanguage.'_6_status'),
			'style' => Configuration::get('slider_2_'.$defaultLanguage.'_6_style'),
			'easing' => Configuration::get('slider_2_'.$defaultLanguage.'_6_easing'),
			'endeasing' => Configuration::get('slider_2_'.$defaultLanguage.'_6_endeasing'),
			'text' => Configuration::get('slider_2_'.$defaultLanguage.'_6_text'),
			'speed' => Configuration::get('slider_2_'.$defaultLanguage.'_6_speed'),
			'start' => Configuration::get('slider_2_'.$defaultLanguage.'_6_start'),
			'x' => Configuration::get('slider_2_'.$defaultLanguage.'_6_x'),
			'y' => Configuration::get('slider_2_'.$defaultLanguage.'_6_y'),
		);
		$elements2 = array(
			'1' => $element_2_1,
			'2' => $element_2_2,
			'3' => $element_2_3,
			'4' => $element_2_4,
			'5' => $element_2_5,
			'6' => $element_2_6,
		);
		$slider2 = array(
			'status' => Configuration::get('slider_2_'.$defaultLanguage.'_status'),
			'transition_effect' => Configuration::get('slider_2_'.$defaultLanguage.'_transition_effect'),
			'link' => Configuration::get('slider_2_'.$defaultLanguage.'_link'),
			'image' => $this->_path.'sliders/'.Configuration::get('slider_2_'.$defaultLanguage.'_image'),
			'add_elements' => $elements2,
		);
		
		$element_3_1 = array(
			'status' => Configuration::get('slider_3_'.$defaultLanguage.'_1_status'),
			'style' => Configuration::get('slider_3_'.$defaultLanguage.'_1_style'),
			'easing' => Configuration::get('slider_3_'.$defaultLanguage.'_1_easing'),
			'endeasing' => Configuration::get('slider_3_'.$defaultLanguage.'_1_endeasing'),
			'text' => Configuration::get('slider_3_'.$defaultLanguage.'_1_text'),
			'speed' => Configuration::get('slider_3_'.$defaultLanguage.'_1_speed'),
			'start' => Configuration::get('slider_3_'.$defaultLanguage.'_1_start'),
			'x' => Configuration::get('slider_3_'.$defaultLanguage.'_1_x'),
			'y' => Configuration::get('slider_3_'.$defaultLanguage.'_1_y'),
		);
		$element_3_2 = array(
			'status' => Configuration::get('slider_3_'.$defaultLanguage.'_2_status'),
			'style' => Configuration::get('slider_3_'.$defaultLanguage.'_2_style'),
			'easing' => Configuration::get('slider_3_'.$defaultLanguage.'_2_easing'),
			'endeasing' => Configuration::get('slider_3_'.$defaultLanguage.'_2_endeasing'),
			'text' => Configuration::get('slider_3_'.$defaultLanguage.'_2_text'),
			'speed' => Configuration::get('slider_3_'.$defaultLanguage.'_2_speed'),
			'start' => Configuration::get('slider_3_'.$defaultLanguage.'_2_start'),
			'x' => Configuration::get('slider_3_'.$defaultLanguage.'_2_x'),
			'y' => Configuration::get('slider_3_'.$defaultLanguage.'_2_y'),
		);
		$element_3_3 = array(
			'status' => Configuration::get('slider_3_'.$defaultLanguage.'_3_status'),
			'style' => Configuration::get('slider_3_'.$defaultLanguage.'_3_style'),
			'easing' => Configuration::get('slider_3_'.$defaultLanguage.'_3_easing'),
			'endeasing' => Configuration::get('slider_3_'.$defaultLanguage.'_3_endeasing'),
			'text' => Configuration::get('slider_3_'.$defaultLanguage.'_3_text'),
			'speed' => Configuration::get('slider_3_'.$defaultLanguage.'_3_speed'),
			'start' => Configuration::get('slider_3_'.$defaultLanguage.'_3_start'),
			'x' => Configuration::get('slider_3_'.$defaultLanguage.'_3_x'),
			'y' => Configuration::get('slider_3_'.$defaultLanguage.'_3_y'),
		);
		$element_3_4 = array(
			'status' => Configuration::get('slider_3_'.$defaultLanguage.'_4_status'),
			'style' => Configuration::get('slider_3_'.$defaultLanguage.'_4_style'),
			'easing' => Configuration::get('slider_3_'.$defaultLanguage.'_4_easing'),
			'endeasing' => Configuration::get('slider_3_'.$defaultLanguage.'_4_endeasing'),
			'text' => Configuration::get('slider_3_'.$defaultLanguage.'_4_text'),
			'speed' => Configuration::get('slider_3_'.$defaultLanguage.'_4_speed'),
			'start' => Configuration::get('slider_3_'.$defaultLanguage.'_4_start'),
			'x' => Configuration::get('slider_3_'.$defaultLanguage.'_4_x'),
			'y' => Configuration::get('slider_3_'.$defaultLanguage.'_4_y'),
		);
		$element_3_5 = array(
			'status' => Configuration::get('slider_3_'.$defaultLanguage.'_5_status'),
			'style' => Configuration::get('slider_3_'.$defaultLanguage.'_5_style'),
			'easing' => Configuration::get('slider_3_'.$defaultLanguage.'_5_easing'),
			'endeasing' => Configuration::get('slider_3_'.$defaultLanguage.'_5_endeasing'),
			'text' => Configuration::get('slider_3_'.$defaultLanguage.'_5_text'),
			'speed' => Configuration::get('slider_3_'.$defaultLanguage.'_5_speed'),
			'start' => Configuration::get('slider_3_'.$defaultLanguage.'_5_start'),
			'x' => Configuration::get('slider_3_'.$defaultLanguage.'_5_x'),
			'y' => Configuration::get('slider_3_'.$defaultLanguage.'_5_y'),
		);
		$element_3_6 = array(
			'status' => Configuration::get('slider_3_'.$defaultLanguage.'_6_status'),
			'style' => Configuration::get('slider_3_'.$defaultLanguage.'_6_style'),
			'easing' => Configuration::get('slider_3_'.$defaultLanguage.'_6_easing'),
			'endeasing' => Configuration::get('slider_3_'.$defaultLanguage.'_6_endeasing'),
			'text' => Configuration::get('slider_3_'.$defaultLanguage.'_6_text'),
			'speed' => Configuration::get('slider_3_'.$defaultLanguage.'_6_speed'),
			'start' => Configuration::get('slider_3_'.$defaultLanguage.'_6_start'),
			'x' => Configuration::get('slider_3_'.$defaultLanguage.'_6_x'),
			'y' => Configuration::get('slider_3_'.$defaultLanguage.'_6_y'),
		);
		$elements3 = array(
			'1' => $element_3_1,
			'2' => $element_3_2,
			'3' => $element_3_3,
			'4' => $element_3_4,
			'5' => $element_3_5,
			'6' => $element_3_6,
		);
		$slider3 = array(
			'status' => Configuration::get('slider_3_'.$defaultLanguage.'_status'),
			'transition_effect' => Configuration::get('slider_3_'.$defaultLanguage.'_transition_effect'),
			'link' => Configuration::get('slider_3_'.$defaultLanguage.'_link'),
			'image' => $this->_path.'sliders/'.Configuration::get('slider_3_'.$defaultLanguage.'_image'),
			'add_elements' => $elements3,
		);
		$element_4_1 = array(
			'status' => Configuration::get('slider_4_'.$defaultLanguage.'_1_status'),
			'style' => Configuration::get('slider_4_'.$defaultLanguage.'_1_style'),
			'easing' => Configuration::get('slider_4_'.$defaultLanguage.'_1_easing'),
			'endeasing' => Configuration::get('slider_4_'.$defaultLanguage.'_1_endeasing'),
			'text' => Configuration::get('slider_4_'.$defaultLanguage.'_1_text'),
			'speed' => Configuration::get('slider_4_'.$defaultLanguage.'_1_speed'),
			'start' => Configuration::get('slider_4_'.$defaultLanguage.'_1_start'),
			'x' => Configuration::get('slider_4_'.$defaultLanguage.'_1_x'),
			'y' => Configuration::get('slider_4_'.$defaultLanguage.'_1_y'),
		);
		$element_4_2 = array(
			'status' => Configuration::get('slider_4_'.$defaultLanguage.'_2_status'),
			'style' => Configuration::get('slider_4_'.$defaultLanguage.'_2_style'),
			'easing' => Configuration::get('slider_4_'.$defaultLanguage.'_2_easing'),
			'endeasing' => Configuration::get('slider_4_'.$defaultLanguage.'_2_endeasing'),
			'text' => Configuration::get('slider_4_'.$defaultLanguage.'_2_text'),
			'speed' => Configuration::get('slider_4_'.$defaultLanguage.'_2_speed'),
			'start' => Configuration::get('slider_4_'.$defaultLanguage.'_2_start'),
			'x' => Configuration::get('slider_4_'.$defaultLanguage.'_2_x'),
			'y' => Configuration::get('slider_4_'.$defaultLanguage.'_2_y'),
		);
		$element_4_3 = array(
			'status' => Configuration::get('slider_4_'.$defaultLanguage.'_3_status'),
			'style' => Configuration::get('slider_4_'.$defaultLanguage.'_3_style'),
			'easing' => Configuration::get('slider_4_'.$defaultLanguage.'_3_easing'),
			'endeasing' => Configuration::get('slider_4_'.$defaultLanguage.'_3_endeasing'),
			'text' => Configuration::get('slider_4_'.$defaultLanguage.'_3_text'),
			'speed' => Configuration::get('slider_4_'.$defaultLanguage.'_3_speed'),
			'start' => Configuration::get('slider_4_'.$defaultLanguage.'_3_start'),
			'x' => Configuration::get('slider_4_'.$defaultLanguage.'_3_x'),
			'y' => Configuration::get('slider_4_'.$defaultLanguage.'_3_y'),
		);
		$element_4_4 = array(
			'status' => Configuration::get('slider_4_'.$defaultLanguage.'_4_status'),
			'style' => Configuration::get('slider_4_'.$defaultLanguage.'_4_style'),
			'easing' => Configuration::get('slider_4_'.$defaultLanguage.'_4_easing'),
			'endeasing' => Configuration::get('slider_4_'.$defaultLanguage.'_4_endeasing'),
			'text' => Configuration::get('slider_4_'.$defaultLanguage.'_4_text'),
			'speed' => Configuration::get('slider_4_'.$defaultLanguage.'_4_speed'),
			'start' => Configuration::get('slider_4_'.$defaultLanguage.'_4_start'),
			'x' => Configuration::get('slider_4_'.$defaultLanguage.'_4_x'),
			'y' => Configuration::get('slider_4_'.$defaultLanguage.'_4_y'),
		);
		$element_4_5 = array(
			'status' => Configuration::get('slider_4_'.$defaultLanguage.'_5_status'),
			'style' => Configuration::get('slider_4_'.$defaultLanguage.'_5_style'),
			'easing' => Configuration::get('slider_4_'.$defaultLanguage.'_5_easing'),
			'endeasing' => Configuration::get('slider_4_'.$defaultLanguage.'_5_endeasing'),
			'text' => Configuration::get('slider_4_'.$defaultLanguage.'_5_text'),
			'speed' => Configuration::get('slider_4_'.$defaultLanguage.'_5_speed'),
			'start' => Configuration::get('slider_4_'.$defaultLanguage.'_5_start'),
			'x' => Configuration::get('slider_4_'.$defaultLanguage.'_5_x'),
			'y' => Configuration::get('slider_4_'.$defaultLanguage.'_5_y'),
		);
		$element_4_6 = array(
			'status' => Configuration::get('slider_4_'.$defaultLanguage.'_6_status'),
			'style' => Configuration::get('slider_4_'.$defaultLanguage.'_6_style'),
			'easing' => Configuration::get('slider_4_'.$defaultLanguage.'_6_easing'),
			'endeasing' => Configuration::get('slider_4_'.$defaultLanguage.'_6_endeasing'),
			'text' => Configuration::get('slider_4_'.$defaultLanguage.'_6_text'),
			'speed' => Configuration::get('slider_4_'.$defaultLanguage.'_6_speed'),
			'start' => Configuration::get('slider_4_'.$defaultLanguage.'_6_start'),
			'x' => Configuration::get('slider_4_'.$defaultLanguage.'_6_x'),
			'y' => Configuration::get('slider_4_'.$defaultLanguage.'_6_y'),
		);
		$elements4 = array(
			'1' => $element_4_1,
			'2' => $element_4_2,
			'3' => $element_4_3,
			'4' => $element_4_4,
			'5' => $element_4_5,
			'6' => $element_4_6,
		);
		$slider4 = array(
			'status' => Configuration::get('slider_4_'.$defaultLanguage.'_status'),
			'transition_effect' => Configuration::get('slider_4_'.$defaultLanguage.'_transition_effect'),
			'link' => Configuration::get('slider_4_'.$defaultLanguage.'_link'),
			'image' => $this->_path.'sliders/'.Configuration::get('slider_4_'.$defaultLanguage.'_image'),
			'add_elements' => $elements4,
		);
		$element_5_1 = array(
			'status' => Configuration::get('slider_5_'.$defaultLanguage.'_1_status'),
			'style' => Configuration::get('slider_5_'.$defaultLanguage.'_1_style'),
			'easing' => Configuration::get('slider_5_'.$defaultLanguage.'_1_easing'),
			'endeasing' => Configuration::get('slider_5_'.$defaultLanguage.'_1_endeasing'),
			'text' => Configuration::get('slider_5_'.$defaultLanguage.'_1_text'),
			'speed' => Configuration::get('slider_5_'.$defaultLanguage.'_1_speed'),
			'start' => Configuration::get('slider_5_'.$defaultLanguage.'_1_start'),
			'x' => Configuration::get('slider_5_'.$defaultLanguage.'_1_x'),
			'y' => Configuration::get('slider_5_'.$defaultLanguage.'_1_y'),
		);
		$element_5_2 = array(
			'status' => Configuration::get('slider_5_'.$defaultLanguage.'_2_status'),
			'style' => Configuration::get('slider_5_'.$defaultLanguage.'_2_style'),
			'easing' => Configuration::get('slider_5_'.$defaultLanguage.'_2_easing'),
			'endeasing' => Configuration::get('slider_5_'.$defaultLanguage.'_2_endeasing'),
			'text' => Configuration::get('slider_5_'.$defaultLanguage.'_2_text'),
			'speed' => Configuration::get('slider_5_'.$defaultLanguage.'_2_speed'),
			'start' => Configuration::get('slider_5_'.$defaultLanguage.'_2_start'),
			'x' => Configuration::get('slider_5_'.$defaultLanguage.'_2_x'),
			'y' => Configuration::get('slider_5_'.$defaultLanguage.'_2_y'),
		);
		$element_5_3 = array(
			'status' => Configuration::get('slider_5_'.$defaultLanguage.'_3_status'),
			'style' => Configuration::get('slider_5_'.$defaultLanguage.'_3_style'),
			'easing' => Configuration::get('slider_5_'.$defaultLanguage.'_3_easing'),
			'endeasing' => Configuration::get('slider_5_'.$defaultLanguage.'_3_endeasing'),
			'text' => Configuration::get('slider_5_'.$defaultLanguage.'_3_text'),
			'speed' => Configuration::get('slider_5_'.$defaultLanguage.'_3_speed'),
			'start' => Configuration::get('slider_5_'.$defaultLanguage.'_3_start'),
			'x' => Configuration::get('slider_5_'.$defaultLanguage.'_3_x'),
			'y' => Configuration::get('slider_5_'.$defaultLanguage.'_3_y'),
		);
		$element_5_4 = array(
			'status' => Configuration::get('slider_5_'.$defaultLanguage.'_4_status'),
			'style' => Configuration::get('slider_5_'.$defaultLanguage.'_4_style'),
			'easing' => Configuration::get('slider_5_'.$defaultLanguage.'_4_easing'),
			'endeasing' => Configuration::get('slider_5_'.$defaultLanguage.'_4_endeasing'),
			'text' => Configuration::get('slider_5_'.$defaultLanguage.'_4_text'),
			'speed' => Configuration::get('slider_5_'.$defaultLanguage.'_4_speed'),
			'start' => Configuration::get('slider_5_'.$defaultLanguage.'_4_start'),
			'x' => Configuration::get('slider_5_'.$defaultLanguage.'_4_x'),
			'y' => Configuration::get('slider_5_'.$defaultLanguage.'_4_y'),
		);
		$element_5_5 = array(
			'status' => Configuration::get('slider_5_'.$defaultLanguage.'_5_status'),
			'style' => Configuration::get('slider_5_'.$defaultLanguage.'_5_style'),
			'easing' => Configuration::get('slider_5_'.$defaultLanguage.'_5_easing'),
			'endeasing' => Configuration::get('slider_5_'.$defaultLanguage.'_5_endeasing'),
			'text' => Configuration::get('slider_5_'.$defaultLanguage.'_5_text'),
			'speed' => Configuration::get('slider_5_'.$defaultLanguage.'_5_speed'),
			'start' => Configuration::get('slider_5_'.$defaultLanguage.'_5_start'),
			'x' => Configuration::get('slider_5_'.$defaultLanguage.'_5_x'),
			'y' => Configuration::get('slider_5_'.$defaultLanguage.'_5_y'),
		);
		$element_5_6 = array(
			'status' => Configuration::get('slider_5_'.$defaultLanguage.'_6_status'),
			'style' => Configuration::get('slider_5_'.$defaultLanguage.'_6_style'),
			'easing' => Configuration::get('slider_5_'.$defaultLanguage.'_6_easing'),
			'endeasing' => Configuration::get('slider_5_'.$defaultLanguage.'_6_endeasing'),
			'text' => Configuration::get('slider_5_'.$defaultLanguage.'_6_text'),
			'speed' => Configuration::get('slider_5_'.$defaultLanguage.'_6_speed'),
			'start' => Configuration::get('slider_5_'.$defaultLanguage.'_6_start'),
			'x' => Configuration::get('slider_5_'.$defaultLanguage.'_6_x'),
			'y' => Configuration::get('slider_5_'.$defaultLanguage.'_6_y'),
		);
		$elements5 = array(
			'1' => $element_5_1,
			'2' => $element_5_2,
			'3' => $element_5_3,
			'4' => $element_5_4,
			'5' => $element_5_5,
			'6' => $element_5_6,
		);
		$slider5 = array(
			'status' => Configuration::get('slider_5_'.$defaultLanguage.'_status'),
			'transition_effect' => Configuration::get('slider_5_'.$defaultLanguage.'_transition_effect'),
			'image' => $this->_path.'sliders/'.Configuration::get('slider_5_'.$defaultLanguage.'_image'),
			'link' => Configuration::get('slider_5_'.$defaultLanguage.'_link'),
			'add_elements' => $elements5,
		);
		$element_6_1 = array(
			'status' => Configuration::get('slider_6_'.$defaultLanguage.'_1_status'),
			'style' => Configuration::get('slider_6_'.$defaultLanguage.'_1_style'),
			'easing' => Configuration::get('slider_6_'.$defaultLanguage.'_1_easing'),
			'endeasing' => Configuration::get('slider_6_'.$defaultLanguage.'_1_endeasing'),
			'text' => Configuration::get('slider_6_'.$defaultLanguage.'_1_text'),
			'speed' => Configuration::get('slider_6_'.$defaultLanguage.'_1_speed'),
			'start' => Configuration::get('slider_6_'.$defaultLanguage.'_1_start'),
			'x' => Configuration::get('slider_6_'.$defaultLanguage.'_1_x'),
			'y' => Configuration::get('slider_6_'.$defaultLanguage.'_1_y'),
		);
		$element_6_2 = array(
			'status' => Configuration::get('slider_6_'.$defaultLanguage.'_2_status'),
			'style' => Configuration::get('slider_6_'.$defaultLanguage.'_2_style'),
			'easing' => Configuration::get('slider_6_'.$defaultLanguage.'_2_easing'),
			'endeasing' => Configuration::get('slider_6_'.$defaultLanguage.'_2_endeasing'),
			'text' => Configuration::get('slider_6_'.$defaultLanguage.'_2_text'),
			'speed' => Configuration::get('slider_6_'.$defaultLanguage.'_2_speed'),
			'start' => Configuration::get('slider_6_'.$defaultLanguage.'_2_start'),
			'x' => Configuration::get('slider_6_'.$defaultLanguage.'_2_x'),
			'y' => Configuration::get('slider_6_'.$defaultLanguage.'_2_y'),
		);
		$element_6_3 = array(
			'status' => Configuration::get('slider_6_'.$defaultLanguage.'_3_status'),
			'style' => Configuration::get('slider_6_'.$defaultLanguage.'_3_style'),
			'easing' => Configuration::get('slider_6_'.$defaultLanguage.'_3_easing'),
			'endeasing' => Configuration::get('slider_6_'.$defaultLanguage.'_3_endeasing'),
			'text' => Configuration::get('slider_6_'.$defaultLanguage.'_3_text'),
			'speed' => Configuration::get('slider_6_'.$defaultLanguage.'_3_speed'),
			'start' => Configuration::get('slider_6_'.$defaultLanguage.'_3_start'),
			'x' => Configuration::get('slider_6_'.$defaultLanguage.'_3_x'),
			'y' => Configuration::get('slider_6_'.$defaultLanguage.'_3_y'),
		);
		$element_6_4 = array(
			'status' => Configuration::get('slider_6_'.$defaultLanguage.'_4_status'),
			'style' => Configuration::get('slider_6_'.$defaultLanguage.'_4_style'),
			'easing' => Configuration::get('slider_6_'.$defaultLanguage.'_4_easing'),
			'endeasing' => Configuration::get('slider_6_'.$defaultLanguage.'_4_endeasing'),
			'text' => Configuration::get('slider_6_'.$defaultLanguage.'_4_text'),
			'speed' => Configuration::get('slider_6_'.$defaultLanguage.'_4_speed'),
			'start' => Configuration::get('slider_6_'.$defaultLanguage.'_4_start'),
			'x' => Configuration::get('slider_6_'.$defaultLanguage.'_4_x'),
			'y' => Configuration::get('slider_6_'.$defaultLanguage.'_4_y'),
		);
		$element_6_5 = array(
			'status' => Configuration::get('slider_6_'.$defaultLanguage.'_5_status'),
			'style' => Configuration::get('slider_6_'.$defaultLanguage.'_5_style'),
			'easing' => Configuration::get('slider_6_'.$defaultLanguage.'_5_easing'),
			'endeasing' => Configuration::get('slider_6_'.$defaultLanguage.'_5_endeasing'),
			'text' => Configuration::get('slider_6_'.$defaultLanguage.'_5_text'),
			'speed' => Configuration::get('slider_6_'.$defaultLanguage.'_5_speed'),
			'start' => Configuration::get('slider_6_'.$defaultLanguage.'_5_start'),
			'x' => Configuration::get('slider_6_'.$defaultLanguage.'_5_x'),
			'y' => Configuration::get('slider_6_'.$defaultLanguage.'_5_y'),
		);
		$element_6_6 = array(
			'status' => Configuration::get('slider_6_'.$defaultLanguage.'_6_status'),
			'style' => Configuration::get('slider_6_'.$defaultLanguage.'_6_style'),
			'easing' => Configuration::get('slider_6_'.$defaultLanguage.'_6_easing'),
			'endeasing' => Configuration::get('slider_6_'.$defaultLanguage.'_6_endeasing'),
			'text' => Configuration::get('slider_6_'.$defaultLanguage.'_6_text'),
			'speed' => Configuration::get('slider_6_'.$defaultLanguage.'_6_speed'),
			'start' => Configuration::get('slider_6_'.$defaultLanguage.'_6_start'),
			'x' => Configuration::get('slider_6_'.$defaultLanguage.'_6_x'),
			'y' => Configuration::get('slider_6_'.$defaultLanguage.'_6_y'),
		);
		$elements6 = array(
			'1' => $element_6_1,
			'2' => $element_6_2,
			'3' => $element_6_3,
			'4' => $element_6_4,
			'5' => $element_6_5,
			'6' => $element_6_6,
		);
		$slider6 = array(
			'status' => Configuration::get('slider_6_'.$defaultLanguage.'_status'),
			'transition_effect' => Configuration::get('slider_6_'.$defaultLanguage.'_transition_effect'),
			'link' => Configuration::get('slider_6_'.$defaultLanguage.'_link'),
			'image' => $this->_path.'sliders/'.Configuration::get('slider_6_'.$defaultLanguage.'_image'),
			'add_elements' => $elements6,
		);
		$slider = array(
			'1' => $slider1,
			'2' => $slider2,
			'3' => $slider3,
			'4' => $slider4,
			'5' => $slider5,
			'6' => $slider6
		);
		$this->smarty->assign(array(
			'slider_general_status' => Configuration::get('slider_general_status'),
			'slider_height' => Configuration::get('slider_height'),
			'slider_speed' => Configuration::get('slider_speed')*1000,
			'slider_layout_type' => Configuration::get('slider_layout_type'),
			'slider' => $slider,
		));

		
		return $this->display(__FILE__, 'dilectaslider.tpl');
	}

	public function hookHeader($params)
	{
		$this->context->controller->addJS(($this->_path).'js/slider.js.php?height='.Configuration::get('slider_height').'&speed='.Configuration::get('slider_speed')*1000);
	}

}

<?php

if (!defined('_PS_VERSION_'))
	exit;

class Blockcustomfooter extends Module
{
	public function __construct()
	{
		$this->name = 'blockcustomfooter';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'tiquet';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Custom footer');
		$this->description = $this->l('Displays panels in the footer.');
	}

	public function install()
	{
		if (!parent::install() || !$this->registerHook('footer'))
			return false;
		if (!Configuration::updateValue('contact_status_1', '1') OR !Configuration::updateValue('contact_title_1', 'Contact') OR !Configuration::updateValue('contact_phone_1', '500-500-500') OR !Configuration::updateValue('contact_phone2_1', '48-127-314-13') OR !Configuration::updateValue('contact_skype_1', 'dilecta.example') OR !Configuration::updateValue('contact_skype2_1', 'example.dilecta') OR !Configuration::updateValue('contact_email_1', 'contact@example.com') OR !Configuration::updateValue('contact_email2_1', 'biuro@example.com') OR !Configuration::updateValue('aboutus_status_1', '1') OR !Configuration::updateValue('aboutus_title_1', 'About us') OR !Configuration::updateValue('aboutus_text_1', 'Dilecta is clean and modern OpenCart theme. Unlimited colors and font. Seo ready. Resposive design and more...<br><br>Log to demo admin panel and check all settings and functions. With custom footert you can add some nice info in footer like contact or twitter & facebook. <br><br>Take a look in documentation.', true) OR !Configuration::updateValue('facebook_status_1', '1') OR !Configuration::updateValue('facebook_title_1', 'Facebook') OR !Configuration::updateValue('facebook_id_1', '20531316728') OR !Configuration::updateValue('twitter_status_1', '1') OR !Configuration::updateValue('twitter_title_1', 'Twitter') OR !Configuration::updateValue('twitter_profile_1', 'google'))
			return false;
		return true;
	}
	
	public function uninstall()
	{
		return parent::uninstall();
	}

	public function getContent()
	{
		$output = '<h2>'.$this->displayName.'</h2>';
		if (Tools::isSubmit('submitSaveCustomFooter'))
		{
		
			$languages = Language::getLanguages(false);
			
			foreach ($languages as $language) {
				
				$lang_id = $language['id_lang'];
				
				$contact_status = Tools::getValue('contact_status_'.$lang_id.'');
				Configuration::updateValue('contact_status_'.$lang_id.'', $contact_status);
				$contact_title = Tools::getValue('contact_title_'.$lang_id.'');
				Configuration::updateValue('contact_title_'.$lang_id.'', $contact_title);
				$contact_phone = Tools::getValue('contact_phone_'.$lang_id.'');
				Configuration::updateValue('contact_phone_'.$lang_id.'', $contact_phone);
				$contact_phone2 = Tools::getValue('contact_phone2_'.$lang_id.'');
				Configuration::updateValue('contact_phone2_'.$lang_id.'', $contact_phone2);
				$contact_skype = Tools::getValue('contact_skype_'.$lang_id.'');
				Configuration::updateValue('contact_skype_'.$lang_id.'', $contact_skype);
				$contact_skype2 = Tools::getValue('contact_skype2_'.$lang_id.'');
				Configuration::updateValue('contact_skype2_'.$lang_id.'', $contact_skype2);
				$contact_email = Tools::getValue('contact_email_'.$lang_id.'');
				Configuration::updateValue('contact_email_'.$lang_id.'', $contact_email);
				$contact_email2 = Tools::getValue('contact_email2_'.$lang_id.'');
				Configuration::updateValue('contact_email2_'.$lang_id.'', $contact_email2);
				$aboutus_status = Tools::getValue('aboutus_status_'.$lang_id.'');
				Configuration::updateValue('aboutus_status_'.$lang_id.'', $aboutus_status);
				$aboutus_title = Tools::getValue('aboutus_title_'.$lang_id.'');
				Configuration::updateValue('aboutus_title_'.$lang_id.'', $aboutus_title);
				$aboutus_text = Tools::getValue('aboutus_text_'.$lang_id.'');
				Configuration::updateValue('aboutus_text_'.$lang_id.'', $aboutus_text);
				$facebook_status = Tools::getValue('facebook_status_'.$lang_id.'');
				Configuration::updateValue('facebook_status_'.$lang_id.'', $facebook_status);
				$facebook_title = Tools::getValue('facebook_title_'.$lang_id.'');
				Configuration::updateValue('facebook_title_'.$lang_id.'', $facebook_title);
				$facebook_id = Tools::getValue('facebook_id_'.$lang_id.'');
				Configuration::updateValue('facebook_id_'.$lang_id.'', $facebook_id);
				$twitter_status = Tools::getValue('twitter_status_'.$lang_id.'');
				Configuration::updateValue('twitter_status_'.$lang_id.'', $twitter_status);
				$twitter_profile = Tools::getValue('twitter_profile_'.$lang_id.'');
				Configuration::updateValue('twitter_profile_'.$lang_id.'', $twitter_profile);
				$twitter_title = Tools::getValue('twitter_title_'.$lang_id.'');
				Configuration::updateValue('twitter_title_'.$lang_id.'', $twitter_title);
								
			}
									
			if (isset($errors) AND sizeof($errors))
				$output .= $this->displayError(implode('<br />', $errors));
			else
				$output .= $this->displayConfirmation($this->l('Settings updated'));
		}

		return $output.$this->displayForm();
	}

	public function displayForm()
	{
	
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'text&#194;&#164;title';
      	
      	$output = '<script type="text/javascript" src="'.$this->_path.'js/tabs.js"></script>';
      	
      	$output .= '<link rel="stylesheet" href="'.$this->_path.'css/cleve.css" />';
      	$output .= '<link href="http://fonts.googleapis.com/css?family=Open+Sans:600" rel="stylesheet" type="text/css">
';
      	$output .= '<!-- Theme Options -->

<div class="set-size" id="theme-options">

	<h3>Dilecta Custom Footer</h3>
	
	<!-- Content -->
	
	<div class="content">
	
		<div>
		
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
		
		<div class="bg-tabs">
		
			<div class="main-tabs">
			
				<a href="#tab_footer" id="tfooter" class="selected"><span>Footer</span></a>
			
			</div>
			
			<div id="tab_footer" class="tab-content3">
		
		';
		
		$output .= '						<div class="footer_left">
						
							<!-- Contact, About us, Facebook TABS -->
							
							<div id="tabs_footer" class="htabs main-tabs">';
      	
      	foreach ($languages as $language) {
      		
      		$output .= '<a href="#tab_customfooter_'.$language['id_lang'].'">'.$this->displayFlags($languages, $language['id_lang'], $divLangName, 'text', true).'<span>'.$language['name'].'</span></a>';
      	
      	}
      	
      	$output .= '</div></div>';
      	
      	$output .= '<div class="footer_right">';
      	      	
      	foreach ($languages as $language) {
      	      	
      		$lang_id = $language['id_lang'];
      		
      		$output .= '<div id="tab_customfooter_'.$language['id_lang'].'">';
      		
      			$output .= '<div id="tabs_'.$lang_id.'" class="htabs tabs-design"><a href="#tab_contact_'.$lang_id.'" class="tcontact"><span>Contact</span></a><a href="#tab_aboutus_'.$lang_id.'" class="taboutus"><span>About us</span></a><a href="#tab_facebook_'.$lang_id.'" class="tfacebook"><span>Facebook</span></a><a href="#tab_twitter_'.$lang_id.'" class="ttwitter"><span>Twitter</span></a></div>';
      			
      			$output .= '<div id="tab_contact_'.$lang_id.'" class="tab-content4">';
      			if((Configuration::get('contact_status_'.$lang_id.'')) == '1') {
      				$output .= '<div class="status status-on" title="1" rel="contact_status_'.$lang_id.'"></div>';
      			} else {
      				$output .= '<div class="status status-off" title="0" rel="contact_status_'.$lang_id.'"></div>';
      			}
      				$output .= '<input name="contact_status_'.$lang_id.'" value="'.(Configuration::get('contact_status_'.$lang_id.'')).'" id="contact_status_'.$lang_id.'" type="hidden" />';
      				$output .= '<h4>Contact</h4>';
      				$output .= '<div class="input"><p>Title</p><input type="text" name="contact_title_'.$lang_id.'" value="'.(Configuration::get('contact_title_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>Phone</p><input type="text" name="contact_phone_'.$lang_id.'" value="'.(Configuration::get('contact_phone_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>Phone 2</p><input type="text" name="contact_phone2_'.$lang_id.'" value="'.(Configuration::get('contact_phone2_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>Skype</p><input type="text" name="contact_skype_'.$lang_id.'" value="'.(Configuration::get('contact_skype_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>Skype 2</p><input type="text" name="contact_skype2_'.$lang_id.'" value="'.(Configuration::get('contact_skype2_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>E-mail</p><input type="text" name="contact_email_'.$lang_id.'" value="'.(Configuration::get('contact_email_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>E-mail 2</p><input type="text" name="contact_email2_'.$lang_id.'" value="'.(Configuration::get('contact_email2_'.$lang_id.'')).'"><div class="clear"></div></div>';
      			$output .= '</div>';
      			$output .= '<div id="tab_aboutus_'.$lang_id.'" class="tab-content4">';
      			if((Configuration::get('aboutus_status_'.$lang_id.'')) == '1') {
      				$output .= '<div class="status status-on" title="1" rel="aboutus_status_'.$lang_id.'"></div>';
      			} else {
      				$output .= '<div class="status status-off" title="0" rel="aboutus_status_'.$lang_id.'"></div>';
      			}
      				$output .= '<input name="aboutus_status_'.$lang_id.'" value="'.(Configuration::get('aboutus_status_'.$lang_id.'')).'" id="aboutus_status_'.$lang_id.'" type="hidden" />';
      				$output .= '<h4>About us</h4>';
      				$output .= '<div class="input"><p>Title</p><input type="text" name="aboutus_title_'.$lang_id.'" value="'.(Configuration::get('aboutus_title_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>Text</p><textarea rows="0" cols="0" name="aboutus_text_'.$lang_id.'">'.(Configuration::get('aboutus_text_'.$lang_id.'')).'</textarea><div class="clear"></div></div>';
      			$output .= '</div>';
      			$output .= '<div id="tab_facebook_'.$lang_id.'" class="tab-content4">';
      			if((Configuration::get('facebook_status_'.$lang_id.'')) == '1') {
      				$output .= '<div class="status status-on" title="1" rel="facebook_status_'.$lang_id.'"></div>';
      			} else {
      				$output .= '<div class="status status-off" title="0" rel="facebook_status_'.$lang_id.'"></div>';
      			}
      				$output .= '<input name="facebook_status_'.$lang_id.'" value="'.(Configuration::get('facebook_status_'.$lang_id.'')).'" id="facebook_status_'.$lang_id.'" type="hidden" />';
      				$output .= '<h4>Facebook</h4>';
      				$output .= '<div class="input"><p>Title</p><input type="text" name="facebook_title_'.$lang_id.'" value="'.(Configuration::get('facebook_title_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>Facebook ID</p><input type="text" name="facebook_id_'.$lang_id.'" value="'.(Configuration::get('facebook_id_'.$lang_id.'')).'"><div class="clear"></div></div>';
      			$output .= '</div>';
      			$output .= '<div id="tab_twitter_'.$lang_id.'" class="tab-content4">';
      			if((Configuration::get('twitter_status_'.$lang_id.'')) == '1') {
      				$output .= '<div class="status status-on" title="1" rel="twitter_status_'.$lang_id.'"></div>';
      			} else {
      				$output .= '<div class="status status-off" title="0" rel="twitter_status_'.$lang_id.'"></div>';
      			}
      				$output .= '<input name="twitter_status_'.$lang_id.'" value="'.(Configuration::get('twitter_status_'.$lang_id.'')).'" id="twitter_status_'.$lang_id.'" type="hidden" />';
      				$output .= '<h4>Twitter</h4>';
      				$output .= '<div class="input"><p>Title</p><input type="text" name="twitter_title_'.$lang_id.'" value="'.(Configuration::get('twitter_title_'.$lang_id.'')).'"><div class="clear"></div></div>';
      				$output .= '<div class="input"><p>Twitter profile</p><input type="text" name="twitter_profile_'.$lang_id.'" value="'.(Configuration::get('twitter_profile_'.$lang_id.'')).'"><div class="clear"></div></div>';
      			$output .= '</div>';
      		
      		$output .= '</div>';
      		$output .= '<script type="text/javascript">$(document).ready(function () { $("#tabs_'.$lang_id.' a").tabs(); });</script> ';
      		
      	}
      	
      	$output .= '</div>';
      	      	
      	$output .= '</div>';
      	
      	$output .= '<div class="buttons"><input type="submit" name="submitSaveCustomFooter" value="'.$this->l('Save').'" class="button-save" /></div>';
      	
      	$output .= '</div></form></div></div></div>';
      	      	      	
		return $output;
	}

	public function hookFooter($params)
	{
		$defaultLanguage = $this->context->language->id;
		$grids = 4;
		$active = 0;
		if((Configuration::get('aboutus_status_'.$defaultLanguage.'')) == '1') { $active++; }
		if((Configuration::get('facebook_status_'.$defaultLanguage.'')) == '1') { $active++; }
		if((Configuration::get('twitter_status_'.$defaultLanguage.'')) == '1') { $active++; }
		if((Configuration::get('contact_status_'.$defaultLanguage.'')) == '1') { $active++; }
		$grids = 12/$active;
		global $smarty;
		$this->smarty->assign(array(
			'contact_status' => Configuration::get('contact_status_'.$defaultLanguage.''),
			'contact_title' => Configuration::get('contact_title_'.$defaultLanguage.''),
			'contact_phone' => Configuration::get('contact_phone_'.$defaultLanguage.''),
			'contact_phone2' => Configuration::get('contact_phone2_'.$defaultLanguage.''),
			'contact_skype' => Configuration::get('contact_skype_'.$defaultLanguage.''),
			'contact_skype2' => Configuration::get('contact_skype2_'.$defaultLanguage.''),
			'contact_email' => Configuration::get('contact_email_'.$defaultLanguage.''),
			'contact_email2' => Configuration::get('contact_email2_'.$defaultLanguage.''),
			'aboutus_status' => Configuration::get('aboutus_status_'.$defaultLanguage.''),
			'aboutus_title' => Configuration::get('aboutus_title_'.$defaultLanguage.''),
			'aboutus_text' => Configuration::get('aboutus_text_'.$defaultLanguage.''),
			'facebook_status' => Configuration::get('facebook_status_'.$defaultLanguage.''),
			'facebook_title' => Configuration::get('facebook_title_'.$defaultLanguage.''),
			'facebook_id' => Configuration::get('facebook_id_'.$defaultLanguage.''),
			'twitter_status' => Configuration::get('twitter_status_'.$defaultLanguage.''),
			'twitter_title' => Configuration::get('twitter_title_'.$defaultLanguage.''),
			'twitter_profile' => Configuration::get('twitter_profile_'.$defaultLanguage.''),
			'grids' => $grids,
		));
		
		return $this->display(__FILE__, $this->name.'.tpl');
	}

}

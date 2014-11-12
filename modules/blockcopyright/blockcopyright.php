<?php

if (!defined('_PS_VERSION_'))
	exit;

class Blockcopyright extends Module
{
	public function __construct()
	{
		$this->name = 'blockcopyright';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'tiquet';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Copyright in footer');
		$this->description = $this->l('Displays some text in the footer.');
	}

	public function install()
	{
		if (!parent::install() || !$this->registerHook('footer'))
			return false;
		if (!Configuration::updateValue('ADD_COPYRIGHT_CONTENT', 'Powered by Presta Shop. Your Store &#169; 2012.'))
			return false;
		if (!Configuration::updateValue('COPYRIGHT_STATUS', '0'))
			return false;
		if (!Configuration::updateValue('PAYMENT_IMAGE', 'payments.png'))
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
		
		if (Tools::isSubmit('footer_image_button')) {
			
			
			if (isset($_FILES['footer_image_field']) && isset($_FILES['footer_image_field']['tmp_name']) && !empty($_FILES['footer_image_field']['tmp_name'])) {

				if ($error = ImageManager::validateUpload($_FILES['footer_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))

					$errors .= $error;
				
else {

					Configuration::updateValue('PAYMENT_IMAGE', $_FILES['footer_image_field']['name']);
					if (!move_uploaded_file($_FILES['footer_image_field']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/' . Configuration::get('PAYMENT_IMAGE')))
						$errors .= $this -> l('Error move uploaded file');
						
					
					if($errors != '') { $output .= '<div class="error">'.$errors.'</div>'; } else { $output .= '<div class="conf confirm">' . $this -> l('Image uploaded') . '</div>'; }
					
				}
			}

		}
		
		if (Tools::isSubmit('footer_image_delete')) {

			if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/' . Configuration::get('PAYMENT_IMAGE')))
				unlink(_PS_MODULE_DIR_ . $this -> name . '/' . Configuration::get('PAYMENT_IMAGE'));
			Configuration::updateValue('PAYMENT_IMAGE', "");

			$output .= '<div class="conf confirm">' . $this -> l('Image removed') . '</div>';

		}
						
		if (Tools::isSubmit('submitCopyright'))
		{
			$copyright = Tools::getValue('copyright');
			$payment = Tools::getValue('payment_status');
			$image_url = Tools::getValue('image_url');
	
				Configuration::updateValue('ADD_COPYRIGHT_CONTENT', $copyright);
				Configuration::updateValue('COPYRIGHT_STATUS', $payment);
				Configuration::updateValue('IMAGE_URL', $image_url);
			if (isset($errors) AND sizeof($errors))
				$output .= $this->displayError(implode('<br />', $errors));
			else
				$output .= $this->displayConfirmation($this->l('Settings updated'));
		}

		return $output.$this->displayForm();
	}

	public function displayForm()
	{
	
	if((Configuration::get('COPYRIGHT_STATUS')) == '0') { $enabled = '<option value="0" selected="selected">enabled</option>'; } else { $enabled = '<option value="0">enabled</option>'; }
	if((Configuration::get('COPYRIGHT_STATUS')) == '1') { $disabled = '<option value="1" selected="selected">disabled</option>'; } else { $disabled = '<option value="1">disabled</option>'; }
		
		$output = '
	   	<form action="' . Tools::safeOutput($_SERVER['REQUEST_URI']) . '" method="post" enctype="multipart/form-data">
			<fieldset><legend><img src="'.$this->_path.'logo.png" width="16" height="16" alt="" title="" />'.$this->l('Copyright in footer').'</legend>
				<label style="text-align:left; width:100px;">'.$this->l('Copyright:').'</label>
				<div class="margin-form">
					<textarea name="copyright" style="width:300px;height:100px">'.(Configuration::get('ADD_COPYRIGHT_CONTENT')).'</textarea>
				</div>
				<label style="text-align:left; width:100px;">'.$this->l('Payment image status:').'</label>
				<div class="margin-form">
					<select name="payment_status">
					
						'.$enabled.$disabled.'
					
					 </select>
				</div>';
				
		$output .= '
				<br class="clear" />
				<label style="text-align:left; width:100px;">Url</label>
				<div class="margin-form">
					<input type="text" name="image_url" value="'.(Configuration::get('IMAGE_URL')).'">
				</div><div style="height:15px"></div>';
				
		$output .= '
				<br class="clear" />
				<label style="text-align:left; width:100px;">Upload image payment</label>
				<div class="margin-form">
					<input id="footer_image_field" type="file" name="footer_image_field">
					<input id="footer_image_button" type="submit" class="button" name="footer_image_button">
				</div><div style="height:15px"></div>';

		$footer_payment = Configuration::get('PAYMENT_IMAGE');
		if ($footer_payment != "") {
			$output .= '<label style="text-align:left; width:100px;">Image payment</label>
					<div class="margin-form">
					<img class="imgback" src="' . $this -> _path . $footer_payment . '" /><br /><br />
					<input id="footer_image_delete" type="submit" class="button" value="' . $this -> l('Delete image') . '" name="footer_image_delete">
					</div>';
		}
				
			$output .= '<div style="height:15px"></div>
				
					<input type="submit" name="submitCopyright" value="'.$this->l('Save').'" class="button" />

				
			</fieldset>
      	</form>';
		return $output;
	}

	public function hookFooter($params)
	{
		global $smarty;
		$this->smarty->assign(array(
			'copyright' => nl2br(Configuration::get('ADD_COPYRIGHT_CONTENT')),
			'payment_status' => Configuration::get('COPYRIGHT_STATUS'),
			'image_url' => Configuration::get('IMAGE_URL'),
			'payment_image' => Configuration::get('PAYMENT_IMAGE')		
		));
		
		return $this->display(__FILE__, $this->name.'.tpl');
	}

}

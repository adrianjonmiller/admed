<?php

/*

* 2007-2013 PrestaShop

*

* NOTICE OF LICENSE

*

* This source file is subject to the Academic Free License (AFL 3.0)

* that is bundled with this package in the file LICENSE.txt.

* It is also available through the world-wide-web at this URL:

* http://opensource.org/licenses/afl-3.0.php

* If you did not receive a copy of the license and are unable to

* obtain it through the world-wide-web, please send an email

* to license@prestashop.com so we can send you a copy immediately.

*

* DISCLAIMER

*

* Do not edit or add to this file if you wish to upgrade PrestaShop to newer

* versions in the future. If you wish to customize PrestaShop for your

* needs please refer to http://www.prestashop.com for more information.

*

*  @author PrestaShop SA <contact@prestashop.com>

*  @copyright  2007-2013 PrestaShop SA

*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)

*  International Registered Trademark & Property of PrestaShop SA

*/



if (!defined('_PS_VERSION_'))

	exit;



class NMI extends PaymentModule

{

	public function __construct()

	{

		$this->name = 'nmi';

		$this->tab = 'payments_gateways';

		$this->version = '1.4.4';

		$this->author = 'dh42';

		$this->need_instance = 0;



		parent::__construct();



		$this->displayName = 'Network Merchants NMI (Advanced Integration Method)';

		$this->description = $this->l('Receive payment with NMI');



		/* For 1.4.3 and less compatibility */

		$updateConfig = array(

			'PS_OS_CHEQUE' => 1,

			'PS_OS_PAYMENT' => 2,

			'PS_OS_PREPARATION' => 3,

			'PS_OS_SHIPPING' => 4,

			'PS_OS_DELIVERED' => 5,

			'PS_OS_CANCELED' => 6,

			'PS_OS_REFUND' => 7,

			'PS_OS_ERROR' => 8,

			'PS_OS_OUTOFSTOCK' => 9,

			'PS_OS_BANKWIRE' => 10,

			'PS_OS_PAYPAL' => 11,

			'PS_OS_WS_PAYMENT' => 12);



		foreach ($updateConfig as $u => $v)

			if (!Configuration::get($u) || (int)Configuration::get($u) < 1)

			{

				if (defined('_'.$u.'_') && (int)constant('_'.$u.'_') > 0)

					Configuration::updateValue($u, constant('_'.$u.'_'));

				else

					Configuration::updateValue($u, $v);

			}



		/* Check if cURL is enabled */

		if (!is_callable('curl_exec'))

			$this->warning = $this->l('cURL extension must be enabled on your server to use this module.');



		/* Backward compatibility */

		require(_PS_MODULE_DIR_.$this->name.'/backward_compatibility/backward.php');

	}



	public function install()

	{

		return parent::install() &&

			$this->registerHook('orderConfirmation') &&

			$this->registerHook('payment') &&

			$this->registerHook('header') &&

			Configuration::updateValue('NMI_DEMO', 1) &&

			Configuration::updateValue('NMI_HOLD_REVIEW_OS', _PS_OS_ERROR_);

	}



	public function uninstall()

	{

		Configuration::deleteByName('NMI_LOGIN_ID');

		Configuration::deleteByName('NMI_KEY');

		Configuration::deleteByName('NMI_DEMO');

		Configuration::deleteByName('NMI_CARD_VISA');

		Configuration::deleteByName('NMI_CARD_MASTERCARD');

		Configuration::deleteByName('NMI_CARD_DISCOVER');

		Configuration::deleteByName('NMI_CARD_AX');

		Configuration::deleteByName('NMI_HOLD_REVIEW_OS');



		return parent::uninstall();

	}



	public function hookOrderConfirmation($params)

	{

		if ($params['objOrder']->module != $this->name)

			return;



		if ($params['objOrder']->getCurrentState() != Configuration::get('PS_OS_ERROR'))

			$this->context->smarty->assign(array('status' => 'ok', 'id_order' => intval($params['objOrder']->id)));

		else

			$this->context->smarty->assign('status', 'failed');



		return $this->display(__FILE__, 'hookorderconfirmation.tpl');

	}



	public function getContent()

	{

		$html = '';

		if (Tools::isSubmit('submitModule'))

		{

			Configuration::updateValue('NMI_LOGIN_ID', Tools::getvalue('nmi_login_id'));

			Configuration::updateValue('NMI_KEY', Tools::getvalue('nmi_key'));

			Configuration::updateValue('NMI_DEMO', Tools::getvalue('nmi_demo_mode'));

			Configuration::updateValue('NMI_CARD_VISA', Tools::getvalue('nmi_card_visa'));

			Configuration::updateValue('NMI_CARD_MASTERCARD', Tools::getvalue('nmi_card_mastercard'));

			Configuration::updateValue('NMI_CARD_DISCOVER', Tools::getvalue('nmi_card_discover'));

			Configuration::updateValue('NMI_CARD_AX', Tools::getvalue('nmi_card_ax'));

			Configuration::updateValue('NMI_HOLD_REVIEW_OS', Tools::getvalue('nmi_hold_review_os'));



			$html .= $this->displayConfirmation($this->l('Configuration updated'));

		}



		// For Hold for Review

		$orderStates = OrderState::getOrderStates((int)$this->context->cookie->id_lang);



		$html .= '<h2>'.$this->displayName.'</h2>

		<fieldset><legend><img src="../modules/'.$this->name.'/logo.gif" alt="" /> '.$this->l('Help').'</legend>

			<a href="http://api.prestashop.com/partner/authorize.net/" target="_blank" style="float: right;"><img src="../modules/'.$this->name.'/logo_nmi.png" alt="" /></a>

			<h3>'.$this->l('In your PrestaShop admin panel').'</h3>

			- '.$this->l('Fill the  Username  provided by NMI').'<br />

			- '.$this->l('Fill the password field with the password provided by NMI').'<br />

			<span style="color: red;" >- '.$this->l('Warning: Your website must possess a SSL certificate to use the NMI AIM payment system. You are responsible for the safety of your customers\' bank information. PrestaShop cannot be blamed for any security issue on your website.').'</span><br />

			<br />

		</fieldset><br />

		<form action="'.Tools::htmlentitiesutf8($_SERVER['REQUEST_URI']).'" method="post">

			<fieldset class="width2">

				<legend><img src="../img/admin/contact.gif" alt="" />'.$this->l('Settings').'</legend>

				<label for="nmi_login_id">'.$this->l('Username').'</label>

				<div class="margin-form"><input type="text" size="20" id="nmi_login_id" name="nmi_login_id" value="'.Configuration::get('NMI_LOGIN_ID').'" /></div>

				<label for="nmi_key">'.$this->l('Password').'</label>

				<div class="margin-form"><input type="text" size="20" id="nmi_login_id" name="nmi_key" value="'.Configuration::get('NMI_KEY').'" /></div>

				<label for="nmi_demo_mode">'.$this->l('Mode:').'</label>

				<div class="margin-form" id="nmi_demo">

					<input type="radio" name="nmi_demo_mode" value="0" style="vertical-align: middle;" '.(!Tools::getValue('nmi_demo_mode', Configuration::get('NMI_DEMO')) ? 'checked="checked"' : '').' />

					<span style="color: #080;">'.$this->l('Production').'</span>

					<input type="radio" name="nmi_demo_mode" value="1" style="vertical-align: middle;" '.(Tools::getValue('nmi_demo_mode', Configuration::get('NMI_DEMO')) ? 'checked="checked"' : '').' />

					<span style="color: #900;">'.$this->l('Test').'</span>

				</div>

				<label for="nmi_cards">'.$this->l('Cards:').'</label>

				<div class="margin-form" id="nmi_cards">

					<input type="checkbox" name="nmi_card_visa" '.(Configuration::get('NMI_CARD_VISA') ? 'checked="checked"' : '').' />

						<img src="../modules/'.$this->name.'/cards/visa.gif" alt="visa" width=35/>

					<input type="checkbox" name="nmi_card_mastercard" '.(Configuration::get('NMI_CARD_MASTERCARD') ? 'checked="checked"' : '').' />

						<img src="../modules/'.$this->name.'/cards/mastercard.gif" alt="visa" width=35/>

					<input type="checkbox" name="nmi_card_discover" '.(Configuration::get('NMI_CARD_DISCOVER') ? 'checked="checked"' : '').' />

						<img src="../modules/'.$this->name.'/cards/discover.gif" alt="visa" width=35/>

					<input type="checkbox" name="nmi_card_ax" '.(Configuration::get('NMI_CARD_AX') ? 'checked="checked"' : '').' />

						<img src="../modules/'.$this->name.'/cards/ax.gif" alt="visa" width=35/>

				</div>



				<label for="nmi_hold_review_os">'.$this->l('Order status:  "Hold for Review" ').'</label>

				<div class="margin-form">

								<select id="nmi_hold_review_os" name="nmi_hold_review_os">';

		// Hold for Review order state selection

		foreach ($orderStates as $os)

			$html .= '

				<option value="'.(int)$os['id_order_state'].'"'.((int)$os['id_order_state'] == (int)Configuration::get('NMI_HOLD_REVIEW_OS') ? ' selected' : '').'>'.

			Tools::stripslashes($os['name']).

			'</option>'."\n";

		return $html.'</select></div>

				<br /><center><input type="submit" name="submitModule" value="'.$this->l('Update settings').'" class="button" /></center>

			</fieldset>

		</form>';

	}



	public function hookPayment($params)

	{

		$currency = Currency::getCurrencyInstance($this->context->cookie->id_currency);

		if (!Validate::isLoadedObject($currency) || $currency->iso_code != 'USD')

			return false;



		if (Configuration::get('PS_SSL_ENABLED') || (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off'))

		{

			$isFailed = Tools::getValue('aimerror');



			$cards = array();

			$cards['visa'] = Configuration::get('NMI_CARD_VISA') == 'on';

			$cards['mastercard'] = Configuration::get('NMI_CARD_MASTERCARD') == 'on';

			$cards['discover'] = Configuration::get('NMI_CARD_DISCOVER') == 'on';

			$cards['ax'] = Configuration::get('NMI_CARD_AX') == 'on';



			if (method_exists('Tools', 'getShopDomainSsl'))

				$url = 'https://'.Tools::getShopDomainSsl().__PS_BASE_URI__.'/modules/'.$this->name.'/';

			else

				$url = 'https://'.$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'modules/'.$this->name.'/';



			$this->context->smarty->assign('x_invoice_num', (int)$params['cart']->id);

			$this->context->smarty->assign('cards', $cards);

			$this->context->smarty->assign('isFailed', $isFailed);

			$this->context->smarty->assign('new_base_dir', $url);



			return $this->display(__FILE__, 'nmi.tpl');

		}

	}



	public function hookHeader()

	{

		if (_PS_VERSION_ < '1.5')

			Tools::addJS(_PS_JS_DIR_.'jquery/jquery.validate.creditcard2-1.0.1.js');

		else

			$this->context->controller->addJqueryPlugin('validate-creditcard');

	}



	/**

	 * Set the detail of a payment - Call before the validate order init

	 * correctly the pcc object

	 * See Authorize documentation to know the associated key => value

	 * @param array fields

	 */

	public function setTransactionDetail($response)

	{

		// If Exist we can store the details

		if (isset($this->pcc))

		{

			$this->pcc->transaction_id = (string)$response[6];



			// 50 => Card number (XXXX0000)

			$this->pcc->card_number = (string)substr($response[50], -4);



			// 51 => Card Mark (Visa, Master card)

			$this->pcc->card_brand = (string)$response[51];



			$this->pcc->card_expiration = (string)Tools::getValue('x_exp_date');



			// 68 => Owner name

			$this->pcc->card_holder = (string)$response[68];

		}

	}

}


<?php

class AuthorizedotnetValidationdpnModuleFrontController extends ModuleFrontController
{
	public $ssl = true;

	/*
	 * For using in the files vlidationdpn.php 
	*/
	public $module;
	
	public function setMedia()
	{
		parent::setMedia();
		$this->addJS(__PS_BASE_URI__ .'modules/authorizedotnet/js/statesManagement.js');
	}

	public function getFingerprint($api_login_id, $transaction_key, $amount, $fp_sequence, $currency_code, $fp_timestamp)
	{
		if (function_exists('hash_hmac')) {
			return hash_hmac("md5", $api_login_id . "^" . $fp_sequence . "^" . $fp_timestamp . "^" . $amount . "^".$currency_code, $transaction_key); 
		}
		return bin2hex(mhash(MHASH_MD5, $api_login_id . "^" . $fp_sequence . "^" . $fp_timestamp . "^" . $amount . "^".$currency_code, $transaction_key));
	}

	public function postProcess()
	{
		$cart = $this->context->cart;
		$cookie = $this->context->cookie;
		
		$psv = floatval(substr(_PS_VERSION_,0,3));
		
		$this->module = $adn = new AuthorizeDotNet();
		/* Validate order */
		$time = time();
		$adn_cc_err = "";
		$adn_filename  = 'validationdpn';
		
		if ($psv >= 1.5 && !$adn->_adn_payment_page) {
			$x_relay_url = Context::getContext()->link->getModuleLink('authorizedotnet', $adn_filename, array(), true);
		} else {
			$x_relay_url = (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] . ($adn->_adn_payment_page ? '?content_only=1' : '');
		}

		if (Tools::getValue('x_response_code'))
		{
			$isError = false;
			//$response_array = explode("|",$adn->doPayment());
			if (str_replace('"','',Tools::getValue('x_response_code')) == "1" && (strtoupper(md5($adn->_adn_md_hash . $adn->_adn_id . str_replace('"','',Tools::getValue('x_trans_id')) . str_replace('"','',Tools::getValue('x_amount')))) == str_replace('"','',Tools::getValue('x_MD5_Hash')) || $adn->_adn_demo_mode == 2))
			{
				$cart = new Cart(str_replace('"','',Tools::getValue('id_cart')));
				$customer = new Customer(intval($cart->id_customer));
				$total = str_replace('"','',Tools::getValue('x_amount'));
				$currency = new Currency(intval(Configuration::get('PS_CURRENCY_DEFAULT')));
				
				/*
				if ($psv < 1.3) {
					if ($currency->iso_code != 'USD') {
						$currency = new Currency(Currency::getIdByIsoCode('USD'));
						$total = number_format($total / $currency->conversion_rate, 2, '.', '');
					}
				}
				*/
				if ($psv < 1.4)
					$adn->validateOrder(intval($cart->id), $adn->_adn_type == 'AUTH_ONLY'?$adn->_adn_auth_status:_PS_OS_PAYMENT_, $total, $adn->displayName);
				else
					$adn->validateOrder(intval($cart->id), $adn->_adn_type == 'AUTH_ONLY'?$adn->_adn_auth_status:_PS_OS_PAYMENT_, $total, $adn->displayName, null, array(), null, false, $customer->secure_key);
				$order = new Order(intval($adn->currentOrder));
				$message = new Message();
				$message->message = ($adn->_adn_type == 'AUTH_ONLY'?$adn->l('Authorization Only - '):'').$adn->l('Transaction ID: ').str_replace('"','',Tools::getValue('x_trans_id')).$adn->l(' - Last 4 digits of the card: ').substr(str_replace('"','',Tools::getValue('x_account_number')),-4).$adn->l(' - AVS Response: ').str_replace('"','',Tools::getValue('x_avs_code')).$adn->l(' - Card Code Response: ').str_replace('"','',Tools::getValue('x_cvv2_resp_code'));
				$message->id_customer = $cart->id_customer;
				$message->id_order = $order->id;
				$message->private = 1;
				$message->id_employee = 0;
				$message->id_cart = $cart->id;
				$message->add();
				Db::getInstance()->Execute("INSERT INTO `"._DB_PREFIX_."authorizedotnet_refunds` VALUES('$order->id','".str_replace('"','',Tools::getValue('x_trans_id'))."','".substr(str_replace('"','',Tools::getValue('x_account_number')),-4)."','".str_replace('"','',Tools::getValue('x_auth_code'))."','".($adn->_adn_type == 'AUTH_ONLY'?'0':'1')."')");
				$redirect_url = $redirect_url = (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].__PS_BASE_URI__.'order-confirmation.php?key='.$customer->secure_key.'&id_cart='.intval($cart->id).'&id_module='.intval($adn->id).'&id_order='.intval($adn->currentOrder);
				
			} else { 
				$isError = true;
				$redirect_url = $x_relay_url . (strpos($x_relay_url, '?' ) === false ? '?':'&' ) . 'adn_err='.urlencode('<b style="font-size:14px;color:red">&nbsp;&nbsp;'.$adn->l('The was an error processing your payment').'<br />&nbsp;&nbsp;Details: '.str_replace('"','',Tools::getValue('x_response_reason_text')).'.</b>');
			}
			/**
			 * Redirect to parent for ajax verision (($adn->_adn_payment_page && !$isError)? 'parent.': '')
			 * $adn->_adn_payment_page == 1
			 */
			print "
					   <html><head><script language=\"javascript\">
		        	   <!--
		               ".(($adn->_adn_payment_page && !$isError)? 'parent.': '')."window.location=\"{$redirect_url}\";
		               //-->
		               </script>
		               </head><body><noscript><meta http-equiv=\"refresh\" content=\"1;url={$redirect_url}\"></noscript></body></html>";
			exit;
			
		}

		$address = new Address(intval($cart->id_address_invoice));
		$customer = new Customer(intval($cart->id_customer));
		$state = new State($address->id_state);
		$selectedCountry = intval($address->id_country);
		// NEW DPM CODE
		$address_delivery = new Address(intval($cart->id_address_delivery));
		//$currency_module = Currency::getIdByIsoCode('USD');//$this->getCurrency();

		// get default currency 
		$currency_module = (int) Configuration::get('PS_CURRENCY_DEFAULT');
		// recalculate currency if Currency: User Selected
		if ($cart->id_currency != $currency_module && $adn->_adn_currency == 1)
		{
			$old_id = $cart->id_currency;
			$cart->id_currency = $currency_module;
			if (is_object($this->context->cookie))
				$this->context->cookie->id_currency = $currency_module;
			if ($adn->getPSV() >= 1.5) {
				$this->context->currency = new Currency($currency_module);
			} else {
				$this->context->smarty->ps_currency = new Currency($currency_module);
			}
			$cart->update();
		}
		// get cart currency for set to ADN request
		$orderCurrency = new Currency((int)$cart->id_currency);


		$x_amount = number_format($cart->getOrderTotal(true, 3), 2, '.', '');

		$products = $cart->getProducts();
		$tax = 0;
		foreach ($products AS $product)
			$tax += number_format($product['total_wt'] - $product['total'], 2, '.', '');
		/* Shipping cost */
		if ($adn->getPSV() < 1.5) {
			$shippingCostWt = number_format($cart->getOrderShippingCost(), 2, '.', '');
			$shippingCost = number_format($cart->getOrderShippingCost(NULL, false), 2, '.', '');
		} else {
			$shippingCostWt = number_format($cart->getPackageShippingCost(), 2, '.', '');
			$shippingCost = number_format($cart->getPackageShippingCost(NULL, false), 2, '.', '');
		}
				
		$tax += $shippingCostWt - $shippingCost;
		$del_state = new State($address_delivery->id_state);
		$address_delivery->state = $del_state->iso_code;
		$i = 1;
		$id_lang = 0;
		$languages = Language::getLanguages();
		foreach ($languages AS $language)
		  		if ($language['iso_code'] == 'en')
		  			$id_lang = $language['id_lang'];
		if ($id_lang == $cart->id_lang)
			$id_lang = 0;
		$items = "";
		$x_description = "";
		foreach ($products AS $product)
		{
			$name = $product['name'];
			if ($id_lang > 0)
			{
				$eng_product = new Product($product['id_product']);
				$name = $eng_product->name[$id_lang];
			}
			$name = utf8_decode($name);
			$items .= ($items!=""?"&x_line_item=":"").$product['id_product'];
			$items .= "<|>".substr($name,0,30);
			$items .= "<|> ";
			$items .= "<|>".$product['cart_quantity'];
			$items .= "<|>".number_format($product['price_wt'],2,".","");
			$items .= "<|>".($product['price_wt'] - $product['price'] > 0?1:0);
			$x_description .= ($i == 1?"":", ").$product['cart_quantity']." X ".substr($name,0,30);
			$i++;
			if ($i == 30)
				break;
		}

		$countries = Country::getCountries(intval($this->context->cookie->id_lang), true);
		$countriesList = '';
		foreach ($countries AS $country)
		    $countriesList .= '<option value="'.($country['iso_code']).'" '.($country['id_country'] == $selectedCountry ? 'selected="selected"' : '').'>'.htmlentities($country['name'], ENT_COMPAT, 'UTF-8').'</option>';

		if($adn->_adn_demo_mode == 2) {
			$post_url = "https://test.authorize.net/gateway/transact.dll";
		} else {
			$post_url = "https://secure.authorize.net/gateway/transact.dll";
		}

		if ($address->id_state)
			$this->context->smarty->assign('id_state', $state->iso_code);

		$this->context->smarty->assign('countries_list', $countriesList);
		$this->context->smarty->assign('countries', $countries);
		$this->context->smarty->assign('address', $address);
		$this->context->smarty->assign(array(
			'adn_payment_page' => $adn->_adn_payment_page,
			'adn_total' 		=> $x_amount ,
			'this_path_ssl'		=> $adn->getHttpPathModule(),
			'adn_cc_fname' 		=> $address->firstname,
			'adn_cc_lname' 		=> $address->lastname,
			'adn_cc_address' 	=> $address->address1,
			'adn_cc_city' 		=> $address->city,
			'adn_cc_state' 		=> $state->iso_code,
			'adn_cc_zip' 		=> $address->postcode,
			'adn_cc_company' 	=> $address->company,
			'adn_cc_phone' 		=> $address->phone,
			'adn_cc_err' 		=> Tools::getValue('adn_err'),
			'adn_get_address' 	=> Configuration::get('ADN_GET_ADDRESS'),
			'adn_get_cvm' 		=> Configuration::get('ADN_GET_CVM'),
			'adn_visa' 			=> $adn->_adn_visa,
			'adn_mc' 			=> $adn->_adn_mc,
			'adn_amex' 			=> $adn->_adn_amex,
			'adn_discover'		=> $adn->_adn_discover,
			'adn_jcb' 			=> $adn->_adn_jcb,
			'adn_diners'		=> $adn->_adn_diners,
			'adn_enroute'		=> $adn->_adn_enroute,
			'time' 				=> $time,
			'x_type'			=> $adn->_adn_type,
			'x_customer_ip'		=> $_SERVER['REMOTE_ADDR'],
			'x_cust_id'			=> $cart->id_customer,
			'x_ship_to_first_name'	=> $address_delivery->firstname,
			'x_ship_to_last_name'	=> $address_delivery->lastname,
			'x_ship_to_company'	=> $address_delivery->company,
			'x_ship_to_address'	=> trim($address_delivery->address1 .' '. $address_delivery->address2),
			'x_ship_to_city'	=> $address_delivery->city,
			'x_ship_to_state'	=> $address_delivery->state,
			'x_ship_to_zip'		=> $address_delivery->postcode,
			'x_ship_to_country'	=> $address_delivery->country,
			'x_freight'			=> max((float)$shippingCost, 0),
			// 'x_amount'			=> $amount,
			'id_cart'			=> $cart->id,
			'x_invoice_num' 	=> $adn->l('Cart').' #'.$cart->id,
			'x_tax'				=> max((float)$tax, 0),
			'x_description'		=> str_replace("|","",substr(Configuration::get("PS_SHOP_NAME")." ".$adn->l("purchase: ").$x_description,0,253)),
			'x_fp_hash'			=> $this->getFingerprint($adn->_adn_id, $adn->_adn_key, $x_amount, $cart->id, $orderCurrency->iso_code, $time),
			'x_fp_sequence'		=> $cart->id,
			'x_fp_timestamp'	=> $time,
			'x_login'			=> $adn->_adn_id,
			'x_relay_url'		=> $x_relay_url,
			'x_amount'		    => $x_amount,
			'post_url'          => $post_url, 
			'x_test_request'    => (bool) $adn->_adn_demo_mode,
			'x_currency_code'	=> $orderCurrency->iso_code
		));
		if (intval(ceil(number_format($cart->getOrderTotal(true, 3), 2, '.', ''))) == 0)
		    Tools::redirect('order.php?step=1');
		$this->context->smarty->assign('this_path', __PS_BASE_URI__.'modules/authorizedotnet/');
		$this->setTemplate('validationdpn.tpl');		
	}
}
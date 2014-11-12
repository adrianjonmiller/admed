<?php

class PaypalProValidationModuleFrontController extends ModuleFrontController
{
	public $ssl = true;
        
	public function postProcess()
	{            
		$cart = $this->context->cart;
                $cookie = $this->context->cookie; 
		$psv = $this->module->getPSV();

		$confirm = Tools::getValue('confirm');	
		//$selected_country = '';
		/* Validate order */
		$time = time();
                
                $cardVerified = false;
                $paypal_cc_err = '';
             //   $cen_error = '';
                
                
                //--- Hosted Solution functionality start
                if(Tools::getValue('confirm_hosted'))
                {
                    // Hosted Solution functionality customer order confirmation proccess
                    // we check if the order was proccessed right and show 
                    // order confirmation page on success here                    
                    if(Order::getOrderByCartId(Tools::getValue('confirm_hosted')) == false && Tools::getValue('tx'))
                    {
                        // It means the user made creadit card payment on iframe
                        // we redirect to notify it
                        Tools::redirectLink($this->module->getModuleLink('validation').'?notify='.$cart->id.'&tx='.Tools::getValue('tx').'&iframe_payment=1');                    
                    }

                    
                    if(Order::getOrderByCartId(Tools::getValue('confirm_hosted')) != false)
                    {
                        $id_order = Order::getOrderByCartId(Tools::getValue('confirm_hosted'));
                        $tmp_order = new Order($id_order);
                        $tmp_customer = new Customer($tmp_order->id_customer);

                        // payment paged disabled
                        if($psv >= 1.5)
                            Tools::redirectLink('index.php?controller=order-confirmation&key='.$tmp_customer->secure_key.'&id_cart='.intval($tmp_order->id_cart).'&id_module='.intval($this->module->id).'&id_order='.intval($id_order));
                        else
                            Tools::redirectLink(__PS_BASE_URI__.'order-confirmation.php?key='.$tmp_customer->secure_key.'&id_cart='.intval($tmp_order->id_cart).'&id_module='.intval($this->module->id).'&id_order='.intval($id_order));
                    }            
                    else
                    {
                        $pp_error = $this->module->l('Something went wrong with your order');
                    }
                }
                
                if(Tools::getValue('notify'))
                {
                    // Hosted Solution functionality notify URL proccess
                    // querying Paypal for double check if order was success
                    // and validatingOrder on PrestaShop
                    
                    // At this point we are getting response by notify_url from Paypal. There's no context and cookies 
                    // as the serves is pokeing another server. The notify value is our cart value.
                    $cart = new Cart(Tools::getValue('notify'));
                    
                    if(!is_object($cart))
                    {
                        if(Configuration::get('PPPRO_DO_LOG'))
                        {
                            $this->module->logError('A fraudulent order was tried to be overcoming Paypal | time', time());                        
                        }
                        if ($this->module->_pppro_ft == 1 && !empty($this->module->_pppro_ft_email)) 
                        {
                            $this->module->sendErrorEmail($this->module->_pppro_ft_email, $cart, 'A fraudulent order was tried to be overcoming Paypal');
                        }                              
                        exit();
                    }
                    
                    // check if the order was not made with this cart and redirect to confirmation page
                    if(Order::getOrderByCartId($cart->id) != false)
                    {
                        Tools::redirectLink($this->module->getModuleLink('validation').'?confirm_hosted='.$cart->id);                    
                        exit();
                    }
                    
                    $transaction_details = $this->module->getTransactionDetails(Tools::getValue('txn_id', Tools::getValue('tx')));
                    
                    $is_payment_valid = $this->module->confirmHostedPayment($transaction_details, $cart);       
                    if($is_payment_valid == false)
                    {
                        // Logging and sending info about error to customer
                        if(Configuration::get('PPPRO_DO_LOG'))
                        {
                            $this->module->logError('A fraudulent order was tried to be made from Paypal | transaction details', $transaction_details, true);                        
                            $this->module->logError('A fraudulent order was tried to be made from Paypal | cart details', $cart, true);                        
                            $this->module->logError('A fraudulent order was tried to be made from Paypal | id_customer', $cart->id_customer);                        
                        }
                        if ($this->module->_pppro_ft == 1 && !empty($this->module->_pppro_ft_email)) 
                        {                          
                                $this->module->sendErrorEmail($this->module->_pppro_ft_email, $cart, 'A fraudulent order was tried to be made from Paypal <br />'.print_r($transaction_details));
                        }      
                        Tools::redirectLink('index.php');
                        exit();
                    }
                    if($is_payment_valid && ($transaction_details['ACK'] == "Success"))
                    {
                        $customer = new Customer(intval($cart->id_customer));
                        $total = number_format(rawurldecode($transaction_details['AMT']), 2, '.', '');
                        //$this->module->logError('customer ', $customer, true);
                        //$this->module->logError('current order id', $this->module->currentOrder);
                         
                        // Choose the right payment status
                        
                        
                        if ($psv < 1.4)
                                $this->module->validateOrder(intval($cart->id), $this->module->_pppro_method == 'AUTH_ONLY'?$this->module->_pppro_auth_status:_PS_OS_PAYMENT_, (float)  $total, $this->module->displayName);
                        else
                                $this->module->validateOrder(intval($cart->id), $this->module->_pppro_method == 'AUTH_ONLY'?$this->module->_pppro_auth_status:_PS_OS_PAYMENT_, (float) $total, $this->module->displayName, null, array(), null, false, $customer->secure_key);
                        $order = new Order(intval($this->module->currentOrder));  $this->module->logError(' order ', $order, true);
                        $message = new Message();
                        $message->message = ($this->module->_pppro_method == 'AUTH_ONLY'?$this->module->l('Authorization Only - '):'').$this->module->l('Transaction ID: ').$transaction_details['TRANSACTIONID'];
                        // Adding Pending reason to the message if Payment Status is Pending
                        if($transaction_details['PAYMENTSTATUS'] == 'Pending')
                        {
                            $message->message .= $this->module->l(' | Payment Status: Pending - Reason: ').$transaction_details['PENDINGREASON'];
                        }
                        $message->id_customer = $cart->id_customer;
                        $message->id_order = $order->id;
                        $message->private = 1;
                        $message->id_employee = 0;
                        $message->id_cart = $cart->id;
                        $message->add();

                        Db::getInstance()->Execute("INSERT INTO `"._DB_PREFIX_."paypalpro_refunds` VALUES('$order->id','".$transaction_details['TRANSACTIONID']."','0000','".$transaction_details['AuthorizationID']."','".($this->module->_pppro_method == 'AUTH_ONLY'?'0':'1')."')");   
                            
                    }
                    else
                    {
                        if(Configuration::get('PPPRO_DO_LOG'))
                        {
                            $this->module->logError('A fraudulent order was tried to be made from Paypal | transaction details', $transaction_details, true);  
                        }
                    }      
                    if(Tools::getValue('iframe_payment'))
                    {
                        // if the payment is get trough iframe
                        // the notify somehow is not called from paypal
                        // it was redirected here and we redcirect back to show
                        // the validation page
                        Tools::redirectLink($this->module->getModuleLink('validation').'?confirm_hosted='.$cart->id);
                    }
                    exit();
                } // end of if hosted_soltuion -- end of Hosted Solution functionality

                if($confirm || Tools::getValue('authenticationResponse'))
		{
                        // Paypal Pro functionality with Centinel 3D Secure validation
                    
			// copy fields from the form to get the PayPal transaction right
			// this is needed because if 3D Secure is enabled, then additional queries 
			// are sent in and out to Cardinal server and current $_POST gets overrided - deleted
			// and the fields in the PayPal query become empty
			if (!Tools::getValue('authenticationResponse'))
			{
				foreach($this->module->fieldsToCopy as $field)
				{
					$cookie->{$field} = Tools::getValue($field);
				}
			}
			$cen_error = '';
			$centinel_info = array();
			//--- 3D secure authentication response execution
			if(Tools::getValue('authenticationResponse'))
			{
				// getting the response from the redirected form
				// (the user already input his password to 3D Secure
				// and now we are getting the response of it here before anything else
				$card_enrolled = true;
				$auth_response = $this->module->doCentinelAuth($_POST['PaRes'], $cookie->transactionId, $_POST['MD']);
				if (($auth_response['paresStatus'] == 'Y' && $auth_response['signatureVerification'] == 'Y' && $auth_response['errorno'] == 0)
					|| ($auth_response['paresStatus'] == 'A' && $auth_response['signatureVerification'] == 'Y') && $auth_response['errorno'] == 0)
				{                      
					$cardVerified = true;    
				}
				else
				{
					// something went wrong 
                                        $isError = true;
					$cen_error .= $this->module->l('Card was not authorised with 3D Secure.');
                                        if(Configuration::get('PPPRO_DO_LOG'))
                                            $this->module->logError('centinel auth error number | description', $auth_response['errorno'].' | '.$auth_response['errordesc']);            
				}
				// prepare information for PayPal payment call
				$centinel_info['paresStatus'] = $auth_response['paresStatus'];
				$centinel_info['enrolled'] = 'Y';
				$centinel_info['cavv'] = $auth_response['cavv'];
				$centinel_info['xid'] = $auth_response['response']['Xid'];
				$centinel_info['eciflag'] = $auth_response['eciflag'];
			}
			else
			{
				// if no call was sent to 3D Secure servers, we start from the begining
				$cardVerified = false;
				$card_enrolled = false;
			}
			//--- end of authentication response 

			if ((Configuration::get('PPPRO_3D_ENABLED') == true) && (!$card_enrolled))
			{
				$lookup_response = $this->module->doCentinelLookup();
				if ($lookup_response['errorno'] == 0)
				{
					// no errors, check if card is enrolled in 3D Secure program
					if($lookup_response['enrolled'] == 'Y')
					{
                                                if(Configuration::get('PPPRO_DO_LOG'))
                                                    $this->module->logError('lookupresponse', $lookup_response, true);
						// card is in program, redirect for authentication
						$cookie->centinel_acs_url = $lookup_response['acsurl'];
						$cookie->centinel_payload = $lookup_response['payload'];
						$cookie->centinel_orderId = $lookup_response['orderId'];
						$cookie->transactionId = $lookup_response['transactionId']; 
                                                
                                                // hide or show content based if it is in iframe
                                                if($this->module->_pppro_payment_page != '1') {
                                                     Tools::redirectLink($this->module->getModuleLink('redirectToCentinel'));
                                                } else {
                                                   Tools::redirectLink($this->module->getModuleLink('redirectToCentinel').'?content_only=1');
                                                }                                                
                                        }
					elseif($lookup_response['enrolled'] == 'N')
					{
						$cardVerified = true; 
						// prepare information for PayPal payment call
						$centinel_info['paresStatus'] = '';
						$centinel_info['enrolled'] = 'N';
						$centinel_info['cavv'] = '';
						$centinel_info['eciflag'] = '';                
					}
					elseif($lookup_response['enrolled'] == 'U')
					{
                                                $isError = true;
						$cen_error .= $this->module->l('Either your card is not allowed to be prepaid or the bank is unavailable to authorise you.');
					}            
					else
					{
                                                $isError = true;
						$cen_error .= $this->module->l('The connection to authentication servers timed out.');
					}
				}
				else
				{
					// something went wrong
                                        $isError = true;
					$cen_error .= $this->module->l('Card was not authorised with 3D Secure.');
                                        if(Configuration::get('PPPRO_DO_LOG'))
                                            $this->module->logError('centinel lookup error number | description', $lookup_response['errorno'].' | '.$lookup_response['errordesc']);
				}
			}
			$pp_error = '';
			if (((Configuration::get('PPPRO_3D_ENABLED') == true) && $cardVerified)
				|| (Configuration::get('PPPRO_3D_ENABLED') == false))
			{
				$response_array = $this->module->doPayment($centinel_info);
				if (($response_array['ACK'] == "Success") || ($response_array['ACK'] == 'SuccessWithWarning'))
				{
					$customer = new Customer(intval($cart->id_customer));
					$total = number_format(rawurldecode($response_array['AMT']), 2, '.', '');
					if ($psv < 1.4)
						$this->module->validateOrder(intval($cart->id), $this->module->_pppro_method == 'AUTH_ONLY'?$this->module->_pppro_auth_status:_PS_OS_PAYMENT_, (float)  $total, $this->module->displayName);
					else
						$this->module->validateOrder(intval($cart->id), $this->module->_pppro_method == 'AUTH_ONLY'?$this->module->_pppro_auth_status:_PS_OS_PAYMENT_, (float) $total, $this->module->displayName, null, array(), null, false, $customer->secure_key);
					$order = new Order(intval($this->module->currentOrder));
					$message = new Message();
					$message->message = ($this->module->_pppro_method == 'AUTH_ONLY'?$this->module->l('Authorization Only - '):'').$this->module->l('Transaction ID: ').$response_array['TRANSACTIONID'].$this->module->l(' - Last 4 digits of the card: ').substr($cookie->pppro_cc_number,-4).$this->module->l(' - AVS Response: ').$response_array['AVSCODE'].$this->module->l(' - Card Code Response: ').$response_array['CVV2MATCH'];
					$message->id_customer = $cart->id_customer;
					$message->id_order = $order->id;
					$message->private = 1;
					$message->id_employee = 0;
					$message->id_cart = $cart->id;
					$message->add();
                                        
					Db::getInstance()->Execute("INSERT INTO `"._DB_PREFIX_."paypalpro_refunds` VALUES('$order->id','".$response_array['TRANSACTIONID']."','".substr($cookie->pppro_cc_number,-4)."','".$response_array['AuthorizationID']."','".($this->module->_pppro_method == 'AUTH_ONLY'?'0':'1')."')");   
					$this->module->deleteSecureCookieInfo(true);

                                        if(!$this->module->_pppro_3d_enabled)
                                        {
                                            // there's one kind of redirect if 3D Secure is disabled and payment page enabled/disabled:
                                            if($this->module->_pppro_payment_page != '1') 
                                            {
                                                // payment paged disabled
                                                if($psv >= 1.5)
                                                    Tools::redirectLink('index.php?controller=order-confirmation&key='.$customer->secure_key.'&id_cart='.intval($cart->id).'&id_module='.intval($this->module->id).'&id_order='.intval($this->module->currentOrder));
                                                else
                                                    Tools::redirectLink(__PS_BASE_URI__.'order-confirmation.php?key='.$customer->secure_key.'&id_cart='.intval($cart->id).'&id_module='.intval($this->module->id).'&id_order='.intval($this->module->currentOrder));
                                            } 
                                            else 
                                            {
                                                    /**
                                                     * Redirect to ordr-confirmation - ajax version 
                                                     * $paypalpro->_pppro_payment_page == 1 - enabled
                                                     */
                                                    @ob_end_clean();
                                                    if($psv >= 1.5)
                                                        echo 'url:'.__PS_BASE_URI__.'index.php?controller=order-confirmation&key=' .$customer->secure_key.'&id_cart='.intval($cart->id).'&id_module='.intval($this->module->id).'&id_order='.intval($this->module->currentOrder);
                                                    else
                                                        echo 'url:'.__PS_BASE_URI__.'order-confirmation.php?key='.$customer->secure_key.'&id_cart='.intval($cart->id).'&id_module='.intval($this->module->id).'&id_order='.intval($this->module->currentOrder);
                                                    exit();
                                            }                                        
                                        }
                                        else
                                        {
                                            // and another kind of redirect if 3D Secure is enabled:
                                            if($psv >= 1.5)
                                                Tools::redirectLink('index.php?controller=order-confirmation&key='.$customer->secure_key.'&id_cart='.intval($cart->id).'&id_module='.intval($this->module->id).'&id_order='.intval($this->module->currentOrder));
                                            else
                                                Tools::redirectLink(__PS_BASE_URI__.'order-confirmation.php?key='.$customer->secure_key.'&id_cart='.intval($cart->id).'&id_module='.intval($this->module->id).'&id_order='.intval($this->module->currentOrder));

                                        }
				}
				else
				{
                                        $isError = true;
					$this->module->deleteSecureCookieInfo();
					$pp_error = urldecode(isset($response_array['L_LONGMESSAGE0'])?$response_array['L_LONGMESSAGE0']:$response_array['L_SHORTMESSAGE0']);
				}     
                                                                                            
                                // if we came to here, it means that there're some errors which are handled below         
                                if ($this->module->_pppro_ft == 1 && !empty($this->module->_pppro_ft_email)) 
                                {
                                        $cartInfo = array();

                                        if ($this->module->_pppro_get_address) {
                                            $cartInfo = array(
                                                    'firstname' => Tools::getValue('pppro_cc_fname'),
                                                    'lastname'  => Tools::getValue('pppro_cc_lname'),
                                                    'address'   => Tools::getValue('pppro_cc_address'),
                                                    'city'      => Tools::getValue('pppro_cc_city'),
                                                    'state'     => Tools::getValue('pppro_id_state'),
                                                    'country'   => Tools::getValue('pppro_id_country'),
                                                    'zip'       => Tools::getValue('pppro_cc_zip')
                                            );
                                        }                      
                                        
                                        $cartInfo['number'] = substr(trim(Tools::getValue('pppro_cc_number')), -4);
                                        $this->module->sendErrorEmail($this->module->_pppro_ft_email, $cart, $cen_error.$pp_error, 'error', $cartInfo, $this->module->_pppro_get_address);
                                }                                  
                                if($this->module->_pppro_payment_page == '1') 
                                {
                                    // Errors are handled in two different ways as the redirects too.
                                    // if payment_page is not enabled, then default functionality executes from 227 line
                                    if($this->module->_pppro_3d_enabled != '1')
                                    {
                                        // 3D Secure Disabled
                                                echo "<b style=\"font-size:14px;color:red\">".$this->module->l('There was an error processing your payment')."<br />Details: </b><span style=\"font-size:14px;color:red\">".$pp_error."</span><br />";                                                
                                                exit();                             
                                    }
                                    else 
                                    {
                                         // 3D Secure Enabled
                                        /**
                                         * Redirect to parent for ajax verision (($this->module->_pppro_payment_page && !$isError)? 'parent.': '')
                                         * $pppro->_pppro_payment_page == 1
                                         */
                                        if ($this->module->getPSV() >= 1.5 && $this->module->_pppro_payment_page != '1') {
                                                $redirect_error_url = Context::getContext()->link->getModuleLink('paypalpro', 'validation', array(), true);
                                        } else {
                                                $redirect_error_url = (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'] . ($this->module->_pppro_payment_page == '1' ? '?content_only=1' : '');
                                        }                                    
                                        $redirect_url = $redirect_error_url . (strpos($redirect_error_url, '?' ) === false ? '?':'&' ) . 'pppro_err='.urlencode('<b style="font-size:14px;color:red">&nbsp;&nbsp;'.$this->module->l('The was an error processing your payment').'<br />&nbsp;&nbsp;Details: '.str_replace('"','',$paypal_cc_err).'.</b>');                                                                                                 
                                        print "
                                                <html><head><script language=\"javascript\">
                                                   <!--
                                               ".(($this->module->_pppro_payment_page == 1 && !$isError)? 'parent.': '')."window.location=\"{$redirect_url}\";
                                               //-->
                                               </script>
                                               </head><body><noscript><meta http-equiv=\"refresh\" content=\"1;url={$redirect_url}\"></noscript></body></html>";
                                        exit;
                                    }       
                                }                                
			}
		}
                
                $paypal_cc_err = '';
                if(empty($cen_error))
                {
                    $cen_error = '';                    
                }
                if(empty($pp_error))
                {
                    $pp_error = '';                    
                }
                if($cen_error != '' || $pp_error != '')
                {
                    $paypal_cc_err = "<b style=\"font-size:14px;color:red\">".$this->module->l('There was an error processing your payment')."<br />Details: </b><span style=\"font-size:14px;color:red\">".$cen_error.$pp_error."</span><br />";
                    $time = @mktime(0,0,0,$cookie->pppro_cc_Month,1,$cookie->pppro_cc_Year);	
                           
                }
                
                $cookie->pppro_id_country = Tools::getValue('pppro_id_country');
                $cookie->pppro_id_state = Tools::getValue('pppro_id_state');
                
                self::prepareVarsView($this->context, $this->module, $paypal_cc_err, $time, $cardVerified);                
                $this->setTemplate('validation.tpl');
	}
        
	public static function prepareVarsView($context = null, $paypalpro = null, $pppro_cc_err, $time, $card_verified = false)
	{
                // merge errors from PayPal and Centinel:
               // $paypal_cc_err .= $cen_error;
            
		$cart = $context->cart;
                $cookie = $context->cookie;
		if (is_null($paypalpro)) {
			$paypalpro = new PaypalPro();
		} 
                
                $confirm = Tools::getValue('confirm');	
                
                if (isset($cookie->pppro_id_country) && $cookie->pppro_id_country != false && (((Configuration::get('PPPRO_3D_ENABLED') == true) && $card_verified)
                        || (Configuration::get('PPPRO_3D_ENABLED') == false)))
                {
                    $time = @mktime(0,0,0,$cookie->pppro_cc_Month,1,$cookie->pppro_cc_Year);			
                    $address = new Address(intval($cart->id_address_invoice));
                    $selected_state = intval($cookie->pppro_id_state);
                    $state = new State($selected_state);
                    $selected_country = intval($cookie->pppro_id_country);                      
                }
                else
                {
                    $address = new Address(intval($cart->id_address_invoice));
                  //  $customer = new Customer(intval($cart->id_customer));
                    $state = new State($address->id_state);
                    $selected_state = intval($address->id_state);
                    $selected_country = intval($address->id_country);                
                }
$context->smarty->assign('id_state', $selected_state);                  
                
		$countries = Country::getCountries(intval($cookie->id_lang), true);
		$countries_list = '';

		foreach ($countries AS $country)
			$countries_list .= '<option value="'.intval($country['id_country']).'" '.($country['id_country'] == $selected_country ? 'selected="selected"' : '').'>'.htmlentities($country['name'], ENT_COMPAT, 'UTF-8').'</option>';
		$context->smarty->assign('countries_list', $countries_list);
		$context->smarty->assign('countries', $countries);
		$context->smarty->assign('address', $address);
		$context->smarty->assign(array(
                        'psv' => $paypalpro->getPSV(),
                        'pppro_3d_enabled' => $paypalpro->_pppro_3d_enabled,
                        'pppro_payment_page' => $paypalpro->_pppro_payment_page,
			'ppp_total' => number_format($cart->getOrderTotal(true, 3), 2, '.', ''),
			'this_path_ssl' => (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'modules/paypalpro/',
			'pppro_cc_fname' => $confirm?$cookie->pppro_cc_fname:"$address->firstname",
			'pppro_cc_lname' => $confirm?$cookie->pppro_cc_lname:"$address->lastname",
			'pppro_cc_address' => $confirm?$cookie->pppro_cc_address:$address->address1,
			'pppro_cc_city' => $confirm?$cookie->pppro_cc_city:$address->city,
			'pppro_cc_state' => $confirm?$cookie->pppro_cc_state:$state->iso_code,
			'pppro_cc_zip' => $confirm?$cookie->pppro_cc_zip:$address->postcode,
			'pppro_cc_number' => $cookie->pppro_cc_number,
			'pppro_cc_cvm' => $cookie->pppro_cc_cvm,
			'pppro_cc_err' => isset($pppro_cc_err)?$pppro_cc_err:'',
			'pppro_get_address' => Configuration::get('PPPRO_GET_ADDRESS'),
			'pppro_get_cvm' => Configuration::get('PPPRO_GET_CVN'),
			'pppro_visa' => $paypalpro->_pppro_visa,
			'pppro_mc' => $paypalpro->_pppro_mc,
			'pppro_amex' => $paypalpro->_pppro_amex,
			'pppro_discover' => $paypalpro->_pppro_discover,
			'maestro_issue_number' => $confirm?$cookie->maestro_issue_number:'',
			'this_path_ssl'=>$paypalpro->getPathSSL(),
			'time' => $time,
			'time_minus' => date('U', strtotime("-10 years")),
                        // PaypalPro hosted solution specific variables
                        'pppro_use_hosted' => Configuration::get('PPPRO_USE_HOSTED'),                     
                ));
                
                // Additional values for PayPal Pro Hosted solution, assigned only if it is enabled
                if(Configuration::get('PPPRO_USE_HOSTED'))
                {
                    // adjusting currencies for Hosted Pro in order to send right info
                    if ($paypalpro->_pppro_update_currency)
                        Currency::refreshCurrencies();
                    $currency_module = Currency::getIdByIsoCode($paypalpro->_pppro_default_currency);         
                    if (($cart->id_currency != $currency_module) && !in_array(Currency::getCurrencyInstance($cart->id_currency)->iso_code, $paypalpro->_pppro_notconverte_curr))
                    {
                            $old_id = $cart->id_currency;
                            $cart->id_currency = $currency_module;
                            if (is_object($cookie))
                            {
                                    $cookie->id_currency = $currency_module;
                            }
                            if($paypalpro->getPSV() >= 1.5) {
                                    $paypalpro->context->currency = new Currency($currency_module);
                            } else {
                                    $paypalpro->context->smarty->ps_currency = new Currency($currency_module);
                            }//			
                            $cart->update();
                    }                    
                    // get right currency iso_code
                    $currency = new Currency($cart->id_currency);
                    $currency = $currency->iso_code;
                                        
                    // gathering all the other details
                    $address_delivery = new Address((int)$cart->id_address_delivery);
                    $address_billing = new Address((int)$cart->id_address_invoice);
                    
                    // Getting additional billing info which cannot be get trough the address object
                    $billing_country = new Country($address_billing->id_country, $context->language->id);
                    $billing_country = $billing_country->iso_code;                      
                    $billing_state = '';
                    if(isset($address_billing->id_state) && $address_billing->id_state)
                    {
                            $billing_state = new State($address_billing->id_state);
                            $billing_state = $billing_state->name;
                    } 
                    
                    // Getting additional delivery info which cannot be get trough the address object                    
                    $delivery_country = new Country($address_delivery->id_country, $context->language->id);
                    $delivery_country = $delivery_country->iso_code;                    
                    $delivery_state = '';
                  //  print_r($address_delivery);
                    if(isset($address_delivery->id_state) && $address_delivery->id_state)
                    {
                            $delivery_state = new State($address_delivery->id_state);
                            $delivery_state = $delivery_state->name;
                    }                    
                    
                    $context->smarty->assign(array(
                            // PaypalPro hosted solution specific variables
                            'pppro_sandbox' => Configuration::get('PPPRO_SANDBOX'),
                            'pppro_acc_email' => Configuration::get('PPPRO_ACC_EMAIL'),                                                
                        
                            'pppro_btn_bg_color' => Configuration::get('PPPRO_BTN_BG_COLOR'),
                            'pppro_btn_txt_color' => Configuration::get('PPPRO_BTN_TXT_COLOR'),
                        
                            'pppro_currency' => $currency,
                            'pppro_shipping' => number_format($cart->getOrderTotal(false, 5), 2, '.', ''), // gets only shipping from getOrderTotal
                            'pppro_taxes' => number_format($cart->getOrderTotal(true, 3) - $cart->getOrderTotal(false, 3), 2, '.', ''), // deducting with taxes from without taxes
                            'pppro_subtotal' => number_format($cart->getOrderTotal(false, 3) - $cart->getOrderTotal(false, 5), 2, '.', ''), // only products without shipping, without taxes                   
                        
                            // delivery info
                            'address_delivery' => $address_delivery,
                            'delivery_country' => $delivery_country,                        
                            'delivery_state' => $delivery_state,
                            // billing info
                            'address_billing' => $address_billing,
                            'billing_country' => $billing_country,
                            'billing_state' => $billing_state,
                        
                            'pppro_paymentaction' => (Configuration::get('ppppro_method') == 'AUTH_ONLY' ? 'authorization' : 'sale'),
                            'validation_file_path' => $paypalpro->getModuleLink('validation').'?confirm_hosted='.$cart->id,
                          //  'notify_file_path' => (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'modules/paypalpro/validation.php?notify='.$cart->id,
                            'notify_file_path' => $paypalpro->getModuleLink('validation').'?notify='.$cart->id,
                            'return_file_path' => (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'order-history',
                            'cancel_file_path' => ($paypalpro->_pppro_payment_page == '1' ? (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'order.php?step=3' : $paypalpro->getModuleLink('validation'))
                    ));
                    
                } // end of if checking if the Hosted Solution is enabled
                
		if (intval(ceil(number_format($cart->getOrderTotal(true, 3), 2, '.', ''))) == 0)
			Tools::redirect('index.php?controller=order&step=1');
		$context->smarty->assign('this_path', __PS_BASE_URI__.'modules/paypalpro/');                
        }   
        
    public function initContent()
    {
        if(Configuration::get('PPPRO_SHOW_LEFT') == 0)
            $this->display_column_left = false;        
        parent::initContent();
    }
    
    public function init()
    {
        if(Configuration::get('PPPRO_SHOW_LEFT') == 0)
            $this->display_column_left = false;        
        parent::init();
    }    
}

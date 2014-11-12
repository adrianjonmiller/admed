<?php
require_once(_PS_MODULE_DIR_ . 'paypalpro/PrestoChangeoClasses/init.php');

class PaypalPro extends PrestoChangeoPaymentModule
{

	public $_pppro_password = '';
	public $_pppro_username = '';
	public $_pppro_acc_email = '';
	public $_pppro_key = '';
	public $_pppro_sandbox = '';
	public $_pppro_method = '';
	public $_pppro_payment_page = '';
	public $_pppro_auth_status = '';
	public $_pppro_refund_status = '';

	public $_pppro_use_hosted = '';

	public $_pppro_3d_enabled = '';
	public $_pppro_3d_sandbox = '';
	public $_pppro_3d_msg_v = '1.7';
	public $_pppro_3d_merchantid = '';
	public $_pppro_3d_processorid = '';
	public $_pppro_3d_trans_pwd = '';

	public $_pppro_3d_timeout_cancel = '5000';
	public $_pppro_3d_timeout_read = '3500';
	 
	public $_pppro_ft = '';
	public $_pppro_ft_email = '';

	public $_pppro_visa = '';
	public $_pppro_mc = '';
	public $_pppro_amex = '';
	public $_pppro_discover = '';

	public $_pppro_get_cvn = '';
	public $_pppro_get_address = '';
	public $_pppro_update_currency = '';
	public $_pppro_default_currency = '';
	public $_pppro_notconverte_curr = array();

	public $_pppro_show_left = '';

	protected $_full_version = 13000;
	protected $_last_updated = '';

	public $_secure_key = '';
	public $_pppro_do_log = '';
	public $_pppro_log_file = '';

	public $_pppro_hosted_button_text_color = '';
	public $_pppro_hosted_button_bg_color = '';


	private $available_currencies = array('USD', 'CAD','GBP', 'EUR', 'AUD', 'JPY');
	private $available_currecncies_with_restrictions = array('CZK', 'DKK', 'HKD', 'HUF', 'NOK', 'NZD', 'PLN', 'SGD', 'SEK', 'CHF');

	public  $fieldsToCopy = array('pppro_cc_number', 'maestro_issue_number', 'maestro_Year', 'maestro_Month', 'pppro_id_country',
			'pppro_id_state', 'pppro_cc_Month', 'pppro_cc_Year', 'pppro_cc_cvm', 'pppro_cc_address', 'pppro_cc_city',
			'pppro_cc_zip', 'pppro_cc_lname', 'pppro_cc_fname');

	public $context;

	public function __construct()
	{
		$this->name = 'paypalpro';
		$this->tab = $this->getPSV()<1.4?'Payment':'payments_gateways';
		$this->version = '1.3';
		if ($this->getPSV() >= 1.4)
			$this->author = 'Presto-Changeo';

		parent::__construct();
		$this->_refreshProperties();
                
		$this->currencies = true;
		$this->currencies_mode = 'radio';

		$this->displayName = $this->l('PayPal Pro');
		$this->description = $this->l('Receive and Refund payments using PayPal Pro with optional 3D Secure functionality');

		if ($this->_pppro_username == "" || $this->_pppro_key == "" || $this->_pppro_password == "" || $this->_pppro_acc_email == "")
			$this->warning = $this->l('You must enter your PayPal API infomation, for details on how to get them click "Configure"');
		if ($this->upgradeCheck('PPP'))
			$this->warning = $this->l('We have released a new version of the module,') .' '.$this->l('request an upgrade at ').' https://www.presto-changeo.com/en/contact_us';

	}

	function install()
	{
		$secure_key = $this->str_makerand(20, 30, true, false, true);                
		if (!parent::install()
			OR !$this->registerHook('payment')
			OR !$this->registerHook('paymentReturn')
			OR !$this->registerHook('adminOrder')
			OR !$this->registerHook('rightColumn'))
		return false;                
		$currency = Currency::getCurrency(Configuration::get('PS_CURRENCY_DEFAULT'));
		if (!Configuration::updateValue('PPPRO_SANDDBOX', "1")
			|| !Configuration::updateValue('PPPRO_METHOD', "AUTH_CAPTURE")
			|| !Configuration::updateValue('PPPRO_PAYMENT_PAGE', "1")
			|| !Configuration::updateValue('PPPRO_REFUND_STATUS', "7")
			|| !Configuration::updateValue('PPRPO_API_USER', '')
			|| !Configuration::updateValue('PPRPO_SECURE_KEY', $secure_key)
			|| !Configuration::updateValue('PPPRO_NOTCONVERTE_CURR',serialize(array($currency['iso_code'])))
			|| !Configuration::updateValue('PPRPO_API_SIGNATURE', ''))
		return false;
		if (Configuration::get('PPPRO_TABLE_CREATED') != 1)
		{
			if (!file_exists(dirname(__FILE__).'/db/install.sql'))
				return (false);
			else if (!$sql = file_get_contents(dirname(__FILE__).'/db/install.sql'))
				return (false);
			$sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
			$sql = preg_split("/;\s*[\r\n]+/", $sql);
                        foreach ($sql AS $k=>$query)
                        {
                                Db::getInstance()->Execute(trim($query));
                        }                         
			Configuration::updateValue('PPPRO_TABLE_CREATED','1');
		}    
                // Create log file unique for this installation
                Configuration::updateValue('PPPRO_LOG_FILE', md5(time()));
                
                // Checks for PS SHOP COUNTRY and sets the payment solution type
                if(Configuration::get('PS_SHOP_COUNTRY_ID'))
                {
                    $id_country_shop = Configuration::get('PS_SHOP_COUNTRY_ID');
                    $id_countries_hosted_solution = array('8',  // France
                                                          '17', // United Kingdom
                                                          '24', // Australia
                                                          '22', // Honk Kong
                                                          '10', // Italy
                                                          '6',  // Spain
                                                          '11'  // Japan                      
                                                                ); 
                    if(in_array($id_country_shop, $id_countries_hosted_solution))
                    {
                        Configuration::updateValue('PPPRO_USE_HOSTED', 1);
                    }
                }                
		return true;
	}
        
	function uninstall()
	{
		return parent::uninstall();
	}


	private function _refreshProperties()
	{
		$this->_pppro_username =  Configuration::get('PPPRO_API_USER');
		$this->_pppro_password =  Configuration::get('PPPRO_API_PASSWORD');
		$this->_pppro_acc_email =  Configuration::get('PPPRO_ACC_EMAIL');
		$this->_pppro_key =  Configuration::get('PPPRO_API_SIGNATURE');
		$this->_pppro_method =  Configuration::get('PPPRO_METHOD');
		$this->_pppro_payment_page =  Configuration::get('PPPRO_PAYMENT_PAGE');
		$this->_pppro_update_currency =  intval(Configuration::get('PPPRO_UPDATE_CURRENCY'));
		$this->_pppro_get_address =  intval(Configuration::get('PPPRO_GET_ADDRESS'));
		$this->_pppro_get_cvn =  intval(Configuration::get('PPPRO_GET_CVN'));
		$this->_pppro_visa =  intval(Configuration::get('PPPRO_VISA'));
		$this->_pppro_mc =  intval(Configuration::get('PPPRO_MC'));
		$this->_pppro_amex =  intval(Configuration::get('PPPRO_AMEX'));
		$this->_pppro_discover =  intval(Configuration::get('PPPRO_DISCOVER'));
		$this->_pppro_sandbox =  intval(Configuration::get('PPPRO_SANDBOX'));
		$this->_pppro_auth_status = intval(Configuration::get('PPPRO_AUTH_STATUS'));
		$this->_pppro_default_currency = Configuration::get('PPPRO_DEFAULT_CURRENCY');
		$tmp = Configuration::get('PPPRO_NOTCONVERTE_CURR');
		$this->_pppro_notconverte_curr = strlen($tmp)>6?unserialize($tmp):array();
		$this->_last_updated = Configuration::get('PRESTO_CHANGEO_UC');

		$this->_pppro_3d_enabled = intval(Configuration::get('PPPRO_3D_ENABLED'));
                $this->_pppro_3d_sandbox =  intval(Configuration::get('PPPRO_3D_SANDBOX'));
		$this->_pppro_3d_merchantid = Configuration::get('PPPRO_3D_MERCHANTID');
		$this->_pppro_3d_processorid = Configuration::get('PPPRO_3D_PROCESSORID');
		$this->_pppro_3d_trans_pwd = Configuration::get('PPPRO_3D_TRANS_PWD');
                
		$this->_pppro_hosted_button_bg_color = Configuration::get('PPPRO_BTN_BG_COLOR');
		$this->_pppro_hosted_button_text_color = Configuration::get('PPPRO_BTN_TXT_COLOR');

		$this->_secure_key = Configuration::get('PPRPO_SECURE_KEY');
                $this->_pppro_show_left = Configuration::get('PPPRO_SHOW_LEFT');
		$this->_pppro_ft = intval(Configuration::get('PPPRO_FT'));
		$this->_pppro_ft_email = Configuration::get('PPPRO_FT_EMAIL');    
                
                $this->_pppro_use_hosted = Configuration::get('PPPRO_USE_HOSTED');    
                $this->_pppro_do_log = Configuration::get('PPPRO_DO_LOG');    
                $this->_pppro_log_file = Configuration::get('PPPRO_LOG_FILE');    
	}

	public function getContent()
	{          
		$this->_html = (($this->getPSV() >= 1.5 ) ? '<div style="width:850px;margin:auto;">' : '');
		$this->_html .= '<img src="http://updates.presto-changeo.com/logo.jpg" border="0" /> <h2>'.$this->displayName.' '.$this->version.'</h2>';
		$this->_postProcess();
		$this->_displayForm();
		$this->_html .= ($this->getPSV() >= 1.5 ) ? '</div>' : '';
		return $this->_html;
	}
        
	protected function isColumnExistInTable($column, $table)
	{
		$sqlExistsColumn = "SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA=DATABASE()
				AND COLUMN_NAME='" . $column . "' AND TABLE_NAME='" . _DB_PREFIX_ . $table . "'; ";
		$exists = Db::getInstance()->ExecuteS($sqlExistsColumn);
		return !empty($exists);
	}        
        
	protected function  applyUpdatesAlertTable()
	{
		// from module verstion 1.1.3 ADN_ALTER_TABLE = 1    `details` varchar(255) NOT NULL,
		if (Configuration::get('PPPRO_ALTER_TABLE') != '2')
		{
			if(!$this->isColumnExistInTable('details', 'paypalpro_refund_history')) { 
				Db::getInstance()->Execute("ALTER TABLE `"._DB_PREFIX_."paypalpro_refund_history` ADD `details` varchar(255)  AFTER `amount`");
			}
                        Configuration::updateValue('PPPRO_ALTER_TABLE','1');
                }
        }
        
	protected function applyUpdates()
	{
		/**
		 * update hook module without reinstall module
		 */
		if (Configuration::get('PPPRO_ADMINHOOK_ADDED') != '1') {
			if ($this->getPSV() < 1.5) {
				$hookId = Hook::get('adminOrder');
				$isExistModule = Hook::getModuleFromHook($hookId, $this->id); 
				if (empty($isExistModule)) {
					if ($this->registerHook('adminOrder'))
						Configuration::updateValue('PPPRO_ADMINHOOK_ADDED', '1');
				}
			} else {
				$hookId = Hook::getIdByName('adminOrder');
				$isExistModule = Hook::getModulesFromHook($hookId, $this->id);
				if (empty($isExistModule)) {
					if ($this->registerHook('adminOrder')) 
						Configuration::updateValue('PPPRO_ADMINHOOK_ADDED', '1');
				}
			}
		}
                Configuration::updateValue('PPPRO_REFUND_STATUS', "7");
                
                /*
                 * Update log file changes                 
                 */
                if (Configuration::get('PPPRO_LOGFILE_CHANGES') != '1') {                   
                    Configuration::updateValue('PPPRO_LOG_FILE', md5(time()));                    
                    Configuration::updateValue('PPPRO_LOGFILE_CHANGES', '1');
                }
	}        

	private function _displayForm()
	{
      //      echo $this->getPSV(); break;
                $this->applyUpdates();
                $this->applyUpdatesAlertTable();
		$cookie = $this->context->cookie;
		$states = OrderState::getOrderStates(intval($cookie->id_lang));
		if ($url = $this->upgradeCheck('PPP'))
		{
			$this->_html .= '
            <link rel="stylesheet" type="text/css" href="'._MODULE_DIR_.'paypalpro/css/paypalpro_admin.css">
            <script type="text/javascript" src="'.($this->getPSV() >= 1.5 ? __PS_BASE_URI__.'js/jquery/plugins/jquery.colorpicker.js' : __PS_BASE_URI__.'js/jquery/jquery-colorpicker.js').'"></script>
            <fieldset class="width3" style="background-color:#FFFAC6;width:800px;"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('New Version Available').'</legend>
            '.$this->l('We have released a new version of the module. For a list of new features, improvements and bug fixes, view the ').'<a href="'.$url.'" target="_index"><b><u>'.$this->l('Change Log').'</b></u></a> '.$this->l('on our site.').'
            <br />
            '.$this->l('For real-time alerts about module updates, be sure to join us on our') .' <a href="http://www.facebook.com/pages/Presto-Changeo/333091712684" target="_index"><u><b>Facebook</b></u></a> / <a href="http://twitter.com/prestochangeo1" target="_index"><u><b>Twitter</b></u></a> '.$this->l('pages').'.
            <br />
            <br />
            '.$this->l('Please').' <a href="https://www.presto-changeo.com/en/contact_us" target="_index"><b><u>'.$this->l('contact us').'</u></b></a> '.$this->l('to request an upgrade to the latest version').'.
            </fieldset><br />';
		}
		$this->_html .= '
        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                <fieldset class="width3" style="width:800px;"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('PayPal Pro Settings').'</legend>
                <script type="text/javascript">
                var baseDir = \''._MODULE_DIR_.'paypalpro/'.'\';
                function method_change()
                {
                        if ($("#pppro_method").val() == "AUTH_CAPTURE")
                        {
                                $("#capture_transaction").hide();
                                $("#cap_stat").hide();
                        }
                        else
                        {
                                $("#capture_transaction").show();
                                $("#cap_stat").show();
                }
                }

                function search_orders(type)
                {
                        var orderId = "";
                        if (type == 1)
                                orderId = $("#capture_order_id").val();
                        if (type == 2)
                                orderId = $("#refund_order_id").val();
                        if (orderId == "")
                        {
                                alert("Please Enter a Valid Order ID.");
                                if (type == 1)
                                        $("#capture_order_id").focus();
                                else if (type == 2)
                                        $("#refund_order_id").focus();
                                return;
                        }
                        if (type == 1)
                        {
                                $.ajax({
                                        type: "POST",
                                        url: baseDir + "paypalpro-ajax.php",
                                        async: true,
                                        cache: false,
                                        data: "orderId=" + orderId + "&id_lang='.$cookie->id_lang.'&id_employee='.$cookie->id_employee.'&type="+ type + "&secure_key='.$this->_secure_key.'",
                                        success: function(html){ $("#capture_order_details").html(html); },
                                        error: function() {alert("ERROR:");}
                                });
                        }
                        if (type == 2)
                        {
                                $.ajax({
                                        type: "POST",
                                        url: baseDir + "paypalpro-ajax.php",
                                        async: true,
                                        cache: false,
                                        data: "orderId=" + orderId + "&id_lang='.$cookie->id_lang.'&id_employee='.$cookie->id_employee.'&type="+ type + "&secure_key='.$this->_secure_key.'",
                                        success: function(html){ $("#refund_order_details").html(html); },
                                        error: function() {alert("ERROR:");}
                                });
                        }
                }

        function clear_orders(type)
        {
                if (type == 1)
                {
                        $("#capture_order_id").val("");
                        $("#capture_order_details").html("");
                }
                if (type == 2)
                {
                        $("#refund_order_id").val("");
                        $("#refund_order_details").html("");
                }                
        }

        '.(Tools::getValue('pppro_use_hosted', $this->_pppro_use_hosted) == 1 ? ' $(document).ready(function() { $(\'.hosted_enabled\').hide(); $(\'.hosted_theme_options\').show(); });' : '').'
        $(document).ready(function() { 
            $(".hint_img").live({
                    mouseenter:
                       function()  {
                                    $(this).siblings(".hint").show();
                       },
                    mouseleave:
                       function() {
                                    $(this).siblings(".hint").stop().hide();
                       }
            });

            $("input[name=pppro_use_hosted]:radio").change(function () {
                if($(this).val() == 1) {
                    $(\'.hosted_enabled\').hide();
                    $(\'.hosted_theme_options\').show();
                } else {
                    $(\'.hosted_enabled\').show();
                    $(\'.hosted_theme_options\').hide();
                }
            });

        });
</script>
        <table cellspacing="10" width="800">
        <tr height="20">
                <td align="left" colspan="2">
                        <li style="margin-left:10px">'.$this->l('Information about signing up with PayPal Pro Direct Payments:').' <a href="https://www.paypal.com/webapps/mpp/website-payments-pro" target="_blank">https://www.paypal.com/webapps/mpp/website-payments-pro</a>.</li>
                </td>
        </tr>
        <tr height="20">
                <td align="left" colspan="2">
                        <li style="margin-left:10px">'.$this->l('Instructions for obtaining API Username, Password and Signature').' <a href="http://www.youtube.com/watch?v=ho1OefLKbM0" target="_blank">http://www.youtube.com/watch?v=ho1OefLKbM0</a>.</li>
                </td>
        </tr>
        <tr height="20">
                <td align="left" colspan="2" style="color:red">
                        <li style="margin-left:10px">'.$this->l('You cannot issue a refund if the transaction occurred after the refund period has passed; typically, the refund period is 60 days.').'.</li>
                </td>
        </tr>
        <tr height="30">
                        <td align="left" style="font-weight:bold;font-size:14px">
                                '.$this->l('PayPal Account email').':
                        </td>
                        <td align="left">
                                <input type="text" id="pppro_id" name="pppro_acc_email" size="45" value="'.Tools::getValue('pppro_acc_email', $this->_pppro_acc_email).'" />
                        </td>
                </tr> 
		<tr height="30">                
                        <td align="left" style="font-weight:bold;font-size:14px">
                                '.$this->l('PayPal API Username').':
                        </td>
                        <td align="left">
                                <input type="text" id="pppro_id" name="pppro_username" size="45" value="'.Tools::getValue('pppro_username', $this->_pppro_username).'" />
                        </td>
                </tr>
                <tr height="30">                
                        <td align="left" style="font-weight:bold;font-size:14px">
                                '.$this->l('PayPal API Password').':
                        </td>
                        <td align="left">
                                <input type="text" id="pppro_id" name="pppro_password" value="'.Tools::getValue('pppro_password', $this->_pppro_password).'" />
                        </td>
                </tr>                
                <tr>
                        <td align="left" style="font-weight:bold;font-size:14px" >
                                '.$this->l('PayPal API Signature').':
                        </td>
                        <td align="left">
                                <input type="text" id="pppro_key" name="pppro_key" size="80" value="'.Tools::getValue('pppro_key', $this->_pppro_key).'" />&nbsp;
                        </td>
                </tr>
                <tr>
                        <td align="left" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Enable SandBox Mode').':
                        </td>
                        <td align="left">
                            <select name="pppro_sandbox">
                                <option value="">-----  '.$this->l('Select').'  ------</option>                                    
                                <option value="1" '.(Tools::getValue('pppro_sandbox', $this->_pppro_sandbox) == '1'?'selected':'').'>'.$this->l('Yes').'</option>
                                <option value="0" '.(Tools::getValue('pppro_sandbox', $this->_pppro_sandbox) == '0'?'selected':'').'>'.$this->l('No').'</option>
                                
                            </select>
                        </td>
                </tr>
                <tr>
                        <td align="left" style="font-weight:bold;font-size:14px" >
                                '.$this->l('PaypalPro Solution type:').'
                        </td>
                        <td align="left">
                               <input type="radio" value="0" id="pppro_use_hosted" name="pppro_use_hosted" '.(Tools::getValue('pppro_use_hosted', $this->_pppro_use_hosted) == 0 ? 'checked' : '').' />&nbsp;
                               '.$this->l('Direct Payment') . '  &nbsp;&nbsp;&nbsp;                            
                               <input type="radio" value="1" id="pppro_use_hosted" name="pppro_use_hosted" '.(Tools::getValue('pppro_use_hosted', $this->_pppro_use_hosted) == 1 ? 'checked' : '').' />&nbsp;
                               '. $this->l('Hosted Solution') . ' &nbsp;&nbsp;&nbsp;                   
                                <span class="hint_wrp">
                                        <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                        <span class="hint">
                                            '.$this->l('Use Paypal Hosted Solution instead of Direct Payment .').'                                        
                                            '.$this->l('Hosted Solution is not available for US customer, but is available for UK, France, Australia, Honk Kong, Italy, Spain, Japan, Singapore users ').'
                                        </span>
                                </span>                                   
                        </td>
                </tr>                   
                <tr>
                        <td align="left" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Payment page:').'
                        </td>
                        <td align="left">
                                <input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="pppro_payment_page" id="pppro_payment_page" value="0" '.(Tools::getValue('pppro_payment_page', $this->_pppro_payment_page) == '0'?'checked':'').' />
                                &nbsp; ' . $this->l('New page') . ' &nbsp;&nbsp;&nbsp;
                                <input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="pppro_payment_page" id="pppro_payment_page" value="1" '.(Tools::getValue('pppro_payment_page', $this->_pppro_payment_page) == '1'?'checked':'').' />
                                &nbsp; ' . $this->l('Embedded in Checkout') . '  &nbsp;&nbsp;&nbsp;
                        </td>
                </tr>             
                <tr>
                        <td align="left" valign="top" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Transaction Type').':
                        </td>
                        <td align="left">
                                <select style="width: 185px;" id="pppro_method" name="pppro_method" onchange="javascript:method_change()">
                                <option value="AUTH_CAPTURE" '.(Tools::getValue('pppro_method', $this->_pppro_method) == 'AUTH_CAPTURE'?'selected':'').' >'.$this->l('Authorize and Capture').'</option>
                                <option value="AUTH_ONLY" '.(Tools::getValue('pppro_method', $this->_pppro_method) == 'AUTH_ONLY'?'selected':'').' >'.$this->l('Authorize Only').'</option>
                                </select>
                                <span id="cap_stat" style="margin-left:10px;'.(Tools::getValue('pppro_method', $this->_pppro_method) != 'AUTH_ONLY'?'display:none;':'').'">
                                '.$this->l('Authorize Order Status').':
                                <select name="pppro_auth_status" id="pppro_auth_status" >';
		foreach ($states AS $state)
		$this->_html .= '<option value="'.$state['id_order_state'].'" '.(Tools::getValue('pppro_auth_status', $this->_pppro_auth_status) == $state['id_order_state']?'selected="selected"':'').'>'.$state['name'].'</option>';
		$this->_html .= '</select>
                                <br /><br />
                                <li style="margin-left:10px">'.$this->l('You can create a new Order Status to use for Authorization only in Orders->Statuses').'</li>
                                </span>
                        </td>
                </tr>
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:12px">
                                <br />
                        </td>
                </tr>
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:12px">
                                <br />
                        </td>
                </tr>        
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Enable 3D Secure (UK only)').':
                        </td>
                        <td align="left">
                            <select name="pppro_3d_enabled">
                                <option value="">-----  '.$this->l('Select').'  ------</option>                                    
                                <option value="1" '.(Tools::getValue('pppro_3d_enabled', $this->_pppro_3d_enabled) == '1'?'selected':'').'>'.$this->l('Yes').'</option>
                                <option value="0" '.(Tools::getValue('pppro_3d_enabled', $this->_pppro_3d_enabled) == '0'?'selected':'').'>'.$this->l('No').'</option>
                            </select>
                            <span class="hint_wrp">
                                    <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                    <span class="hint">
                                        '.$this->l('For more information please visit').': <a style="text-decoration:underline;" href="http://www.paypal-business.co.uk/3Dsecure.asp">PayPal</a> '.$this->l('and').' <a style="text-decoration:underline;" href="http://www.cardinalcommerce.com/">Cardinal Commerce</a>
                                    </span>
                            </span>                            
                        </td>
                </tr>    
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Enable 3D Secure SandBox Mode').':
                        </td>
                        <td align="left">
                            <select name="pppro_3d_sandbox">
                                <option value="">-----  '.$this->l('Select').'  ------</option>                                    
                                <option value="1" '.(Tools::getValue('pppro_3d_sandbox', $this->_pppro_3d_sandbox) == '1'?'selected':'').'>'.$this->l('Yes').'</option>
                                <option value="0" '.(Tools::getValue('pppro_3d_sandbox', $this->_pppro_3d_sandbox) == '0'?'selected':'').'>'.$this->l('No').'</option>
                                
                            </select>
                        </td>
                </tr>                
		<tr height="30" class="hosted_enabled">                
                        <td align="left" style="font-weight:bold;font-size:14px">
                                '.$this->l('Centinel Merchant ID').':
                        </td>
                        <td align="left">
                                <input type="text" id="pppro_3d_merchantid" name="pppro_3d_merchantid" value="'.Tools::getValue('pppro_3d_merchantid', $this->_pppro_3d_merchantid).'" />
                        </td>
                </tr>
                <tr height="30" class="hosted_enabled">                
                        <td align="left" style="font-weight:bold;font-size:14px">
                                '.$this->l('Centinel Processor ID').':
                        </td>
                        <td align="left">
                                <input type="text" id="pppro_3d_processorid" name="pppro_3d_processorid" value="'.Tools::getValue('pppro_3d_processorid', $this->_pppro_3d_processorid).'" />
                        </td>
                </tr>                
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Centinel Transaction Password').':
                        </td>
                        <td align="left">
                                <input type="text" id="pppro_3d_trans_pwd" name="pppro_3d_trans_pwd" value="'.Tools::getValue('pppro_3d_trans_pwd', $this->_pppro_3d_trans_pwd).'" />&nbsp;
                        </td>
                </tr>                
                <tr>
                        <td align="left" style="font-weight:bold;font-size:12px">
                                <br />
                        </td>
                </tr>
                <tr class="hosted_theme_options" style="display:none;">
                    <td align="left" style="font-weight:bold;font-size:14px"> '.$this->l('Pay Button Text Color').' </td>
                    <td align="left">
                        <input id="pppro_hosted_button_text_color" data-hex="true" class="color mColorPickerInput" type="color"  value="'.Tools::getValue('pppro_hosted_button_text_color', $this->_pppro_hosted_button_text_color).'" name="pppro_hosted_button_text_color">
                    </td>
                </tr> 
                <tr class="hosted_theme_options" style="display:none;">
                    <td align="left" style="font-weight:bold;font-size:14px"> '.$this->l('Pay Button Background Color').' </td>
                    <td align="left">
                        <input id="pppro_hosted_button_bg_color" data-hex="true" class="color mColorPickerInput" type="color" value="'.Tools::getValue('pppro_hosted_button_bg_color', $this->_pppro_hosted_button_bg_color).'" name="pppro_hosted_button_bg_color">
                    </td>
                </tr>
                <tr>
                        <td align="left" style="font-weight:bold;font-size:12px">
                                <br />
                        </td>
                </tr>                 
                <tr>
                        <td align="left" style="font-weight:bold;font-size:12px">
                                '.$this->l('Failed Transaction').':
                        </td>
                        <td align="left">
                                <input type="checkbox" value="1" id="pppro_ft" name="pppro_ft" '.(Tools::getValue('pppro_ft', $this->_pppro_ft) == 1 ? 'checked' : '').' onchange="update_ft()"/> 
                                <span style="line-height:20px;">'.$this->l('Send an email to').'</span>
                                <input type="text" id="pppro_ft_email" style="width:200px" name="pppro_ft_email" value="'.Tools::getValue('pppro_ft_email', $this->_pppro_ft_email).'" /> 
                                <span style="line-height:20px;">'.$this->l('whenever a transaction fails').'</span>

                                <script>

                                        function update_ft() {
                                                if ($("#pppro_ft").is(":checked")) {
                                                        document.getElementById("pppro_ft_email").readonly = false;
                                                        $("#pppro_ft_email").css("background-color","white");
                                                } else {
                                                        document.getElementById("pppro_ft_email").readonly = true;
                                                        $("#pppro_ft_email").css("background-color","#e6e6e6");
                                                }
                                        }

                                        $( document ).ready(function() {
                                                update_ft();
                                        });
                                </script>
                        </td>
                </tr>		                
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:12px" >
                                '.$this->l('Accepted Cards:').'
                        </td>
                        <td align="left" >
                                <input type="checkbox" value="1" id="pppro_visa" name="pppro_visa" '.(Tools::getValue('pppro_visa', $this->_pppro_visa) == 1 ? 'checked' : '').' />
                                <img src="'.$this->_path.'img/visa.gif" />
                                &nbsp;&nbsp;
                                <input type="checkbox" value="1" id="pppro_mc" name="pppro_mc" '.(Tools::getValue('pppro_mc', $this->_pppro_mc) == 1 ? 'checked' : '').' />
                                <img src="'.$this->_path.'img/mc.gif" />
                                &nbsp;&nbsp;
                                <input type="checkbox" value="1" id="pppro_amex" name="pppro_amex" '.(Tools::getValue('pppro_amex', $this->_pppro_amex) == 1 ? 'checked' : '').' />
                                <img src="'.$this->_path.'img/amex.gif" />
                                &nbsp;&nbsp;
                                <input type="checkbox" value="1" id="pppro_discover" name="pppro_discover" '.(Tools::getValue('pppro_discover', $this->_pppro_discover) == 1 ? 'checked' : '').' />
                                <img src="'.$this->_path.'img/discover.gif" />
                                &nbsp;&nbsp;
                        </td>
                </tr>
                <tr>
                        <td align="left" valign="top" style="font-weight:bold;font-size:12px" >
                                '.$this->l('Default Currency:').'
                        </td>
                        <td align="left" >
                                <select name="pppro_default_currency" id="pppro_default_currency" >';
		$enabledCurrencies = Currency::getCurrencies();
		$enabledISO = array();
		foreach ($enabledCurrencies as $cur)
		$enabledISO[] = $cur['iso_code'];
		$available_currencies = $this->available_currencies;
		if(Configuration::get('PS_SHOP_COUNTRY_ID') != ''
		&& (Configuration::get('PS_SHOP_COUNTRY_ID') == Country::getByIso('UK')
		|| Configuration::get('PS_SHOP_COUNTRY_ID') == Country::getByIso('CA')))
		{
			$available_currencies = array_merge($available_currencies, $this->available_currecncies_with_restrictions);
			$currencies_message = $currencies_message = $this->l('Currencies ').(string) implode(" ", $this->available_currecncies_with_restrictions).$this->l(' are not compatible with USA credit cards.');
		}
		else
		{
			$currencies_message = $this->l('All of these currencies are compatible with Visa, MasterCard.').'<br /><br />'.$this->l('USD is also compatible with Discover, American Express.').' '.$this->l('For more information refer to PayPal');
		}
		$atleast_one_available = false;
		foreach ($available_currencies AS $currency)
		{
			if (in_array($currency, $enabledISO))
			{
				$this->_html .= '<option value="'.$currency.'" '.(Tools::getValue('pppro_default_currency', $this->_pppro_default_currency) == $currency?'selected="selected"':'').'>'.$currency.'</option>';
				$atleast_one_available = true;
			}
		}
		$this->_html .= '</select>';
			
		$this->_html .= '&nbsp;&nbsp;&nbsp;'.$currencies_message;

		if($atleast_one_available === false)
		{
			$this->_html .= '<br /> <span style="color:red">'.$this->l('You do not have any available currencies for the module to work with.')."</span>";
		}

		$this->_html .= '</td>
                </tr>                
                <tr>
                    <td align="left" valign="top" style="font-weight:bold;font-size:12px" >
                            '.$this->l('Accepted Currencies:').'
                    </td>
					<td align="left">
                 ';
		$loop = 0;
		foreach($enabledCurrencies as $currency)
		{
			$this->_html .= '
                <div style="float:left; margin:0 '.(10 * $loop).'px 0;">
                <div class="name">
                        '.$currency['iso_code'].' '.$currency['sign'].'
                </div>
                <div class="currency_box" style="padding:5px;">
                        <input '.(!empty($this->_pppro_notconverte_curr) && in_array($currency['iso_code'], $this->_pppro_notconverte_curr)?'checked="checked"':'').' type="checkbox" name="pppro_notconverte_curr[]"  value="'.$currency['iso_code'].'" />
                </div>
                </div>';
			$loop = 1;
		}
		$this->_html .= '
                                <span class="hint_wrp">
                                        <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                        <span class="hint">
                                            '.$this->l('Selected currencies would not be converted to default currency on check out').'
                                        </span>
                                </span>                    
				</td>
                </tr>
                <tr>
                        <td align="left" style="font-weight:bold;font-size:12px" >
                                '.$this->l('Currency Conversion:').'
                        </td>
                        <td align="left" >
                                <input type="checkbox" value="1" id="pppro_update_currency" name="pppro_update_currency" '.(Tools::getValue('pppro_update_currency', $this->_pppro_update_currency) == 1 ? 'checked' : '').' />&nbsp;
                              <span class="hint_wrp">
                                        <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                        <span class="hint">
                                            '.$this->l('Currency rate will be updated before every transaction using Prestashop\'s built in tool').'.
                                        </span>
                                </span>                                      
                        </td>
                </tr> 
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:12px" >
                                '.$this->l('Require Address:').'
                        </td>
                        <td align="left" >
                                <input type="checkbox" value="1" id="pppro_get_address" name="pppro_get_address" '.(Tools::getValue('pppro_get_address', $this->_pppro_get_address) == 1 ? 'checked' : '').' />&nbsp;
                              <span class="hint_wrp">
                                        <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                        <span class="hint">
                                            '.$this->l('User must enter an address (Their billing info will be entered by default)').'
                                        </span>
                                </span>                                    
                        </td>
                </tr>
                <tr class="hosted_enabled">
                        <td align="left" style="font-weight:bold;font-size:12px">
                                '.$this->l('Require CVN:').'
                        </td>                        
                        <td align="left" >
                                <input type="checkbox" value="1" id="pppro_get_cvn" name="pppro_get_cvn" '.(Tools::getValue('pppro_get_cvn', $this->_pppro_get_cvn) == 1 ? 'checked' : '').' />&nbsp;
                                <span class="hint_wrp">
                                        <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                        <span class="hint">
                                            '.$this->l('User must enter the 3-4 digit code from the back of the card.').'
                                        </span>
                                </span>
                        </td>
                </tr>
                <tr style="'.($this->getPSV() < 1.5 ? 'display:none;' : '').'">
                        <td align="left" style="font-weight:bold;font-size:12px">
                                '.$this->l('Show Left Sidebar Column (ONLY PS1.5):').'
                        </td>                        
                        <td align="left" >
                                <input type="checkbox" value="1" id="pppro_show_left" name="pppro_show_left" '.(Tools::getValue('pppro_show_left', $this->_pppro_show_left) == 1 ? 'checked' : '').' />&nbsp;
                                <span class="hint_wrp">
                                        <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                        <span class="hint">
                                            '.$this->l('Check if you want to see the left sidebar column in the checkout page.').'
                                        </span>
                                </span>                                    
                        </td>
                </tr>
                <tr>
                        <td align="left" style="font-weight:bold;font-size:12px">
                                '.$this->l('Technical Errors Logging:').'
                        </td>
                        <td align="left" >
                                <input type="checkbox" value="1" id="pppro_do_log" name="pppro_do_log" '.(Tools::getValue('pppro_do_log', $this->_pppro_do_log) == 1 ? 'checked' : '').' />&nbsp;
                                <span class="hint_wrp">
                                        <img class="hint_img" src="'.$this->_path.'img/qm.png" alt="?" />
                                        <span class="hint">
                                            '.$this->l('Check if you want to enabled logging.').'
                                        </span>
                                </span>                                         
                        </td>                        

                </tr>  
                <tr>        
                        <td align="left" style="font-weight:bold;font-size:12px">
                        '.$this->l('Review Log:').'
                        </td>                
                        <td align="left" >
                            '.$this->l('You can see the log which is enabled only on bad or failed API calls.').' '.($this->logExists() ? '(<a href="'.$this->_path.Configuration::get('PPPRO_LOG_FILE').'.txt">'.$this->_path.Configuration::get('PPPRO_LOG_FILE').'.txt</a>)' : $this->l('(Log is empty)') ).' <br />
                        </td>
                </tr>
                <tr>
                        <td colspan="3" align="center">
                                <input type="submit" value="'.$this->l('Update').'" name="submitChanges" class="button" />
                                <input class="button" type="submit"  name="submitClearLog" value="'.$this->l('Clear Log').'" onclick="return confirm(\''.$this->l('Are you sure you want to delete the log').'?\');"  /> 

                        </td>
                </tr>
                </table>
                </fieldset>
                <br>
                <fieldset id="capture_transaction" '.(Tools::getValue('pppro_method', $this->_pppro_method) != 'AUTH_ONLY'?'style="display:none; width:800px;"':'style="width:800px;"').' class="width3"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Capture Transaction').'</legend>
                <table cellspacing="10" width="800">
                <tr>
                        <td align="left" width="175px" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Order ID').':
                        </td>
                        <td align="left" width="150px" style="font-size:12px" >
                                <input type="text" size="12" id="capture_order_id" name="capture_order_id" />
                        </td>
                        <td align="left" style="font-size:12px" >
                                <input type="button" value="'.$this->l('Lookup Order').'" name="searchCaptureOrders" class="button" onclick="search_orders(1)"/>
                                &nbsp;&nbsp;&nbsp;
                                <input type="button" value="'.$this->l('Reset').'" name="resetCaptureOrders" class="button" onclick="clear_orders(1)"/>
                        </td>
                </tr>
                </table>
                <div id="capture_order_details">
                </div>
                </fieldset>';
		$this->_html .= '
                <br>
                <fieldset id="refundTransaction" style="width:800px;" class="width3"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Refund Transaction').'</legend>
                <table cellspacing="10" width="800">
                <tr>
                        <td align="left" width="175px" style="font-weight:bold;font-size:14px" >
                                '.$this->l('Order ID').':
                        </td>
                        <td align="left" width="150px" style="font-size:12px" >
                                <input type="text" size="12" id="refund_order_id" name="refund_order_id" />
                        </td>
                        <td align="left" style="font-size:12px" >
                                <input type="button" value="'.$this->l('Lookup Order').'" name="searchRefundOrders" class="button" onclick="search_orders(2)"/>
                                &nbsp;&nbsp;&nbsp;
                                <input type="button" value="'.$this->l('Reset').'" name="resetRefundOrders" class="button" onclick="clear_orders(2)"/>
                        </td>
                </tr>
                </table>
                <div id="refund_order_details">
                </div>
                </fieldset>
                </form>';
	}


	private function _postProcess()
	{
		if(Tools::isSubmit('submitClearLog'))
		{
			if($this->clearLog())
			{
				$this->_html .= '<div class="conf confirm"> '.($this->getPSV() < 1.5 ? '<img src="../img/admin/ok.gif" alt="'.$this->l('Confirmation').'" />' : '').$this->l('Log cleared').'</div>';
			}
		}
		if (Tools::isSubmit('submitChanges'))
		{
			if (!Configuration::updateValue('PPPRO_SANDBOX', Tools::getValue('pppro_sandbox'))
			|| !Configuration::updateValue('PPPRO_API_USER', Tools::getValue('pppro_username'))
			|| !Configuration::updateValue('PPPRO_API_SIGNATURE', Tools::getValue('pppro_key'))
			|| !Configuration::updateValue('PPPRO_METHOD', (Tools::getValue('pppro_method') == 'AUTH_CAPTURE' ? 'AUTH_CAPTURE' : 'AUTH_ONLY' ))
			|| !Configuration::updateValue('PPPRO_PAYMENT_PAGE', Tools::getValue('pppro_payment_page'))
			|| !Configuration::updateValue('PPPRO_API_PASSWORD', Tools::getValue('pppro_password'))
			|| !Configuration::updateValue('PPPRO_ACC_EMAIL', Tools::getValue('pppro_acc_email'))
			|| !Configuration::updateValue('PPPRO_AUTH_STATUS', Tools::getValue('pppro_auth_status'))
			|| !Configuration::updateValue('PPPRO_REFUND_STATUS', Tools::getValue('pppro_refund_status'))

			|| !Configuration::updateValue('PPPRO_AMEX', Tools::getValue('pppro_amex'))
			|| !Configuration::updateValue('PPPRO_MC', Tools::getValue('pppro_mc'))
			|| !Configuration::updateValue('PPPRO_VISA', Tools::getValue('pppro_visa'))
			|| !Configuration::updateValue('PPPRO_DISCOVER', Tools::getValue('pppro_discover'))

			|| !Configuration::updateValue('PPPRO_GET_ADDRESS', Tools::getValue('pppro_get_address'))
			|| !Configuration::updateValue('PPPRO_UPDATE_CURRENCY', Tools::getValue('pppro_update_currency'))
			|| !Configuration::updateValue('PPPRO_GET_CVN', Tools::getValue('pppro_get_cvn'))
			|| !Configuration::updateValue('PPPRO_DEFAULT_CURRENCY', Tools::getValue('pppro_default_currency'))
                                
			|| !Configuration::updateValue('PPPRO_SHOW_LEFT', intval(Tools::getValue('pppro_show_left')))
			|| !Configuration::updateValue('PPPRO_DO_LOG', intval(Tools::getValue('pppro_do_log')))
			|| !Configuration::updateValue('PPPRO_USE_HOSTED', intval(Tools::getValue('pppro_use_hosted')))
                                
			|| !Configuration::updateValue('PPPRO_FT', intval(Tools::getValue('pppro_ft')))
			|| !Configuration::updateValue('PPPRO_FT_EMAIL', Tools::getValue('pppro_ft_email'))
                                
			|| !Configuration::updateValue('PPPRO_BTN_TXT_COLOR', Tools::getValue('pppro_hosted_button_text_color'))
			|| !Configuration::updateValue('PPPRO_BTN_BG_COLOR', Tools::getValue('pppro_hosted_button_bg_color'))

			|| !Configuration::updateValue('PPPRO_3D_ENABLED', Tools::getValue('pppro_3d_enabled'))
                        || !Configuration::updateValue('PPPRO_3D_SANDBOX', Tools::getValue('pppro_3d_sandbox'))
			|| !Configuration::updateValue('PPPRO_3D_MERCHANTID', Tools::getValue('pppro_3d_merchantid'))
			|| !Configuration::updateValue('PPPRO_3D_PROCESSORID', Tools::getValue('pppro_3d_processorid'))
			|| !Configuration::updateValue('PPPRO_3D_TRANS_PWD', Tools::getValue('pppro_3d_trans_pwd'))
			|| !Configuration::updateValue('PPPRO_NOTCONVERTE_CURR', serialize(Tools::getValue('pppro_notconverte_curr'))))
			{
				$this->_html .= '<div class="alert error">'.$this->l('Cannot update settings').'</div>';
			}
			else
			{
				$this->_html .= '<div class="conf confirm"> '.($this->getPSV() < 1.5 ? '<img src="../img/admin/ok.gif" alt="'.$this->l('Confirmation').'" />' : '').$this->l('Settings updated').'</div>';
			}
                        if(Tools::getValue('pppro_visa') || Tools::getValue('pppro_mc') || Tools::getValue('pppro_amex') || Tools::getValue('pppro_discover'))
                            $this->createCombo(Tools::getValue('pppro_visa'),Tools::getValue('pppro_mc'),Tools::getValue('pppro_amex'),Tools::getValue('pppro_discover'));
		}
		$this->_refreshProperties();
	}

	public function hookRightColumn($params)
	{
		$cookie = $this->context->cookie;
		$smarty = $this->context->smarty;

		$about_link = $this->getModuleLink('about');

		$smarty->assign('iso_code', Tools::strtolower(Language::getIsoById($cookie->id_lang ? (int)($cookie->id_lang) : 1)));
		$smarty->assign('logo', $this->getLogo(false, true));
		$smarty->assign('about_link', $about_link);
		return $this->display(__FILE__, 'views/templates/hook/column.tpl');
	}

	public function hookLeftColumn($params)
	{
		return $this->hookRightColumn($params);
	}
        
	public function hookAdminOrder()
	{
		$smarty = $this->context->smarty;
		$cookie = $this->context->cookie;

		$orderId = Tools::getValue('id_order');

		//$order = new Order($orderId);
		$refundsRecord = Db::getInstance()->ExecuteS("SELECT * FROM  `"._DB_PREFIX_."paypalpro_refunds` WHERE id_order = '" . ((int) $orderId ) . "'");

		if (!empty($refundsRecord)) {
			//$refundsHistory = Db::getInstance()->ExecuteS("SELECT * FROM  `"._DB_PREFIX_."paypalpro_refund_history` WHERE id_order = '" . ((int) $orderId ) . "'");

			$smarty->assign(array(
				'order_id' => $orderId,
				'cookie'   => $cookie,
				'ps_version' => $this->getPSV(),
				'_pppro_secure_key' => $this->_secure_key,
				'module_basedir' => _MODULE_DIR_.'paypalpro/',
				'isCanCapture' => !$refundsRecord[0]['captured'] && $this->_pppro_method == 'AUTH_ONLY'
			));
			return $this->display(__FILE__, 'views/templates/backend/adminOrder.tpl');
		}
		return '';
	}        

	public function getLogo($ppExpress = false, $vertical = false)
	{
		return $this->getPathSSL().'img/vertical_US_large.png';
	}

	public function getCountryCode()
	{
		$cookie = $this->context->cookie;

		$cart = new Cart((int)$cookie->id_cart);
		$address = new Address((int)$cart->id_address_invoice);
		$country = new Country((int)$address->id_country);
		return $country->iso_code;
	}

	/**
	 * Check if the card is within 3D Secure and pass all the necessary
	 * information to Cardinal services
	 *
	 * @global type $_POST
	 * @global type $_GET
	 * @return type
	 */
	public function doCentinelLookup()
	{
		global $_POST, $_GET;

		$cookie = $this->context->cookie;
		$cart   = $this->context->cart;

		include_once(dirname(__FILE__).'/centinel/CentinelErrors.php');
		include_once(dirname(__FILE__).'/centinel/CentinelClient.php');
		include_once(dirname(__FILE__).'/centinel/CentinelUtility.php');

		$centinel_client = new CentinelClient;

		$centinel_client->add("MsgType", "cmpi_lookup");
		$centinel_client->add("Version", $this->_pppro_3d_msg_v);
		$centinel_client->add("ProcessorId", Configuration::get('PPPRO_3D_PROCESSORID'));
		$centinel_client->add("MerchantId", Configuration::get('PPPRO_3D_MERCHANTID'));
		$centinel_client->add("TransactionPwd", Configuration::get('PPPRO_3D_TRANS_PWD'));
		$centinel_client->add("UserAgent", $_SERVER["HTTP_USER_AGENT"]);
		$centinel_client->add("BrowserHeader", $_SERVER["HTTP_ACCEPT"]);
		$centinel_client->add('IPAddress', $_SERVER['REMOTE_ADDR']);

		$centinel_client->add('OrderNumber', $cookie->id_cart);
		//$centinel_client->add('OrderDescription', $_POST['order_description']);
		$centinel_client->add('Amount', number_format($cart->getOrderTotal(true, 3), 2, '', ''));

		$currency_module = Currency::getIdByIsoCode($this->_pppro_default_currency);
		if (($cart->id_currency != $currency_module) && !in_array(Currency::getCurrencyInstance($cart->id_currency)->iso_code, $this->_pppro_notconverte_curr))
		{
			$old_id = $cart->id_currency;
			if (is_object($this->context->cookie))
				$this->context->cookie->id_currency = $currency_module;
			if ($this->getPSV() >= 1.5) {
				$this->context->currency = new Currency($currency_module);
			} else {
				$this->context->smarty->ps_currency = new Currency($currency_module);
			}                        
			$cart->update();
		}
		$tmpCurrency = new Currency($this->context->cookie->id_currency);
              //  $this->logError('curecny', $tmpCurrency, true);
		$centinel_client->add('CurrencyCode', $tmpCurrency->iso_code_num);

		$centinel_client->add('TransactionMode', urlencode("S"));   // meaning e-commerce solution
		$centinel_client->add('TransactionType', 'C'); // meaning credit or debit card
		// Payer Authentication specific fields
		$centinel_client->add('CardNumber', trim($cookie->pppro_cc_number));
		$exp_date_month = $cookie->pppro_cc_Month;
		// Month must be padded with leading zero
		$pad_date_month = urlencode(str_pad($exp_date_month, 2, '0', STR_PAD_LEFT));
		$centinel_client->add('CardExpMonth', $pad_date_month);
		$centinel_client->add('CardExpYear', $cookie->pppro_cc_Year);

		// adding products:
		$i = 1;
		$products = $cart->getProducts();
		foreach($products as $product)
		{
			$centinel_client->add('Item_Name_'.$i, $product['name']);
			$centinel_client->add('Item_Price_'.$i, number_format($product['price'],2,"",""));
			$centinel_client->add('Item_Quantity_'.$i, $product['cart_quantity']);
			$centinel_client->add('Item_Desc_'.$i, substr($product['short_desc'], 0, 256));
			$i++;
		}

		// DEBUG - also have in mind that you cannot test the whole process
		// of transaction from Cardinal to Paypal. You can only test either
		// Cardinal or Paypal.
                if(Configuration::get('PPPRO_3D_SANDBOX') == '1')
                {
                    $centinel_client->sendHttp('https://centineltest.cardinalcommerce.com/maps/txns.asp', $this->_pppro_3d_timeout_cancel, $this->_pppro_3d_timeout_read);
                }
                else
                    $centinel_client->sendHttp('https://paypal.cardinalcommerce.com/maps/txns.asp', $this->_pppro_3d_timeout_cancel, $this->_pppro_3d_timeout_read);

		$response= array('response'=> $centinel_client->response,
                             'enrolled'=> $centinel_client->getValue("Enrolled"),
                             'transactionId'=> $centinel_client->getValue("TransactionId"),
                             'orderId'=> $centinel_client->getValue("OrderId"),
                             'acsurl'=> $centinel_client->getValue("ACSUrl"),
                             'payload'=> $centinel_client->getValue("Payload"),
                             'errorno'=> $centinel_client->getValue("ErrorNo"),
                             'errordesc'=> $centinel_client->getValue("ErrorDesc"));
		return $response;
	}

	/**
	 * Authorise the card with Cardinal
	 *
	 * @global type $_POST
	 * @global type $_GET
	 * @param type $payload
	 * @param type $transactionId
	 * @param type $centinelOrderId
	 * @return boolean
	 */
	public function doCentinelAuth($payload, $transactionId, $centinelOrderId)
	{
		global $_POST, $_GET;

		if(empty($payload) || empty($transactionId))
		{
			return false;
		}

		include_once(dirname(__FILE__).'/centinel/CentinelErrors.php');
		include_once(dirname(__FILE__).'/centinel/CentinelClient.php');
		include_once(dirname(__FILE__).'/centinel/CentinelUtility.php');

		$centinel_client = new CentinelClient;

		$centinel_client->add('MsgType', 'cmpi_authenticate');
		$centinel_client->add("Version", $this->_pppro_3d_msg_v);
		$centinel_client->add("ProcessorId", Configuration::get('PPPRO_3D_PROCESSORID'));
		$centinel_client->add("MerchantId", Configuration::get('PPPRO_3D_MERCHANTID'));
		$centinel_client->add("TransactionPwd", Configuration::get('PPPRO_3D_TRANS_PWD'));
		$centinel_client->add('TransactionType', 'C'); // meaning credit or debit card
		$centinel_client->add('TransactionId', $transactionId);
		$centinel_client->add('OrderId', $centinelOrderId);
		$centinel_client->add('PAResPayload', $payload);

		//$centinel_client->sendHttp('https://centineltest.cardinalcommerce.com/maps/txns.asp', $this->_pppro_3d_timeout_cancel, $this->_pppro_3d_timeout_read);
		$centinel_client->sendHttp('https://paypal.cardinalcommerce.com/maps/txns.asp', $this->_pppro_3d_timeout_cancel, $this->_pppro_3d_timeout_read);


		$response= array('response'=> $centinel_client->response,
                             'paresStatus'=> $centinel_client->getValue("PAResStatus"),
                             'cavv'=> $centinel_client->getValue("Cavv"),
                             'eciflag'=> $centinel_client->getValue("EciFlag"),
                             'signatureVerification'=> $centinel_client->getValue("SignatureVerification"),
                             'errorno'=> $centinel_client->getValue("ErrorNo"),
                             'errordesc'=> $centinel_client->getValue("ErrorDesc"));
		return $response;
	}

	/**
	 * Do payment with paypal, if necessary get Cardinal information
	 * and adjust everything for 3D Secure
	 *
	 * @param type $centinel_info
	 * @return type
	 */
	public function doPayment($centinel_info = array())
	{
		//global $_POST, $_GET;
		$request = '';
		$cart   = $this->context->cart;
		$cookie = $this->context->cookie;
		$ps_version = $this->getPSV();
		$address_delivery = new Address((int)$cart->id_address_delivery);
		$address_billing = new Address((int)$cart->id_address_invoice);

		if ($this->_pppro_update_currency)
                    Currency::refreshCurrencies();
		$currency_module = Currency::getIdByIsoCode($this->_pppro_default_currency);         
		if (($cart->id_currency != $currency_module) && !in_array(Currency::getCurrencyInstance($cart->id_currency)->iso_code, $this->_pppro_notconverte_curr))
		{
			$old_id = $cart->id_currency;
			$cart->id_currency = $currency_module;
			if (is_object($cookie))
			{
				$cookie->id_currency = $currency_module;
			}
			if ($ps_version >= 1.5) {
				$this->context->currency = new Currency($currency_module);
			} else {
				$this->context->smarty->ps_currency = new Currency($currency_module);
			}//			
			$cart->update();
		}

		$card_number = trim($cookie->pppro_cc_number);
		// the card might be either MasterCard or Maestro
		// checking if it is Maestro card
		if($this->checkMaestroCard($card_number))
		{
			$card_type = 'Maestro';
		}
		else
		{
			$first_card_number = substr($card_number, 0, 1);
			switch($first_card_number)
			{
				case '4':
					$card_type = 'Visa';
					break;
				case '3':
					$card_type = 'Amex';
					break;
				case '5':

					$card_type = 'MasterCard';
					break;
				case '6':
					$card_type = 'Discover';
					break;
				default:
					$card_type = '';
			}
		}

		// if Maestro card detected
		// check the currency as it must be GBP
		// and add additional info to the query
		if($card_type == 'Maestro')
		{
			if($cookie->maestro_issue_number)
			{
				// if it is only one number, we add zero to the left
				$maestroIssueNumber = $cookie->maestro_issue_number;
				$request .= "&ISSUENUMBER=".urlencode($maestroIssueNumber);
			}
			else
			{
				$maestroStartDate = $cookie->maestro_Month.$cookie->maestro_Year;
				$request .= "&STARTDATE=".urlencode($maestroStartDate);
			}
			//checking currency and converting if necessary:
			$gbp = Currency::getIdByIsoCode('GBP');
			if ($cart->id_currency != $gbp)
			{
				$old_id = $cart->id_currency;
				$cart->id_currency = $gbp;
                                if (is_object($this->context->cookie))
                                        $this->context->cookie->id_currency = $currency_module;                                
                                if ($this->getPSV() >= 1.5) {
                                        $this->context->currency = new Currency($gbp);
                                } else {
                                        $this->context->smarty->ps_currency = new Currency($gbp);
                                }
				$cart->update();
			}
		}

		$amount = number_format($cart->getOrderTotal(true, 3), 2, '.', '');
		$products = $cart->getProducts();
		$country = ($cookie->pppro_id_country ? new Country($cookie->pppro_id_country,intval(Configuration::get('PS_LANG_DEFAULT'))) : new Country($address_billing->id_country,intval(Configuration::get('PS_LANG_DEFAULT'))) );

		$state = isset($cookie->pppro_id_state)?new State($cookie->pppro_id_state):"";
		$del_state = new State($address_billing->id_state);
		$address_billing->state = $del_state->iso_code;
		$i = 1;
		$id_lang = 0;
		$languages = Language::getLanguages();
		foreach ($languages AS $language)
			if ($language['iso_code'] == 'en')
				$id_lang = $language['id_lang'];
		if ($id_lang == $cart->id_lang)
			$id_lang = 0;
		// Only send product list if there are no discounts.
		if (($ps_version >= 1.5 && sizeof($cart->getCartRules()) == 0) || ($ps_version < 1.5 && sizeof($cart->getDiscounts()) == 0))
		{
			$products = $cart->getProducts();
			$amt = 0;
			for ($i = 0; $i < sizeof($products); $i++)
			{
				$request .= '&L_NAME'.$i.'='.substr(urlencode($products[$i]['name'].(isset($products[$i]['attributes'])?' - '.$products[$i]['attributes']:'').(isset($products[$i]['instructions'])?' - '.$products[$i]['instructions']:'') ), 0, 127);
				$request .= '&L_AMT'.$i.'='.urlencode(number_format($products[$i]['price'],2,".",""));
				$request .= '&L_QTY'.$i.'='.urlencode($products[$i]['cart_quantity']);
				$amt += number_format($products[$i]['price'],2,".","")*$products[$i]['cart_quantity'];
			}
                        
                        $shipping = number_format($cart->getOrderTotal(true, 5), 2, '.', ''); // gets only shipping from getOrderTotal

			$request .= '&ITEMAMT='.urlencode($amt);
			$request .= '&SHIPPINGAMT='.urlencode($shipping);
			$request .= '&TAXAMT='.urlencode((float)max(number_format($amount - $amt - $shipping,2,".",""), 0));
		}
		else
		{
			$products = $cart->getProducts();
			$description = 0;
			for ($i = 0; $i < sizeof($products); $i++)
			$description .= ($description == ''?'':', ').$products[$i]['cart_quantity']." x ".$products[$i]['name'].(isset($products[$i]['attributes'])?' - '.$products[$i]['attributes']:'').(isset($products[$i]['instructions'])?' - '.$products[$i]['instructions']:'') ;
			$request .= '&ORDERDESCRIPTION='.urlencode(substr($description, 0, 120));
		}
		// --------------------------------------------------------------------------------
		// Set request-specific fields.
		if(Configuration::get('PPPRO_METHOD') == 'AUTH_ONLY')
		{
			$paymentType = urlencode('Authorization');
		}
		elseif(Configuration::get('PPPRO_METHOD')  == 'AUTH_CAPTURE')
		{
			$paymentType = urlencode('Sale');
		}
		$deliveryFirstName = urlencode($address_delivery->firstname);
		$deliveryLastName = urlencode($address_delivery->lastname);

		$firstName = urlencode(($cookie->pppro_cc_fname ? $cookie->pppro_cc_fname : $address_billing->firstname));
		$lastName = urlencode(($cookie->pppro_cc_lname ? $cookie->pppro_cc_lname : $address_billing->lastname));

		$credit_card_type = urlencode($card_type);

		$credit_card_number = urlencode($card_number);
		$exp_date_month = $cookie->pppro_cc_Month;
		// Month must be padded with leading zero
		$pad_date_month = urlencode(str_pad($exp_date_month, 2, '0', STR_PAD_LEFT));
		 
		$exp_date_year = urlencode($cookie->pppro_cc_Year);
		$cvv2Number = urlencode($cookie->pppro_cc_cvm);
		$address1 = urlencode(($cookie->pppro_cc_address?$cookie->pppro_cc_address:$address_billing->address1));
		$deliveryAddress1 = urlencode($address_delivery->address1);
		if(isset($address_delivery->address2) && ($address_delivery->address2 != ''))
		{
			$deliveryAddress2 = urlencode($address_delivery->address2);
		}
		else
		{
			$deliveryAddress2 = '';
		}
		if (isset($address_billing->address2) && ($address_billing->address2 != '') && (!$cookie->pppro_cc_address))
		{
			$address2 = urlencode($address_billing->address2);
		}
		else
		{
			$address2 = '';
		}
		$city = urlencode($cookie->pppro_cc_city?$cookie->pppro_cc_city:$address_billing->city);
		$deliveryCity = urlencode($address_delivery->city);

		$state = "";
		if(isset($_POST['pppro_id_state']))
		{
			$state = new State($_POST['pppro_id_state']);
			$state = $state->iso_code;
		}
		else if(isset($address_billing->id_state) && $address_billing->id_state)
		{
			$state = new State($address_billing->id_state);
			$state = $state->iso_code;
		}

		$deliveryState = "";
		if(isset($address_delivery->id_state) && $address_delivery->id_state)
		{
			$deliveryState = new State($address_delivery->id_state);
			$deliveryState = $deliveryState->iso_code;
		}
		$deliveryCountry =  new Country($address_delivery->id_country,intval(Configuration::get('PS_LANG_DEFAULT')));
		$deliveryCountry = urlencode($deliveryCountry->iso_code);

		$zip = urlencode($cookie->pppro_cc_zip?$cookie->pppro_cc_zip:$address_delivery->postcode);
		$deliveryZip = urlencode($address_delivery->postcode);
		$country = urlencode($country->iso_code);				// US or other valid country code
		$amount = urlencode($amount);
		$currency = new Currency($cart->id_currency);
		$currencyID = $currency->iso_code;
		$customer_email = urlencode($cookie->email);
		// --------------------------------------------------------------------------------
		// Add request-specific fields to the request string.
		$nvpStr =	"&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$credit_card_type&ACCT=$credit_card_number".
                                "&EXPDATE=$pad_date_month$exp_date_year&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName".
                                "&STREET=$address1 $address2&CITY=$city&STATE=$state&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID".
                                "&SHIPTONAME=$deliveryFirstName $deliveryLastName&SHIPTOSTREET=$deliveryAddress1 $deliveryAddress2&SHIPTOCITY=$deliveryCity&SHIPTOSTATE=$deliveryState".
                                "&SHIPTOZIP=$deliveryZip&SHIPTOCOUNTRY=$deliveryCountry&EMAIL=$customer_email".
                                "$request";
		if(Configuration::get('PPPRO_3D_ENABLED'))
		{
			// 59.0 version of this requires a little bit different EXPMONTH and
			// EXP YEAR formatting
			$nvpStr .= "&EXPMONTH=$pad_date_month&EXPYEAR=$exp_date_year";
		}
		// --------------------------------------------------------------------------------
		return $this->doQuery('DoDirectPayment', $nvpStr, $centinel_info);
	}

	public function doRefund($id_order, $is_void, $trans_id, $amount)
	{
		$trans_id = urlencode($trans_id);
		$amount = urlencode($amount);

		if($is_void)
		{
			$nvpStr="&AUTHORIZATIONID=$trans_id";
			return $this->doQuery('DOVoid', $nvpStr);
		}
		$order = new Order($id_order);
		$order_amount = number_format($order->total_paid, 2, '.', '');
		$currency = new Currency($order->id_currency);
		$currencyID = $currency->iso_code;
		$nvpStr_amount = '';
		if($order_amount == $amount)
		{
			$refundType = urlencode('Full');
		}
		else
		{
			$refundType = urlencode('Partial');
			$nvpStr_amount = "&AMT=$amount";
		}
		$nvpStr = "&TRANSACTIONID=$trans_id&REFUNDTYPE=$refundType&CURRENCYCODE=$currencyID".$nvpStr_amount;
		return $this->doQuery('RefundTransaction', $nvpStr);
	}
        
        public function getTransactionDetails($trans_id)
        {
            return $this->doQuery('GetTransactionDetails', '&TRANSACTIONID='.urlencode($trans_id));
        }

	public function doCapture($id_order, $trans_id, $amount)
	{
		// Set request-specific fields.
		$authorizationID = urlencode($trans_id);
		$amount = urlencode($amount);

		$order = new Order($id_order);
		$currency = new Currency($order->id_currency);
		$currencyID = $currency->iso_code;


		$complete_code_type = urlencode('Complete'); // or 'NotComplete'
		$invoiceID = urlencode($this->l('Order').' #'.$id_order);
		// Add request-specific fields to the request string.
		$nvpStr="&AUTHORIZATIONID=$authorizationID&AMT=$amount&COMPLETETYPE=$complete_code_type&CURRENCYCODE=$currencyID&INVNUM=$invoiceID";

		return $this->doQuery('DoCapture', $nvpStr);
	}

	private function doQuery($method, $request_info = '', $centinel_info = array())
	{
		// Set up your API credentials, PayPal end point, and API version.
		$API_UserName = urlencode(Configuration::get('PPPRO_API_USER'));
		$API_Password = urlencode(Configuration::get('PPPRO_API_PASSWORD'));
		$API_Signature = urlencode(Configuration::get('PPPRO_API_SIGNATURE'));
		$API_Endpoint = "https://api-3t.paypal.com/nvp";
		if(Configuration::get('PPPRO_SANDBOX') == '1')
		{
			$API_Endpoint = "https://api-3t.sandbox.paypal.com/nvp";
		}
		$version = urlencode('85.0');
		if(Configuration::get('PPPRO_3D_ENABLED') && ($method == 'DoDirectPayment'))
		{
			// Needed for 3D Secure - only works with this version
			$version = urlencode('59.0');
		}

		// Set the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);
		// Turn off the server and peer verification (TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // uncomment this line if you get no gateway response.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);

		// Set the API operation, version, and API signature in the request.
		$nvpreq = "METHOD=$method&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$request_info";
		if(Configuration::get('PPPRO_3D_ENABLED') && ($method == 'DoDirectPayment'))
		{
			// Adding some information from Cardinal services
			$nvpreq .= '&ECI3DS='.urlencode($centinel_info['eciflag']).'
                                &CAVV='.urlencode($centinel_info['cavv']).'
                                &XID='.urlencode($centinel_info['xid']).'
                                &AUTHSTATUS3DS='.urlencode($centinel_info['paresStatus']).'
                                &MPIVENDOR3DS='.urlencode($centinel_info['enrolled']);
		}
		// Set the request as a POST FIELD for curl.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);
		// Get response from the server.
		$httpResponse = curl_exec($ch);
		curl_close($ch); // close curl object

		if(!$httpResponse)
		{
			// DEBUG
			// exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
			exit($this->l("Something went wrong - contact shop owner"));
		}

		// Extract the response details.
		$httpResponseAr = explode("&", $httpResponse);

		$httpParsedResponseAr = array();
		foreach ($httpResponseAr as $i => $value)
		{
			$tmpAr = explode("=", $value);
			if(sizeof($tmpAr) > 1)
			{
				$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
			}
		}

		if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr))
		{
			// DEBUG
			//exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
			exit($this->l("Invalid HTTP Response for POST request."));
		}
		return $httpParsedResponseAr;
	}
        
        /**
         * URL decodes array values
         * 
         * @param array $array
         * @return array
         */
        private function decodeArray($data)
        {
            $result = array();
            if(count($data) > 0)
            {
                foreach($data as $key => $value)
                {
                    $result[$key] = urldecode($value);
                }
            }
            return $result;
        }
        
        /**
         * Checks PayPal information about the order with our order information
         * and returns true if everything is OK, false otherwise.
         * 
         * @param array $transaction_details
         */
        public function confirmHostedPayment($transaction_details, $cart)        
        {
            $transaction_details = $this->decodeArray($transaction_details);
            $result = false;
            $cart_total = number_format($cart->getOrderTotal(true, 3), 2, '.', ''); // total amount including shipping and taxes
            //$this->logError('cart_total', $cart_total);
            //$this->logError('cart_total AMT', $transaction_details['AMT']);
            if(isset($transaction_details['AMT']) && ($cart_total == $transaction_details['AMT']))
            {
                $result = true;
            }
            
            return $result;            
        }

	/**
	 * Deletes secure information from cookie which was put here
	 * when submiting the transaction
	 *
	 * @param type $all to clear all cookie info or only the secure ones
	 */
	public function deleteSecureCookieInfo($all = false)
	{
		$cookie = $this->context->cookie;
		if($all)
		{
			$fieldsToClean = $this->fieldsToCopy;
		}
		else
		{
			$fieldsToClean = array('maestro_issue_number',  'pppro_cc_cvm');
		}
		foreach($fieldsToClean as $field)
		{
			$cookie->{$field} = "";
		}
	}

	/**
	 * Check if card is Maestro card by comparing it's first 4 numbers
	 *
	 * @param type $card_number
	 * @return boolean
	 */
	public function checkMaestroCard($card_number)
	{
		$maestro_digits = array('5018','5020','5038','6304','6759','6761','6762','6763');
		$first_four_digits = substr($card_number, 0, 4);
		if(in_array($first_four_digits, $maestro_digits))
		{
			return true;
		}
		return false;
	}

	/**
	 * Create secure key specific for this module for ajax calls etc.
	 *
	 * @param type $minlength
	 * @param type $maxlength
	 * @param type $useupper
	 * @param type $usespecial
	 * @param type $usenumbers
	 * @return string
	 */
	function str_makerand($minlength, $maxlength, $useupper, $usespecial, $usenumbers)
	{
		$charset = "abcdefghijklmnopqrstuvwxyz";
		$key = '';
		if ($useupper) $charset .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		if ($usenumbers) $charset .= "0123456789";
		if ($usespecial) $charset .= "~@#$%^*()_+-={}|]["; // Note: using all special characters this reads: "~!@#$%^&*()_+`-={}|\\]?[\":;'><,./";
		if ($minlength > $maxlength) $length = mt_rand ($maxlength, $minlength);
		else $length = mt_rand ($minlength, $maxlength);
		for ($i=0; $i<$length; $i++) $key .= $charset[(mt_rand(0,(strlen($charset)-1)))];
		return $key;
	}

	public function hookUpdateOrderStatus($params)
	{
		return ;
	}

	public function hookCancelProduct($params)
	{
		return;
	}

	public function hookOrderReturn($params)
	{
		global $_REQUEST;
		return;
	}
        
	public function hookPayment($params)
	{
		$smarty = $this->context->smarty;
		if (!$this->active)
                    return ;
                
                if (($this->_pppro_3d_enabled != '1') && ($this->_pppro_payment_page == '1')) {
                        require_once('controllers/front/validation.php');
                        // hack for presta 1.5 
                        $_POST['module'] = 'paypalpro';

                        PaypalProValidationModuleFrontController::prepareVarsView($this->getContext(), $this, $pppro_cc_err = '', time());

                        return $this->display(__FILE__, 'views/templates/front/validation.tpl');
                }                
                
		$pppro_cards = "";
		if ($this->_pppro_visa)
		$pppro_cards .= $this->l("Visa").", ";
		if ($this->_pppro_mc)
		$pppro_cards .= $this->l("Mastercard").", ";
		if ($this->_pppro_amex)
		$pppro_cards .= $this->l("Amex").", ";
		if ($this->_pppro_discover)
		$pppro_cards .= $this->l("Discover").", ";
		$pppro_cards = substr($pppro_cards,0,-2);
		$this_path_ssl = (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'modules/'.$this->name.'/';
		$this_validation_link = $this->getModuleLink('validation');
		$smarty->assign(array(
                    'pppro_payment_page' => $this->_pppro_payment_page,
                    'pppro_psv' => $this->getPSV(),
                    'this_path' => $this->_path,
                    'active' => (($this->_pppro_password != '') || ($this->_pppro_username != '') || ($this->_pppro_acc_email != ''))?true:false,
                    'pppro_visa' => $this->_pppro_visa,
                    'pppro_mc' => $this->_pppro_mc,
                    'pppro_amex' => $this->_pppro_amex,
                    'pppro_discover' => $this->_pppro_discover,
                    'pppro_cards' => $pppro_cards,                    
                    'this_path' => __PS_BASE_URI__.'modules/'.$this->name.'/',
                    'this_validation_link' => $this_validation_link,
                    'this_path_ssl' => $this_path_ssl));
		return $this->display(__FILE__, 'views/templates/hook/payment.tpl');
	}

	public function hookPaymentReturn($params)
	{
		if (!$this->active)
		return ;
		return $this->display(__FILE__, 'views/templates/hook/confirmation.tpl');
	}

	/**
	 * Creates card images combination in Payment page (when choosing the method)
	 * with enabled cards
	 *
	 * @param type $pppro_visa
	 * @param type $pppro_mc
	 * @param type $pppro_amex
	 * @param type $pppro_discover
	 */
	private function createCombo($pppro_visa, $pppro_mc, $pppro_amex, $pppro_discover)
	{
		$imgBuf = array();
		if ($pppro_visa)
		array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/visa.gif'));
		if ($pppro_mc)
		array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/mc.gif'));
		if ($pppro_amex)
		array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/amex.gif'));
		if ($pppro_discover)
		array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/discover.gif'));
		$iOut = imagecreatetruecolor ("86", ceil(sizeof($imgBuf)/2)*26);
		$bgColor = imagecolorallocate($iOut, 255,255,255);
		imagefill($iOut,0,0,$bgColor);
		foreach ($imgBuf AS $i => $img)
		{
			imagecopy ($iOut,$img,($i%2==0?0:49)-1,floor($i/2)*26-1,0,0,imagesx($img),imagesy($img));
			imagedestroy ($img);
		}
		imagejpeg($iOut, dirname(__FILE__)."/img/combo.jpg", 100);
	}

	public function getModuleLink($page)
	{
		$this_path_ssl = $this->getPathSSL();
		if ($this->getPSV() >= 1.5)
		{
			$this_validation_link = Context::getContext()->link->getModuleLink($this->name, $page);
		}
		else
		{
			$this_validation_link = $this_path_ssl.$page.'.php';
		}
		return $this_validation_link;
	}

	public function getPathSSL()
	{
		return (Configuration::get('PS_SSL_ENABLED') ? 'https://' : 'http://').htmlspecialchars($_SERVER['HTTP_HOST'], ENT_COMPAT, 'UTF-8').__PS_BASE_URI__.'modules/'.$this->name.'/';
	}

	public function logError($subject, $data, $usePrintR = false)
	{
		$file = dirname(__FILE__)."/".Configuration::get('PPPRO_LOG_FILE').".txt";
		if(!($fh = fopen($file, 'a')))
		{
			$fh = fopen($file, 'w');
		}
		if($usePrintR)
		{
			fwrite($fh, "$subject: ".print_r($data, true)."\n\r");
		}
		else
		{
			fwrite($fh, "$subject: ".$data."\n\r");
		}
		fclose($fh);
	}

	private function clearLog()
	{
		$file = dirname(__FILE__)."/".Configuration::get('PPPRO_LOG_FILE').".txt";
		if(file_exists($file))
		{
			unlink($file);
			return true;
		}
		return false;
	}

	private function logExists()
	{
		$file = dirname(__FILE__)."/".Configuration::get('PPPRO_LOG_FILE').".txt";
		if(file_exists($file))
		{
			return true;
		}
		return false;
	}
}
?>
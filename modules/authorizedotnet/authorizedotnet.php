<?php

require_once(_PS_MODULE_DIR_ . 'authorizedotnet/PrestoChangeoClasses/init.php');

class AuthorizeDotNet extends PrestoChangeoPaymentModule
{
 	public $_adn_id = '';
 	public $_adn_secure_key = '';
 	public $_adn_key = '';
 	public $_adn_md_hash = '';
 	public $_adn_type = '';
 	public $_adn_api = '';
 	public $_secure_key = '';
	public $_adn_auth_status = '';
	public $_adn_capture_status = '';
	public $_adn_refund_status = '';
	private $_adn_payment_method = '';
 	private $_adn_get_address = '';
 	private $_adn_get_cvm = '';
 	private $_adn_update_currency ='';
 	public $_adn_visa = '';
 	public $_adn_mc = '';
 	public $_adn_amex = '';
 	public $_adn_discover = '';
 	public $_adn_jcb = '';
 	public $_adn_diners = '';
 	public $_adn_enroute = '';
	public $_adn_demo_mode = '';
	public $_adn_payment_page = '';
	public $_adn_currency = '';
 	protected $_full_version = 15100;

	public function __construct()
	{
		$this->name = 'authorizedotnet';
       	$this->tab = $this->getPSV() < 1.4 ? 'Payment':'payments_gateways';
		$this->version = '1.5.2';
		if ($this->getPSV() >= 1.4)
			$this->author = 'Presto-Changeo';
		
		parent::__construct();
		$this->_refreshProperties();

		$this->currencies = true;
		$this->currencies_mode = 'radio';

		$this->displayName = $this->l('Authorize.net (AIM / DPM)');
		$this->description = $this->l('Receive and Refund payments using Authorize.net (AIM or DPM)');

		if ($this->_adn_id == "" || $this->_adn_key == "")
			$this->warning = $this->l('You must enter your Authorize.net API infomation, for details on how to get them click "Configure"');
		if ($this->upgradeCheck('ADN'))
			$this->warning = $this->l('We have released a new version of the module,') .' '.$this->l('request an upgrade at ').' https://www.presto-changeo.com/en/contact_us';
	}

   	public function install()
   	{
		$secure_key = md5(mt_rand().time());

		if (!parent::install()
			OR !$this->registerHook('payment')
			OR !$this->registerHook('paymentReturn')
			OR !$this->registerHook('adminOrder')
			)
			return false;


		if (!Configuration::updateValue('ADN_TYPE', "AUTH_CAPTURE")
			|| !Configuration::updateValue('ADN_VISA', "1")
			|| !Configuration::updateValue('ADN_API', "AIM")
			|| !Configuration::updateValue('ADN_AUTH_STATUS', "2")
			|| !Configuration::updateValue('ADN_PAYMENT_PAGE', "1")
			|| !Configuration::updateValue('ADN_GET_ADDRESS', "1")
			|| !Configuration::updateValue('ADN_GET_CVM', "1")
			|| !Configuration::updateValue('ADN_SECURE_KEY', $secure_key)
			|| !Configuration::updateValue('ADN_DEMO_MODE', '1')
			|| !Configuration::updateValue('ADN_MC', "1")
			|| !Configuration::updateValue('ADN_ADMINHOOK_ADDED', '1'))
			return false;

		$query = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'authorizedotnet_refunds` (
			  `id_order` int(11) NOT NULL,
			  `id_trans` varchar(30) NOT NULL,
			  `card` varchar(4) NOT NULL,
			  `auth_code` varchar(10) NOT NULL,
			  `captured` TINYINT( 1 ) NOT NULL DEFAULT \'0\',
			  PRIMARY KEY  (`id_order`)
			) ENGINE=MyISAM;';
		Db::getInstance()->execute($query);

		$query = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'authorizedotnet_refund_history` (
				`id_refund` int(11) unsigned NOT NULL auto_increment,
				`id_order` int(11) NOT NULL,
				`amount` varchar(20) NOT NULL,
				`date` datetime NOT NULL,
				`details` varchar(255) NOT NULL,
				PRIMARY KEY  (`id_refund`)
				) ENGINE=MyISAM;';
		Db::getInstance()->execute($query);

		$this->applyUpdatesAlertTable();

		return true;
	}

	public function uninstall()
	{
		return parent::uninstall();
	}

	protected function isColumnExistInTable($column, $table)
	{
		$sqlExistsColumn = "SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA=DATABASE()
				AND COLUMN_NAME='" . $column . "' AND TABLE_NAME='" . _DB_PREFIX_ . $table . "'; ";
		$exists = Db::getInstance()->ExecuteS($sqlExistsColumn);
		return !empty($exists);
	}

	
	protected function applyUpdates()
	{
		$query = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'authorizedotnet_refunds` (
			  `id_order` int(11) NOT NULL,
			  `id_trans` varchar(30) NOT NULL,
			  `card` varchar(4) NOT NULL,
			  `auth_code` varchar(10) NOT NULL,
			  `captured` TINYINT( 1 ) NOT NULL DEFAULT \'0\',
			  PRIMARY KEY  (`id_order`)
			) ENGINE=MyISAM;';
		Db::getInstance()->execute($query);

		$query = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'authorizedotnet_refund_history` (
				`id_refund` int(11) unsigned NOT NULL auto_increment,
				`id_order` int(11) NOT NULL,
				`amount` varchar(20) NOT NULL,
				`date` datetime NOT NULL,
				`details` varchar(255) NOT NULL,
				PRIMARY KEY  (`id_refund`)
				) ENGINE=MyISAM;';
		Db::getInstance()->execute($query);

		$this->applyUpdatesAlertTable();

		/**
		 * update hook module without reinstall module
		 */
		if (Configuration::get('ADN_ADMINHOOK_ADDED') != 1) {
			if ($this->getPSV() < 1.5) {
				$hookId = Hook::get('adminOrder');
				$isExistModule = Hook::getModuleFromHook($hookId, $this->id); 
				if (empty($isExistModule)) {
					if ($this->registerHook('adminOrder'))
						Configuration::updateValue('ADN_ADMINHOOK_ADDED', '1');
				}
			} else {
				$hookId = Hook::getIdByName('adminOrder');
				$isExistModule = Hook::getModulesFromHook($hookId, $this->id);
				if (empty($isExistModule)) {
					if ($this->registerHook('adminOrder')) 
						Configuration::updateValue('ADN_ADMINHOOK_ADDED', '1');
				}
			}
		}

	}
	
	protected function  applyUpdatesAlertTable()
	{
		// from module verstion 1.4.3 ADN_ALTER_TABLE = 2  
		if (Configuration::get('ADN_ALTER_TABLE') != 2)
		{
			if(!$this->isColumnExistInTable('details', 'authorizedotnet_refund_history')) { 
				Db::getInstance()->Execute("ALTER TABLE `"._DB_PREFIX_."authorizedotnet_refund_history` ADD `details` varchar(255)  AFTER `amount`");
			}
			
			if(!$this->isColumnExistInTable('auth_code', 'authorizedotnet_refunds')) { 
				Db::getInstance()->Execute("ALTER TABLE `"._DB_PREFIX_."authorizedotnet_refunds` ADD `auth_code` varchar(10) NOT NULL AFTER `card`");
			}

			if(!$this->isColumnExistInTable('captured', 'authorizedotnet_refunds')) { 
				Db::getInstance()->Execute("ALTER TABLE `"._DB_PREFIX_."authorizedotnet_refunds` ADD `captured` TINYINT(1) NOT NULL DEFAULT '0' AFTER `auth_code`");
			}

			Configuration::updateValue('ADN_ALTER_TABLE','2');
		}
	}
	
	
	private function _refreshProperties()
	{

		$this->_adn_id =  Configuration::get('ADN_ID');
		$this->_adn_key =  Configuration::get('ADN_KEY');
		$this->_adn_api =  Configuration::get('ADN_API');
		$this->_adn_md_hash =  Configuration::get('ADN_MD_HASH');
		$this->_adn_type =  Configuration::get('ADN_TYPE');
		$this->_adn_secure_key =  Configuration::get('ADN_SECURE_KEY');
		$this->_adn_update_currency =  intval(Configuration::get('ADN_UPDATE_CURRENCY'));
		
		$this->_adn_payment_page =  intval(Configuration::get('ADN_PAYMENT_PAGE'));

		$this->_adn_get_address =  intval(Configuration::get('ADN_GET_ADDRESS'));
		$this->_adn_get_cvm =  intval(Configuration::get('ADN_GET_CVM'));
		$this->_adn_visa =  intval(Configuration::get('ADN_VISA'));
		$this->_adn_mc =  intval(Configuration::get('ADN_MC'));
		$this->_adn_amex =  intval(Configuration::get('ADN_AMEX'));
		$this->_adn_discover =  intval(Configuration::get('ADN_DISCOVER'));
		$this->_adn_jcb =  intval(Configuration::get('ADN_JCB'));
		$this->_adn_diners =  intval(Configuration::get('ADN_DINERS'));
		$this->_adn_enroute =  intval(Configuration::get('ADN_ENROUTE'));
		$this->_adn_capture_status =  intval(Configuration::get('ADN_CAPTURE_STATUS'));
		$this->_adn_auth_status =  intval(Configuration::get('ADN_AUTH_STATUS'));
		$this->_adn_refund_status =  intval(Configuration::get('ADN_REFUND_STATUS'));
		$this->_adn_demo_mode =  intval(Configuration::get('ADN_DEMO_MODE'));
		$this->_adn_currency = Configuration::get('ADN_CURRENCY');

		$this->_last_updated = Configuration::get('PRESTO_CHANGEO_UC');

	}
	
	public function getContent()
	{
		$this->_html = (($this->getPSV() >= 1.5 ) ? '<div style="width:850px;margin:auto;">' : '') 
		. '<img src="http://updates.presto-changeo.com/logo.jpg" border="0" /> <h2>'.$this->displayName.'</h2>';;	
		$this->_postProcess();
		$this->_displayForm();
		$this->_html .= ($this->getPSV() >= 1.5 ) ? '</div>' : '';	
		return $this->_html;
	}

	public function hookAdminOrder()
	{
		$smarty = $this->context->smarty;
		$cookie = $this->context->cookie;

		$orderId = Tools::getValue('id_order');

		$order = new Order($orderId);
		$refundsRecord = Db::getInstance()->ExecuteS("SELECT * FROM  `"._DB_PREFIX_."authorizedotnet_refunds` WHERE id_order = '" . ((int) $orderId ) . "'");

		if (!empty($refundsRecord)) {
			$refundsHistory = Db::getInstance()->ExecuteS("SELECT * FROM  `"._DB_PREFIX_."authorizedotnet_refund_history` WHERE id_order = '" . ((int) $orderId ) . "'");

			$smarty->assign(array(
				'order_id' => $orderId,
				'cookie'   => $cookie,
				'ps_version' => $this->getPSV(),
				'_adn_secure_key' => $this->_adn_secure_key,
				'module_basedir' => _MODULE_DIR_.'authorizedotnet/',
				'isCanCapture' => !$refundsRecord[0]['captured'] && $this->_adn_type == 'AUTH_ONLY'
			));
			return $this->display(__FILE__, 'views/templates/backend/adminOrder.tpl');
		}
		return '';
	}

	private function _displayForm()
    {
		$this->applyUpdates();
		$cookie = $this->context->cookie;
		$states = OrderState::getOrderStates(intval($cookie->id_lang));
		if ($url = $this->upgradeCheck('ADN'))
			$this->_html .= '
			<fieldset class="width3" style="background-color:#FFFAC6;width:800px;"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('New Version Available').'</legend>
			'.$this->l('We have released a new version of the module. For a list of new features, improvements and bug fixes, view the ').'<a href="'.$url.'" target="_index"><b><u>'.$this->l('Change Log').'</b></u></a> '.$this->l('on our site.').'
			<br />
			'.$this->l('For real-time alerts about module updates, be sure to join us on our') .' <a href="http://www.facebook.com/pages/Presto-Changeo/333091712684" target="_index"><u><b>Facebook</b></u></a> / <a href="http://twitter.com/prestochangeo1" target="_index"><u><b>Twitter</b></u></a> '.$this->l('pages').'.
			<br />
			<br />
			'.$this->l('Please').' <a href="https://www.presto-changeo.com/en/contact_us" target="_index"><b><u>'.$this->l('contact us').'</u></b></a> '.$this->l('to request an upgrade to the latest version').'.
			</fieldset><br />';
		$this->_html .= '
		<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
			<fieldset class="width3" style="width:800px;"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Authorize.net Settings').'</legend>
			<script type="text/javascript">
			var baseDir = \''._MODULE_DIR_.'authorizedotnet/'.'\';
			function type_change()
			{
				if ($("#adn_type").val() == "AUTH_CAPTURE")
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
						url: baseDir + "authorizedotnet-ajax.php",
						async: true,
						cache: false,
						data: "orderId=" + orderId + "&id_lang='.$cookie->id_lang.'&id_employee='.$cookie->id_employee.'&type="+ type + "&secure_key='.$this->_adn_secure_key.'",
						success: function(html){ $("#capture_order_details").html(html); },
						error: function() {alert("ERROR:");}
					});
				}
				if (type == 2)
				{
					$.ajax({
						type: "POST",
						url: baseDir + "authorizedotnet-ajax.php",
						async: true,
						cache: false,
						data: "orderId=" + orderId + "&id_lang='.$cookie->id_lang.'&id_employee='.$cookie->id_employee.'&type="+ type + "&secure_key='.$this->_adn_secure_key.'",
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
      </script>
		<table cellspacing="10" width="800">
		<tr height="30">
			<td align="left" colspan="2">
				<li style="margin-left:10px">'.$this->l('To get your API Login ID and Transaction key, visit https://account.authorize.net/, login to your account, click on the "Account" tab at the top, and then on the "API Login ID and Transaction Key" link (under Security Settings)').'.</li>
			</td>
		</tr>
		<tr height="30">
			<td align="left" colspan="2" style="color:red">
				<li style="margin-left:10px">'.$this->l('Unsettled transactions can only be completely voided, you cannot void/refund certain products of the order').'.</li>
			</td>
		</tr>
		<tr height="30">
			<td align="left" colspan="2" style="color:red">
				<b><li style="margin-left:10px">'.$this->l('Refunds are now handled from this page, you can do a full / partial refund for any amount').'.</li></b>
			</td>
		</tr>
		';

		if (!empty($this->warning)) {
			$this->_html .= '
			<tr height="30">
				<td align="left" colspan="2" style="color:red">
					<b><li style="margin-left:10px">'.$this->warning.'</li></b>
				</td>
			</tr>';
		}

		$this->_html .= '
		<tr height="30">
			<td align="left" style="font-weight:bold;font-size:14px">
					'.$this->l('API Login ID').':
				</td>
				<td align="left">
					<input type="text" id="adn_id" name="adn_id" value="'.Tools::getValue('adn_id', $this->_adn_id).'" />
				</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold;font-size:14px" nowrap>
					'.$this->l('Transaction Key').':
				</td>
				<td align="left">
					<input type="text" id="adn_key" name="adn_key" value="'.Tools::getValue('adn_key', $this->_adn_key).'" />&nbsp;
				</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold;font-size:14px" nowrap>
					'.$this->l('Mode:').'
				</td>
				<td align="left">
					<input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="adn_demo_mode" value="0" style="vertical-align: middle;" '.(Tools::getValue('adn_demo_mode', Configuration::get('ADN_DEMO_MODE')) == 0 ? 'checked="checked"' : '').' />
					<span style="color: #080;">'.$this->l('Production (Live Mode)').'</span>&nbsp;&nbsp;&nbsp;
					<input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="adn_demo_mode" value="1" style="vertical-align: middle;" '.(Tools::getValue('adn_demo_mode', Configuration::get('ADN_DEMO_MODE')) == 1 ? 'checked="checked"' : '').' />
					<span style="color: #900;">'.$this->l('Production (Test Mode)').'</span>&nbsp;&nbsp;&nbsp;
					<input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="adn_demo_mode" value="2" style="vertical-align: middle;" '.(Tools::getValue('adn_demo_mode', Configuration::get('ADN_DEMO_MODE')) == 2 ? 'checked="checked"' : '').' />
					<span style="color: #900;">'.$this->l('Test Account (Test Mode)').'</span>
				</td>
			</tr>
			
			<tr>
				<td align="left" valign="top" style="font-weight:bold;font-size:14px" nowrap>
					'.$this->l('API Method').':
				</td>
				<td align="left">
					<input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="adn_api" id="adn_api" value="dpn" '.(Tools::getValue('adn_api', $this->_adn_api) != 'aim'?'checked':'').' />&nbsp; DPN '.$this->l('(New)').'
					&nbsp;&nbsp;&nbsp;
					<input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="adn_api" id="adn_api" value="aim" '.(Tools::getValue('adn_api', $this->_adn_api) == 'aim'?'checked':'').' />&nbsp; AIM
					<br />
					'.$this->l('MD5 Hash').': <input type="text" id="adn_md_hash" name="adn_md_hash" value="'.Tools::getValue('adn_md_hash', $this->_adn_md_hash).'" />&nbsp;'.$this->l('Only if entered it on the Authorize.net site, otherwise leave blank!').'
					<br />
					<b>'.$this->l('More information about each API can be found at').' <a href="https://developer.authorize.net/api/compare/" target="_index">https://developer.authorize.net/api/compare/</a></b>
				</td>
			</tr>
			
			<tr>
				<td align="left" style="font-weight:bold;font-size:14px" nowrap>
					'.$this->l('Payment page:').'
				</td>
				<td align="left">
					<input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="adn_payment_page" id="adn_payment_page" value="0" '.(Tools::getValue('adn_payment_page', $this->_adn_payment_page) == '0'?'checked':'').' />
					&nbsp; ' . $this->l('New page') . ' &nbsp;&nbsp;&nbsp;
					<input type="radio" style="margin:-5px 0 0 0;paddin:0;border:none" name="adn_payment_page" id="adn_payment_page" value="1" '.(Tools::getValue('adn_payment_page', $this->_adn_payment_page) == '1'?'checked':'').' />
					&nbsp; ' . $this->l('Embedded in Checkout') . '  &nbsp;&nbsp;&nbsp;
				</td>
			</tr>			
			
			
			<tr>
				<td align="left" valign="top" style="font-weight:bold;font-size:14px" nowrap>
					'.$this->l('Transaction Type').':
				</td>
				<td align="left">
					<select style="width: 185px;" id="adn_type" name="adn_type" onchange="javascript:type_change()">
					<option value="AUTH_CAPTURE" '.(Tools::getValue('adn_type', $this->_adn_type) == 'AUTH_CAPTURE'?'selected':'').' >'.$this->l('Authorize and Capture').'</option>
					<option value="AUTH_ONLY" '.(Tools::getValue('adn_type', $this->_adn_type) == 'AUTH_ONLY'?'selected':'').' >'.$this->l('Authorize Only').'</option>
					</select>
					<span id="cap_stat" style="margin-left:10px;'.(Tools::getValue('adn_type', $this->_adn_type) != 'AUTH_ONLY'?'display:none;':'').'">
					'.$this->l('Authorize Order Status').':
					<select name="adn_auth_status" id="adn_auth_status" >';
		foreach ($states AS $state)
				$this->_html .= '<option value="'.$state['id_order_state'].'" '.(Tools::getValue('adn_auth_status', $this->_adn_auth_status) == $state['id_order_state']?'selected="selected"':'').'>'.$state['name'].'</option>';
			$this->_html .= '</select>
					<br /><br />
					<li style="margin-left:10px">'.$this->l('You can create a new Order Status to use for Authorization only in Orders->Statuses').'</li>
					</span>
				</td>
			</tr>
			<tr height="30">
				<td align="left" style="font-weight:bold;font-size:14px" valign="top">
					'.$this->l('Currency').':
				</td>
				<td align="left">
					'.$this->l('Shop Default').' <input type="radio" id="adn_currency" onclick="$(\'#user_cur\').fadeOut(1000);$(\'#def_cur\').fadeIn(1000);" name="adn_currency" value="1" '.(Tools::getValue('adn_currency', $this->_adn_currency) == "1"?"checked":"").' />&nbsp;
					&nbsp;&nbsp;&nbsp;'.$this->l('User Selected').' <input type="radio" onclick="$(\'#user_cur\').fadeIn(1000);$(\'#def_cur\').fadeOut(1000);" id="adn_currency" name="adn_currency" value="0" '.(Tools::getValue('adn_currency', $this->_adn_currency) == "0"?"checked":"").' />&nbsp;
					<br />
					<b id="user_cur" style="color:red;display:'.(Tools::getValue('adn_currency', $this->_adn_currency) != "1"?"block":"none").'">'.$this->l('You must have all the currencies from prestashop available in Authorize.net').'.</b>
					';
			        if (sizeof(Currency::getCurrencies()) > 1 && $this->getPSV() < 1.4)
			        $this->_html .='
								<div id="def_cur" style="display:'.(Tools::getValue('adn_currency', $this->_adn_currency) == "1"?"block":"none").'"><b style="color:red">'.$this->l('To ensure the correct amount is sent to Authorize.net (when using multiple currencies in Prestashop), you must make the following change to /classes/Product.php').'</b><br />'.$this->l('Before').': $cacheId = $id_product.\'-\'.<br />'.$this->l('After').': $cacheId = $id_product.\'-\'.$cart->id_currency.\'-\'.</div>
			        ';
			        $this->_html .='
				</td>
			</tr>

			
			<tr>
				<td align="left" style="font-weight:bold;font-size:12px">
					<br />
				</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold;font-size:12px" nowrap>
					'.$this->l('Accepted Cards:').'
				</td>
				<td align="left" nowrap>
					<input type="checkbox" value="1" id="adn_visa" name="adn_visa" '.(Tools::getValue('adn_visa', $this->_adn_visa) == 1 ? 'checked' : '').' />
					<img src="'.$this->_path.'img/visa.gif" />
					&nbsp;&nbsp;
					<input type="checkbox" value="1" id="adn_mc" name="adn_mc" '.(Tools::getValue('adn_mc', $this->_adn_mc) == 1 ? 'checked' : '').' />
					<img src="'.$this->_path.'img/mc.gif" />
					&nbsp;&nbsp;
					<input type="checkbox" value="1" id="adn_amex" name="adn_amex" '.(Tools::getValue('adn_amex', $this->_adn_amex) == 1 ? 'checked' : '').' />
					<img src="'.$this->_path.'img/amex.gif" />
					&nbsp;&nbsp;
					<input type="checkbox" value="1" id="adn_discover" name="adn_discover" '.(Tools::getValue('adn_discover', $this->_adn_discover) == 1 ? 'checked' : '').' />
					<img src="'.$this->_path.'img/discover.gif" />
					&nbsp;&nbsp;
					<input type="checkbox" value="1" id="adn_diners" name="adn_diners" '.(Tools::getValue('adn_diners', $this->_adn_diners) == 1 ? 'checked' : '').' />
					<img src="'.$this->_path.'img/diners.gif" />
					&nbsp;&nbsp;
					<input type="checkbox" value="1" id="adn_jcb" name="adn_jcb" '.(Tools::getValue('adn_jcb', $this->_adn_jcb) == 1 ? 'checked' : '').' />
					<img src="'.$this->_path.'img/jcb.gif" />
					&nbsp;&nbsp;
					<input type="checkbox" value="1" id="adn_enroute" name="adn_enroute" '.(Tools::getValue('adn_enroute', $this->_adn_enroute) == 1 ? 'checked' : '').' />
					Enroute
					&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold;font-size:12px" nowrap>
					'.$this->l('Currency Conversion:').'
				</td>
				<td align="left" nowrap>
					<input type="checkbox" value="1" id="adn_update_currency" name="adn_update_currency" '.(Tools::getValue('adn_update_currency', $this->_adn_update_currency) == 1 ? 'checked' : '').' />&nbsp;
					'.$this->l('Currency rate will be updated before every transaction using Prestashop\'s built in tool').'.
				</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold;font-size:12px" nowrap>
					'.$this->l('Require Address:').'
				</td>
				<td align="left" nowrap>
					<input type="checkbox" value="1" id="adn_get_address" name="adn_get_address" '.(Tools::getValue('adn_get_address', $this->_adn_get_address) == 1 ? 'checked' : '').' />&nbsp;
					'.$this->l('User must enter an address (Their billing info will be entered by default)').'
				</td>
			</tr>
			<tr>
				<td align="left" style="font-weight:bold;font-size:12px">
					'.$this->l('Require CVN:').'
				</td>
				<td align="left" nowrap>
					<input type="checkbox" value="1" id="adn_get_cvm" name="adn_get_cvm" '.(Tools::getValue('adn_get_cvm', $this->_adn_get_cvm) == 1 ? 'checked' : '').' />&nbsp;
					'.$this->l('User must enter the 3-4 digit code from the back of the card.').'
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" value="'.$this->l('Update').'" name="submitChanges" class="button" />
				</td>
			</tr>
			</table>
			</fieldset>
			<br>
		        <fieldset id="capture_transaction" '.(Tools::getValue('adn_type', $this->_adn_type) != 'AUTH_ONLY'?'style="display:none; width:800px;"':'style="width:800px;"').' class="width3"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Capture Transaction').'</legend>
		        <table cellspacing="10" width="800">
		        <tr>
				<td align="left" width="155px" style="font-weight:bold;font-size:13px" nowrap>
					'.$this->l('Order ID').':
				</td>
				<td align="left" width="150px" style="font-size:12px" nowrap>
					<input type="text" size="12" id="capture_order_id" name="capture_order_id" />
				</td>
				<td align="left" style="font-size:12px" nowrap>
					<input type="button" value="'.$this->l('Lookup Order').'" name="searchCaptureOrders" class="button" onclick="search_orders(1)"/>
					&nbsp;&nbsp;&nbsp;
					<input type="button" value="'.$this->l('Reset').'" name="resetCaptureOrders" class="button" onclick="clear_orders(1)"/>
				</td>
			</tr>
			</table>
			<div id="capture_order_details">
			</div>
			</fieldset>
			<br>
			<fieldset id="refundTransaction" style="width:800px;" class="width3"><legend><img src="'.$this->_path.'logo.gif" />'.$this->l('Refund Transaction').'</legend>
			<table cellspacing="10" width="800">
			<tr>
				<td align="left" width="155px" style="font-weight:bold;font-size:13px" nowrap>
					'.$this->l('Order ID').':
				</td>
				<td align="left" width="150px" style="font-size:12px" nowrap>
					<input type="text" size="12" id="refund_order_id" name="refund_order_id" />
				</td>
				<td align="left" style="font-size:12px" nowrap>
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
	
	private function createCombo($adn_visa, $adn_mc, $adn_amex, $adn_discover, $adn_jcb, $adn_diners)
	{
		$imgBuf = array();
		if ($adn_visa)
 			array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/visa.gif'));
		if ($adn_mc)
 			array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/mc.gif'));
		if ($adn_amex)
 			array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/amex.gif'));
		if ($adn_discover)
 			array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/discover.gif'));
		if ($adn_jcb)
 			array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/jcb.gif'));
		if ($adn_diners)
 			array_push($imgBuf,imagecreatefromgif(dirname(__FILE__).'/img/diners.gif'));
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
	
	private function _postProcess()
	{
		if (Tools::isSubmit('submitChanges'))
		{
			if (!Configuration::updateValue('ADN_ID', Tools::getValue('adn_id'))
				|| !Configuration::updateValue('ADN_KEY', Tools::getValue('adn_key'))
				|| !Configuration::updateValue('ADN_MD_HASH', Tools::getValue('adn_md_hash'))
				|| !Configuration::updateValue('ADN_TYPE', Tools::getValue('adn_type'))
				|| !Configuration::updateValue('ADN_API', Tools::getValue('adn_api'))
				|| !Configuration::updateValue('ADN_AUTH_STATUS', Tools::getValue('adn_auth_status'))
				|| !Configuration::updateValue('ADN_VISA', Tools::getValue('adn_visa'))
				|| !Configuration::updateValue('ADN_MC', Tools::getValue('adn_mc'))
				|| !Configuration::updateValue('ADN_AMEX', Tools::getValue('adn_amex'))
				|| !Configuration::updateValue('ADN_PAYMENT_PAGE', Tools::getValue('adn_payment_page'))
				|| !Configuration::updateValue('ADN_DISCOVER', Tools::getValue('adn_discover'))
				|| !Configuration::updateValue('ADN_JCB', Tools::getValue('adn_jcb'))
				|| !Configuration::updateValue('ADN_DINERS', Tools::getValue('adn_diners'))
				|| !Configuration::updateValue('ADN_ENROUTE', Tools::getValue('adn_enroute'))
				|| !Configuration::updateValue('ADN_UPDATE_CURRENCY', Tools::getValue('adn_update_currency'))
				|| !Configuration::updateValue('ADN_GET_ADDRESS', Tools::getValue('adn_get_address'))
				|| !Configuration::updateValue('ADN_DEMO_MODE', Tools::getValue('adn_demo_mode'))
				|| !Configuration::updateValue('ADN_CURRENCY', Tools::getValue('adn_currency'))
				|| !Configuration::updateValue('ADN_GET_CVM', Tools::getValue('adn_get_cvm')))
				$this->_html .= '<div class="alert error">'.$this->l('Cannot update settings').'</div>';
			else
				$this->_html .= '<div class="conf confirm"><img src="../img/admin/ok.gif" alt="'.$this->l('Confirmation').'" />'.$this->l('Settings updated').'</div>';
			$this->createCombo(Tools::getValue('adn_visa'),Tools::getValue('adn_mc'),Tools::getValue('adn_amex'),Tools::getValue('adn_discover'),Tools::getValue('adn_jcb'),Tools::getValue('adn_diners'));
		}
		$this->_refreshProperties();
	}
	
	public function getAdnFilename()
	{
		return $this->_adn_api == 'aim'?'validation':'validationdpn';
	}

	public function hookPayment($params)
	{
		
		$currency_module = Currency::getIdByIsoCode('USD');
		if (empty($currency_module)) {
			return '';
		}

		if ($this->_adn_api == 'aim' && $this->_adn_payment_page == 1) {
			require_once('controllers/front/validation.php');
			// hack for presta 1.5 
			$_POST['module'] = 'authorizedotnet';
			
			AuthorizedotnetValidationModuleFrontController::prepareVarsView($this->getContext(), $this, $adn_cc_err = '', time());

			return $this->display(__FILE__, 'views/templates/front/validation.tpl');
		}
		
		if (!$this->active)
			return ;
		$adn_cards = "";

		if ($this->_adn_visa)
			$adn_cards .= $this->l("Visa").", ";
		if ($this->_adn_mc)
			$adn_cards .= $this->l("Mastercard").", ";
		if ($this->_adn_amex)
			$adn_cards .= $this->l("Amex").", ";
		if ($this->_adn_discover)
			$adn_cards .= $this->l("Discover").", ";
		if ($this->_adn_jcb)
			$adn_cards .= $this->l("JCB").", ";
		if ($this->_adn_diners)
			$adn_cards .= $this->l("Diners").", ";
		if ($this->_adn_enroute)
			$adn_cards .= $this->l("Enroute").", ";

		$adn_cards = substr($adn_cards,0,-2);
		
		$adn_filename  = $this->getAdnFilename();

		$this->getContext()->smarty->assign(array(
			'adn_payment_page' => $this->_adn_payment_page,
			'ps_version' => $this->getPSV(),
			'this_path' => $this->_path,
			'active' => (($this->_adn_id != "" && $this->_adn_key != "")|| $this->_adn_secure_key != "")?true:false,
			'adn_visa' => $this->_adn_visa,
			'adn_mc' => $this->_adn_mc,
			'adn_amex' => $this->_adn_amex,
			'adn_discover' => $this->_adn_discover,
			'adn_jcb' => $this->_adn_jcb,
			'adn_diners' => $this->_adn_diners,
			'adn_psv' => $this->getPSV(),
			'adn_enroute' => $this->_adn_enroute,
			'adn_filename' => $adn_filename,
			'adn_cards' => $adn_cards,
			'this_path' => __PS_BASE_URI__.'modules/'.$this->name.'/',
			'this_validation_link' => $this->getValidationLink($adn_filename),
		));		
		
		return $this->display(__FILE__, 'views/templates/front/payment.tpl');
	}	

	public function hookPaymentReturn($params)
	{
		if (!$this->active)
			return ;
		return $this->display(__FILE__, 'views/templates/front/confirmation.tpl');
	}

	public function doPayment()
	{
		$cart   = $this->context->cart;
		$cookie = $this->context->cookie;
		$ps_version  = $this->getPSV();
		if($this->_adn_demo_mode == 2) {
			$post_url = "https://test.authorize.net/gateway/transact.dll";
		} else {
			$post_url = "https://secure.authorize.net/gateway/transact.dll";
		}
		$address_delivery = new Address((int)$cart->id_address_delivery);
		$address_billing  = new Address((int)$cart->id_address_invoice);
		$customer = new Address();
		if ($this->_adn_update_currency)
			Currency::refreshCurrencies();
		//$currency_module = Currency::getIdByIsoCode('USD');

		// get default currency 
		$currency_module = (int) Configuration::get('PS_CURRENCY_DEFAULT');
		// recalculate currency if Currency: User Selected
		if ($cart->id_currency != $currency_module && $this->_adn_currency == 1)
		{
			$old_id = $cart->id_currency;
			$cart->id_currency = $currency_module;
			if (is_object($cookie)) {
				$cookie->id_currency = $currency_module;
			}

			if ($this->getPSV() >= 1.5) {
				$this->context->currency = new Currency($currency_module);
			}

			$cart->update();
		}
		// get cart currency for set to ADN request
		$currencyOrder = new Currency($cart->id_currency);

		$amount = number_format($cart->getOrderTotal(true, 3), 2, '.', '');

		$products = $cart->getProducts();
		$tax = 0;
		foreach ($products AS $product)
		{
			$tax += number_format($product['total_wt'] - $product['total'], 2, '.', '');
		}
		/* Shipping cost */
		if ($this->getPSV() < 1.5) {
			$shippingCostWt = number_format($cart->getOrderShippingCost(), 2, '.', '');
			$shippingCost = number_format($cart->getOrderShippingCost(NULL, false), 2, '.', '');
		} else {
			$shippingCostWt = number_format($cart->getPackageShippingCost(), 2, '.', '');
			$shippingCost = number_format($cart->getPackageShippingCost(NULL, false), 2, '.', '');
		}
		$tax += $shippingCostWt - $shippingCost;
		$country = new Country(Tools::getValue('adn_id_country'),intval(Configuration::get('PS_LANG_DEFAULT')));
		$state = isset($_POST['adn_id_state'])?new State($_POST['adn_id_state']):"";
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

		

		$post_values = array(
		// the API Login ID and Transaction Key must be replaced with valid values
		"x_login"			=> $this->_adn_id,
		"x_tran_key"		=> $this->_adn_key,
	
		"x_version"			=> "3.1",
		"x_delim_data"		=> "TRUE",
		"x_delim_char"		=> "|",
		"x_relay_response"	=> "FALSE",

		"x_type"			=> $this->_adn_type,
		"x_method"			=> "CC",
		"x_card_num"		=> Tools::getValue('adn_cc_number'),
		"x_exp_date"		=> Tools::getValue('adn_cc_Month').substr(Tools::getValue('adn_cc_Year'),2),
		"x_card_code"		=> Tools::getValue('adn_cc_cvm'),

		"x_amount"			=> $amount,
		"x_description"		=> str_replace("|","",substr(Configuration::get("PS_SHOP_NAME")." ".$this->l("purchase: ").$x_description,0,253)),
		"x_line_item"		=> $items,
	
		"x_first_name"		=> Tools::getValue('adn_cc_fname'),
		"x_last_name"		=> Tools::getValue('adn_cc_lname'),
		"x_city"			=> Tools::getValue('adn_cc_city'),
		"x_address"			=> Tools::getValue('adn_cc_address'),
		"x_country"			=> $country->name,
		"x_state"			=> isset($_POST['adn_id_state'])?$state->iso_code:'',
		"x_zip"				=> Tools::getValue('adn_cc_zip'),
		"x_company"			=> $address_billing->company,
		"x_phone"			=> $address_billing->phone,
		"x_customer_ip"		=> $_SERVER['REMOTE_ADDR'],
		"x_ship_to_first_name"	=> $address_delivery->firstname,
		"x_ship_to_last_name"	=> $address_delivery->lastname,
		"x_ship_to_company"	=> $address_delivery->company,
		"x_ship_to_address"	=> trim($address_delivery->address1 .' '. $address_delivery->address2),
		"x_ship_to_city"	=> $address_delivery->city,
		"x_ship_to_state"	=> $address_delivery->state,
		"x_ship_to_zip"		=> $address_delivery->postcode,
		"x_ship_to_country"	=> $address_delivery->country,
		"x_freight"			=> floatval($shippingCost),
		"x_tax"				=> max((float)$tax, 0),
		"x_invoice_num" 	=> $this->l('Cart').' #'.$cart->id,
		"x_test_request"    => (bool) $this->_adn_demo_mode,
		"x_currency_code"   => $currencyOrder->iso_code,
		
		// Additional fields can be added here as outlined in the AIM integration
		// guide at: http://developer.authorize.net
		);

		// 	This section takes the input fields and converts them to the proper format
		// 	for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
		$post_string = "";
		foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . str_replace("%26x_line_item","&x_line_item",urlencode( $value )) . "&"; }
		$post_string = rtrim( $post_string, "& " );
		
		// 	This sample code uses the CURL library for php to establish a connection,
		// submit the post, and record the response.
		// If you receive an error, you may want to ensure that you have the curl
		// library enabled in your php configuration
		$request = curl_init($post_url); // initiate curl object
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
		$post_response = curl_exec($request); // execute curl post and store results in $post_response
		// 	additional options may be required depending upon your server configuration
		// 	you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object
		return str_replace('"','',$post_response);
	}

	public function doRefund($id_order, $is_void, $trans_id, $card, $amount)
	{
		if($this->_adn_demo_mode == 2) {
			$post_url = "https://test.authorize.net/gateway/transact.dll";
		} else {
			$post_url = "https://secure.authorize.net/gateway/transact.dll";
		}
		$post_values_void = array(
		// the API Login ID and Transaction Key must be replaced with valid values
		"x_login"			=> $this->_adn_id,
		"x_tran_key"		=> $this->_adn_key,
			
		"x_version"			=> "3.1",
		"x_delim_data"		=> "TRUE",
		"x_delim_char"		=> "|",
		"x_relay_response"	=> "FALSE",
		"x_invoice_num" 	=> $this->l('Order').' #'.$id_order,
		"x_type"			=> "VOID",
		"x_trans_id"		=> $trans_id);
		
		$post_values_credit = array(
		// the API Login ID and Transaction Key must be replaced with valid values
		"x_login"			=> $this->_adn_id,
		"x_tran_key"		=> $this->_adn_key,
	
		"x_version"			=> "3.1",
		"x_delim_data"		=> "TRUE",
		"x_delim_char"		=> "|",
		"x_relay_response"	=> "FALSE",

		"x_type"			=> "CREDIT",
		"x_invoice_num" 	=> $this->l('Order').' #'.$id_order,
		"x_trans_id"		=> $trans_id,
		"x_card_num"		=> $card,
		"x_amount"			=> $amount);
		
		if ($is_void)
		{
			$post_string = "";
			foreach( $post_values_void as $key => $value )
				{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
			$post_string = rtrim( $post_string, "& " );
			$request = curl_init($post_url); // initiate curl object
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
			$post_response_void = curl_exec($request); // execute curl post and store results in $post_response
			curl_close ($request); // close curl object
			$response_array = explode("|",str_replace('"','',$post_response_void));
			if ($response_array[0] == 1)
				return $response_array;
		}
		
		$post_string = "";
		foreach( $post_values_credit as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
		$post_string = rtrim( $post_string, "& " );
		$request = curl_init($post_url); // initiate curl object
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
		$post_response_credit = curl_exec($request); // execute curl post and store results in $post_response
		$response_array = explode("|",str_replace('"','',$post_response_credit));
		curl_close ($request); // close curl object
		return $response_array;
	}
	

	public function doCapture($id_order, $trans_id, $amount, $auth_code)
	{
		if($this->_adn_demo_mode == 2) {
			$post_url = "https://test.authorize.net/gateway/transact.dll";
		} else {
			$post_url = "https://secure.authorize.net/gateway/transact.dll";
		}
		$post_values_capture = array(
		// the API Login ID and Transaction Key must be replaced with valid values
		"x_login"			=> $this->_adn_id,
		"x_tran_key"		=> $this->_adn_key,
	
		"x_version"			=> "3.1",
		"x_delim_data"		=> "TRUE",
		"x_delim_char"		=> "|",
		"x_relay_response"	=> "FALSE",

		"x_type"			=> "PRIOR_AUTH_CAPTURE",
		"x_auth_code"		=> $auth_code,
		"x_invoice_num" 	=> $this->l('Order').' #'.$id_order,
		"x_trans_id"		=> $trans_id,
		"x_amount"			=> $amount);
		
		$post_string = "";

		foreach( $post_values_capture as $key => $value )
			 $post_string .= "$key=" . urlencode( $value ) . "&";

		$post_string = rtrim( $post_string, "& " );
		$request = curl_init($post_url); // initiate curl object
		curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
		$post_response_capture = curl_exec($request); // execute curl post and store results in $post_response
		curl_close ($request); // close curl object
		return str_replace('"','',$post_response_capture);
	}
}
?>
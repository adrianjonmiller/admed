<?php /* Smarty version Smarty-3.1.13, created on 2013-12-22 00:41:25
         compiled from "/home/admedon/public_html/prestashop/modules/bluepay/views/templates/hook/payment_iframe.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2899644752b67b85224677-32613894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bf0cfcdb314fe6f148a9319498eb4c05244315c' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/bluepay/views/templates/hook/payment_iframe.tpl',
      1 => 1387690467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2899644752b67b85224677-32613894',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'allow_stored_payments' => 0,
    'has_saved_payment_information' => 0,
    'saved_payment_information' => 0,
    'payment_type' => 0,
    'cards' => 0,
    'module_dir' => 0,
    'customer' => 0,
    'invoice_id' => 0,
    'require_cvv2' => 0,
    'display_logo' => 0,
    'secret_key' => 0,
    'account_id' => 0,
    'transaction_type' => 0,
    'total_price' => 0,
    'mode' => 0,
    'customer_address' => 0,
    'customer_city' => 0,
    'customer_state' => 0,
    'customer_zip' => 0,
    'customer_country' => 0,
    'customer_email' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52b67b853fb3c3_77370669',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b67b853fb3c3_77370669')) {function content_52b67b853fb3c3_77370669($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
?>

<p class="payment_module">
	<?php if ($_smarty_tpl->tpl_vars['allow_stored_payments']->value=='Yes'&&$_smarty_tpl->tpl_vars['has_saved_payment_information']->value){?>
		<?php $_smarty_tpl->tpl_vars['customer'] = new Smarty_variable(smarty_modifier_escape($_smarty_tpl->tpl_vars['saved_payment_information']->value['customer_name'], 'htmlall', 'UTF-8'), null, 0);?>
	<?php }?>
	<form name="bluepay_form" id="bluepay_form" action="#" method="post">
		<span style="border: 1px solid #595A5E;display: block;padding: 0.6em;text-decoration: none;margin-left: 0.7em;">
			<a id="click_bluepay" href="#" title="<?php echo smartyTranslate(array('s'=>'Pay with BluePay','mod'=>'bluepay'),$_smarty_tpl);?>
" style="display: block;text-decoration: none; font-weight: bold;">
				<?php if ($_smarty_tpl->tpl_vars['payment_type']->value!='ACH'){?>
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['visa']==1){?><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
img/visa-small.png" alt="<?php echo smartyTranslate(array('s'=>'Visa Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['mastercard']==1){?><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
img/mastercard-small.png" alt="<?php echo smartyTranslate(array('s'=>'Mastercard Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['amex']==1){?><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
img/amex.png" alt="<?php echo smartyTranslate(array('s'=>'American Express Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['discover']==1){?><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
img/discover.png" alt="<?php echo smartyTranslate(array('s'=>'Discover Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['payment_type']->value=='BOTH'){?>
						<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
img/echeck-small.png" alt="<?php echo smartyTranslate(array('s'=>'Check Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
						&nbsp;&nbsp;<?php echo smartyTranslate(array('s'=>'Secure credit card/E-check payment with BluePay','mod'=>'bluepay'),$_smarty_tpl);?>

					<?php }else{ ?>
						&nbsp;&nbsp;<?php echo smartyTranslate(array('s'=>'Secure credit card payment with BluePay','mod'=>'bluepay'),$_smarty_tpl);?>

					<?php }?>
				<?php }else{ ?>
					<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
img/echeck-small.png" alt="<?php echo smartyTranslate(array('s'=>'Check Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
                                        &nbsp;&nbsp;<?php echo smartyTranslate(array('s'=>'Secure E-check payment with BluePay','mod'=>'bluepay'),$_smarty_tpl);?>

				<?php }?>
			</a>
			<div id="payment_fields" style="display:none">
			<br /><br />
			<p class="error" id="error-text" style="display:none"></p>
			<input type="hidden" name="customer_name" id="customer_name" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customer']->value, 'htmlall', 'UTF-8');?>
" />
			<input type="hidden" name="invoice_id" id="invoice_id" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['invoice_id']->value, 'htmlall', 'UTF-8');?>
" />
                        <input type="hidden" name="master_id" id="master_id" value="" />
                        <input type="hidden" name="allow_stored_payments" id="allow_stored_payments" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['allow_stored_payments']->value, 'htmlall', 'UTF-8');?>
" />
			<input type="hidden" name="require_cvv2" id="require_cvv2" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['require_cvv2']->value, 'htmlall', 'UTF-8');?>
" />
                        <input type="hidden" name="has_saved_payment_information" id="has_saved_payment_information" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['has_saved_payment_information']->value, 'htmlall', 'UTF-8');?>
" />
                        <input type="hidden" name="pay_type" id="pay_type" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['payment_type']->value, 'htmlall', 'UTF-8');?>
" />
                        <input type="hidden" name="expiration_mm" id="expiration_mm" value="" />
                        <input type="hidden" name="expiration_yy" id="expiration_yy" value="" />
                        <input type="hidden" name="cc_type" id="cc_type" value="" />
			<input type="hidden" name="cc_visa" id="cc_visa" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cards']->value['visa'], 'htmlall', 'UTF-8');?>
" />
			<input type="hidden" name="cc_mc" id="cc_mc" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cards']->value['mastercard'], 'htmlall', 'UTF-8');?>
" />
			<input type="hidden" name="cc_amex" id="cc_amex" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cards']->value['amex'], 'htmlall', 'UTF-8');?>
" />
			<input type="hidden" name="cc_discover" id="cc_discover" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cards']->value['discover'], 'htmlall', 'UTF-8');?>
" />
			<?php if ($_smarty_tpl->tpl_vars['display_logo']->value=='Yes'){?>
				<div id="left_sidebar" style="width: 136px; height: 260px; float: left; padding-top:40px; padding-right: 20px; border-right: 1px solid #DDD;">
					<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
img/bluepay2.gif" alt="secure payment" />
				</div>
			<?php }?>
				<div id="container"></div>
				<br />	
				<input type="button" id="submit_payment" value="<?php echo smartyTranslate(array('s'=>'Process Order','mod'=>'bluepay'),$_smarty_tpl);?>
" style="margin-left: 129px; padding-left: 25px; padding-right: 25px; float: left;" class="button" />
				<br class="clear" /><br /><br />
				</div>
		</span>
	</form>
</p>

<script>
	$(document).ready(function () {
		var https = "https";
		iframeSocket(https + "://secure.bluepay.com/interfaces/shpf?SHPF_FORM_ID=ps&USE_CVV2="+($('#require_cvv2').val())+
			"&KEY="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['secret_key']->value, 'htmlall', 'UTF-8');?>
'+
			"&MERCHANT="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['account_id']->value, 'htmlall', 'UTF-8');?>
'+
			"&TRANSACTION_TYPE="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['transaction_type']->value, 'htmlall', 'UTF-8');?>
'+
			"&PAY_TYPES="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['payment_type']->value, 'htmlall', 'UTF-8');?>
'+
			"&INVOICE_ID="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['invoice_id']->value, 'htmlall', 'UTF-8');?>
'+
			"&AMOUNT="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['total_price']->value, 'htmlall', 'UTF-8');?>
'+
			"&MODE="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['mode']->value, 'htmlall', 'UTF-8');?>
'+
			"&CC_VISA="+($('#cc_visa').val())+
			"&CC_MC="+($('#cc_mc').val())+
			"&CC_AMEX="+($('#cc_amex').val())+
			"&CC_DISC="+($('#cc_discover').val())+
			"&STORED_PAYMENTS="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['allow_stored_payments']->value, 'htmlall', 'UTF-8');?>
'+
			"&STORED_PAYMENT_ACCOUNT="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['saved_payment_information']->value['masked_payment_account'], 'htmlall', 'UTF-8');?>
'+
			"&STORED_PAYMENT_TYPE="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['saved_payment_information']->value['payment_type'], 'htmlall', 'UTF-8');?>
'+
			"&STORED_CARD_TYPE="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['saved_payment_information']->value['card_type'], 'htmlall', 'UTF-8');?>
'+
			"&STORED_CARD_MM="+'<?php echo smarty_modifier_escape(substr($_smarty_tpl->tpl_vars['saved_payment_information']->value['expiration_date'],0,2), 'htmlall', 'UTF-8');?>
'+
			"&STORED_CARD_YY="+'<?php echo smarty_modifier_escape(substr($_smarty_tpl->tpl_vars['saved_payment_information']->value['expiration_date'],2,4), 'htmlall', 'UTF-8');?>
'+
			"&MASTERID="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['saved_payment_information']->value['bluepay_customer_id'], 'htmlall', 'UTF-8');?>
'+
			"&NAME="+($('#customer_name').val())+
			"&ADDR1="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customer_address']->value, 'htmlall', 'UTF-8');?>
'+
			"&CITY="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customer_city']->value, 'htmlall', 'UTF-8');?>
'+
			"&STATE="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customer_state']->value, 'htmlall', 'UTF-8');?>
'+
			"&ZIPCODE="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customer_zip']->value, 'htmlall', 'UTF-8');?>
'+
			"&COUNTRY="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customer_country']->value, 'htmlall', 'UTF-8');?>
'+
			"&EMAIL="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['customer_email']->value, 'htmlall', 'UTF-8');?>
'+
			"&COMMENT="+'<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['cart']->value, 'htmlall', 'UTF-8');?>
');
	});
</script>
<style>
	iframe {
		overflow: hidden;
                margin: 5px 20px;
		padding: 0px;
                width: 340px;
                height: 280px;
            }
</style>

<?php }} ?>
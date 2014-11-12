<?php /* Smarty version Smarty-3.1.13, created on 2014-05-23 14:12:50
         compiled from "/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/front/validation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:708018047537f8fa2327874-08628672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d32b0b4b855cc944ad1c5d7cebada0344e47de6' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/front/validation.tpl',
      1 => 1400868458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '708018047537f8fa2327874-08628672',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pppro_payment_page' => 0,
    'this_path_ssl' => 0,
    'psv' => 0,
    'id_state' => 0,
    'address' => 0,
    'countries' => 0,
    'country' => 0,
    'state' => 0,
    'pppro_use_hosted' => 0,
    'pppro_3d_enabled' => 0,
    'this_path' => 0,
    'pppro_visa' => 0,
    'pppro_mc' => 0,
    'pppro_amex' => 0,
    'pppro_discover' => 0,
    'pppro_cc_err' => 0,
    'pppro_cc_fname' => 0,
    'pppro_cc_lname' => 0,
    'pppro_get_address' => 0,
    'pppro_cc_address' => 0,
    'pppro_cc_zip' => 0,
    'pppro_cc_city' => 0,
    'countries_list' => 0,
    'pppro_cc_number' => 0,
    'time' => 0,
    'time_minus' => 0,
    'maestro_issue_number' => 0,
    'pppro_get_cvm' => 0,
    'pppro_cc_cvm' => 0,
    'currencies' => 0,
    'ppp_total' => 0,
    'link' => 0,
    'base_dir_ssl' => 0,
    'pppro_sandbox' => 0,
    'lang_iso' => 0,
    'cookie' => 0,
    'address_delivery' => 0,
    'address_billing' => 0,
    'billing_country' => 0,
    'billing_state' => 0,
    'delivery_country' => 0,
    'delivery_state' => 0,
    'pppro_currency' => 0,
    'pppro_subtotal' => 0,
    'pppro_shipping' => 0,
    'pppro_taxes' => 0,
    'pppro_acc_email' => 0,
    'pppro_paymentaction' => 0,
    'pppro_btn_bg_color' => 0,
    'pppro_btn_txt_color' => 0,
    'notify_file_path' => 0,
    'cancel_file_path' => 0,
    'validation_file_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_537f8fa25c4c18_55625630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f8fa25c4c18_55625630')) {function content_537f8fa25c4c18_55625630($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_function_html_select_date')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/function.html_select_date.php';
?><div id="pppro_payment" class="payment">
<?php if (!$_smarty_tpl->tpl_vars['pppro_payment_page']->value){?>
    <?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Payment'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['pppro_payment_page']->value){?>
<div id="pppro_ajax_container"></div>
<?php }?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
js/statesManagement.js"></script>
<style>
.first_line { border-top: none!important; }
form.std h3 {
	margin: none!important;
	border-bottom: none!important;
	padding: none!important;
}
<?php if ($_smarty_tpl->tpl_vars['pppro_payment_page']->value){?>
	#pppro_payment {
		<?php if ($_smarty_tpl->tpl_vars['psv']->value<1.5){?>
			border: 1px solid #595A5E;
		<?php }else{ ?>
			border-top: 1px dotted #CCCCCC;
		<?php }?>
		padding: 20px 10px 20px 0;
		margin: 0 0 0.7em 0.7em;
		overflow: hidden;
	}
<?php }?>
	#pppro_payment td {
		white-space:nowrap;
	}
	
	#pppro_payment td.td_input {
		padding-left: 20px;
		width:90%;
	}
</style>

<script type="text/javascript">
//<![CDATA[
pppro_idSelectedCountry = <?php if (isset($_smarty_tpl->tpl_vars['id_state']->value)){?><?php echo intval($_smarty_tpl->tpl_vars['id_state']->value);?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['address']->value->id_state)){?><?php echo intval($_smarty_tpl->tpl_vars['address']->value->id_state);?>
<?php }else{ ?>false<?php }?>;
pppro_countries = new Array();
pppro_countriesNeedIDNumber = new Array();
<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['states'])&&$_smarty_tpl->tpl_vars['country']->value['contains_states']){?>
		pppro_countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = new Array();
		<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['states']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value){
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
			pppro_countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
].push({'id' : '<?php echo $_smarty_tpl->tpl_vars['state']->value['id_state'];?>
', 'name' : '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['state']->value['name'], 'htmlall', 'UTF-8');?>
'});
		<?php } ?>
	<?php }?>
<?php } ?>
$(function(){
	$('#pppro_id_state option[value=<?php if (isset($_smarty_tpl->tpl_vars['id_state']->value)){?><?php echo $_smarty_tpl->tpl_vars['id_state']->value;?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address']->value->id_state, 'htmlall', 'UTF-8');?>
<?php }?>]').attr('selected', 'selected');
});
//]]>
</script>

<?php if (!$_smarty_tpl->tpl_vars['pppro_payment_page']->value){?>
<h2><?php echo smartyTranslate(array('s'=>'Order summation','mod'=>'paypalpro'),$_smarty_tpl);?>
</h2>

<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['pppro_use_hosted']->value){?>
     
<script type="text/javascript">    
var pppro_payment_page = <?php echo $_smarty_tpl->tpl_vars['pppro_payment_page']->value;?>
;
var pppro_3d_enabled = <?php echo $_smarty_tpl->tpl_vars['pppro_3d_enabled']->value;?>
;
var ajax_pppro_url     = '<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
validation.php';

//Create an object
var creditCardValidator = {};
// Pin the cards to them
creditCardValidator.cards = {
  'mc':'5[1-5][0-9]{14}',
  'ec':'5[1-5][0-9]{14}',
  'vi':'4(?:[0-9]{12}|[0-9]{15})',
  'ax':'3[47][0-9]{13}',
  'dc':'3(?:0[0-5][0-9]{11}|[68][0-9]{12})',
  'bl':'3(?:0[0-5][0-9]{11}|[68][0-9]{12})',
  'di':'6011[0-9]{12}',
  'jcb':'(?:3[0-9]{15}|(2131|1800)[0-9]{11})',
  'er':'2(?:014|149)[0-9]{11}'
};
// Add the card validator to them
creditCardValidator.validate = function(value,ccType) {
  value = String(value).replace(/[- ]/g,''); //ignore dashes and whitespaces

  var cardinfo = creditCardValidator.cards, results = [];
  if(ccType){
    var expr = '^' + cardinfo[ccType.toLowerCase()] + '$';
    return expr ? !!value.match(expr) : false; // boolean
  }

  for(var p in cardinfo){
    if(value.match('^' + cardinfo[p] + '$')){
      results.push(p);
    }
  }
  if(checkIfMaestro(value) != -1) {
      var s = {'ma':''};
      results.push(s);
  }      
  return results.length ? results.join('|') : false; // String | boolean
}


function regIsDigit(fData)
{
	var reg = new RegExp("^[0-9]+$");
	return (reg.test(fData));
}

function validate(form)
{
	if (form.pppro_cc_fname.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'First Name','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.pppro_cc_lname.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Last Name','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.pppro_cc_address && form.pppro_cc_address.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Address','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.pppro_cc_city && form.pppro_cc_city.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'City','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.pppro_cc_zip && form.pppro_cc_zip.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Zipcode','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.pppro_cc_email && form.pppro_cc_email.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Email','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.pppro_cc_number && (form.pppro_cc_number.value == "" || !creditCardValidator.validate(form.pppro_cc_number.value)))
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter a valid','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Card Number','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.pppro_cc_cvm && form.pppro_cc_cvm.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'paypalpro'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'CVM code','mod'=>'paypalpro'),$_smarty_tpl);?>
");
		return false;
	}
	$('#pppro_submit').val('<?php echo smartyTranslate(array('s'=>'Please Wait','mod'=>'paypalpro'),$_smarty_tpl);?>
');
	$('#pppro_submit').attr('disabled','disabled');
        
	 
	if (pppro_payment_page && !pppro_3d_enabled) {
		$.ajax({
			url: ajax_pppro_url,
			type: "post",
			dataType: "html",
			data:$(form).serialize(),
			success: function(strData) {
				
				if (strData.substring(0, 4) == 'url:') {
					window.location = strData.substring(4);
				} else {
					$('#pppro_ajax_container').html(strData);
					$('#pppro_submit').val('<?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'paypalpro'),$_smarty_tpl);?>
');
					$('#pppro_submit').attr('disabled',false);
				}
			}
		});
	} else {
		form.submit();
	}
	 
}
    
function showHideMaestro(cardNumber)
{
    if(checkIfMaestro(cardNumber) != -1)
    {           
            $('.meastro_startdate').show();
    } else  { 
            $('.meastro_startdate').hide();
    } 
}  
    
function checkIfMaestro(cardNumber)
{
    var firstFourDgits = cardNumber.substr(0,4);
    var maestroDigits = ['5018','5020','5038','6304','6759','6761','6762','6763'];
    var inArray = $.inArray(firstFourDgits, maestroDigits);
    return inArray;
}    
        
$(document).ready(function() {        
    showHideMaestro($('#pppro_cc_number').val());
});
</script>
<form action="" name="pppro_form" id="pppro_form" method="post" class="std">
	<input type="hidden" name="confirm" value="1" />
	<table>
	<tr>
		<td align="left" colspan="2" style="border-top:none;">
                   <h3><?php echo smartyTranslate(array('s'=>'Billing Information - We accept:','mod'=>'paypalpro'),$_smarty_tpl);?>

                    <?php if ($_smarty_tpl->tpl_vars['pppro_visa']->value){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/visa.gif" alt="<?php echo smartyTranslate(array('s'=>'Visa','mod'=>'paypalpro'),$_smarty_tpl);?>
" />
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pppro_mc']->value){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/mc.gif" alt="<?php echo smartyTranslate(array('s'=>'Mastercard','mod'=>'paypalpro'),$_smarty_tpl);?>
" />
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pppro_amex']->value){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/amex.gif" alt="<?php echo smartyTranslate(array('s'=>'American Express','mod'=>'paypalpro'),$_smarty_tpl);?>
" />
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['pppro_discover']->value){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/discover.gif" alt="<?php echo smartyTranslate(array('s'=>'Discover','mod'=>'paypalpro'),$_smarty_tpl);?>
" />
                    <?php }?>              
                    </h3>
                </td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['pppro_cc_err']->value){?>
	<tr>
		<td align="left" colspan="2"><?php echo $_smarty_tpl->tpl_vars['pppro_cc_err']->value;?>
</td>
	</tr>
	<?php }?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'First / Last Name','mod'=>'paypalpro'),$_smarty_tpl);?>
:	</td>
		<td align="left"><input type="text" size="16" name="pppro_cc_fname" value="<?php echo $_smarty_tpl->tpl_vars['pppro_cc_fname']->value;?>
" /> / <input type="text" size="16" name="pppro_cc_lname" value="<?php echo $_smarty_tpl->tpl_vars['pppro_cc_lname']->value;?>
" style="margin:0" /></td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['pppro_get_address']->value=="1"){?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Address','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left"><input type="text" size="35" name="pppro_cc_address" value="<?php echo $_smarty_tpl->tpl_vars['pppro_cc_address']->value;?>
" /></td>
	</tr>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Zipcode','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left"><input type="text" name="pppro_cc_zip" size="5" value="<?php echo $_smarty_tpl->tpl_vars['pppro_cc_zip']->value;?>
" /></td>
	</tr>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'City','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left"><input type="text" size="35" name="pppro_cc_city" value="<?php echo $_smarty_tpl->tpl_vars['pppro_cc_city']->value;?>
" /></td>
	</tr>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Country','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left"><select style="width:230px;" id="pppro_id_country" name="pppro_id_country"><?php echo $_smarty_tpl->tpl_vars['countries_list']->value;?>
</select></td>
	</tr>
	<tr height="20" class="pppro_id_state">
		<td align="left"><?php echo smartyTranslate(array('s'=>'State','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left">
			<select name="pppro_id_state" id="pppro_id_state">
				<option value="">-</option>
			</select>
		</td>
	</tr>
	<?php }?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Card Number','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left"><input id="pppro_cc_number" type="text" name="pppro_cc_number" value="<?php echo $_smarty_tpl->tpl_vars['pppro_cc_number']->value;?>
" onchange="showHideMaestro(document.pppro_form.pppro_cc_number.value);" /></td>
	</tr>        
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Expiration','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left">
			<?php echo smarty_function_html_select_date(array('prefix'=>'pppro_cc_','month_format'=>'%m','time'=>$_smarty_tpl->tpl_vars['time']->value,'end_year'=>'+11','display_days'=>false),$_smarty_tpl);?>

		</td>
	</tr>
	<tr height="20" class="meastro_startdate" style="display:none;" >
		<td align="left"><?php echo smartyTranslate(array('s'=>'Start Date','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left">
			<?php echo smarty_function_html_select_date(array('prefix'=>'maestro_','month_format'=>'%m','time'=>$_smarty_tpl->tpl_vars['time_minus']->value,'end_year'=>'+11','display_days'=>false),$_smarty_tpl);?>

		</td>
	</tr>        
	<tr height="20" class="meastro_startdate" style="display:none;" >
		<td align="left"><?php echo smartyTranslate(array('s'=>'or Issue Number','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left">
                    <input type="text" name="maestro_issue_number" size="2" value="<?php echo $_smarty_tpl->tpl_vars['maestro_issue_number']->value;?>
" />
                </td>
	</tr>       

	<?php if ($_smarty_tpl->tpl_vars['pppro_get_cvm']->value=="1"){?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'CVN code','mod'=>'paypalpro'),$_smarty_tpl);?>
: </td>
		<td align="left"><input type="text" name="pppro_cc_cvm" size="4" value="<?php echo $_smarty_tpl->tpl_vars['pppro_cc_cvm']->value;?>
" /> <?php echo smartyTranslate(array('s'=>'3-4 digit number from the back of your card.','mod'=>'paypalpro'),$_smarty_tpl);?>
</td>
	</tr>
	<?php }?>
	</table>
        <?php if (!$_smarty_tpl->tpl_vars['pppro_payment_page']->value){?>	
	<p>
		<b style="float:left"><?php echo smartyTranslate(array('s'=>'The total amount of your order is','mod'=>'paypalpro'),$_smarty_tpl);?>
</b>&nbsp;&nbsp;
		<span id="amount_<?php echo $_smarty_tpl->tpl_vars['currencies']->value[0]['id_currency'];?>
" class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['ppp_total']->value),$_smarty_tpl);?>
</span>
	</p>
	<p>
		<br /><br />
		<b><?php echo smartyTranslate(array('s'=>'Please confirm your order by clicking \'I confirm my order\'','mod'=>'paypalpro'),$_smarty_tpl);?>
.</b>
	</p>
        <?php }?>
	<p class="cart_navigation">
            <?php if (!$_smarty_tpl->tpl_vars['pppro_payment_page']->value){?>	
                <?php if ($_smarty_tpl->tpl_vars['psv']->value>=1.5){?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('order',true,null,"step=3");?>
" class="button_large"><?php echo smartyTranslate(array('s'=>'Other payment methods','mod'=>'paypalpro'),$_smarty_tpl);?>
</a>
                <?php }else{ ?>
                     <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
order.php?step=3" class="button_large"><?php echo smartyTranslate(array('s'=>'Other payment methods','mod'=>'paypalpro'),$_smarty_tpl);?>
</a>
                <?php }?>
            <?php }?>
		<input type="button" onclick="validate(document.pppro_form);" id="pppro_submit" value="<?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'paypalpro'),$_smarty_tpl);?>
" class="exclusive_large" />
	</p>
</form>
<?php }else{ ?>
     
    <iframe name="hss_iframe" border="0" style="border:none" width="100%" height="550px"></iframe>
    <form style="display:none" target="hss_iframe" name="form_iframe"
        method="post"
        <?php if ($_smarty_tpl->tpl_vars['pppro_sandbox']->value){?>
        action="https://securepayments.sandbox.paypal.com/acquiringweb">
        <?php }else{ ?>
        action="https://securepayments.paypal.com/cgi-bin/acquiringweb">
        <?php }?>
        <input type="hidden" name="cmd" value="_hosted-payment">
        <input type="hidden" name="lc" value="<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['lang_iso']->value, 'UTF-8');?>
">
        
        <input type="hidden" name="buyer_email" value="<?php echo $_smarty_tpl->tpl_vars['cookie']->value->email;?>
">
        <input type="hidden" name="email" value="<?php echo $_smarty_tpl->tpl_vars['cookie']->value->email;?>
">
        <input type="hidden" name="billing_first_name" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->firstname;?>
">
        <input type="hidden" name="billing_last_name" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->lastname;?>
">        
        <input type="hidden" name="billing_address1" value="<?php echo $_smarty_tpl->tpl_vars['address_billing']->value->address1;?>
">
        <input type="hidden" name="billing_address2" value="<?php echo $_smarty_tpl->tpl_vars['address_billing']->value->address2;?>
">
        <input type="hidden" name="billing_city" value="<?php echo $_smarty_tpl->tpl_vars['address_billing']->value->city;?>
">
        <input type="hidden" name="billing_country" value="<?php echo $_smarty_tpl->tpl_vars['billing_country']->value;?>
">
        <input type="hidden" name="billing_state" value="<?php echo $_smarty_tpl->tpl_vars['billing_state']->value;?>
">
        <input type="hidden" name="billing_zip" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->postcode;?>
">
        
        <input type="hidden" name="first_name" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->firstname;?>
">                
        <input type="hidden" name="last_name" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->lastname;?>
">   
        <input type="hidden" name="address1" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->address1;?>
">
        <input type="hidden" name="address2" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->address2;?>
">        
        <input type="hidden" name="city" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->city;?>
">                
        <input type="hidden" name="country" value="<?php echo $_smarty_tpl->tpl_vars['delivery_country']->value;?>
">         
        <input type="hidden" name="state" value="<?php echo $_smarty_tpl->tpl_vars['delivery_state']->value;?>
">                         
        <input type="hidden" name="zip" value="<?php echo $_smarty_tpl->tpl_vars['address_delivery']->value->postcode;?>
">       
        
        <input type="hidden" name="currency_code" value="<?php echo $_smarty_tpl->tpl_vars['pppro_currency']->value;?>
">
        <input type="hidden" name="subtotal" value="<?php echo $_smarty_tpl->tpl_vars['pppro_subtotal']->value;?>
">
        <input type="hidden" name="shipping" value="<?php echo $_smarty_tpl->tpl_vars['pppro_shipping']->value;?>
">
        <input type="hidden" name="tax" value="<?php echo $_smarty_tpl->tpl_vars['pppro_taxes']->value;?>
">
        
        <input type="hidden" name="business" value="<?php echo $_smarty_tpl->tpl_vars['pppro_acc_email']->value;?>
">        
        <input type="hidden" name="paymentaction" value="<?php echo $_smarty_tpl->tpl_vars['pppro_paymentaction']->value;?>
">
        
        <input type="hidden" name="template" value="templateD">    
        <?php if (isset($_smarty_tpl->tpl_vars['pppro_btn_bg_color']->value)&&$_smarty_tpl->tpl_vars['pppro_btn_bg_color']->value){?>
        <input type="hidden" name="pageButtonBgColor" value="<?php echo $_smarty_tpl->tpl_vars['pppro_btn_bg_color']->value;?>
">
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['pppro_btn_txt_color']->value)&&$_smarty_tpl->tpl_vars['pppro_btn_txt_color']->value){?>
        <input type="hidden" name="pageButtonTextColor" value="<?php echo $_smarty_tpl->tpl_vars['pppro_btn_txt_color']->value;?>
">
        <?php }?>    
        <input type="hidden" name="showHostedThankyouPage" value="false">
        
        
        
        <input type="hidden" name="notify_url" value="<?php echo $_smarty_tpl->tpl_vars['notify_file_path']->value;?>
"> 
        <input type="hidden" name="cancel_return" value="<?php echo $_smarty_tpl->tpl_vars['cancel_file_path']->value;?>
">
        <input type="hidden" name="return" value="<?php echo $_smarty_tpl->tpl_vars['validation_file_path']->value;?>
"> 
    </form>
    <script type="text/javascript">
   // $(document).ready(function() {
        document.form_iframe.submit();
   // });
    </script>        
<?php }?>
</div> <!--- end of id="pppro_payment" class="payment" ---><?php }} ?>
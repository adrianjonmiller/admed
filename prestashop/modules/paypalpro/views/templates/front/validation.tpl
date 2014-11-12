<div id="pppro_payment" class="payment">
{if !$pppro_payment_page}
    {capture name=path}{l s='Payment'}{/capture}
    {include file="$tpl_dir./breadcrumb.tpl"}
{/if}

{if $pppro_payment_page}
<div id="pppro_ajax_container"></div>
{/if}
<script type="text/javascript" src="{$this_path_ssl}js/statesManagement.js"></script>
<style>
.first_line {ldelim} border-top: none!important; {rdelim}
form.std h3 {ldelim}
	margin: none!important;
	border-bottom: none!important;
	padding: none!important;
{rdelim}
{if $pppro_payment_page}
	#pppro_payment {ldelim}
		{if $psv < 1.5}
			border: 1px solid #595A5E;
		{else}
			border-top: 1px dotted #CCCCCC;
		{/if}
		padding: 20px 10px 20px 0;
		margin: 0 0 0.7em 0.7em;
		overflow: hidden;
	{rdelim}
{/if}
	#pppro_payment td {ldelim}
		white-space:nowrap;
	{rdelim}
	
	#pppro_payment td.td_input {ldelim}
		padding-left: 20px;
		width:90%;
	{rdelim}
</style>

<script type="text/javascript">
//<![CDATA[
pppro_idSelectedCountry = {if isset($id_state)}{$id_state|intval}{elseif isset($address->id_state)}{$address->id_state|intval}{else}false{/if};
pppro_countries = new Array();
pppro_countriesNeedIDNumber = new Array();
{foreach from=$countries item='country'}
	{if isset($country.states) && $country.contains_states}
		pppro_countries[{$country.id_country|intval}] = new Array();
		{foreach from=$country.states item='state' name='states'}
			pppro_countries[{$country.id_country|intval}].push({ldelim}'id' : '{$state.id_state}', 'name' : '{$state.name|escape:'htmlall':'UTF-8'}'{rdelim});
		{/foreach}
	{/if}
{/foreach}
$(function(){ldelim}
	$('#pppro_id_state option[value={if isset($id_state)}{$id_state}{else}{$address->id_state|escape:'htmlall':'UTF-8'}{/if}]').attr('selected', 'selected');
{rdelim});
//]]>
</script>

{if !$pppro_payment_page}
<h2>{l s='Order summation' mod='paypalpro'}</h2>

{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}
{/if}

{if !$pppro_use_hosted}
    {* Standard PayPal Pro functionality *} 
<script type="text/javascript">    
var pppro_payment_page = {$pppro_payment_page};
var pppro_3d_enabled = {$pppro_3d_enabled};
var ajax_pppro_url     = '{$this_path}validation.php';
{literal}
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
{/literal}

function regIsDigit(fData)
{ldelim}
	var reg = new RegExp("^[0-9]+$");
	return (reg.test(fData));
{rdelim}

function validate(form)
{ldelim}
	if (form.pppro_cc_fname.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='paypalpro'} {l s='First Name' mod='paypalpro'}");
		return false;
	{rdelim}
	if (form.pppro_cc_lname.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='paypalpro'} {l s='Last Name' mod='paypalpro'}");
		return false;
	{rdelim}
	if (form.pppro_cc_address && form.pppro_cc_address.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='paypalpro'} {l s='Address' mod='paypalpro'}");
		return false;
	{rdelim}
	if (form.pppro_cc_city && form.pppro_cc_city.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='paypalpro'} {l s='City' mod='paypalpro'}");
		return false;
	{rdelim}
	if (form.pppro_cc_zip && form.pppro_cc_zip.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='paypalpro'} {l s='Zipcode' mod='paypalpro'}");
		return false;
	{rdelim}
	if (form.pppro_cc_email && form.pppro_cc_email.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='paypalpro'} {l s='Email' mod='paypalpro'}");
		return false;
	{rdelim}
	if (form.pppro_cc_number && (form.pppro_cc_number.value == "" || !creditCardValidator.validate(form.pppro_cc_number.value)))
	{ldelim}
		alert("{l s='You must enter a valid' mod='paypalpro'} {l s='Card Number' mod='paypalpro'}");
		return false;
	{rdelim}
	if (form.pppro_cc_cvm && form.pppro_cc_cvm.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='paypalpro'} {l s='CVM code' mod='paypalpro'}");
		return false;
	{rdelim}
	$('#pppro_submit').val('{l s='Please Wait' mod='paypalpro'}');
	$('#pppro_submit').attr('disabled','disabled');
        
	{literal} 
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
					$('#pppro_submit').val('{/literal}{l s='I confirm my order' mod='paypalpro'}{literal}');
					$('#pppro_submit').attr('disabled',false);
				}
			}
		});
	} else {
		form.submit();
	}
	{/literal} 
{rdelim}
    
function showHideMaestro(cardNumber)
{ldelim}
    if(checkIfMaestro(cardNumber) != -1)
    {ldelim}           
            $('.meastro_startdate').show();
    {rdelim} else  {ldelim} 
            $('.meastro_startdate').hide();
    {rdelim} 
{rdelim}  
    
function checkIfMaestro(cardNumber)
{ldelim}
    var firstFourDgits = cardNumber.substr(0,4);
    var maestroDigits = ['5018','5020','5038','6304','6759','6761','6762','6763'];
    var inArray = $.inArray(firstFourDgits, maestroDigits);
    return inArray;
{rdelim}    
        
$(document).ready(function() {ldelim}        
    showHideMaestro($('#pppro_cc_number').val());
{rdelim});
</script>
<form action="" name="pppro_form" id="pppro_form" method="post" class="std">
	<input type="hidden" name="confirm" value="1" />
	<table>
	<tr>
		<td align="left" colspan="2" style="border-top:none;">
                   <h3>{l s='Billing Information - We accept:' mod='paypalpro'}
                    {if $pppro_visa}
                            <img src="{$this_path_ssl}img/visa.gif" alt="{l s='Visa' mod='paypalpro'}" />
                    {/if}
                    {if $pppro_mc}
                            <img src="{$this_path_ssl}img/mc.gif" alt="{l s='Mastercard' mod='paypalpro'}" />
                    {/if}
                    {if $pppro_amex}
                            <img src="{$this_path_ssl}img/amex.gif" alt="{l s='American Express' mod='paypalpro'}" />
                    {/if}
                    {if $pppro_discover}
                            <img src="{$this_path_ssl}img/discover.gif" alt="{l s='Discover' mod='paypalpro'}" />
                    {/if}              
                    </h3>
                </td>
	</tr>
	{if $pppro_cc_err}
	<tr>
		<td align="left" colspan="2">{$pppro_cc_err}</td>
	</tr>
	{/if}
	<tr height="20">
		<td align="left">{l s='First / Last Name' mod='paypalpro'}:	</td>
		<td align="left"><input type="text" size="16" name="pppro_cc_fname" value="{$pppro_cc_fname}" /> / <input type="text" size="16" name="pppro_cc_lname" value="{$pppro_cc_lname}" style="margin:0" /></td>
	</tr>
	{if $pppro_get_address == "1"}
	<tr height="20">
		<td align="left">{l s='Address' mod='paypalpro'}: </td>
		<td align="left"><input type="text" size="35" name="pppro_cc_address" value="{$pppro_cc_address}" /></td>
	</tr>
	<tr height="20">
		<td align="left">{l s='Zipcode' mod='paypalpro'}: </td>
		<td align="left"><input type="text" name="pppro_cc_zip" size="5" value="{$pppro_cc_zip}" /></td>
	</tr>
	<tr height="20">
		<td align="left">{l s='City' mod='paypalpro'}: </td>
		<td align="left"><input type="text" size="35" name="pppro_cc_city" value="{$pppro_cc_city}" /></td>
	</tr>
	<tr height="20">
		<td align="left">{l s='Country' mod='paypalpro'}: </td>
		<td align="left"><select style="width:230px;" id="pppro_id_country" name="pppro_id_country">{$countries_list}</select></td>
	</tr>
	<tr height="20" class="pppro_id_state">
		<td align="left">{l s='State' mod='paypalpro'}: </td>
		<td align="left">
			<select name="pppro_id_state" id="pppro_id_state">
				<option value="">-</option>
			</select>
		</td>
	</tr>
	{/if}
	<tr height="20">
		<td align="left">{l s='Card Number' mod='paypalpro'}: </td>
		<td align="left"><input id="pppro_cc_number" type="text" name="pppro_cc_number" value="{$pppro_cc_number}" onchange="showHideMaestro(document.pppro_form.pppro_cc_number.value);" /></td>
	</tr>        
	<tr height="20">
		<td align="left">{l s='Expiration' mod='paypalpro'}: </td>
		<td align="left">
			{html_select_date prefix='pppro_cc_' month_format='%m' time=$time end_year='+11' display_days=false}
		</td>
	</tr>
	<tr height="20" class="meastro_startdate" style="display:none;" >
		<td align="left">{l s='Start Date' mod='paypalpro'}: </td>
		<td align="left">
			{html_select_date prefix='maestro_' month_format='%m' time=$time_minus end_year='+11' display_days=false}
		</td>
	</tr>        
	<tr height="20" class="meastro_startdate" style="display:none;" >
		<td align="left">{l s='or Issue Number' mod='paypalpro'}: </td>
		<td align="left">
                    <input type="text" name="maestro_issue_number" size="2" value="{$maestro_issue_number}" />
                </td>
	</tr>       

	{if $pppro_get_cvm == "1"}
	<tr height="20">
		<td align="left">{l s='CVN code' mod='paypalpro'}: </td>
		<td align="left"><input type="text" name="pppro_cc_cvm" size="4" value="{$pppro_cc_cvm}" /> {l s='3-4 digit number from the back of your card.' mod='paypalpro'}</td>
	</tr>
	{/if}
	</table>
        {if !$pppro_payment_page}	
	<p>
		<b style="float:left">{l s='The total amount of your order is' mod='paypalpro'}</b>&nbsp;&nbsp;
		<span id="amount_{$currencies.0.id_currency}" class="price">{convertPrice price=$ppp_total}</span>
	</p>
	<p>
		<br /><br />
		<b>{l s='Please confirm your order by clicking \'I confirm my order\'' mod='paypalpro'}.</b>
	</p>
        {/if}
	<p class="cart_navigation">
            {if !$pppro_payment_page}	
                {if $psv >= 1.5}
                    <a href="{$link->getPageLink('order', true, NULL, "step=3")}" class="button_large">{l s='Other payment methods' mod='paypalpro'}</a>
                {else}
                     <a href="{$base_dir_ssl}order.php?step=3" class="button_large">{l s='Other payment methods' mod='paypalpro'}</a>
                {/if}
            {/if}
		<input type="button" onclick="validate(document.pppro_form);" id="pppro_submit" value="{l s='I confirm my order' mod='paypalpro'}" class="exclusive_large" />
	</p>
</form>
{else}
    {* PayPal Hosted Solution functionality *} 
    <iframe name="hss_iframe" border="0" style="border:none" width="100%" height="550px"></iframe>
    <form style="display:none" target="hss_iframe" name="form_iframe"
        method="post"
        {if $pppro_sandbox}
        action="https://securepayments.sandbox.paypal.com/acquiringweb">
        {else}
        action="https://securepayments.paypal.com/cgi-bin/acquiringweb">
        {/if}
        <input type="hidden" name="cmd" value="_hosted-payment">
        <input type="hidden" name="lc" value="{$lang_iso|upper}">
        
        <input type="hidden" name="buyer_email" value="{$cookie->email}">
        <input type="hidden" name="email" value="{$cookie->email}">
        <input type="hidden" name="billing_first_name" value="{$address_delivery->firstname}">
        <input type="hidden" name="billing_last_name" value="{$address_delivery->lastname}">        
        <input type="hidden" name="billing_address1" value="{$address_billing->address1}">
        <input type="hidden" name="billing_address2" value="{$address_billing->address2}">
        <input type="hidden" name="billing_city" value="{$address_billing->city}">
        <input type="hidden" name="billing_country" value="{$billing_country}">
        <input type="hidden" name="billing_state" value="{$billing_state}">
        <input type="hidden" name="billing_zip" value="{$address_delivery->postcode}">
        
        <input type="hidden" name="first_name" value="{$address_delivery->firstname}">                
        <input type="hidden" name="last_name" value="{$address_delivery->lastname}">   
        <input type="hidden" name="address1" value="{$address_delivery->address1}">
        <input type="hidden" name="address2" value="{$address_delivery->address2}">        
        <input type="hidden" name="city" value="{$address_delivery->city}">                
        <input type="hidden" name="country" value="{$delivery_country}">         
        <input type="hidden" name="state" value="{$delivery_state}">                         
        <input type="hidden" name="zip" value="{$address_delivery->postcode}">       
        
        <input type="hidden" name="currency_code" value="{$pppro_currency}">
        <input type="hidden" name="subtotal" value="{$pppro_subtotal}">
        <input type="hidden" name="shipping" value="{$pppro_shipping}">
        <input type="hidden" name="tax" value="{$pppro_taxes}">
        
        <input type="hidden" name="business" value="{$pppro_acc_email}">        
        <input type="hidden" name="paymentaction" value="{$pppro_paymentaction}">
        
        <input type="hidden" name="template" value="templateD">    
        {if isset($pppro_btn_bg_color) && $pppro_btn_bg_color}
        <input type="hidden" name="pageButtonBgColor" value="{$pppro_btn_bg_color}">
        {/if}
        {if isset($pppro_btn_txt_color) && $pppro_btn_txt_color}
        <input type="hidden" name="pageButtonTextColor" value="{$pppro_btn_txt_color}">
        {/if}    
        <input type="hidden" name="showHostedThankyouPage" value="false">
        
        {* In MiniLayout you can customise the subheader text color, the border 
           color, the Pay button color and the Pay button text color.  *}
        
        <input type="hidden" name="notify_url" value="{$notify_file_path}"> 
        <input type="hidden" name="cancel_return" value="{$cancel_file_path}">
        <input type="hidden" name="return" value="{$validation_file_path}"> 
    </form>
    <script type="text/javascript">
   // $(document).ready(function() {ldelim}
        document.form_iframe.submit();
   // {rdelim});
    </script>        
{/if}
</div> <!--- end of id="pppro_payment" class="payment" --->
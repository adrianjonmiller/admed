<div id="adn_payment" class="payment">
{if !$adn_payment_page}
	{capture name=path}{l s='Payment' mod='authorizedotnet'}{/capture}
	{include file="$tpl_dir./breadcrumb.tpl"}
{/if}
{if isset($authorizedotnet_js)}
	{$authorizedotnet_js}
{/if}

{if $adn_payment_page}
<div id="adn_ajax_container"></div>
{/if}


<script type="text/javascript">
//<![CDATA[
adn_idSelectedCountry = {if isset($id_state)}{$id_state|intval}{elseif isset($address->id_state)}{$address->id_state|intval}{else}false{/if};
adn_countries = new Array();
adn_countriesNeedIDNumber = new Array();
{foreach from=$countries item='country'}
	{if isset($country.states) && $country.contains_states}
		adn_countries[{$country.id_country|intval}] = new Array();
		{foreach from=$country.states item='state' name='states'}
			adn_countries[{$country.id_country|intval}].push({ldelim}'id' : '{$state.id_state}', 'name' : '{$state.name|escape:'htmlall':'UTF-8'}'{rdelim});
		{/foreach}
	{/if}
{/foreach}
$(function(){ldelim}
	$('.adn_id_state option[value={if isset($id_state)}{$id_state}{else}{$address->id_state|escape:'htmlall':'UTF-8'}{/if}]').attr('selected', 'selected');
{rdelim});
//]]>
</script>
<style>
.first_line {ldelim} border-top: none!important; {rdelim}
form.std h3 {ldelim}
	margin: none!important;
	border-bottom: none!important;
	padding: none!important;
{rdelim}
{if $adn_payment_page}
	#adn_payment {ldelim}
		{if $adn_psv < 1.5}
			border: 1px solid #595A5E;
		{else}
			border-top: 1px dotted #CCCCCC;
		{/if}
		padding: 20px 10px 20px 0;
		margin: 0 0 0.7em 0.7em;
		overflow: hidden;
	{rdelim}
{/if}
	#adn_payment td {ldelim}
		white-space:nowrap;
	{rdelim}
	
	#adn_payment td.td_input {ldelim}
		padding-left: 20px;
		width:90%;
	{rdelim}
</style>
{if $adn_payment_page}
<script type="text/javascript" src="{$this_path_ssl}js/statesManagement.js"></script>
{/if}
{if !$adn_payment_page}
<h2>{l s='Order summation' mod='authorizedotnet'}</h2>
{assign var='current_step' value='payment'}
{include file="$tpl_dir./order-steps.tpl"}
{/if}

<script type="text/javascript">
var adn_payment_page = {$adn_payment_page};
var ajax_adn_url     = '{$this_path}{$adn_filename}.php';
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
	if (form.adn_cc_fname.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='authorizedotnet'} {l s='First Name' mod='authorizedotnet'}");
		return false;
	{rdelim}
	if (form.adn_cc_lname.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='authorizedotnet'} {l s='Last Name' mod='authorizedotnet'}");
		return false;
	{rdelim}
	if (form.adn_cc_address && form.adn_cc_address.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='authorizedotnet'} {l s='Address' mod='authorizedotnet'}");
		return false;
	{rdelim}
	if (form.adn_cc_city && form.adn_cc_city.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='authorizedotnet'} {l s='City' mod='authorizedotnet'}");
		return false;
	{rdelim}
	if (form.adn_cc_zip && form.adn_cc_zip.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='authorizedotnet'} {l s='Zipcode' mod='authorizedotnet'}");
		return false;
	{rdelim}
	if (form.adn_cc_email && form.adn_cc_email.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='authorizedotnet'} {l s='Email' mod='authorizedotnet'}");
		return false;
	{rdelim}
	if (form.adn_cc_number && (form.adn_cc_number.value == "" || !creditCardValidator.validate(form.adn_cc_number.value)))
	{ldelim}
		alert("{l s='You must enter a valid' mod='authorizedotnet'} {l s='Card Number' mod='authorizedotnet'}");
		return false;
	{rdelim}
	if (form.adn_cc_cvm && form.adn_cc_cvm.value == "")
	{ldelim}
		alert("{l s='You must enter your' mod='authorizedotnet'} {l s='CVM code' mod='authorizedotnet'}");
		return false;
	{rdelim}
	$('#adn_submit').val('{l s='Please Wait' mod='authorizedotnet'}');
	$('#adn_submit').attr('disabled','disabled');
	
	{literal} 
	if (adn_payment_page) {
		$.ajax({
			url: ajax_adn_url,
			type: "post",
			dataType: "html",
			data:$(form).serialize(),
			success: function(strData) {
				
				if (strData.substring(0, 4) == 'url:') {
					window.location = strData.substring(4);
				} else {
					$('#adn_ajax_container').html(strData);
					$('#adn_submit').val('{/literal}{l s='I confirm my order' mod='authorizedotnet'}{literal}');
					$('#adn_submit').attr('disabled',false);
				}
			}
		});
	} else {
		form.submit();
	}
	{/literal} 
{rdelim}
</script>
<form name="adn_form" id="adn_form" method="post" class="std">
	<input type="hidden" name="confirm" value="1" />
	<table>
	<tr>
		<td align="left" colspan="2" class="first_line"><h3>{l s='Billing Information - We Accept:' mod='authorizedotnet'}
			{if $adn_visa}
				<img src="{$this_path_ssl}img/visa.gif" alt="{l s='Visa' mod='authorizedotnet'}" />
			{/if}
			{if $adn_mc}
				<img src="{$this_path_ssl}img/mc.gif" alt="{l s='Mastercard' mod='authorizedotnet'}" />
			{/if}
			{if $adn_amex}
				<img src="{$this_path_ssl}img/amex.gif" alt="{l s='American Express' mod='authorizedotnet'}" />
			{/if}
			{if $adn_discover}
				<img src="{$this_path_ssl}img/discover.gif" alt="{l s='Discover' mod='authorizedotnet'}" />
			{/if}
			{if $adn_jcb}
				<img src="{$this_path_ssl}img/jcb.gif" alt="{l s='JCB' mod='authorizedotnet'}" />
			{/if}
			{if $adn_diners}
				<img src="{$this_path_ssl}img/diners.gif" alt="{l s='Diners' mod='authorizedotnet'}" />
			{/if}
			</h3>
		</td>
	</tr>
	{if $adn_cc_err}
	<tr>
		<td align="left" colspan="2">{$adn_cc_err}</td>
	</tr>
	{/if}
	<tr height="20">
		<td align="left">{l s='First / Last Name' mod='authorizedotnet'}:	</td>
		<td align="left" class="td_input"><input type="text" size="16" name="adn_cc_fname" value="{$adn_cc_fname}" /> / <input type="text" size="16" name="adn_cc_lname" value="{$adn_cc_lname}" style="margin:0" /></td>
	</tr>
	{if $adn_get_address == "1"}
	<tr height="20">
		<td align="left">{l s='Address' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input"><input type="text" size="35" name="adn_cc_address" value="{$adn_cc_address}" /></td>
	</tr>
	<tr height="20">
		<td align="left">{l s='Zipcode' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input"><input type="text" name="adn_cc_zip" size="5" value="{$adn_cc_zip}" /></td>
	</tr>
	<tr height="20">
		<td align="left">{l s='City' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input"><input type="text" size="35" name="adn_cc_city" value="{$adn_cc_city}" /></td>
	</tr>
	<tr height="20">
		<td align="left">{l s='Country' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input"><select style="width:230px;" id="adn_id_country" name="adn_id_country">{$countries_list}</select></td>
	</tr>
	<tr height="20" class="adn_id_state">
		<td align="left">{l s='State' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input">
			<select name="adn_id_state" id="adn_id_state">
				<option value="">-</option>
			</select>
		</td>
	</tr>
	{/if}
	<tr height="20">
		<td align="left">{l s='Card Number' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input"><input type="text" name="adn_cc_number" value="{$adn_cc_number}" /></td>
	</tr>
	<tr height="20">
		<td align="left">{l s='Expiration' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input">
			{html_select_date prefix='adn_cc_' month_format='%m' time=$time end_year='+11' display_days=false}
		</td>
	</tr>
	{if $adn_get_cvm == "1"}
	<tr height="20">
		<td align="left">{l s='CVN code' mod='authorizedotnet'}: </td>
		<td align="left" class="td_input"><input type="text" name="adn_cc_cvm" size="4" value="{$adn_cc_cvm}" /> {l s='3-4 digit number from the back of your card.' mod='authorizedotnet'}</td>
	</tr>
	{/if}
	</table>
{if !$adn_payment_page}	
	<p style="padding:20px 0 10px 0;">
		<b style="float:left">{l s='The total amount of your order is' mod='authorizedotnet'} </b>&nbsp;
		<span id="amount_{$currencies.0.id_currency}" class="price">{convertPrice price=$adn_total}</span>
	</p>
	<p style="padding:10px 0 10px 0;">
		<b>{l s='Please confirm your order by clicking \'I confirm my order\'' mod='authorizedotnet'}.</b>
	</p>
{/if}
	<p class="cart_navigation">
{if !$adn_payment_page}	
		<a href="{$base_dir_ssl}order.php?step=3" class="button_large">{l s='Other payment methods' mod='authorizedotnet'}</a>
{/if}
		<input type="button" onclick="validate(document.adn_form);" id="adn_submit" value="{l s='I confirm my order' mod='authorizedotnet'}" class="exclusive_large" />
	</p>
</form>
</div>
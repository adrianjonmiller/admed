<?php /* Smarty version Smarty-3.1.8, created on 2014-08-19 23:06:17
         compiled from "/home/admedon/public_html/modules/authorizedotnet/views/templates/front/validation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54547533553f410a971b8c3-96307265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd680de1c0d6cfe343380b98c449e0834f7f8a459' => 
    array (
      0 => '/home/admedon/public_html/modules/authorizedotnet/views/templates/front/validation.tpl',
      1 => 1367942921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54547533553f410a971b8c3-96307265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adn_payment_page' => 0,
    'authorizedotnet_js' => 0,
    'id_state' => 0,
    'address' => 0,
    'countries' => 0,
    'country' => 0,
    'state' => 0,
    'adn_psv' => 0,
    'this_path_ssl' => 0,
    'this_path' => 0,
    'adn_filename' => 0,
    'adn_visa' => 0,
    'adn_mc' => 0,
    'adn_amex' => 0,
    'adn_discover' => 0,
    'adn_jcb' => 0,
    'adn_diners' => 0,
    'adn_cc_err' => 0,
    'adn_cc_fname' => 0,
    'adn_cc_lname' => 0,
    'adn_get_address' => 0,
    'adn_cc_address' => 0,
    'adn_cc_zip' => 0,
    'adn_cc_city' => 0,
    'countries_list' => 0,
    'adn_cc_number' => 0,
    'time' => 0,
    'adn_get_cvm' => 0,
    'adn_cc_cvm' => 0,
    'currencies' => 0,
    'adn_total' => 0,
    'base_dir_ssl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53f410a9832d44_34330313',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53f410a9832d44_34330313')) {function content_53f410a9832d44_34330313($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_function_html_select_date')) include '/home/admedon/public_html/tools/smarty/plugins/function.html_select_date.php';
?><div id="adn_payment" class="payment">
<?php if (!$_smarty_tpl->tpl_vars['adn_payment_page']->value){?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Payment','mod'=>'authorizedotnet'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['authorizedotnet_js']->value)){?>
	<?php echo $_smarty_tpl->tpl_vars['authorizedotnet_js']->value;?>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['adn_payment_page']->value){?>
<div id="adn_ajax_container"></div>
<?php }?>


<script type="text/javascript">
//<![CDATA[
adn_idSelectedCountry = <?php if (isset($_smarty_tpl->tpl_vars['id_state']->value)){?><?php echo intval($_smarty_tpl->tpl_vars['id_state']->value);?>
<?php }elseif(isset($_smarty_tpl->tpl_vars['address']->value->id_state)){?><?php echo intval($_smarty_tpl->tpl_vars['address']->value->id_state);?>
<?php }else{ ?>false<?php }?>;
adn_countries = new Array();
adn_countriesNeedIDNumber = new Array();
<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['states'])&&$_smarty_tpl->tpl_vars['country']->value['contains_states']){?>
		adn_countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = new Array();
		<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['states']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value){
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
			adn_countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
].push({'id' : '<?php echo $_smarty_tpl->tpl_vars['state']->value['id_state'];?>
', 'name' : '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['state']->value['name'], 'htmlall', 'UTF-8');?>
'});
		<?php } ?>
	<?php }?>
<?php } ?>
$(function(){
	$('.adn_id_state option[value=<?php if (isset($_smarty_tpl->tpl_vars['id_state']->value)){?><?php echo $_smarty_tpl->tpl_vars['id_state']->value;?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['address']->value->id_state, 'htmlall', 'UTF-8');?>
<?php }?>]').attr('selected', 'selected');
});
//]]>
</script>
<style>
.first_line { border-top: none!important; }
form.std h3 {
	margin: none!important;
	border-bottom: none!important;
	padding: none!important;
}
<?php if ($_smarty_tpl->tpl_vars['adn_payment_page']->value){?>
	#adn_payment {
		<?php if ($_smarty_tpl->tpl_vars['adn_psv']->value<1.5){?>
			border: 1px solid #595A5E;
		<?php }else{ ?>
			border-top: 1px dotted #CCCCCC;
		<?php }?>
		padding: 20px 10px 20px 0;
		margin: 0 0 0.7em 0.7em;
		overflow: hidden;
	}
<?php }?>
	#adn_payment td {
		white-space:nowrap;
	}
	
	#adn_payment td.td_input {
		padding-left: 20px;
		width:90%;
	}
</style>
<?php if ($_smarty_tpl->tpl_vars['adn_payment_page']->value){?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
js/statesManagement.js"></script>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['adn_payment_page']->value){?>
<h2><?php echo smartyTranslate(array('s'=>'Order summation','mod'=>'authorizedotnet'),$_smarty_tpl);?>
</h2>
<?php $_smarty_tpl->tpl_vars['current_step'] = new Smarty_variable('payment', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./order-steps.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<script type="text/javascript">
var adn_payment_page = <?php echo $_smarty_tpl->tpl_vars['adn_payment_page']->value;?>
;
var ajax_adn_url     = '<?php echo $_smarty_tpl->tpl_vars['this_path']->value;?>
<?php echo $_smarty_tpl->tpl_vars['adn_filename']->value;?>
.php';

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


function regIsDigit(fData)
{
	var reg = new RegExp("^[0-9]+$");
	return (reg.test(fData));
}

function validate(form)
{
	if (form.adn_cc_fname.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'First Name','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.adn_cc_lname.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Last Name','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.adn_cc_address && form.adn_cc_address.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Address','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.adn_cc_city && form.adn_cc_city.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'City','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.adn_cc_zip && form.adn_cc_zip.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Zipcode','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.adn_cc_email && form.adn_cc_email.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Email','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.adn_cc_number && (form.adn_cc_number.value == "" || !creditCardValidator.validate(form.adn_cc_number.value)))
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter a valid','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'Card Number','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	if (form.adn_cc_cvm && form.adn_cc_cvm.value == "")
	{
		alert("<?php echo smartyTranslate(array('s'=>'You must enter your','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'CVM code','mod'=>'authorizedotnet'),$_smarty_tpl);?>
");
		return false;
	}
	$('#adn_submit').val('<?php echo smartyTranslate(array('s'=>'Please Wait','mod'=>'authorizedotnet'),$_smarty_tpl);?>
');
	$('#adn_submit').attr('disabled','disabled');
	
	 
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
					$('#adn_submit').val('<?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'authorizedotnet'),$_smarty_tpl);?>
');
					$('#adn_submit').attr('disabled',false);
				}
			}
		});
	} else {
		form.submit();
	}
	 
}
</script>
<form name="adn_form" id="adn_form" method="post" class="std">
	<input type="hidden" name="confirm" value="1" />
	<table>
	<tr>
		<td align="left" colspan="2" class="first_line"><h3><?php echo smartyTranslate(array('s'=>'Billing Information - We Accept:','mod'=>'authorizedotnet'),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->tpl_vars['adn_visa']->value){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/visa.gif" alt="<?php echo smartyTranslate(array('s'=>'Visa','mod'=>'authorizedotnet'),$_smarty_tpl);?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['adn_mc']->value){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/mc.gif" alt="<?php echo smartyTranslate(array('s'=>'Mastercard','mod'=>'authorizedotnet'),$_smarty_tpl);?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['adn_amex']->value){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/amex.gif" alt="<?php echo smartyTranslate(array('s'=>'American Express','mod'=>'authorizedotnet'),$_smarty_tpl);?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['adn_discover']->value){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/discover.gif" alt="<?php echo smartyTranslate(array('s'=>'Discover','mod'=>'authorizedotnet'),$_smarty_tpl);?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['adn_jcb']->value){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/jcb.gif" alt="<?php echo smartyTranslate(array('s'=>'JCB','mod'=>'authorizedotnet'),$_smarty_tpl);?>
" />
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['adn_diners']->value){?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_ssl']->value;?>
img/diners.gif" alt="<?php echo smartyTranslate(array('s'=>'Diners','mod'=>'authorizedotnet'),$_smarty_tpl);?>
" />
			<?php }?>
			</h3>
		</td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['adn_cc_err']->value){?>
	<tr>
		<td align="left" colspan="2"><?php echo $_smarty_tpl->tpl_vars['adn_cc_err']->value;?>
</td>
	</tr>
	<?php }?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'First / Last Name','mod'=>'authorizedotnet'),$_smarty_tpl);?>
:	</td>
		<td align="left" class="td_input"><input type="text" size="16" name="adn_cc_fname" value="<?php echo $_smarty_tpl->tpl_vars['adn_cc_fname']->value;?>
" /> / <input type="text" size="16" name="adn_cc_lname" value="<?php echo $_smarty_tpl->tpl_vars['adn_cc_lname']->value;?>
" style="margin:0" /></td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['adn_get_address']->value=="1"){?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Address','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input"><input type="text" size="35" name="adn_cc_address" value="<?php echo $_smarty_tpl->tpl_vars['adn_cc_address']->value;?>
" /></td>
	</tr>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Zipcode','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input"><input type="text" name="adn_cc_zip" size="5" value="<?php echo $_smarty_tpl->tpl_vars['adn_cc_zip']->value;?>
" /></td>
	</tr>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'City','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input"><input type="text" size="35" name="adn_cc_city" value="<?php echo $_smarty_tpl->tpl_vars['adn_cc_city']->value;?>
" /></td>
	</tr>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Country','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input"><select style="width:230px;" id="adn_id_country" name="adn_id_country"><?php echo $_smarty_tpl->tpl_vars['countries_list']->value;?>
</select></td>
	</tr>
	<tr height="20" class="adn_id_state">
		<td align="left"><?php echo smartyTranslate(array('s'=>'State','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input">
			<select name="adn_id_state" id="adn_id_state">
				<option value="">-</option>
			</select>
		</td>
	</tr>
	<?php }?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Card Number','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input"><input type="text" name="adn_cc_number" value="<?php echo $_smarty_tpl->tpl_vars['adn_cc_number']->value;?>
" /></td>
	</tr>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'Expiration','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input">
			<?php echo smarty_function_html_select_date(array('prefix'=>'adn_cc_','month_format'=>'%m','time'=>$_smarty_tpl->tpl_vars['time']->value,'end_year'=>'+11','display_days'=>false),$_smarty_tpl);?>

		</td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['adn_get_cvm']->value=="1"){?>
	<tr height="20">
		<td align="left"><?php echo smartyTranslate(array('s'=>'CVN code','mod'=>'authorizedotnet'),$_smarty_tpl);?>
: </td>
		<td align="left" class="td_input"><input type="text" name="adn_cc_cvm" size="4" value="<?php echo $_smarty_tpl->tpl_vars['adn_cc_cvm']->value;?>
" /> <?php echo smartyTranslate(array('s'=>'3-4 digit number from the back of your card.','mod'=>'authorizedotnet'),$_smarty_tpl);?>
</td>
	</tr>
	<?php }?>
	</table>
<?php if (!$_smarty_tpl->tpl_vars['adn_payment_page']->value){?>	
	<p style="padding:20px 0 10px 0;">
		<b style="float:left"><?php echo smartyTranslate(array('s'=>'The total amount of your order is','mod'=>'authorizedotnet'),$_smarty_tpl);?>
 </b>&nbsp;
		<span id="amount_<?php echo $_smarty_tpl->tpl_vars['currencies']->value[0]['id_currency'];?>
" class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['adn_total']->value),$_smarty_tpl);?>
</span>
	</p>
	<p style="padding:10px 0 10px 0;">
		<b><?php echo smartyTranslate(array('s'=>'Please confirm your order by clicking \'I confirm my order\'','mod'=>'authorizedotnet'),$_smarty_tpl);?>
.</b>
	</p>
<?php }?>
	<p class="cart_navigation">
<?php if (!$_smarty_tpl->tpl_vars['adn_payment_page']->value){?>	
		<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
order.php?step=3" class="button_large"><?php echo smartyTranslate(array('s'=>'Other payment methods','mod'=>'authorizedotnet'),$_smarty_tpl);?>
</a>
<?php }?>
		<input type="button" onclick="validate(document.adn_form);" id="adn_submit" value="<?php echo smartyTranslate(array('s'=>'I confirm my order','mod'=>'authorizedotnet'),$_smarty_tpl);?>
" class="exclusive_large" />
	</p>
</form>
</div><?php }} ?>
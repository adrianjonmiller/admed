<?php /* Smarty version Smarty-3.1.13, created on 2013-12-22 00:08:15
         compiled from "/home/admedon/public_html/prestashop/modules/nmi/nmi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52705796852ab3113aa18b3-39927580%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ffbc6479110cd07c669d0d6bcd2dfac7be2e8d7' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/nmi/nmi.tpl',
      1 => 1386959475,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52705796852ab3113aa18b3-39927580',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52ab3113c1c852_97122472',
  'variables' => 
  array (
    'module_dir' => 0,
    'isFailed' => 0,
    'cards' => 0,
    'x_invoice_num' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52ab3113c1c852_97122472')) {function content_52ab3113c1c852_97122472($_smarty_tpl) {?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
secure.png" />
<p class="payment_module" >

	<?php if ($_smarty_tpl->tpl_vars['isFailed']->value==1){?>
		<p style="color: red;">
			<?php if (!empty($_GET['message'])){?>
				<?php echo smartyTranslate(array('s'=>'Error detail from NMI : ','mod'=>'nmi'),$_smarty_tpl);?>
<?php echo htmlentities($_GET['message']);?>

			<?php }else{ ?>
				<?php echo smartyTranslate(array('s'=>'Error, please verify the card information','mod'=>'nmi'),$_smarty_tpl);?>

			<?php }?>
		</p>
	<?php }?>

	<form name="nmi_form" id="nmi_form" action="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
validation.php" method="post">
		<span style="border: 1px solid #595A5E;display: block;padding: 1.5em;text-decoration: none;margin-left: 0.7em;">
			<a id="click_nmi" href="#" title="<?php echo smartyTranslate(array('s'=>'Pay with Network Merchants','mod'=>'nmi'),$_smarty_tpl);?>
" style="display: block;text-decoration: none; font-weight: bold;">
				<?php if ($_smarty_tpl->tpl_vars['cards']->value['visa']==1){?><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
cards/visa.gif" alt="<?php echo smartyTranslate(array('s'=>'Visa Logo','mod'=>'nmi'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['cards']->value['mastercard']==1){?><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
cards/mastercard.gif" alt="<?php echo smartyTranslate(array('s'=>'Mastercard Logo','mod'=>'nmi'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['cards']->value['discover']==1){?><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
cards/discover.gif" alt="<?php echo smartyTranslate(array('s'=>'Discover Logo','mod'=>'nmi'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['cards']->value['ax']==1){?><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
cards/ax.gif" alt="<?php echo smartyTranslate(array('s'=>'American Express Logo','mod'=>'nmi'),$_smarty_tpl);?>
" style="vertical-align: middle;" /><?php }?>
				&nbsp;&nbsp;<?php echo smartyTranslate(array('s'=>'Secured credit card payment with NMI','mod'=>'nmi'),$_smarty_tpl);?>

			</a>

				<?php if ($_smarty_tpl->tpl_vars['isFailed']->value==0){?>
						<div id="nmi2"style="display:none">
				<?php }else{ ?>
						<div id="nmi2">
				<?php }?>
				<br /><br />

				<div style="width: 136px; height: 145px; float: left; padding-top:40px; padding-right: 20px; border-right: 1px solid #DDD;">
					<img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
logo_nmi.png" alt="secure payment" />
				</div>
				<div>
				<input type="hidden" name="x_solution_ID" value="A1000006" />
				<input type="hidden" name="x_invoice_num" value="<?php echo $_smarty_tpl->tpl_vars['x_invoice_num']->value;?>
" />

				<label style="margin-top: 4px; margin-left: 35px;display: block;width: 90px;float: left;"><?php echo smartyTranslate(array('s'=>'Full name','mod'=>'nmi'),$_smarty_tpl);?>
</label> <input type="text" name="name" id="fullname" size="30" maxlength="25S" /><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
secure.png" alt="" style="margin-left: 5px;" /><br /><br />

				<label style="margin-top: 4px; margin-left: 35px; display: block;width: 90px;float: left;"><?php echo smartyTranslate(array('s'=>'Card Type','mod'=>'nmi'),$_smarty_tpl);?>
</label>
				<select id="cardType">
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['ax']==1){?><option value="AmEx">American Express</option><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['visa']==1){?><option value="Visa">Visa</option><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['mastercard']==1){?><option value="MasterCard">MasterCard</option><?php }?>
					<?php if ($_smarty_tpl->tpl_vars['cards']->value['discover']==1){?><option value="Discover">Discover</option><?php }?>
				</select>
				<img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
secure.png" alt="" style="margin-left: 5px;" /><br /><br />

				<label style="margin-top: 4px; margin-left: 35px; display: block; width: 90px; float: left;"><?php echo smartyTranslate(array('s'=>'Card number','mod'=>'nmi'),$_smarty_tpl);?>
</label> <input type="text" name="x_card_num" id="cardnum" size="30" maxlength="16" autocomplete="Off" /><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
secure.png" alt="" style="margin-left: 5px;" /><br /><br />
				<label style="margin-top: 4px; margin-left: 35px; display: block; width: 90px; float: left;"><?php echo smartyTranslate(array('s'=>'Expiration date','mod'=>'nmi'),$_smarty_tpl);?>
</label>
				<select id="x_exp_date_m" name="x_exp_date_m" style="width:60px;"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['name'] = 'date_m';
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start'] = (int)01;
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['date_m']['total']);
?>
					<option value="<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['date_m']['index'];?>
"><?php echo $_smarty_tpl->getVariable('smarty')->value['section']['date_m']['index'];?>
</option><?php endfor; endif; ?>
				</select>
				 /
				<select name="x_exp_date_y"><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['name'] = 'date_y';
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start'] = (int)0;
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['loop'] = is_array($_loop=9) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'] = 1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['date_y']['total']);
?>
					<option value="<?php echo date('Y')+$_smarty_tpl->getVariable('smarty')->value['section']['date_y']['index'];?>
"><?php echo date('Y')+$_smarty_tpl->getVariable('smarty')->value['section']['date_y']['index'];?>
</option><?php endfor; endif; ?>
				</select>
				<img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
secure.png" alt="" style="margin-left: 5px;" /><br /><br />
				<label style="margin-top: 4px; margin-left: 35px; display: block; width: 90px;float:left;"><?php echo smartyTranslate(array('s'=>'CVV','mod'=>'nmi'),$_smarty_tpl);?>
</label> <input type="text" name="x_card_code" id="x_card_code" size="4" maxlength="4" /><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
secure.png" alt="" style="margin-left: 5px;"/> <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
help.png" id="cvv_help" title="<?php echo smartyTranslate(array('s'=>'the 3 last digits on the back of your credit card','mod'=>'nmi'),$_smarty_tpl);?>
" alt="" /><br /><br />
			<img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
cvv.png" id="cvv_help_img" alt=""style="display: none;margin-left: 211px;" />
				<input type="button" id="nmisubmit" value="<?php echo smartyTranslate(array('s'=>'Validate order','mod'=>'nmi'),$_smarty_tpl);?>
" style="margin-left: 129px; padding-left: 25px; padding-right: 25px; float: left;" class="button" />
				<br class="clear" />
				</div>
			</div>
		</span>
	</form>
</p>
<script type="text/javascript">
	var mess_error = "<?php echo smartyTranslate(array('s'=>'Please check your credit card information (Credit card type, number and expiration date)','mod'=>'nmi','js'=>1),$_smarty_tpl);?>
";
	var mess_error2 = "<?php echo smartyTranslate(array('s'=>'Please specify your Full Name','mod'=>'nmi','js'=>1),$_smarty_tpl);?>
";
	
		$(document).ready(function(){
			$('#x_exp_date_m').children('option').each(function()
			{
				if ($(this).val() < 10)
				{
					$(this).val('0' + $(this).val());
					$(this).html($(this).val())
				}
			});
			$('#click_nmi').click(function(e){
				e.preventDefault();
				$('#click_nmi').fadeOut("fast",function(){
					$("#nmi2").show();
					$('#click_nmi').fadeIn('fast');
				});
				$('#click_nmi').unbind();
				$('#click_nmi').click(function(e){
					e.preventDefault();
				});
			});

			$('#cvv_help').click(function(){
				$("#cvv_help_img").show();
				$('#cvv_help').unbind();
			});

			$('#nmisubmit').click(function()
				{
				if ($('#fullname').val() == '')
				{
					alert(mess_error2);
				}
				else if (!validateCC($('#cardnum').val(), $('#cardType').val()) || $('#x_card_code').val() == '')
				{
					alert(mess_error);
				}
				else
				{
					$('#nmi_form').submit();
				}
				return false;
			});
		});

	
</script>
<?php }} ?>
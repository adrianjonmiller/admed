<?php /* Smarty version Smarty-3.1.13, created on 2013-12-22 00:35:10
         compiled from "/home/admedon/public_html/prestashop/modules/bluepay/views/templates/admin/_configure/helpers/form/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:124671620852b67a0e07c230-96628843%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5223702b6567681b3fe089d31a094d06f1c3c0b4' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/bluepay/views/templates/admin/_configure/helpers/form/form.tpl',
      1 => 1387690467,
      2 => 'file',
    ),
    'd56fda8954abf2270584bd72cd7a56f6ba3872a8' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin1/themes/default/template/helpers/form/form_group.tpl',
      1 => 1386887323,
      2 => 'file',
    ),
    '88d8701ff067b96464f0ede6702a0fcb8fe7ffdb' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin1/themes/default/template/helpers/form/form_category.tpl',
      1 => 1386887323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124671620852b67a0e07c230-96628843',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'show_toolbar' => 0,
    'toolbar_btn' => 0,
    'toolbar_scroll' => 0,
    'title' => 0,
    'fields' => 0,
    'table' => 0,
    'name_controller' => 0,
    'current' => 0,
    'submit_action' => 0,
    'token' => 0,
    'style' => 0,
    'form_id' => 0,
    'identifier' => 0,
    'f' => 0,
    'fieldset' => 0,
    'key' => 0,
    'field' => 0,
    'input' => 0,
    'fields_value' => 0,
    'contains_states' => 0,
    'languages' => 0,
    'language' => 0,
    'defaultFormLanguage' => 0,
    'value_text' => 0,
    'optiongroup' => 0,
    'option' => 0,
    'field_value' => 0,
    'value' => 0,
    'id_checkbox' => 0,
    'select' => 0,
    'k' => 0,
    'v' => 0,
    'asso_shop' => 0,
    'p' => 0,
    'hookName' => 0,
    'required_fields' => 0,
    'tinymce' => 0,
    'iso' => 0,
    'ad' => 0,
    'firstCall' => 0,
    'vat_number' => 0,
    'allowEmployeeFormLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52b67a0f9acbd3_03363786',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b67a0f9acbd3_03363786')) {function content_52b67a0f9acbd3_03363786($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
?>

<div class="bp-wrapper">
	<a href="http://www.bluepay.com/prestashop-partner-page" target="_blank" class="bp-logo"><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/bluepay.png" alt="BluePay" border="0" /></a>
	<p class="bp-intro"><?php echo smartyTranslate(array('s'=>'When you partner with BluePay, you receive high levels of service and security from a credit card and E-Check processing company that knows the payment industry inside and out.','mod'=>'bluepay'),$_smarty_tpl);?>
<br /><br />
	<a href="http://www.bluepay.com/prestashop-partner-page" target="_blank" class="bp-link"><?php echo smartyTranslate(array('s'=>'Open An Account Now','mod'=>'bluepay'),$_smarty_tpl);?>
</a></p>
	<div class="bp-content">
		<h3><?php echo smartyTranslate(array('s'=>'Enjoy the benefits of BluePay Merchant Credit Card and E-Check Processing:','mod'=>'bluepay'),$_smarty_tpl);?>
</h3>
		<table>
                        <tr>
				<th><?php echo smartyTranslate(array('s'=>'FREE Payment Gateway','mod'=>'bluepay'),$_smarty_tpl);?>
</th>
				<th><?php echo smartyTranslate(array('s'=>'All-in-One Credit Card and E-Check Processing Company','mod'=>'bluepay'),$_smarty_tpl);?>
</th>
			</tr>
			<tr>
				<td>Make quick, secure, efficient payments</td>
				<td><?php echo smartyTranslate(array('s'=>'Eliminate 3rd party gateway hassles','mod'=>'bluepay'),$_smarty_tpl);?>
</td>
			</tr>
			<tr>
                                <th><?php echo smartyTranslate(array('s'=>'Security and Support you can count on','mod'=>'bluepay'),$_smarty_tpl);?>
</th>
                                <th><?php echo smartyTranslate(array('s'=>'Robust Comprehensive Reporting','mod'=>'bluepay'),$_smarty_tpl);?>
</th>
                        </tr>
			<tr>
				<td class="lower">The Only Credit Card and E-Check Payment module partnered with <br>PrestaShop that supports a Secure iframe payment form <br>within your checkout page to reduce your PCI scope</td>
				<td class="lower"><?php echo smartyTranslate(array('s'=>'FREE 24/7 online transaction reporting tool tracking transactions<br> from point of inception to settlement into the bank account of your choice','mod'=>'bluepay'),$_smarty_tpl);?>
</td>
			</tr>
                </table>
		<br /><br />
			<div class="title-center">
				<h3><?php echo smartyTranslate(array('s'=>'Accept Payments in the U.S. and Canada','mod'=>'bluepay'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="bluepay-logos">
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/visa.png" alt="<?php echo smartyTranslate(array('s'=>'Visa Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/mastercard.png" alt="<?php echo smartyTranslate(array('s'=>'MasterCard Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/discover-network.png" alt="<?php echo smartyTranslate(array('s'=>'Discover Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/american-express.png" alt="<?php echo smartyTranslate(array('s'=>'Amex Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/echeck.png" alt="<?php echo smartyTranslate(array('s'=>'E-check Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/diners-club.png" alt="<?php echo smartyTranslate(array('s'=>'Diners Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/jcb.png" alt="<?php echo smartyTranslate(array('s'=>'JCB Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/union-pay.png" alt="<?php echo smartyTranslate(array('s'=>'UnionPay Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/bc-card.png" alt="<?php echo smartyTranslate(array('s'=>'BC Card Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
				<img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/dina-card.png" alt="<?php echo smartyTranslate(array('s'=>'DinaCard Logo','mod'=>'bluepay'),$_smarty_tpl);?>
" style="vertical-align: middle;" />
			</div>
		</div>
	</div>

	<?php if ($_smarty_tpl->tpl_vars['show_toolbar']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate ("toolbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('toolbar_btn'=>$_smarty_tpl->tpl_vars['toolbar_btn']->value,'toolbar_scroll'=>$_smarty_tpl->tpl_vars['toolbar_scroll']->value,'title'=>$_smarty_tpl->tpl_vars['title']->value), 0);?>

		<div class="leadin"></div>
	<?php }?>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['fields']->value['title'])){?><h2><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields']->value['title'], 'htmlall', 'UTF-8');?>
</h2><?php }?>

<form id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['table']->value, 'htmlall', 'UTF-8');?>
_form" class="defaultForm <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['name_controller']->value, 'htmlall', 'UTF-8');?>
" action="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['current']->value, 'htmlall', 'UTF-8');?>
&<?php if (!empty($_smarty_tpl->tpl_vars['submit_action']->value)){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['submit_action']->value, 'htmlall', 'UTF-8');?>
=1<?php }?>&token=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['token']->value, 'htmlall', 'UTF-8');?>
" method="post" enctype="multipart/form-data" <?php if (isset($_smarty_tpl->tpl_vars['style']->value)){?>style="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['style']->value, 'htmlall', 'UTF-8');?>
"<?php }?>>
	<?php if ($_smarty_tpl->tpl_vars['form_id']->value){?>
		<input type="hidden" name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['identifier']->value, 'htmlall', 'UTF-8');?>
" id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['identifier']->value, 'htmlall', 'UTF-8');?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['form_id']->value, 'htmlall', 'UTF-8');?>
" />
	<?php }?>
	<?php  $_smarty_tpl->tpl_vars['fieldset'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldset']->_loop = false;
 $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldset']->key => $_smarty_tpl->tpl_vars['fieldset']->value){
$_smarty_tpl->tpl_vars['fieldset']->_loop = true;
 $_smarty_tpl->tpl_vars['f']->value = $_smarty_tpl->tpl_vars['fieldset']->key;
?>
		<fieldset id="fieldset_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['f']->value, 'htmlall', 'UTF-8');?>
">
			<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['fieldset']->value['form']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['field']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value=='legend'){?>
					<legend>
						<?php if (isset($_smarty_tpl->tpl_vars['field']->value['image'])){?><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['image'], 'htmlall', 'UTF-8');?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['title'], 'htmlall', 'UTF-8');?>
" /><?php }?>
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['title'], 'htmlall', 'UTF-8');?>

					</legend>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='description'&&$_smarty_tpl->tpl_vars['field']->value){?>
					<p class="description"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value, 'htmlall', 'UTF-8');?>
</p>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='input'){?>
					<?php  $_smarty_tpl->tpl_vars['input'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['input']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['input']->key => $_smarty_tpl->tpl_vars['input']->value){
$_smarty_tpl->tpl_vars['input']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='hidden'){?>
							<input type="hidden" name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
" id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
" />
						<?php }else{ ?>
							<?php if ($_smarty_tpl->tpl_vars['input']->value['name']=='id_state'){?>
								<div id="contains_states" <?php if (!$_smarty_tpl->tpl_vars['contains_states']->value){?>style="display:none;"<?php }?>>
							<?php }?>
							
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['label'])){?><label><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['label'], 'htmlall', 'UTF-8');?>
 </label><?php }?>
							
							
								<div class="margin-form">
								
								<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='text'||$_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['lang'])&&$_smarty_tpl->tpl_vars['input']->value['lang']){?>
										<div class="translatable">
											<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
												cape:'htmlall':'UTF-8'div class="lang_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['defaultFormLanguage']->value){?>block<?php }else{ ?>none<?php }?>; float: left;">
													<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>
														
														<script type="text/javascript">
															$().ready(function () {
																var input_id = '<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['id'], 'htmlall', 'UTF-8');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
<?php }?>';
																$('#'+input_id).tagify({addTagPrompt: '<?php echo smartyTranslate(array('s'=>'Add tag','js'=>1),$_smarty_tpl);?>
'});
																$('#<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['table']->value, 'htmlall', 'UTF-8');?>
_form').submit( function() {
																	$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
																});
															});
														</script>
														
													<?php }?>
													<?php $_smarty_tpl->tpl_vars['value_text'] = new Smarty_variable($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']], null, 0);?>
													<input type="text"
															name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
"
															id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['id'], 'htmlall', 'UTF-8');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
<?php }?>"
															value="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['string_format'])&&$_smarty_tpl->tpl_vars['input']->value['string_format']){?><?php echo smarty_modifier_escape(sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value), 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value_text']->value, 'htmlall', 'UTF-8');?>
<?php }?>"
															class="<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>tagify <?php }?><?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['size'])){?>size="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['size'], 'htmlall', 'UTF-8');?>
"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])){?>maxlength="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['maxlength'], 'htmlall', 'UTF-8');?>
"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['readonly'])&&$_smarty_tpl->tpl_vars['input']->value['readonly']){?>readonly="readonly"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled'])&&$_smarty_tpl->tpl_vars['input']->value['disabled']){?>disabled="disabled"<?php }?>
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['input']->value['autocomplete']){?>autocomplete="off"<?php }?> />
													<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['hint'], 'htmlall', 'UTF-8');?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
												</div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>
											
											<script type="text/javascript">
												$().ready(function () {
													var input_id = '<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['id'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
<?php }?>';
													$('#'+input_id).tagify();
													$('#'+input_id).tagify({addTagPrompt: '<?php echo smartyTranslate(array('s'=>'Add tag','mod'=>'bluepay'),$_smarty_tpl);?>
'});
													$('#<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['table']->value, 'htmlall', 'UTF-8');?>
_form').submit( function() {
														$(this).find('#'+input_id).val($('#'+input_id).tagify('serialize'));
													});
												});
											</script>
											
										<?php }?>
										<?php $_smarty_tpl->tpl_vars['value_text'] = new Smarty_variable($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], null, 0);?>
										<input type="text"
												name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
"
												id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['id'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
<?php }?>"
												value="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['string_format'])&&$_smarty_tpl->tpl_vars['input']->value['string_format']){?><?php echo smarty_modifier_escape(sprintf($_smarty_tpl->tpl_vars['input']->value['string_format'],$_smarty_tpl->tpl_vars['value_text']->value), 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value_text']->value, 'htmlall', 'UTF-8');?>
<?php }?>"
												class="<?php if ($_smarty_tpl->tpl_vars['input']->value['type']=='tags'){?>tagify <?php }?><?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['size'])){?>size="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['size'], 'htmlall', 'UTF-8');?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['maxlength'])){?>maxlength="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['maxlength'], 'htmlall', 'UTF-8');?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['readonly'])&&$_smarty_tpl->tpl_vars['input']->value['readonly']){?>readonly="readonly"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled'])&&$_smarty_tpl->tpl_vars['input']->value['disabled']){?>disabled="disabled"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['input']->value['autocomplete']){?>autocomplete="off"<?php }?> />
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['suffix'])){?><a href=# class=help><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_dir']->value, 'htmlall', 'UTF-8');?>
bluepay/img/help.png" alt="help"><div class=test><span><p><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['suffix'], 'htmlall', 'UTF-8');?>
</p></span></div></a><?php }?>
										<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['hint'], 'htmlall', 'UTF-8');?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
									<?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='select'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['options']['query'])&&!$_smarty_tpl->tpl_vars['input']->value['options']['query']&&isset($_smarty_tpl->tpl_vars['input']->value['empty_message'])){?>
										<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['empty_message'], 'htmlall', 'UTF-8');?>

										<?php $_smarty_tpl->createLocalArrayVariable('input', null, 0);
$_smarty_tpl->tpl_vars['input']->value['required'] = smarty_modifier_escape(false, 'htmlall', 'UTF-8');?>
										<?php $_smarty_tpl->createLocalArrayVariable('input', null, 0);
$_smarty_tpl->tpl_vars['input']->value['desc'] = smarty_modifier_escape(null, 'htmlall', 'UTF-8');?>
									<?php }else{ ?>
										<select name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
" class="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"
												id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['id'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
<?php }?>"
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>multiple="multiple" <?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['size'])){?>size="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['size'], 'htmlall', 'UTF-8');?>
"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['onchange'])){?>onchange="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['onchange'], 'htmlall', 'UTF-8');?>
"<?php }?>>
											<?php if (isset($_smarty_tpl->tpl_vars['input']->value['options']['default'])){?>
												<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['options']['default']['value'], 'htmlall', 'UTF-8');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['options']['default']['label'], 'htmlall', 'UTF-8');?>
</option>
											<?php }?>
											<?php if (isset($_smarty_tpl->tpl_vars['input']->value['options']['optiongroup'])){?>
												<?php  $_smarty_tpl->tpl_vars['optiongroup'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['optiongroup']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']['optiongroup']['query']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['optiongroup']->key => $_smarty_tpl->tpl_vars['optiongroup']->value){
$_smarty_tpl->tpl_vars['optiongroup']->_loop = true;
?>
													<optgroup label="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['optiongroup']->value[$_smarty_tpl->tpl_vars['input']->value['options']['optiongroup']['label']], 'htmlall', 'UTF-8');?>
">
														<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['optiongroup']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['query']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
															<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']], 'htmlall', 'UTF-8');?>
"
																<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>
																	<?php  $_smarty_tpl->tpl_vars['field_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->key => $_smarty_tpl->tpl_vars['field_value']->value){
$_smarty_tpl->tpl_vars['field_value']->_loop = true;
?>
																		<?php if ($_smarty_tpl->tpl_vars['field_value']->value==smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']], 'htmlall', 'UTF-8')){?>selected="selected"<?php }?>
																	<?php } ?>
																<?php }else{ ?>
																	<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['id']], 'htmlall', 'UTF-8')){?>selected="selected"<?php }?>
																<?php }?>
															><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['options']['name']], 'htmlall', 'UTF-8');?>
</option>
														<?php } ?>
													</optgroup>
												<?php } ?>
											<?php }else{ ?>
												<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']['query']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
													<?php if (is_object($_smarty_tpl->tpl_vars['option']->value)){?>
														<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']}, 'htmlall', 'UTF-8');?>
"
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>
																<?php  $_smarty_tpl->tpl_vars['field_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->key => $_smarty_tpl->tpl_vars['field_value']->value){
$_smarty_tpl->tpl_vars['field_value']->_loop = true;
?>
																	<?php if ($_smarty_tpl->tpl_vars['field_value']->value==$_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']}){?>
																		selected="selected"
																	<?php }?>
																<?php } ?>
															<?php }else{ ?>
																<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['id']}){?>
																	selected="selected"
																<?php }?>
															<?php }?>
														><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value->{$_smarty_tpl->tpl_vars['input']->value['options']['name']}, 'htmlall', 'UTF-8');?>
</option>
													<?php }elseif($_smarty_tpl->tpl_vars['option']->value=="-"){?>
														<option value="">--</option>
													<?php }else{ ?>
														<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']], 'htmlall', 'UTF-8');?>
"
															<?php if (isset($_smarty_tpl->tpl_vars['input']->value['multiple'])){?>
																<?php  $_smarty_tpl->tpl_vars['field_value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field_value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field_value']->key => $_smarty_tpl->tpl_vars['field_value']->value){
$_smarty_tpl->tpl_vars['field_value']->_loop = true;
?>
																	<?php if ($_smarty_tpl->tpl_vars['field_value']->value==$_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]){?>
																		selected="selected"
																	<?php }?>
																<?php } ?>
															<?php }else{ ?>
																<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['id']]){?>
																	selected="selected"
																<?php }?>
															<?php }?>
														><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['input']->value['options']['name']], 'htmlall', 'UTF-8');?>
</option>

													<?php }?>
												<?php } ?>
											<?php }?>
										</select>
										<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['hint'], 'htmlall', 'UTF-8');?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
									<?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='radio'){?>
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
										<input type="radio"	name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
"id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['id'], 'htmlall', 'UTF-8');?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['value'], 'htmlall', 'UTF-8');?>
"
												<?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']]==$_smarty_tpl->tpl_vars['value']->value['value']){?>checked="checked"<?php }?>
												<?php if (isset($_smarty_tpl->tpl_vars['input']->value['disabled'])&&$_smarty_tpl->tpl_vars['input']->value['disabled']){?>disabled="disabled"<?php }?> />
										<label <?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
"<?php }?> for="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['id'], 'htmlall', 'UTF-8');?>
">
										 <?php if (isset($_smarty_tpl->tpl_vars['input']->value['is_bool'])&&$_smarty_tpl->tpl_vars['input']->value['is_bool']==true){?>
											<?php if ($_smarty_tpl->tpl_vars['value']->value['value']==1){?>
												<img src="../img/admin/enabled.gif" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['label'], 'htmlall', 'UTF-8');?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['label'], 'htmlall', 'UTF-8');?>
" />
											<?php }else{ ?>
												<img src="../img/admin/disabled.gif" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['label'], 'htmlall', 'UTF-8');?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['label'], 'htmlall', 'UTF-8');?>
" />
											<?php }?>
										 <?php }else{ ?>
											<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['label'], 'htmlall', 'UTF-8');?>

										 <?php }?>
										</label>
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['br'])&&$_smarty_tpl->tpl_vars['input']->value['br']){?><br /><?php }?>
										<?php if (isset($_smarty_tpl->tpl_vars['value']->value['p'])&&$_smarty_tpl->tpl_vars['value']->value['p']){?><p><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['p'], 'htmlall', 'UTF-8');?>
</p><?php }?>
									<?php } ?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='textarea'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['lang'])&&$_smarty_tpl->tpl_vars['input']->value['lang']){?>
										<div class="translatable">
											<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
												<div class="lang_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
" id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
" style="display:<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['defaultFormLanguage']->value){?>block<?php }else{ ?>none<?php }?>; float: left;">
													<textarea cols="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['cols'], 'htmlall', 'UTF-8');?>
" rows="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['rows'], 'htmlall', 'UTF-8');?>
" name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['autoload_rte'])&&$_smarty_tpl->tpl_vars['input']->value['autoload_rte']){?>class="rte autoload_rte <?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"<?php }?> ><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']][$_smarty_tpl->tpl_vars['language']->value['id_lang']], 'htmlall', 'UTF-8');?>
</textarea>
												</div>
											<?php } ?>
										</div>
									<?php }else{ ?>
										<textarea name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
" id="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['id'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
<?php }?>" cols="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['cols'], 'htmlall', 'UTF-8');?>
" rows="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['rows'], 'htmlall', 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['autoload_rte'])&&$_smarty_tpl->tpl_vars['input']->value['autoload_rte']){?>class="rte autoload_rte <?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
</textarea>
									<?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='checkbox'){?>
									<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['values']['query']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
										<?php $_smarty_tpl->tpl_vars['id_checkbox'] = new Smarty_variable((($_smarty_tpl->tpl_vars['input']->value['name']).('_')).($_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['input']->value['values']['id']]), null, 0);?>
										<input type="checkbox"
											name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['id_checkbox']->value, 'htmlall', 'UTF-8');?>
"
											id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['id_checkbox']->value, 'htmlall', 'UTF-8');?>
"
											class="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"
											<?php if (isset($_smarty_tpl->tpl_vars['value']->value['val'])){?>value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value['val'], 'htmlall', 'UTF-8');?>
"<?php }?>
											<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value])&&$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]){?>checked="checked"<?php }?> />
										<label for="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['id_checkbox']->value, 'htmlall', 'UTF-8');?>
" class="t"><strong><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value[$_smarty_tpl->tpl_vars['input']->value['values']['name']], 'htmlall', 'UTF-8');?>
</strong></label><br />
									<?php } ?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='file'){?>
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['display_image'])&&$_smarty_tpl->tpl_vars['input']->value['display_image']){?>
										<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['image'])&&$_smarty_tpl->tpl_vars['fields_value']->value['image']){?>
											<div id="image">
												<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value['image'], 'htmlall', 'UTF-8');?>

												<p align="center"><?php echo smartyTranslate(array('s'=>'File size','mod'=>'bluepay'),$_smarty_tpl);?>
 <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value['size'], 'htmlall', 'UTF-8');?>
kb</p>
												<a href="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['current']->value, 'htmlall', 'UTF-8');?>
&<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['identifier']->value, 'htmlall', 'UTF-8');?>
=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['form_id']->value, 'htmlall', 'UTF-8');?>
&token=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['token']->value, 'htmlall', 'UTF-8');?>
&deleteImage=1">
													<img src="../img/admin/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'bluepay'),$_smarty_tpl);?>
" /> <?php echo smartyTranslate(array('s'=>'Delete','mod'=>'bluepay'),$_smarty_tpl);?>

												</a>
											</div><br />
										<?php }?>
									<?php }?>
									<input type="file" name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['id'])){?>id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['id'], 'htmlall', 'UTF-8');?>
"<?php }?> />
									<?php if (!empty($_smarty_tpl->tpl_vars['input']->value['hint'])){?><span class="hint" name="help_box"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['hint'], 'htmlall', 'UTF-8');?>
<span class="hint-pointer">&nbsp;</span></span><?php }?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='password'){?>
									<input type="password"
											name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
"
											size="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['size'], 'htmlall', 'UTF-8');?>
"
											class="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"
											value=""
											<?php if (isset($_smarty_tpl->tpl_vars['input']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['input']->value['autocomplete']){?>autocomplete="off"<?php }?> />
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='birthday'){?>
									<?php  $_smarty_tpl->tpl_vars['select'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['select']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['input']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['select']->key => $_smarty_tpl->tpl_vars['select']->value){
$_smarty_tpl->tpl_vars['select']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['select']->key;
?>
										<select name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['key']->value, 'htmlall', 'UTF-8');?>
" class="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>">
											<option value="">-</option>
											<?php if ($_smarty_tpl->tpl_vars['key']->value=='months'){?>
												
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['select']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
													<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['k']->value, 'htmlall', 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['key']->value]){?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>smarty_modifier_escape($_smarty_tpl->tpl_vars['v']->value, 'htmlall', 'UTF-8')),$_smarty_tpl);?>
</option>
												<?php } ?>
											<?php }else{ ?>
												<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['select']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
													<option value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['v']->value, 'htmlall', 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['v']->value==$_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['key']->value]){?>selected="selected"<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['v']->value, 'htmlall', 'UTF-8');?>
</option>
												<?php } ?>
											<?php }?>

										</select>
									<?php } ?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='group'){?>
									<?php $_smarty_tpl->tpl_vars['groups'] = new Smarty_variable(smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['values'], 'htmlall', 'UTF-8'), null, 0);?>
									<?php /*  Call merged included template "helpers/form/form_group.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_group.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '124671620852b67a0e07c230-96628843');
content_52b67a0f3a90e0_30430111($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_group.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='shop'){?>
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['html'], 'htmlall', 'UTF-8');?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='categories'){?>
									<?php /*  Call merged included template "helpers/form/form_category.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('helpers/form/form_category.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('categories'=>smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['values'], 'htmlall', 'UTF-8')), 0, '124671620852b67a0e07c230-96628843');
content_52b67a0f4866e6_85560049($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "helpers/form/form_category.tpl" */?>
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='categories_select'){?>
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['category_tree'], 'htmlall', 'UTF-8');?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='asso_shop'&&isset($_smarty_tpl->tpl_vars['asso_shop']->value)&&$_smarty_tpl->tpl_vars['asso_shop']->value){?>
										<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['asso_shop']->value, 'htmlall', 'UTF-8');?>

								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='color'){?>
									<input type="color"
										size="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['size'], 'htmlall', 'UTF-8');?>
"
										data-hex="true"
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
"
										<?php }else{ ?>class="color mColorPickerInput"<?php }?>
										name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
"
										class="<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
<?php }?>"
										value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
" />
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='date'){?>
									<input type="text"
										size="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['size'], 'htmlall', 'UTF-8');?>
"
										data-hex="true"
										<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])){?>class="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['class'], 'htmlall', 'UTF-8');?>
"
										<?php }else{ ?>class="datepicker"<?php }?>
										name="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['name'], 'htmlall', 'UTF-8');?>
"
										value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
" />
								<?php }elseif($_smarty_tpl->tpl_vars['input']->value['type']=='free'){?>
									<br /><b><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['input']->value['name']], 'htmlall', 'UTF-8');?>
</b><a href="http://www.prestashop.com/blog/en/guest-blogger-series-prestashop-ssl-installation-troubleshooting/">Click here</a>
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['required'])&&$_smarty_tpl->tpl_vars['input']->value['required']&&$_smarty_tpl->tpl_vars['input']->value['type']!='radio'){?> <sup>*</sup><?php }?>
								
								
									<?php if (isset($_smarty_tpl->tpl_vars['input']->value['desc'])&&!empty($_smarty_tpl->tpl_vars['input']->value['desc'])){?>
										<p class="preference_description">
											<?php if (is_array($_smarty_tpl->tpl_vars['input']->value['desc'])){?>
												<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['input']->value['desc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
													<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)){?>
														<span id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value['id'], 'htmlall', 'UTF-8');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value['text'], 'htmlall', 'UTF-8');?>
</span><br />
													<?php }else{ ?>
														<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value, 'htmlall', 'UTF-8');?>
<br />
													<?php }?>
												<?php } ?>
											<?php }else{ ?>
												<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['input']->value['desc'], 'htmlall', 'UTF-8');?>

											<?php }?>
										</p>
									<?php }?>
								
								<?php if (isset($_smarty_tpl->tpl_vars['input']->value['lang'])&&isset($_smarty_tpl->tpl_vars['languages']->value)){?><div class="clear"></div><?php }?>
								</div>
								<div class="clear"></div>
							
							<?php if ($_smarty_tpl->tpl_vars['input']->value['name']=='id_state'){?>
								</div>
							<?php }?>
						<?php }?>
					<?php } ?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminForm'),$_smarty_tpl);?>

					<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)){?>
						<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo smarty_modifier_escape(ucfirst($_smarty_tpl->tpl_vars['name_controller']->value), 'htmlall', 'UTF-8');?>
Form<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

					<?php }elseif(isset($_GET['controller'])){?>
						<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo smarty_modifier_escape(htmlentities(ucfirst($_GET['controller'])), 'htmlall', 'UTF-8');?>
Form<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

					<?php }?>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='submit'){?>
					<div class="margin-form">
						<input type="submit"
							id="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['id'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['id'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['table']->value, 'htmlall', 'UTF-8');?>
_form_submit_btn<?php }?>"
							value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['title'], 'htmlall', 'UTF-8');?>
"
							name="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['name'])){?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['name'], 'htmlall', 'UTF-8');?>
<?php }else{ ?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['submit_action']->value, 'htmlall', 'UTF-8');?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['stay'])&&$_smarty_tpl->tpl_vars['field']->value['stay']){?>AndStay<?php }?>"
							<?php if (isset($_smarty_tpl->tpl_vars['field']->value['class'])){?>class="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['class'], 'htmlall', 'UTF-8');?>
"<?php }?> />
					</div>
				<?php }elseif($_smarty_tpl->tpl_vars['key']->value=='desc'){?>
					<p class="clear">
						<?php if (is_array($_smarty_tpl->tpl_vars['field']->value)){?>
							<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p']->key;
?>
								<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)){?>
									<span id="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value['id'], 'htmlall', 'UTF-8');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value['text'], 'htmlall', 'UTF-8');?>
</span><br />
								<?php }else{ ?>
									<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['p']->value, 'htmlall', 'UTF-8');?>

									<?php if (isset($_smarty_tpl->tpl_vars['field']->value[$_smarty_tpl->tpl_vars['k']->value+1])){?><br /><?php }?>
								<?php }?>
							<?php } ?>
						<?php }else{ ?>
							<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value, 'htmlall', 'UTF-8');?>

						<?php }?>
					</p>
				<?php }?>
				
			<?php } ?>
			<?php if ($_smarty_tpl->tpl_vars['required_fields']->value){?>
				<div class="small"><sup>*</sup> <?php echo smartyTranslate(array('s'=>'Required field','mod'=>'bluepay'),$_smarty_tpl);?>
</div>
			<?php }?>
		</fieldset>
		
		<?php if (isset($_smarty_tpl->tpl_vars['fields']->value[$_smarty_tpl->tpl_vars['f']->value+1])){?><br /><?php }?>
	<?php } ?>
</form>



<?php if (isset($_smarty_tpl->tpl_vars['tinymce']->value)&&$_smarty_tpl->tpl_vars['tinymce']->value){?>
	<script type="text/javascript">

	var iso = '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['iso']->value, 'htmlall', 'UTF-8');?>
';
	var pathCSS = '<?php echo smarty_modifier_escape(@constant('_THEME_CSS_DIR_'), 'htmlall', 'UTF-8');?>
';
	var ad = '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['ad']->value, 'htmlall', 'UTF-8');?>
';

	$(document).ready(function(){
		
			tinySetup({
				editor_selector :"autoload_rte"
			});
		
	});
	</script>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['firstCall']->value){?>
	<script type="text/javascript">
		var module_dir = '<?php echo smarty_modifier_escape(@constant('_MODULE_DIR_'), 'htmlall', 'UTF-8');?>
';
		var id_language = <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['defaultFormLanguage']->value, 'htmlall', 'UTF-8');?>
;
		var languages = new Array();
		var vat_number = <?php if ($_smarty_tpl->tpl_vars['vat_number']->value){?>1<?php }else{ ?>0<?php }?>;
		// Multilang field setup must happen before document is ready so that calls to displayFlags() to avoid
		// precedence conflicts with other document.ready() blocks
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
			languages[<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['k']->value, 'htmlall', 'UTF-8');?>
] = {
				id_lang: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['id_lang'], 'htmlall', 'UTF-8');?>
,
				iso_code: '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['iso_code'], 'htmlall', 'UTF-8');?>
',
				name: '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['name'], 'htmlall', 'UTF-8');?>
',
				is_default: '<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['language']->value['is_default'], 'htmlall', 'UTF-8');?>
'
			};
		<?php } ?>
		// we need allowEmployeeFormLang var in ajax request
		allowEmployeeFormLang = <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['allowEmployeeFormLang']->value, 'htmlall', 'UTF-8');?>
;
		displayFlags(languages, id_language, allowEmployeeFormLang);

		$(document).ready(function() {
			<?php if (isset($_smarty_tpl->tpl_vars['fields_value']->value['id_state'])){?>
				if ($('#id_country') && $('#id_state'))
				{
					ajaxStates(<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['fields_value']->value['id_state'], 'htmlall', 'UTF-8');?>
);
					$('#id_country').change(function() {
						ajaxStates();
					});
				}
			<?php }?>

			if ($(".datepicker").length > 0)
				$(".datepicker").datepicker({
					prevText: '',
					nextText: '',
					dateFormat: 'yy-mm-dd'
				});

		});
	
	</script>
<?php }?>


	<p class="bp-footer">
		<br />Thank you for choosing BluePay for your processing needs!
	</div>

<?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2013-12-22 00:35:11
         compiled from "/home/admedon/public_html/prestashop/admin1/themes/default/template/helpers/form/form_group.tpl" */ ?>
<?php if ($_valid && !is_callable('content_52b67a0f3a90e0_30430111')) {function content_52b67a0f3a90e0_30430111($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['groups']->value)&&isset($_smarty_tpl->tpl_vars['groups']->value)){?>
<table cellspacing="0" cellpadding="0" class="table" style="width:28em;">
	<tr>
		<th>
			<input type="checkbox" name="checkme" id="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'groupBox[]', this.checked)" />
		</th>
		<th><?php echo smartyTranslate(array('s'=>'ID'),$_smarty_tpl);?>
</th>
		<th><?php echo smartyTranslate(array('s'=>'Group name'),$_smarty_tpl);?>
</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value){
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
		<tr <?php if ($_smarty_tpl->tpl_vars['key']->value%2){?>class="alt_row"<?php }?>>
			<td>
				<?php $_smarty_tpl->tpl_vars['id_checkbox'] = new Smarty_variable((('groupBox').('_')).($_smarty_tpl->tpl_vars['group']->value['id_group']), null, 0);?>
				<input type="checkbox" name="groupBox[]" class="groupBox" id="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id_group'];?>
" <?php if ($_smarty_tpl->tpl_vars['fields_value']->value[$_smarty_tpl->tpl_vars['id_checkbox']->value]){?>checked="checked"<?php }?> />
			</td>
			<td><?php echo $_smarty_tpl->tpl_vars['group']->value['id_group'];?>
</td>
			<td><label for="<?php echo $_smarty_tpl->tpl_vars['id_checkbox']->value;?>
" class="t"><?php echo $_smarty_tpl->tpl_vars['group']->value['name'];?>
</label></td>
		</tr>
	<?php } ?>
</table>
<?php }else{ ?>
<p><?php echo smartyTranslate(array('s'=>'No group created'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.13, created on 2013-12-22 00:35:11
         compiled from "/home/admedon/public_html/prestashop/admin1/themes/default/template/helpers/form/form_category.tpl" */ ?>
<?php if ($_valid && !is_callable('content_52b67a0f4866e6_85560049')) {function content_52b67a0f4866e6_85560049($_smarty_tpl) {?><?php if (!is_callable('smarty_function_implode')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/function.implode.php';
?>
<?php if (count($_smarty_tpl->tpl_vars['categories']->value)&&isset($_smarty_tpl->tpl_vars['categories']->value)){?>
	<script type="text/javascript">
		var inputName = '<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
';
		var use_radio = <?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>1<?php }else{ ?>0<?php }?>;
		var selectedCat = '<?php echo smarty_function_implode(array('value'=>$_smarty_tpl->tpl_vars['categories']->value['selected_cat']),$_smarty_tpl);?>
';
		var selectedLabel = '<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['selected'];?>
';
		var home = '<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['name'];?>
';
		var use_radio = <?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>1<?php }else{ ?>0<?php }?>;
		var use_context = <?php if (isset($_smarty_tpl->tpl_vars['categories']->value['use_context'])){?>1<?php }else{ ?>0<?php }?>;
		$(document).ready(function(){
			buildTreeView(use_context);
		});
	</script>

	<div class="category-filter">
		<span><a href="#" id="collapse_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Collapse All'];?>
</a>
		 |</span>
		 <span><a href="#" id="expand_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Expand All'];?>
</a>
		<?php if (!$_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>
		 |</span>
		 <span></span><a href="#" id="check_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Check All'];?>
</a>
		 |</span>
		 <span></span><a href="#" id="uncheck_all" ><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Uncheck All'];?>
</a></span>
		 <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['categories']->value['use_search']){?>
			<span style="margin-left:20px">
				<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['search'];?>
 :
				<form method="post" id="filternameForm">
					<input type="text" name="search_cat" id="search_cat">
				</form>
			</span>
		<?php }?>
	</div>

	<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(false, null, 0);?>

	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value['selected_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
		<?php if (is_array($_smarty_tpl->tpl_vars['cat']->value)){?>
			<?php if ($_smarty_tpl->tpl_vars['cat']->value['id_category']!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
				<input <?php if (in_array($_smarty_tpl->tpl_vars['cat']->value['id_category'],$_smarty_tpl->tpl_vars['categories']->value['disabled_categories'])){?>disabled="disabled"<?php }?> type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id_category'];?>
" >
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(true, null, 0);?>
			<?php }?>
		<?php }else{ ?>
			<?php if ($_smarty_tpl->tpl_vars['cat']->value!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
				<input <?php if (in_array($_smarty_tpl->tpl_vars['cat']->value,$_smarty_tpl->tpl_vars['categories']->value['disabled_categories'])){?>disabled="disabled"<?php }?> type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['cat']->value;?>
" >
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['home_is_selected'] = new Smarty_variable(true, null, 0);?>
			<?php }?>
		<?php }?>
	<?php } ?>
	<ul id="categories-treeview" class="filetree">
		<li id="<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category'];?>
" class="hasChildren">
			<span class="folder">
				<?php if ($_smarty_tpl->tpl_vars['categories']->value['top_category']->id!=$_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category']){?>
					<input type="<?php if (!$_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>checkbox<?php }else{ ?>radio<?php }?>"
							name="<?php echo $_smarty_tpl->tpl_vars['categories']->value['input_name'];?>
"
							value="<?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['id_category'];?>
"
							<?php if ($_smarty_tpl->tpl_vars['home_is_selected']->value){?>checked<?php }?>
							onclick="clickOnCategoryBox($(this));" />
						<span class="category_label"><?php echo $_smarty_tpl->tpl_vars['categories']->value['trads']['Root']['name'];?>
</span>
				<?php }else{ ?>
					&nbsp;
				<?php }?>
			</span>
			<ul>
				<li><span class="placeholder">&nbsp;</span></li>
		  	</ul>
		</li>
	</ul>
	<?php if ($_smarty_tpl->tpl_vars['categories']->value['use_radio']){?>
	<script type="text/javascript">
		searchCategory();
	</script>
	<?php }?>
<?php }?>
<?php }} ?>
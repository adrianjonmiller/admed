<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 17:40:39
         compiled from "/home/admedon/public_html/prestashop/modules/blockcustomerprivacy/blockcustomerprivacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91210533852aa3b67830985-47998420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4485177f4e5e237bfbadcfc206dfa3a42ce2958a' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/blockcustomerprivacy/blockcustomerprivacy.tpl',
      1 => 1386887131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91210533852aa3b67830985-47998420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'privacy_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa3b67868c69_42576334',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa3b67868c69_42576334')) {function content_52aa3b67868c69_42576334($_smarty_tpl) {?>

<div class="error_customerprivacy" style="color:red;"></div>
<fieldset class="account_creation customerprivacy">
	<h3><?php echo smartyTranslate(array('s'=>'Customer data privacy','mod'=>'blockcustomerprivacy'),$_smarty_tpl);?>
</h3>
	<p class="required">
		<input type="checkbox" value="1" id="customer_privacy" name="customer_privacy" style="float:left;margin: 15px;" />				
	</p>
	<label for="customer_privacy"><?php echo $_smarty_tpl->tpl_vars['privacy_message']->value;?>
</label>		
</fieldset><?php }} ?>
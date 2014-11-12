<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 12:02:12
         compiled from "/home/admedon/public_html/modules/blockcustomerprivacy/blockcustomerprivacy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7420122035409de84babd78-81741261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '272ce579b250d0c6950a39a706af7ae40877e709' => 
    array (
      0 => '/home/admedon/public_html/modules/blockcustomerprivacy/blockcustomerprivacy.tpl',
      1 => 1367907121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7420122035409de84babd78-81741261',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'privacy_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5409de84bb14c7_43366599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5409de84bb14c7_43366599')) {function content_5409de84bb14c7_43366599($_smarty_tpl) {?>

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
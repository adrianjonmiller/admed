<?php /* Smarty version Smarty-3.1.13, created on 2014-05-23 14:14:34
         compiled from "/home/admedon/public_html/prestashop/modules/bluepay/views/templates/hook/refund_capture.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111861862537f900a543873-05449769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e1441132977029a2dce43b9f79c6a7b498d6c72' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/bluepay/views/templates/hook/refund_capture.tpl',
      1 => 1387690467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111861862537f900a543873-05449769',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'transaction_status' => 0,
    'transaction_message' => 0,
    'can_capture' => 0,
    'base_url' => 0,
    'module_name' => 0,
    'params' => 0,
    'can_refund' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_537f900a5de1f2_95753039',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f900a5de1f2_95753039')) {function content_537f900a5de1f2_95753039($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
?>

<br />
<?php if ($_smarty_tpl->tpl_vars['transaction_status']->value=='1'){?>
        <h3><b><font color="green">Message from the BluePay gateway: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['transaction_message']->value, 'htmlall', 'UTF-8');?>
</font></b></h3>
	<br />
<?php }elseif($_smarty_tpl->tpl_vars['transaction_status']->value==='0'||$_smarty_tpl->tpl_vars['transaction_status']->value=='E'){?>
	<h3><b><font color="red">Error: <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['transaction_message']->value, 'htmlall', 'UTF-8');?>
</font></b></h3>
	<br />
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['can_capture']->value){?>
	<fieldset>
        	<legend><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['base_url']->value, 'htmlall', 'UTF-8');?>
modules/<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_name']->value, 'htmlall', 'UTF-8');?>
/logo.png" alt="" /><?php echo smartyTranslate(array('s'=>'BluePay Capture','mod'=>'bluepay'),$_smarty_tpl);?>
</legend>
		<p><b><?php echo smartyTranslate(array('s'=>'Information:','mod'=>'bluepay'),$_smarty_tpl);?>
</b> <?php echo smartyTranslate(array('s'=>'This order has been authorized, but no capture has been processed.','mod'=>'bluepay'),$_smarty_tpl);?>
</b></p>
        	<p><b><?php echo smartyTranslate(array('s'=>'Information:','mod'=>'bluepay'),$_smarty_tpl);?>
</b> <?php echo smartyTranslate(array('s'=>'Funds are ready to be captured before shipping.','mod'=>'bluepay'),$_smarty_tpl);?>
</b></p>
        	<form method="post" action="<?php echo smarty_modifier_escape($_SERVER['REQUEST_URI'], 'htmlall', 'UTF-8');?>
">
                	<input type="hidden" name="id_order" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['params']->value['id_order'], 'htmlall', 'UTF-8');?>
" />
                	<p class="center"><input type="submit" class="button" name="submitBluePayCapture" value="<?php echo smartyTranslate(array('s'=>'Capture the authorization','mod'=>'bluepay'),$_smarty_tpl);?>
" /></p>
        	</form>
	</fieldset>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['can_refund']->value){?>
	</fieldset>
		<legend><img src="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['base_url']->value, 'htmlall', 'UTF-8');?>
modules/<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['module_name']->value, 'htmlall', 'UTF-8');?>
/logo.png" alt="" /><?php echo smartyTranslate(array('s'=>'BluePay Refund','mod'=>'bluepay'),$_smarty_tpl);?>
</legend>
		<p><b><?php echo smartyTranslate(array('s'=>'Information:','mod'=>'bluepay'),$_smarty_tpl);?>
</b> <?php echo smartyTranslate(array('s'=>'Payment has been accepted from customer.','mod'=>'bluepay'),$_smarty_tpl);?>
</b></p>
		<form method="post" action="<?php echo smarty_modifier_escape($_SERVER['REQUEST_URI'], 'htmlall', 'UTF-8');?>
">
			<input type="hidden" name="id_order" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['params']->value['id_order'], 'htmlall', 'UTF-8');?>
" />
			<p class="center">
				<input type="submit" class="button" name="submitBluePayRefund" value="<?php echo smartyTranslate(array('s'=>'Refund total transaction','mod'=>'bluepay'),$_smarty_tpl);?>
" onclick="if (!confirm('<?php echo smartyTranslate(array('s'=>'Are you sure you want to refund this order?','mod'=>'bluepay'),$_smarty_tpl);?>
'))return false;" />
			</p>
		</form>
	</fieldset>
<?php }?>
<?php }} ?>
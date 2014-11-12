<?php /* Smarty version Smarty-3.1.8, created on 2014-08-14 13:54:23
         compiled from "/home/admedon/public_html/modules/authorizedotnet/views/templates/backend/adminOrder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18425324153ecf7cff2b8f6-32423873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8aa011110b695d2cdfb63e0eecd46f0b275dfb4e' => 
    array (
      0 => '/home/admedon/public_html/modules/authorizedotnet/views/templates/backend/adminOrder.tpl',
      1 => 1367942921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18425324153ecf7cff2b8f6-32423873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ps_version' => 0,
    'isCanCapture' => 0,
    'module_basedir' => 0,
    'order_id' => 0,
    'cookie' => 0,
    '_adn_secure_key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53ecf7d0022f88_09381979',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ecf7d0022f88_09381979')) {function content_53ecf7d0022f88_09381979($_smarty_tpl) {?><br />
<fieldset <?php if (($_smarty_tpl->tpl_vars['ps_version']->value<1.5)){?>  style="width: 400px;"  <?php }?>>
	<legend><img src="../modules/authorizedotnet/logo.gif"> <?php echo smartyTranslate(array('s'=>'Authorize Refund Transaction'),$_smarty_tpl);?>
</legend>
	<div id="refund_order_details" <?php if (($_smarty_tpl->tpl_vars['ps_version']->value<1.5)){?>  style="width: 400px;"  <?php }?>>
		
	</div>
</fieldset>

<?php if (($_smarty_tpl->tpl_vars['isCanCapture']->value)){?>
	<br />
	<fieldset <?php if (($_smarty_tpl->tpl_vars['ps_version']->value<1.5)){?>  style="width: 400px;"  <?php }?>>
		<legend><img src="../modules/authorizedotnet/logo.gif"> <?php echo smartyTranslate(array('s'=>'Authorize Capture Transaction'),$_smarty_tpl);?>
</legend>
		<div id="capture_order_details" <?php if (($_smarty_tpl->tpl_vars['ps_version']->value<1.5)){?>  style="width: 400px;"  <?php }?>>
			
		</div>	
	</fieldset>
<?php }?>
	<script type="text/javascript">
		var baseDir = '<?php echo $_smarty_tpl->tpl_vars['module_basedir']->value;?>
';
		function search_orders(type)
		{
			// var type = 2;
			var orderId = <?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
;

			if (type == 1)
			{
				$.ajax({
					type: "POST",
					url: baseDir + "authorizedotnet-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_lang;?>
&id_employee=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_employee;?>
&type="+ type + "&secure_key=<?php echo $_smarty_tpl->tpl_vars['_adn_secure_key']->value;?>
",
					success: function(html){ $("#capture_order_details").html(html); },
					error: function() { alert("ERROR:");  }
				});
			}



			if (type == 2)
			{
				$.ajax({
					type: "POST",
					url: baseDir + "authorizedotnet-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_lang;?>
&id_employee=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_employee;?>
&type="+ type + "&secure_key=<?php echo $_smarty_tpl->tpl_vars['_adn_secure_key']->value;?>
",
					success: function(html){ $("#refund_order_details").html(html); },
					error: function() { alert("ERROR:"); }
				});
			}
		}
	
		$(document).ready(function() {
				search_orders(2);
			<?php if (($_smarty_tpl->tpl_vars['isCanCapture']->value)){?>
				search_orders(1);
			<?php }?>
		});
	</script>
<?php }} ?>
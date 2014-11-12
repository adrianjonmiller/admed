<?php /* Smarty version Smarty-3.1.13, created on 2014-05-23 14:14:34
         compiled from "/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/backend/adminOrder.tpl" */ ?>
<?php /*%%SmartyHeaderCode:314406206537f900a5e5063-64580217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aaa6bda9df69526b90072f53d7c36062e44149b4' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/backend/adminOrder.tpl',
      1 => 1400868458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314406206537f900a5e5063-64580217',
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
    '_pppro_secure_key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_537f900a6331e9_95338970',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f900a6331e9_95338970')) {function content_537f900a6331e9_95338970($_smarty_tpl) {?><br />
<fieldset <?php if (($_smarty_tpl->tpl_vars['ps_version']->value<1.5)){?>  style="width: 400px;"  <?php }?>>
	<legend><img src="../modules/paypalpro/logo.gif"> <?php echo smartyTranslate(array('s'=>'PaypalPro Refund Transaction'),$_smarty_tpl);?>
</legend>
	<div id="refund_order_details" <?php if (($_smarty_tpl->tpl_vars['ps_version']->value<1.5)){?>  style="width: 400px;"  <?php }?>>
		
	</div>
</fieldset>

<?php if (($_smarty_tpl->tpl_vars['isCanCapture']->value)){?>
	<br />
	<fieldset <?php if (($_smarty_tpl->tpl_vars['ps_version']->value<1.5)){?>  style="width: 400px;"  <?php }?>>
		<legend><img src="../modules/paypalpro/logo.gif"> <?php echo smartyTranslate(array('s'=>'PaypalPro Capture Transaction'),$_smarty_tpl);?>
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
					url: baseDir + "paypalpro-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_lang;?>
&id_employee=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_employee;?>
&type="+ type + "&secure_key=<?php echo $_smarty_tpl->tpl_vars['_pppro_secure_key']->value;?>
",
					success: function(html){ $("#capture_order_details").html(html); },
					error: function() { alert("ERROR:");  }
				});
			}



			if (type == 2)
			{
				$.ajax({
					type: "POST",
					url: baseDir + "paypalpro-ajax.php",
					async: true,
					cache: false,
					data: "orderId=" + orderId + "&adminOrder=1&id_lang=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_lang;?>
&id_employee=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_employee;?>
&type="+ type + "&secure_key=<?php echo $_smarty_tpl->tpl_vars['_pppro_secure_key']->value;?>
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
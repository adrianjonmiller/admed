<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:03
         compiled from "/home/admedon/public_html/themes/dilecta/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:459324887540a387bd366c8-77362345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2452624dcde5038dec44fd669ef5b3d44838f88e' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/footer.tpl',
      1 => 1376062468,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '459324887540a387bd366c8-77362345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'page_name' => 0,
    'grid_left' => 0,
    'HOOK_LEFT_COLUMN' => 0,
    'HOOK_FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387bd89af5_26030579',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387bd89af5_26030579')) {function content_540a387bd89af5_26030579($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['content_only']->value){?>



				</div>

							

		<?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable(3, null, 0);?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product'&&Configuration::get('dilecta_width_product')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='search'&&Configuration::get('dilecta_width_search')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='prices-drop'&&Configuration::get('dilecta_width_prices_drop')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='new-products'&&Configuration::get('dilecta_width_new_products')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='best-sales'&&Configuration::get('dilecta_width_best_sales')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='manufacturer'&&Configuration::get('dilecta_width_manufacturer')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='supplier'&&Configuration::get('dilecta_width_supplier')=='1'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

		<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?><?php $_smarty_tpl->tpl_vars['grid_left'] = new Smarty_variable('3 hidden', null, 0);?><?php }?>

								

		<?php if (Configuration::get('dilecta_column_position')=='1'&&Configuration::get('dilecta_general_status')=='1'){?>

		<div id="left_column" class="grid-<?php echo $_smarty_tpl->tpl_vars['grid_left']->value;?>
 float-left">

			<?php echo $_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value;?>


		</div>

		<?php }?>

								

	</section>



	<!-- Footer -->

			

	<footer>



		<div class="set-size clearfix">

		

			<div class="footer-navigation clearfix">

			

					<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>


			

			</div>

			

		</div>

			

	</footer>

			

	<!-- End Footer -->

	

	<div id="toTop"></div>

			

<?php }?>
</body>

</html>

<?php }} ?>
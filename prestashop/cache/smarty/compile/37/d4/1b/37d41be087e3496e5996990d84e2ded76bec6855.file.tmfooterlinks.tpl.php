<?php /* Smarty version Smarty-3.1.13, created on 2014-02-26 23:17:43
         compiled from "/home/admedon/public_html/prestashop/modules/tmfooterlinks/tmfooterlinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:600764010530ebc674355e1-09803379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37d41be087e3496e5996990d84e2ded76bec6855' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/tmfooterlinks/tmfooterlinks.tpl',
      1 => 1393474393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '600764010530ebc674355e1-09803379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'xml' => 0,
    'field1' => 0,
    'home_link' => 0,
    'field3' => 0,
    'field2' => 0,
    'field5' => 0,
    'field4' => 0,
    'field7' => 0,
    'field6' => 0,
    'field9' => 0,
    'field8' => 0,
    'field11' => 0,
    'field10' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_530ebc67495920_13026134',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530ebc67495920_13026134')) {function content_530ebc67495920_13026134($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.date_format.php';
?><div id="tmfooterlinks"> 	
	<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['home_link']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['home_link']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
 $_smarty_tpl->tpl_vars['home_link']->iteration++;
 $_smarty_tpl->tpl_vars['home_link']->last = $_smarty_tpl->tpl_vars['home_link']->iteration === $_smarty_tpl->tpl_vars['home_link']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['links']['last'] = $_smarty_tpl->tpl_vars['home_link']->last;
?>
	<div <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['links']['last']){?> class="last"<?php }?>>
		<h4><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field1']->value};?>
</h4>
		<ul>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field3']->value};?>
"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field2']->value};?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field5']->value};?>
"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field4']->value};?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field7']->value};?>
"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field6']->value};?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field9']->value};?>
"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field8']->value};?>
</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field11']->value};?>
"><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field10']->value};?>
</a></li>
		</ul>
	</div>
	<?php } ?>
	<p>&copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 <?php echo smartyTranslate(array('s'=>'Powered by','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
 <a href="http://www.prestashop.com">PrestaShop</a>&trade;. <?php echo smartyTranslate(array('s'=>'All rights reserved','mod'=>'tmfooterlinks'),$_smarty_tpl);?>
</p>
</div><?php }} ?>
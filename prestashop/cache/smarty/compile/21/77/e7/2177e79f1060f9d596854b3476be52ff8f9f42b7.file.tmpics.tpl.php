<?php /* Smarty version Smarty-3.1.13, created on 2014-02-26 23:17:42
         compiled from "/home/admedon/public_html/prestashop/modules/tmpics/tmpics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1234389902530ebc66de7d18-22490675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2177e79f1060f9d596854b3476be52ff8f9f42b7' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/tmpics/tmpics.tpl',
      1 => 1393474393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1234389902530ebc66de7d18-22490675',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'xml' => 0,
    'home_link' => 0,
    'this_path_tmpics' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_530ebc66e039b6_63427139',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530ebc66e039b6_63427139')) {function content_530ebc66e039b6_63427139($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?>
<div id="tmpics">
<ul>
	<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
?>
	<li>
		<a href="<?php echo $_smarty_tpl->tpl_vars['home_link']->value->url;?>
">
			<img src="<?php echo $_smarty_tpl->tpl_vars['this_path_tmpics']->value;?>
<?php echo $_smarty_tpl->tpl_vars['home_link']->value->img;?>
" alt="" />
		</a>
	</li>
	<?php } ?>
</ul>
</div>
<?php }?><?php }} ?>
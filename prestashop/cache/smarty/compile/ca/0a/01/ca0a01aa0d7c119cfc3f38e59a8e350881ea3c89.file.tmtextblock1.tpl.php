<?php /* Smarty version Smarty-3.1.13, created on 2014-02-26 23:17:43
         compiled from "/home/admedon/public_html/prestashop/modules/tmtextblock1/tmtextblock1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1145591455530ebc674c6198-62929560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca0a01aa0d7c119cfc3f38e59a8e350881ea3c89' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/tmtextblock1/tmtextblock1.tpl',
      1 => 1393474393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1145591455530ebc674c6198-62929560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'xml' => 0,
    'field1' => 0,
    'home_link' => 0,
    'field2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_530ebc674e6c67_01210090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530ebc674e6c67_01210090')) {function content_530ebc674e6c67_01210090($_smarty_tpl) {?><div id="tmtextblock1"> 
	<?php  $_smarty_tpl->tpl_vars['home_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['home_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['xml']->value->link; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['home_link']->key => $_smarty_tpl->tpl_vars['home_link']->value){
$_smarty_tpl->tpl_vars['home_link']->_loop = true;
?>
	<h2><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field1']->value};?>
</h2>
	<h3><?php echo $_smarty_tpl->tpl_vars['home_link']->value->{$_smarty_tpl->tpl_vars['field2']->value};?>
</h3>
	<?php } ?>
</div><?php }} ?>
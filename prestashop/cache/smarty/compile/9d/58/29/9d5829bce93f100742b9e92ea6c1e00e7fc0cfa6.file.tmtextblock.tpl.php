<?php /* Smarty version Smarty-3.1.13, created on 2014-02-26 23:17:43
         compiled from "/home/admedon/public_html/prestashop/modules/tmtextblock/tmtextblock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:164146832530ebc673305e5-45460246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d5829bce93f100742b9e92ea6c1e00e7fc0cfa6' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/tmtextblock/tmtextblock.tpl',
      1 => 1393474393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164146832530ebc673305e5-45460246',
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
  'unifunc' => 'content_530ebc673857b0_45232168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530ebc673857b0_45232168')) {function content_530ebc673857b0_45232168($_smarty_tpl) {?><div id="tmtextblock"> 
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
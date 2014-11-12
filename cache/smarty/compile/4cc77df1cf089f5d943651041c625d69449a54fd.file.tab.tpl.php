<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:02
         compiled from "/home/admedon/public_html/modules/blockblog/tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1955426493540a387ae32eb5-12037429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cc77df1cf089f5d943651041c625d69449a54fd' => 
    array (
      0 => '/home/admedon/public_html/modules/blockblog/tab.tpl',
      1 => 1367907118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1955426493540a387ae32eb5-12037429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockblogcategories' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387ae3a0f3_16852764',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387ae3a0f3_16852764')) {function content_540a387ae3a0f3_16852764($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['blockblogcategories']->value)>0){?>
<li>
	<a href="#idTab999"><?php echo smartyTranslate(array('s'=>'Blog','mod'=>'blockblog'),$_smarty_tpl);?>
</a>
</li>
<?php }?><?php }} ?>
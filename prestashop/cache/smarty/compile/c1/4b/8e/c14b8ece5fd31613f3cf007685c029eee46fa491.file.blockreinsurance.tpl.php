<?php /* Smarty version Smarty-3.1.13, created on 2013-12-13 00:40:30
         compiled from "/home/admedon/public_html/prestashop/modules/blockreinsurance/blockreinsurance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74279001752aa9dceed5976-00948229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c14b8ece5fd31613f3cf007685c029eee46fa491' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/blockreinsurance/blockreinsurance.tpl',
      1 => 1386887135,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74279001752aa9dceed5976-00948229',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'infos' => 0,
    'nbblocks' => 0,
    'module_dir' => 0,
    'info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa9dcef0fee0_52970629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa9dcef0fee0_52970629')) {function content_52aa9dcef0fee0_52970629($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
?>
<?php if (count($_smarty_tpl->tpl_vars['infos']->value)>0){?>
<!-- MODULE Block reinsurance -->
<div id="reinsurance_block" class="clearfix">
	<ul class="width<?php echo $_smarty_tpl->tpl_vars['nbblocks']->value;?>
">	
		<?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value){
$_smarty_tpl->tpl_vars['info']->_loop = true;
?>
			<li><img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
img/<?php echo $_smarty_tpl->tpl_vars['info']->value['file_name'];?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['info']->value['text'], 'html', 'UTF-8');?>
" /> <span><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['info']->value['text'], 'html', 'UTF-8');?>
</span></li>
		<?php } ?>
	</ul>
</div>
<!-- /MODULE Block reinsurance -->
<?php }?><?php }} ?>
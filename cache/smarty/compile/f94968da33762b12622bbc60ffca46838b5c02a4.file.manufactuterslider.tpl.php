<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:23:14
         compiled from "/home/admedon/public_html/modules/manufactuterslider/manufactuterslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2142521637540a37d2f37817-48284235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f94968da33762b12622bbc60ffca46838b5c02a4' => 
    array (
      0 => '/home/admedon/public_html/modules/manufactuterslider/manufactuterslider.tpl',
      1 => 1367993685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2142521637540a37d2f37817-48284235',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'manufacturers' => 0,
    'manufacturer' => 0,
    'link' => 0,
    'img_manu_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a37d300bdc0_12257809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a37d300bdc0_12257809')) {function content_540a37d300bdc0_12257809($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?>

<!-- Block manufacturers  slider module -->

<?php if ($_smarty_tpl->tpl_vars['manufacturers']->value){?>

<section id="carousel0" style="margin-top:20px;">
<h4 class="title_block">Manufacturers</h4>
	<ul class="jcarousel-skin-opencart">

		<?php  $_smarty_tpl->tpl_vars['manufacturer'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['manufacturer']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['manufacturers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['manufacturer']->key => $_smarty_tpl->tpl_vars['manufacturer']->value){
$_smarty_tpl->tpl_vars['manufacturer']->_loop = true;
?>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['manufacturer']->value['link_rewrite']);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['img_manu_dir']->value;?>
<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['manufacturer']->value['id_manufacturer'], 'htmlall', 'UTF-8');?>
-man_default.jpg" class="logo_manufacturer" title="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value['name'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['manufacturer']->value['name'];?>
" width="100" height="100"/></a></li>
		<?php } ?>
	
	</ul>

</section>

<?php }?>

<!-- /Block manufacturers slider module -->
<?php }} ?>
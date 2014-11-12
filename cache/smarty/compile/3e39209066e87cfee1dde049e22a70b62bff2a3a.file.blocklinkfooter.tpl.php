<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:02
         compiled from "/home/admedon/public_html/modules/blocklinkfooter/blocklinkfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2077438081540a387a69f8e2-47907864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e39209066e87cfee1dde049e22a70b62bff2a3a' => 
    array (
      0 => '/home/admedon/public_html/modules/blocklinkfooter/blocklinkfooter.tpl',
      1 => 1367907124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2077438081540a387a69f8e2-47907864',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'title' => 0,
    'blocklinkfooter_links' => 0,
    'lang' => 0,
    'blocklink_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387a6b95c2_23213282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387a6b95c2_23213282')) {function content_540a387a6b95c2_23213282($_smarty_tpl) {?>

<!-- Block links module -->
<div id="links_block_footer" class="block">
		<h4 class="title_block">
		<?php if ($_smarty_tpl->tpl_vars['url']->value){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
		<?php }else{ ?>
			<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

		<?php }?>
		</h4>
		<ul class="block_content bullet">
		<?php  $_smarty_tpl->tpl_vars['blocklink_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blocklink_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocklinkfooter_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blocklink_link']->key => $_smarty_tpl->tpl_vars['blocklink_link']->value){
$_smarty_tpl->tpl_vars['blocklink_link']->_loop = true;
?>
			<?php if (isset($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value])){?> 
			<li><a href="<?php echo htmlentities($_smarty_tpl->tpl_vars['blocklink_link']->value['url']);?>
"<?php if ($_smarty_tpl->tpl_vars['blocklink_link']->value['newWindow']){?> onclick="window.open(this.href);return false;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value];?>
</a></li>
			<?php }?>
		<?php } ?>
		</ul>
</div>
<!-- /Block links module -->
<?php }} ?>
<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:59
         compiled from "/home/admedon/public_html/6/themes/default/mobile/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:180171546452b1f6c7f42012-12917425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c483ab091879daafdf79c36bc21d75d2f860b51' => 
    array (
      0 => '/home/admedon/public_html/6/themes/default/mobile/index.tpl',
      1 => 1387394474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180171546452b1f6c7f42012-12917425',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6c80098b1_74930170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6c80098b1_74930170')) {function content_52b1f6c80098b1_74930170($_smarty_tpl) {?>
	<div data-role="content" id="content">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"DisplayMobileIndex"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- /content -->
<?php }} ?>
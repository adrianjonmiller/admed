<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 16:02:33
         compiled from "/home/admedon/public_html/themes/default/mobile/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:974175193540a16d9b651b8-76906174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5fe51cdd0137c0e793dfe9afeb90c78ef45cc83' => 
    array (
      0 => '/home/admedon/public_html/themes/default/mobile/index.tpl',
      1 => 1367907293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '974175193540a16d9b651b8-76906174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a16d9b6a568_57039711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a16d9b6a568_57039711')) {function content_540a16d9b6a568_57039711($_smarty_tpl) {?>
	<div data-role="content" id="content">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"DisplayMobileIndex"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- /content -->
<?php }} ?>
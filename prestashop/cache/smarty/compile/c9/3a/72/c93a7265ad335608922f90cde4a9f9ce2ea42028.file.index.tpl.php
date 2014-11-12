<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:21
         compiled from "/home/admedon/public_html/prestashop/themes/default/mobile/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15369193352aa39757116e8-06728087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c93a7265ad335608922f90cde4a9f9ce2ea42028' => 
    array (
      0 => '/home/admedon/public_html/prestashop/themes/default/mobile/index.tpl',
      1 => 1386887210,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15369193352aa39757116e8-06728087',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa397571ade2_83662125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa397571ade2_83662125')) {function content_52aa397571ade2_83662125($_smarty_tpl) {?>
	<div data-role="content" id="content">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"DisplayMobileIndex"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getSubTemplate ('./sitemap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div><!-- /content -->
<?php }} ?>
<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:14
         compiled from "/home/admedon/public_html/prestashop/admin/themes/default/template/controllers/translations/auto_translate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214130890852aa396e3ba695-49700045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b4e2c8ce8b352f36c0a58cdc224afb21588adad' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin/themes/default/template/controllers/translations/auto_translate.tpl',
      1 => 1386887323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214130890852aa396e3ba695-49700045',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language_code' => 0,
    'not_available' => 0,
    'tooltip_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa396e3c9984_08089916',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa396e3c9984_08089916')) {function content_52aa396e3c9984_08089916($_smarty_tpl) {?>

<input type="button" class="button" id="translate_all" value="<?php echo smartyTranslate(array('s'=>'Translate with Google (experimental).'),$_smarty_tpl);?>
" />
<script type="text/javascript">
	var gg_translate = {
		language_code : '<?php echo $_smarty_tpl->tpl_vars['language_code']->value;?>
',
		not_available : '<?php echo $_smarty_tpl->tpl_vars['not_available']->value;?>
',
		tooltip_title : '<?php echo $_smarty_tpl->tpl_vars['tooltip_title']->value;?>
'
	};
</script><?php }} ?>
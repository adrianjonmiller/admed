<?php /* Smarty version Smarty-3.1.14, created on 2013-12-18 19:25:44
         compiled from "/home/admedon/public_html/6/admin/themes/default/template/controllers/translations/auto_translate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41945985252b1f6b82e7e14-19089579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a1eefa15b13e0cee4ddea75dbef76327ee41cfd' => 
    array (
      0 => '/home/admedon/public_html/6/admin/themes/default/template/controllers/translations/auto_translate.tpl',
      1 => 1387394213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41945985252b1f6b82e7e14-19089579',
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
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52b1f6b82f7999_11227887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b1f6b82f7999_11227887')) {function content_52b1f6b82f7999_11227887($_smarty_tpl) {?>

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
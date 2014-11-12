<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 22:32:17
         compiled from "/home/admedon/public_html/prestashop/admin/themes/default/template/controllers/not_found/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158616276952aa3971836674-65172599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4f876f8f693fa57e53bfe86d9da8d19658cb44e' => 
    array (
      0 => '/home/admedon/public_html/prestashop/admin/themes/default/template/controllers/not_found/content.tpl',
      1 => 1386887318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158616276952aa3971836674-65172599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'controller' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa39718443a3_07047232',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa39718443a3_07047232')) {function content_52aa39718443a3_07047232($_smarty_tpl) {?>
<h1><?php echo smartyTranslate(array('s'=>'The controller %s is missing or invalid.','sprintf'=>$_smarty_tpl->tpl_vars['controller']->value),$_smarty_tpl);?>
</h1>
<ul>
<li><a href="index.php"><?php echo smartyTranslate(array('s'=>'Go to the dashboard.'),$_smarty_tpl);?>
</a></li>
<li><a href="#" onclick="window.history.back();"><?php echo smartyTranslate(array('s'=>'Back to the previous page.'),$_smarty_tpl);?>
</a></li>
</ul>
<?php }} ?>
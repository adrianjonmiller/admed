<?php /* Smarty version Smarty-3.1.13, created on 2013-12-12 17:40:26
         compiled from "/home/admedon/public_html/prestashop/modules/blocksharefb/blocksharefb.tpl" */ ?>
<?php /*%%SmartyHeaderCode:208285948452aa3b5a49d654-19585460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dba032da1493b2ef0561a010cc10791ff812585f' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/blocksharefb/blocksharefb.tpl',
      1 => 1386887137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208285948452aa3b5a49d654-19585460',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product_link' => 0,
    'product_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa3b5a4d8b87_37598521',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa3b5a4d8b87_37598521')) {function content_52aa3b5a4d8b87_37598521($_smarty_tpl) {?>

<li id="left_share_fb">
	<a href="http://www.facebook.com/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['product_link']->value;?>
&amp;t=<?php echo $_smarty_tpl->tpl_vars['product_title']->value;?>
" class="js-new-window"><?php echo smartyTranslate(array('s'=>'Share on Facebook!','mod'=>'blocksharefb'),$_smarty_tpl);?>
</a>
</li><?php }} ?>
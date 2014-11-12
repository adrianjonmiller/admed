<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:02
         compiled from "/home/admedon/public_html/themes/dilecta/modules/blockpermanentlinks/blockpermanentlinks-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2027620561540a387a3212c6-62766546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd9e3195d170f2e836dee0692203ae891295a0d8' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/modules/blockpermanentlinks/blockpermanentlinks-header.tpl',
      1 => 1368222368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2027620561540a387a3212c6-62766546',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'come_from' => 0,
    'meta_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387a34dfb9_70284548',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387a34dfb9_70284548')) {function content_540a387a34dfb9_70284548($_smarty_tpl) {?>
				<ul class="menu">
				
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'My account','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My account','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
" title="<?php echo smartyTranslate(array('s'=>'contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Contact','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('sitemap');?>
" title="<?php echo smartyTranslate(array('s'=>'sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sitemap','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
					<li><script type="text/javascript">writeBookmarkLink('<?php echo $_smarty_tpl->tpl_vars['come_from']->value;?>
', '<?php echo addslashes(addslashes($_smarty_tpl->tpl_vars['meta_title']->value));?>
', '<?php echo smartyTranslate(array('s'=>'Bookmark','mod'=>'blockpermanentlinks','js'=>1),$_smarty_tpl);?>
');</script></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Log in','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Log in','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
				<li><a href="https://admedonline.com/order" title="<?php echo smartyTranslate(array('s'=>'Checkout','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
" style="font-weight:bold;"><?php echo smartyTranslate(array('s'=>'Checkout','mod'=>'blockpermanentlinks'),$_smarty_tpl);?>
</a></li>
				</ul>
			
				<!-- End Menu -->
<?php }} ?>
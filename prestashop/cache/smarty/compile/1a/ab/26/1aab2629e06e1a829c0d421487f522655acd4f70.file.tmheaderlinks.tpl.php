<?php /* Smarty version Smarty-3.1.13, created on 2014-02-26 23:17:42
         compiled from "/home/admedon/public_html/prestashop/modules/tmheaderlinks/tmheaderlinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:519691316530ebc66751615-38855572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1aab2629e06e1a829c0d421487f522655acd4f70' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/tmheaderlinks/tmheaderlinks.tpl',
      1 => 1393474393,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '519691316530ebc66751615-38855572',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_530ebc667a5444_08236135',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530ebc667a5444_08236135')) {function content_530ebc667a5444_08236135($_smarty_tpl) {?><ul id="tmheaderlinks">
<li id="your_account"><a <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='authentication'||$_smarty_tpl->tpl_vars['page_name']->value=='my-account'){?> class="active"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Your Account','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index');?>
"<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'){?> class="active"<?php }?>><?php echo smartyTranslate(array('s'=>'home','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('cms?id_cms=1');?>
"<?php if (isset($_GET['id_cms'])){?><?php if ($_GET['id_cms']==1){?> class="active"<?php }?><?php }?>><?php echo smartyTranslate(array('s'=>'delivery','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
    <li><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('prices-drop');?>
"<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='prices-drop'){?> class="active"<?php }?>><?php echo smartyTranslate(array('s'=>'specials','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
	<li class="last"><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true);?>
" <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='contact'){?> class="active"<?php }?>><?php echo smartyTranslate(array('s'=>'contact','mod'=>'tmheaderlinks'),$_smarty_tpl);?>
</a></li>
</ul><?php }} ?>
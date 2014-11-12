<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:23:14
         compiled from "/home/admedon/public_html/modules/homepagebanners/homepageresponsivebanners.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1882769958540a37d2e1a272-33724347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51b25b424070bfb17100ea44865dff67c75084b1' => 
    array (
      0 => '/home/admedon/public_html/modules/homepagebanners/homepageresponsivebanners.tpl',
      1 => 1367907139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1882769958540a37d2e1a272-33724347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'background' => 0,
    'images' => 0,
    'image' => 0,
    'content_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a37d2e37893_28472992',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a37d2e37893_28472992')) {function content_540a37d2e37893_28472992($_smarty_tpl) {?>		<!-- Banners -->
		
		<section id="banners">
			
			<?php if ($_smarty_tpl->tpl_vars['background']->value!=1){?>
			<div class="bg-banners"></div>
			<?php }?>
			
			<div class="banners clearfix">
		
				<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
				
				<div class="grid-<?php echo $_smarty_tpl->tpl_vars['image']->value['grid'];?>
 float-left"><?php if (isset($_smarty_tpl->tpl_vars['image']->value['link'])&&$_smarty_tpl->tpl_vars['image']->value['link']){?><a href="<?php echo $_smarty_tpl->tpl_vars['image']->value['link'];?>
"><?php }?><img src="<?php echo $_smarty_tpl->tpl_vars['content_dir']->value;?>
modules/homepagebanners/slides/<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
" style="box-shadow: 0px 0px 1px #aaa;"/><?php if (isset($_smarty_tpl->tpl_vars['image']->value['link'])&&$_smarty_tpl->tpl_vars['image']->value['link']){?></a><?php }?></div>
		
				<?php } ?>
                  	
			</div>
	
		</section>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:03
         compiled from "/home/admedon/public_html/modules/blockcopyright/blockcopyright.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2038790499540a387b178af0-77155961%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e9571fb328c361e43788cb2910548fb27e5ec6e' => 
    array (
      0 => '/home/admedon/public_html/modules/blockcopyright/blockcopyright.tpl',
      1 => 1408586115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2038790499540a387b178af0-77155961',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'payment_status' => 0,
    'image_url' => 0,
    'payment_image' => 0,
    'copyright' => 0,
    'page_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387b192a43_59699878',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387b192a43_59699878')) {function content_540a387b192a43_59699878($_smarty_tpl) {?>
</div>
	

		<!-- Copyright -->
		
		<div class="copyright clearfix">
		
			<?php if (isset($_smarty_tpl->tpl_vars['payment_status']->value)&&$_smarty_tpl->tpl_vars['payment_status']->value==0){?>
			
			<ul>
			
				<li><?php if (isset($_smarty_tpl->tpl_vars['image_url']->value)){?><a href="<?php echo $_smarty_tpl->tpl_vars['image_url']->value;?>
"><?php }?><img src="modules/blockcopyright/<?php echo $_smarty_tpl->tpl_vars['payment_image']->value;?>
" alt="Payment images" /><?php if (isset($_smarty_tpl->tpl_vars['image_url']->value)){?></a><?php }?></li>
			
			</ul>
			
			<?php }?>
						
			<p style="float:left"><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['copyright']->value,'mod'=>'blockcopyright'),$_smarty_tpl);?>
</p>
			<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='index'||$_smarty_tpl->tpl_vars['page_name']->value=='category'){?><p style="float:right"><a href="http://dh42.com/prestashop/prestashop-support/">prestashop support by dh42</a></p><?php }?>
		</div>
		
		<!-- End copyright -->
		
<div><?php }} ?>
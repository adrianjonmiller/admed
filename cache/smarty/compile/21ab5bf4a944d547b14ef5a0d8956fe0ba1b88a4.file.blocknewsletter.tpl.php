<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:03
         compiled from "/home/admedon/public_html/themes/dilecta/modules/blocknewsletter_mod/blocknewsletter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1914537450540a387b138ca1-86688451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21ab5bf4a944d547b14ef5a0d8956fe0ba1b88a4' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/modules/blocknewsletter_mod/blocknewsletter.tpl',
      1 => 1367907315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1914537450540a387b138ca1-86688451',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'nw_error' => 0,
    'link' => 0,
    'value' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387b1733a4_47559861',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387b1733a4_47559861')) {function content_540a387b1733a4_47559861($_smarty_tpl) {?>

<!-- Block Newsletter module-->

<style type="text/css">

	@media only screen and (min-width: 960px) and (max-width: 1160px) {
	
		.inputNew { width:103px !important; }
	
	}

</style>

<div class="block" id="newsletter">
	<h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Newsletter','mod'=>'blocknewsletter_mod'),$_smarty_tpl);?>
</h4>
	<div class="block_content">
	<?php if (isset($_smarty_tpl->tpl_vars['msg']->value)&&$_smarty_tpl->tpl_vars['msg']->value){?>
		<p class="<?php if ($_smarty_tpl->tpl_vars['nw_error']->value){?>warning_inline<?php }else{ ?>success_inline<?php }?>" <?php if ($_smarty_tpl->tpl_vars['nw_error']->value){?>style="color:red"<?php }else{ ?>style="color:green"<?php }?>><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
	<?php }?>
		<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index');?>
#newsletter" method="post" style="padding-top:5px">
			<p>
				
				<input type="text" name="email" size="18" 
					value="<?php if (isset($_smarty_tpl->tpl_vars['value']->value)&&$_smarty_tpl->tpl_vars['value']->value){?><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<?php }else{ ?><?php echo smartyTranslate(array('s'=>'your e-mail','mod'=>'blocknewsletter_mod'),$_smarty_tpl);?>
<?php }?>" 
					onfocus="javascript:if(this.value=='<?php echo smartyTranslate(array('s'=>'your e-mail','mod'=>'blocknewsletter_mod','js'=>1),$_smarty_tpl);?>
')this.value='';" 
					onblur="javascript:if(this.value=='')this.value='<?php echo smartyTranslate(array('s'=>'your e-mail','mod'=>'blocknewsletter_mod','js'=>1),$_smarty_tpl);?>
';" 
					class="inputNew" style="width:153px" />
				<!--<select name="action">
					<option value="0"<?php if (isset($_smarty_tpl->tpl_vars['action']->value)&&$_smarty_tpl->tpl_vars['action']->value==0){?> selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Subscribe','mod'=>'blocknewsletter_mod'),$_smarty_tpl);?>
</option>
					<option value="1"<?php if (isset($_smarty_tpl->tpl_vars['action']->value)&&$_smarty_tpl->tpl_vars['action']->value==1){?> selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>'Unsubscribe','mod'=>'blocknewsletter_mod'),$_smarty_tpl);?>
</option>
				</select>-->
					<input type="submit" value="ok" class="button_mini" name="submitNewsletter" />
				<input type="hidden" name="action" value="0" />
			</p>
		</form>
		
		<p class="newsletter_info" style="padding-top:15px"><?php echo smartyTranslate(array('s'=>'Sign up to newsletter and be on time with our news.','mod'=>'blocknewsletter_mod'),$_smarty_tpl);?>
</p>
		
	</div>
</div>
<!-- /Block Newsletter module-->
<?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2014-08-25 07:35:47
         compiled from "/home/admedon/public_html/themes/dilecta/password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172310205953fb1f93d521d2-30934710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b4df9a3085b13ec5de9d2269026ec216612eed0' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/password.tpl',
      1 => 1367907286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172310205953fb1f93d521d2-30934710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'confirmation' => 0,
    'request_uri' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_53fb1f93d9da71_31900535',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fb1f93d9da71_31900535')) {function content_53fb1f93d9da71_31900535($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Authentication'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Authentication'),$_smarty_tpl);?>
</a><span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo smartyTranslate(array('s'=>'Forgot your password'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1><?php echo smartyTranslate(array('s'=>'Forgot your password?'),$_smarty_tpl);?>
</h1>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value==1){?>
<p class="success"><?php echo smartyTranslate(array('s'=>'Your password has been successfully reset and a confirmation has been sent to your e-mail address:'),$_smarty_tpl);?>
 <?php echo stripslashes(smarty_modifier_escape($_POST['email'], 'htmlall', 'UTF-8'));?>
</p>
<?php }elseif(isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value==2){?>
<p class="success"><?php echo smartyTranslate(array('s'=>'A confirmation e-mail has been sent to your address:'),$_smarty_tpl);?>
 <?php echo stripslashes(smarty_modifier_escape($_POST['email'], 'htmlall', 'UTF-8'));?>
</p>
<?php }else{ ?>
<p><?php echo smartyTranslate(array('s'=>'Please enter the e-mail address used to register. We will send your new password to that address.'),$_smarty_tpl);?>
</p>
<form action="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['request_uri']->value, 'htmlall', 'UTF-8');?>
" method="post" class="std" id="form_forgotpassword">
	<fieldset>
		<p class="text">
			<label for="email"><?php echo smartyTranslate(array('s'=>'E-mail:'),$_smarty_tpl);?>
</label>
			<input type="text" id="email" name="email" value="<?php if (isset($_POST['email'])){?><?php echo stripslashes(smarty_modifier_escape($_POST['email'], 'htmlall', 'UTF-8'));?>
<?php }?>" />
		</p>
		<p class="submit">
			<input type="submit" class="button" value="<?php echo smartyTranslate(array('s'=>'Retrieve Password'),$_smarty_tpl);?>
" />
		</p>
	</fieldset>
</form>
<?php }?>
<p class="clear">
	<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication',true);?>
" title="<?php echo smartyTranslate(array('s'=>'Return to Login'),$_smarty_tpl);?>
" rel="nofollow"><img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/my-account.gif" alt="<?php echo smartyTranslate(array('s'=>'Return to Login'),$_smarty_tpl);?>
" class="icon" /></a><a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('authentication');?>
" title="<?php echo smartyTranslate(array('s'=>'Back to Login'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Back to Login'),$_smarty_tpl);?>
</a>
</p>
<?php }} ?>
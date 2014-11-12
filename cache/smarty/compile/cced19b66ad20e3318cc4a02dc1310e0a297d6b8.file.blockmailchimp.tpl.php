<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:02
         compiled from "/home/admedon/public_html/modules/mailchimp/blockmailchimp.tpl" */ ?>
<?php /*%%SmartyHeaderCode:913147885540a387a690a20-33120510%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cced19b66ad20e3318cc4a02dc1310e0a297d6b8' => 
    array (
      0 => '/home/admedon/public_html/modules/mailchimp/blockmailchimp.tpl',
      1 => 1367907141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '913147885540a387a690a20-33120510',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'signup_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387a697ed1_85456137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387a697ed1_85456137')) {function content_540a387a697ed1_85456137($_smarty_tpl) {?><!-- Block Mailchimp module-->
<div id="mailchimp_block_left" class="block">
    <h4><?php echo smartyTranslate(array('s'=>'Newsletter','mod'=>'mailchimp'),$_smarty_tpl);?>
</h4>
    <div class="block_content">
        <p><?php echo smartyTranslate(array('s'=>'Sign up for our newsletter and get the latest updates !','mod'=>'mailchimp'),$_smarty_tpl);?>
</p>

        <form action="<?php echo $_smarty_tpl->tpl_vars['signup_link']->value;?>
" method="post" target="_blank" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" novalidate>
            <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
            <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </form>
    </div>
</div>
<!-- /Block Mailchimp module-->
<?php }} ?>
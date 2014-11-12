<?php /* Smarty version Smarty-3.1.13, created on 2014-05-23 14:14:11
         compiled from "/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/hook/confirmation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:579382129537f8ff397ba90-96428091%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5d8e852c3e8488ddfc9b4fb3514ff2b9083a2f0' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/paypalpro/views/templates/hook/confirmation.tpl',
      1 => 1400868458,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '579382129537f8ff397ba90-96428091',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop_name' => 0,
    'base_dir_ssl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_537f8ff39cb059_40434245',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f8ff39cb059_40434245')) {function content_537f8ff39cb059_40434245($_smarty_tpl) {?><p><?php echo smartyTranslate(array('s'=>'Your order on','mod'=>'paypalpro'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</span> <?php echo smartyTranslate(array('s'=>'is complete.','mod'=>'paypalpro'),$_smarty_tpl);?>

	<br /><br />
	<?php echo smartyTranslate(array('s'=>'You have chosen the Credit Card method.','mod'=>'paypalpro'),$_smarty_tpl);?>

	<br /><br /><span class="bold"><?php echo smartyTranslate(array('s'=>'Your order will be sent very soon.','mod'=>'paypalpro'),$_smarty_tpl);?>
</span>
	<br /><br /><?php echo smartyTranslate(array('s'=>'For any questions or for further information, please contact our','mod'=>'paypalpro'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
contact-form.php"><?php echo smartyTranslate(array('s'=>'customer support','mod'=>'paypalpro'),$_smarty_tpl);?>
</a>.
</p>
<?php }} ?>
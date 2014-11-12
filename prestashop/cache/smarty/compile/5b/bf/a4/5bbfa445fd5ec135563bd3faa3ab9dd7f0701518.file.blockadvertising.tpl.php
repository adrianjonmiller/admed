<?php /* Smarty version Smarty-3.1.13, created on 2013-12-13 00:40:30
         compiled from "/home/admedon/public_html/prestashop/modules/blockadvertising/blockadvertising.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53685457052aa9dceda93a3-22121273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bbfa445fd5ec135563bd3faa3ab9dd7f0701518' => 
    array (
      0 => '/home/admedon/public_html/prestashop/modules/blockadvertising/blockadvertising.tpl',
      1 => 1386887128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53685457052aa9dceda93a3-22121273',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'adv_link' => 0,
    'adv_title' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52aa9dcedc7f15_53841050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52aa9dcedc7f15_53841050')) {function content_52aa9dcedc7f15_53841050($_smarty_tpl) {?>

<!-- MODULE Block advertising -->
<div class="advertising_block">
	<a href="<?php echo $_smarty_tpl->tpl_vars['adv_link']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['image']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['adv_title']->value;?>
" width="155"  height="163" /></a>
</div>
<!-- /MODULE Block advertising -->
<?php }} ?>
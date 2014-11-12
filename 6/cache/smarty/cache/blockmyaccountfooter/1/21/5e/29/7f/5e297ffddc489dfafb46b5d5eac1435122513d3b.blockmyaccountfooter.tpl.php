<?php /*%%SmartyHeaderCode:1159069734537f8e01778e31-47449007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e297ffddc489dfafb46b5d5eac1435122513d3b' => 
    array (
      0 => '/home/admedon/public_html/6/themes/default/modules/blockmyaccountfooter/blockmyaccountfooter.tpl',
      1 => 1387394480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1159069734537f8e01778e31-47449007',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_537f8e017ff2b9_34590228',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f8e017ff2b9_34590228')) {function content_537f8e017ff2b9_34590228($_smarty_tpl) {?>
<!-- Block myaccount module -->
<div class="block myaccount">
	<p class="title_block"><a href="http://admedonline.com/6/index.php?controller=my-account" title="Manage your customer account" rel="nofollow">My account</a></p>
	<div class="block_content">
		<ul class="bullet">
			<li><a href="http://admedonline.com/6/index.php?controller=history" title="My orders" rel="nofollow">My orders</a></li>
						<li><a href="http://admedonline.com/6/index.php?controller=order-slip" title="My credit slips" rel="nofollow">My credit slips</a></li>
			<li><a href="http://admedonline.com/6/index.php?controller=addresses" title="My addresses" rel="nofollow">My addresses</a></li>
			<li><a href="http://admedonline.com/6/index.php?controller=identity" title="Manage your personal information" rel="nofollow">My personal info</a></li>
						
		</ul>
		<p class="logout"><a href="http://admedonline.com/6/index.php?mylogout" title="Sign out" rel="nofollow">Sign out</a></p>
	</div>
</div>
<!-- /Block myaccount module -->
<?php }} ?>
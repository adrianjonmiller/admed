<?php /*%%SmartyHeaderCode:100553121537f8e006fa247-69031233%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '192356f58f707ccb2e80604b75b3b7ddd8bec200' => 
    array (
      0 => '/home/admedon/public_html/6/themes/default/modules/blockcategories/blockcategories.tpl',
      1 => 1387394479,
      2 => 'file',
    ),
    '880ab90adf8564cf0170549b5170409e0b8f4c8a' => 
    array (
      0 => '/home/admedon/public_html/6/themes/default/modules/blockcategories/category-tree-branch.tpl',
      1 => 1387394479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100553121537f8e006fa247-69031233',
  'variables' => 
  array (
    'isDhtml' => 0,
    'blockCategTree' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_537f8e007ab2b1_63759746',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537f8e007ab2b1_63759746')) {function content_537f8e007ab2b1_63759746($_smarty_tpl) {?>
<!-- Block categories module -->
<div id="categories_block_left" class="block">
	<p class="title_block">Categories</p>
	<div class="block_content">
		<ul class="tree dhtml">
									
<li >
	<a href="http://admedonline.com/6/index.php?id_category=3&amp;controller=category" 		title="Now that you can buy movies from the iTunes Store and sync them to your iPod, the whole world is your theater.">iPods</a>
	</li>

												
<li >
	<a href="http://admedonline.com/6/index.php?id_category=4&amp;controller=category" 		title="Wonderful accessories for your iPod">Accessories</a>
	</li>

												
<li class="last">
	<a href="http://admedonline.com/6/index.php?id_category=5&amp;controller=category" 		title="The latest Intel processor, a bigger hard drive, plenty of memory, and even more new features all fit inside just one liberating inch. The new Mac laptops have the performance, power, and connectivity of a desktop computer. Without the desk part.">Laptops</a>
	</li>

							</ul>
		
		<script type="text/javascript">
		// <![CDATA[
			// we hide the tree only if JavaScript is activated
			$('div#categories_block_left ul.dhtml').hide();
		// ]]>
		</script>
	</div>
</div>
<!-- /Block categories module -->
<?php }} ?>
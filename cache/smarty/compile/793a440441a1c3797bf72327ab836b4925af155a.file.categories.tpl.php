<?php /* Smarty version Smarty-3.1.8, created on 2014-09-03 02:57:23
         compiled from "/home/admedon/public_html/modules/blockblog/categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2193911135406bbd3279dd2-30494493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '793a440441a1c3797bf72327ab836b4925af155a' => 
    array (
      0 => '/home/admedon/public_html/modules/blockblog/categories.tpl',
      1 => 1367907118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2193911135406bbd3279dd2-30494493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'count_all' => 0,
    'categories' => 0,
    'blockblogurlrewrite_on' => 0,
    'base_dir' => 0,
    'category' => 0,
    'paging' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5406bbd3311684_80722295',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5406bbd3311684_80722295')) {function content_5406bbd3311684_80722295($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
<?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h2><?php echo $_smarty_tpl->tpl_vars['meta_title']->value;?>
</h2>


<div style="margin-top:10px;border:1px solid #CCCCCC;padding:5px">
<?php if ($_smarty_tpl->tpl_vars['count_all']->value>0){?>

<div class="toolbar-top">
			
	<div class="sortTools" style="margin-bottom: 10px;">
		<ul class="actions">
			<li class="frst">
					<strong><?php echo smartyTranslate(array('s'=>'Categories','mod'=>'blockblog'),$_smarty_tpl);?>
  ( <span id="count_items_top" style="color: #333;"><?php echo $_smarty_tpl->tpl_vars['count_all']->value;?>
</span> )</strong>
			</li>
		</ul>
	</div>

</div>


<div id="list_reviews" class="productsBox1">

<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
	<table cellspacing="0" cellpadding="0" border="0" width="100%" class="productsTable compareTableNew">
		<tbody>
			<tr class="line1">
			<td class="info">
				
				<table width="100%">
					<tr>
					
						<td style="background:none;border-bottom:none;text-align: left;width:100%;">
							<h3>
							<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['seo_url'];?>
" 
						   	  			 title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value['title'], 'htmlall', 'UTF-8');?>
">
										<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value['title'], 'htmlall', 'UTF-8');?>

									</a>
							<?php }else{ ?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-category.php?category_id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" 
						   	  			 title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value['title'], 'htmlall', 'UTF-8');?>
">
										<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value['title'], 'htmlall', 'UTF-8');?>

									</a>
							<?php }?>
								</h3>
						</td>
					</tr>
				</table>
				
				
				<br/><br/>
				
				
				<span class="foot_center">
				<?php echo $_smarty_tpl->tpl_vars['category']->value['time_add'];?>
, &nbsp;
				<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['seo_url'];?>
" 
					   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value['title'], 'htmlall', 'UTF-8');?>
">
						<?php echo $_smarty_tpl->tpl_vars['category']->value['count_posts'];?>
 <?php echo smartyTranslate(array('s'=>'posts','mod'=>'blockblog'),$_smarty_tpl);?>

				</a>
				<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-category.php?category_id=<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" 
					   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['category']->value['title'], 'htmlall', 'UTF-8');?>
">
						<?php echo $_smarty_tpl->tpl_vars['category']->value['count_posts'];?>
 <?php echo smartyTranslate(array('s'=>'posts','mod'=>'blockblog'),$_smarty_tpl);?>

				</a>
				<?php }?>
				</span>
				<br/>
				
			</td>
			</tr>
		</tbody>
	</table>
<?php } ?>
</div>


<div class="toolbar-bottom">
			
	<div class="sortTools" id="show">
		
		<ul style="margin-left: 38%;">
			<li style="border: medium none; padding: 0pt;">	
			
			<table class="toolbar">
			<tbody>
			<tr class="pager">
				<td id="page_nav" class="pages">
					<?php echo $_smarty_tpl->tpl_vars['paging']->value;?>

				</td>
			</tr>
			</tbody>
	</table>
</li>
		</ul>
		
			</div>

		</div>
<?php }else{ ?>
	<div style="padding:10px;text-align:center;font-weight:bold">
	<?php echo smartyTranslate(array('s'=>'There are not category yet','mod'=>'blockblog'),$_smarty_tpl);?>

	</div>
<?php }?>

</div>


<script type="text/javascript">
function go_page_blog_cat(page){
	
	$('#list_reviews').css('opacity',0.5);
	$.post(baseDir + 'modules/blockblog/ajax.php', {
		action:'pagenavblogcat',
		page : page
	}, 
	function (data) {
		if (data.status == 'success') {
		
		$('#list_reviews').css('opacity',1);
		
		$('#list_reviews').html('');
		$('#list_reviews').prepend(data.params.content);
		
		$('#page_nav').html('');
		$('#page_nav').prepend(data.params.page_nav);
		
		
		
	    } else {
			$('#list_reviews').css('opacity',1);
			alert(data.message);
		}
		
	}, 'json');

}

</script>

<?php }} ?>
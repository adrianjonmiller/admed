<?php /* Smarty version Smarty-3.1.8, created on 2014-09-03 22:58:17
         compiled from "/home/admedon/public_html/modules/blockblog/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2660992205407d549c1e478-41320779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7ddfd730c6d77731093119464aa387aa562450e' => 
    array (
      0 => '/home/admedon/public_html/modules/blockblog/category.tpl',
      1 => 1367907118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2660992205407d549c1e478-41320779',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'count_all' => 0,
    'posts' => 0,
    'post' => 0,
    'blockblogurlrewrite_on' => 0,
    'base_dir' => 0,
    'category_item' => 0,
    'paging' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5407d549d04181_63514284',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5407d549d04181_63514284')) {function content_5407d549d04181_63514284($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
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
					<strong><?php echo smartyTranslate(array('s'=>'Posts','mod'=>'blockblog'),$_smarty_tpl);?>
  ( <span id="count_items_top" style="color: #333;"><?php echo $_smarty_tpl->tpl_vars['count_all']->value;?>
</span> )</strong>
			</li>
		</ul>
	</div>

</div>


<div id="list_reviews" class="productsBox1">
<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
	<table cellspacing="0" cellpadding="0" border="0" width="100%" class="productsTable compareTableNew">
		<tbody>
			<tr class="line1">
			<td class="info">
				
				<table width="100%">
					<tr>
					<?php if (strlen($_smarty_tpl->tpl_vars['post']->value['img'])>0){?>
						<td style="background:none;border-bottom:none">
						<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['seo_url'];?>
" 
						   	   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
						<?php }else{ ?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-post.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" 
						   	   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
						<?php }?>   	   
								<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
upload/blockblog/<?php echo $_smarty_tpl->tpl_vars['post']->value['img'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
" 
									 alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
"
							    	 style="float:left;width:100px" />
							</a>
						
						</td>
					<?php }?>
						<td style="background:none;border-bottom:none;text-align: left;<?php if (strlen($_smarty_tpl->tpl_vars['post']->value['img'])==0){?> width:100%<?php }else{ ?> width:80%<?php }?>">
							<h3>
							<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
								<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['seo_url'];?>
" 
						   	  			 title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
										<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>

									</a>
							<?php }else{ ?>
									<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-post.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" 
						   	  			 title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
										<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>

									</a>
							<?php }?>
								</h3>
						</td>
					</tr>
				</table>
				
				
				<p class="commentbody_center">
				<?php echo substr($_smarty_tpl->tpl_vars['post']->value['content'],0,140);?>

				<?php if (strlen($_smarty_tpl->tpl_vars['post']->value['content'])>140){?>...<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['seo_url'];?>
" 
					   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
				
				<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-post.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" 
					   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
				<?php }?>
						<?php echo smartyTranslate(array('s'=>'more','mod'=>'blockblog'),$_smarty_tpl);?>

				</a>
				<br/><br/>
				<?php if (isset($_smarty_tpl->tpl_vars['post']->value['category_ids'][0]['title'])){?>
				<span class="foot_center">
				<?php echo smartyTranslate(array('s'=>'Posted in','mod'=>'blockblog'),$_smarty_tpl);?>

				
				<?php  $_smarty_tpl->tpl_vars['category_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value['category_ids']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['category_item']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['category_item']->iteration=0;
 $_smarty_tpl->tpl_vars['category_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['category_item']->key => $_smarty_tpl->tpl_vars['category_item']->value){
$_smarty_tpl->tpl_vars['category_item']->_loop = true;
 $_smarty_tpl->tpl_vars['category_item']->iteration++;
 $_smarty_tpl->tpl_vars['category_item']->index++;
 $_smarty_tpl->tpl_vars['category_item']->first = $_smarty_tpl->tpl_vars['category_item']->index === 0;
 $_smarty_tpl->tpl_vars['category_item']->last = $_smarty_tpl->tpl_vars['category_item']->iteration === $_smarty_tpl->tpl_vars['category_item']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['catItemLoop']['first'] = $_smarty_tpl->tpl_vars['category_item']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['catItemLoop']['last'] = $_smarty_tpl->tpl_vars['category_item']->last;
?>
				   <?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
				   <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/category/<?php echo $_smarty_tpl->tpl_vars['category_item']->value['seo_url'];?>
"
					   title="<?php echo $_smarty_tpl->tpl_vars['category_item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['category_item']->value['title'];?>

					</a>
				   <?php }else{ ?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-category.php?category_id=<?php echo $_smarty_tpl->tpl_vars['category_item']->value['id'];?>
"
					   title="<?php echo $_smarty_tpl->tpl_vars['category_item']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['category_item']->value['title'];?>

					</a>
				   <?php }?>
					<?php if (count($_smarty_tpl->tpl_vars['post']->value['category_ids'])>1){?>
					<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['catItemLoop']['first']){?>,&nbsp;<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['catItemLoop']['last']){?>&nbsp;<?php }else{ ?>,&nbsp;<?php }?>
					<?php }else{ ?>
					
					<?php }?>
					
				<?php } ?>
				</span>
				<br/><br/>
				<?php }?>
				
				<span class="foot_center">
				<?php echo $_smarty_tpl->tpl_vars['post']->value['time_add'];?>
, &nbsp;
				<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/post/<?php echo $_smarty_tpl->tpl_vars['post']->value['seo_url'];?>
" 
					   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
				
				<?php }else{ ?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-post.php?post_id=<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
" 
					   title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
">
				<?php }?>	
						<?php echo $_smarty_tpl->tpl_vars['post']->value['count_comments'];?>
 <?php echo smartyTranslate(array('s'=>'comments','mod'=>'blockblog'),$_smarty_tpl);?>

				</a>
				
				</span>
				<br/>
				</p>
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
	<?php echo smartyTranslate(array('s'=>'There are not posts yet','mod'=>'blockblog'),$_smarty_tpl);?>

	</div>
<?php }?>

</div>

<script type="text/javascript">
function go_page_blog(page,item_id){
	
	$('#list_reviews').css('opacity',0.5);
	$.post(baseDir+'modules/blockblog/ajax.php', {
		action:'pagenav',
		page : page,
		item_id : item_id
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
<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:23:15
         compiled from "/home/admedon/public_html/modules/blockblog/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2134593539540a37d3034d58-40597730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7a6bdb79e6ec8062ebf803ac8bb0ff010bee4d5' => 
    array (
      0 => '/home/admedon/public_html/modules/blockblog/home.tpl',
      1 => 1367907118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2134593539540a37d3034d58-40597730',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockblogposition_cat' => 0,
    'blockblogis_ps15' => 0,
    'blockblogurlrewrite_on' => 0,
    'base_dir' => 0,
    'module_dir' => 0,
    'blockblogcategories' => 0,
    'items' => 0,
    'blog' => 0,
    'blockblogposition_post' => 0,
    'blockblogposts' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a37d30cf989_60109978',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a37d30cf989_60109978')) {function content_540a37d30cf989_60109978($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.date_format.php';
?>
<?php if ($_smarty_tpl->tpl_vars['blockblogposition_cat']->value=="home"){?>

	<div class="block blockmanufacturer" <?php if ($_smarty_tpl->tpl_vars['blockblogis_ps15']->value==0){?>style="margin-top:10px"<?php }?>>
		<h4 style="text-align:center">
		<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog"
			   title="<?php echo smartyTranslate(array('s'=>'Blog Categories','mod'=>'blockblog'),$_smarty_tpl);?>
"
				><?php echo smartyTranslate(array('s'=>'Blog Categories','mod'=>'blockblog'),$_smarty_tpl);?>
</a>
		<?php }else{ ?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
blockblog-categories.php"
			   title="<?php echo smartyTranslate(array('s'=>'Blog Categories','mod'=>'blockblog'),$_smarty_tpl);?>
"
				><?php echo smartyTranslate(array('s'=>'Blog Categories','mod'=>'blockblog'),$_smarty_tpl);?>
</a>
				
		<?php }?>
		</h4>
		<div class="block_content">
		<?php if (count($_smarty_tpl->tpl_vars['blockblogcategories']->value)>0){?>
	    <ul class="bullet">
	    <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blockblogcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
	    	<?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['blog']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['blog']->iteration=0;
 $_smarty_tpl->tpl_vars['blog']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value){
$_smarty_tpl->tpl_vars['blog']->_loop = true;
 $_smarty_tpl->tpl_vars['blog']->iteration++;
 $_smarty_tpl->tpl_vars['blog']->index++;
 $_smarty_tpl->tpl_vars['blog']->first = $_smarty_tpl->tpl_vars['blog']->index === 0;
 $_smarty_tpl->tpl_vars['blog']->last = $_smarty_tpl->tpl_vars['blog']->iteration === $_smarty_tpl->tpl_vars['blog']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['blog']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['blog']->last;
?>
	    	
	    	<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?>">
	    		<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
	    		<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/category/<?php echo $_smarty_tpl->tpl_vars['blog']->value['seo_url'];?>
" 
	    		   title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
</a>
	    		<?php }else{ ?>
	    		<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-category.php?category_id=<?php echo $_smarty_tpl->tpl_vars['blog']->value['id'];?>
" 
	    		   title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
</a>
	    		<?php }?>
	    		
	    	</li>
	    	<?php } ?>
	    <?php } ?>
	    </ul>
	    
	    <?php }else{ ?>
		<div style="padding:10px">
			<?php echo smartyTranslate(array('s'=>'There are not Categories yet.','mod'=>'blockblog'),$_smarty_tpl);?>

		</div>
		<?php }?>
		</div>
	</div>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['blockblogposition_post']->value=="home"){?>

	<div class="block blockmanufacturer blockblog-block" <?php if ($_smarty_tpl->tpl_vars['blockblogis_ps15']->value==0){?>style="margin-top:10px"<?php }?>>
		<h4 style="text-align:center;font-size:12px">
			<?php echo smartyTranslate(array('s'=>'Blog Posts recents','mod'=>'blockblog'),$_smarty_tpl);?>

		</h4>
		<div class="block_content">
		<?php if (count($_smarty_tpl->tpl_vars['blockblogposts']->value)>0){?>
	    <ul>
	     <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blockblogposts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
	    	<?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['blog']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['blog']->iteration=0;
 $_smarty_tpl->tpl_vars['blog']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value){
$_smarty_tpl->tpl_vars['blog']->_loop = true;
 $_smarty_tpl->tpl_vars['blog']->iteration++;
 $_smarty_tpl->tpl_vars['blog']->index++;
 $_smarty_tpl->tpl_vars['blog']->first = $_smarty_tpl->tpl_vars['blog']->index === 0;
 $_smarty_tpl->tpl_vars['blog']->last = $_smarty_tpl->tpl_vars['blog']->iteration === $_smarty_tpl->tpl_vars['blog']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['blog']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['blog']->last;
?>
	    	
	    	<li style="margin-top:5px">
	    		<table width="100%">
	    				<tr>
	    					<td align="center" <?php if (strlen($_smarty_tpl->tpl_vars['blog']->value['img'])>0){?>style="width:20%"<?php }?>>
	    					<?php if (strlen($_smarty_tpl->tpl_vars['blog']->value['img'])>0){?>
	    					<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
	    						<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/post/<?php echo $_smarty_tpl->tpl_vars['blog']->value['seo_url'];?>
" 
	    		  				title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
">
	    					<?php }else{ ?>
	    						<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-post.php?post_id=<?php echo $_smarty_tpl->tpl_vars['blog']->value['id'];?>
" 
	    		  				title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
">
	    		  			<?php }?>
	    						<img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
upload/blockblog/<?php echo $_smarty_tpl->tpl_vars['blog']->value['img'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
" style="height:45px" />
	    						</a>
	    					<?php }?>
	    					</td>
	    					<td>
	    						<table width="100%">
	    							<tr>
	    								<td align="left">
	    								<?php if ($_smarty_tpl->tpl_vars['blockblogurlrewrite_on']->value==1){?>
	    								<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
blog/post/<?php echo $_smarty_tpl->tpl_vars['blog']->value['seo_url'];?>
" 
		    		  						   title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
"><b><?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
</b></a>
	    								<?php }else{ ?>
	    									<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-post.php?post_id=<?php echo $_smarty_tpl->tpl_vars['blog']->value['id'];?>
" 
		    		  						   title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
"><b><?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
</b></a>
		    		  					<?php }?>
		    		  					<div style="padding:5px">
		    		  					<?php echo substr(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['blog']->value['content']),0,90);?>
<?php if (strlen($_smarty_tpl->tpl_vars['blog']->value['content'])>90){?>...<?php }?>
		    		  					</div>
	    								</td>
	    							</tr>
	    							<tr>
	    								<td align="right"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['blog']->value['time_add']);?>
</td>
	    							</tr>
	    						</table>
		    					
	    					</td>
	    				</tr>
	    		</table>
	    		
	    	</li>
	    	<?php } ?>
	    <?php } ?>
	    </ul>
	    <?php }else{ ?>
		<div style="padding:10px">
			<?php echo smartyTranslate(array('s'=>'There are not Posts yet.','mod'=>'blockblog'),$_smarty_tpl);?>

		</div>
		<?php }?>
		</div>
	</div>

<?php }?>
<?php }} ?>
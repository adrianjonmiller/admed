<?php /* Smarty version Smarty-3.1.8, created on 2014-09-04 21:56:05
         compiled from "/home/admedon/public_html/modules/blockblog/post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1780529159540918351fa561-01792226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f3b082d0327de76b0d7ad7c3b11a53bfc56eb78' => 
    array (
      0 => '/home/admedon/public_html/modules/blockblog/post.tpl',
      1 => 1367907118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1780529159540918351fa561-01792226',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meta_title' => 0,
    'posts' => 0,
    'post' => 0,
    'base_dir' => 0,
    'is_active' => 0,
    'category_data' => 0,
    'category_item' => 0,
    'blockblogurlrewrite_on' => 0,
    'module_dir' => 0,
    'count_all' => 0,
    'comments' => 0,
    'comment' => 0,
    'paging' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540918352f1f75_09803448',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540918352f1f75_09803448')) {function content_540918352f1f75_09803448($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/admedon/public_html/tools/smarty/plugins/modifier.escape.php';
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
<div class="blog-post-item">

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
					
						    <img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
upload/blockblog/<?php echo $_smarty_tpl->tpl_vars['post']->value['img'];?>
" alt="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>
" 
							    style="float:left;width:100px" />
					
					</td>
				<?php }?>
					<td style="background:none;border-bottom:none;text-align: left;<?php if (strlen($_smarty_tpl->tpl_vars['post']->value['img'])==0){?> width:100% <?php }else{ ?> width:80%<?php }?>">
						<h3>
								<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['post']->value['title'], 'htmlall', 'UTF-8');?>

						</h3>
					</td>
				</tr>
			</table>
			
			
				<p class="commentbody_center">
				<?php echo $_smarty_tpl->tpl_vars['post']->value['content'];?>

				<br/><br/>
				
				<?php if ($_smarty_tpl->tpl_vars['is_active']->value==1){?>
				<span class="foot_center">
				<?php echo smartyTranslate(array('s'=>'Posted in','mod'=>'blockblog'),$_smarty_tpl);?>

				<?php  $_smarty_tpl->tpl_vars['category_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
					<?php if (isset($_smarty_tpl->tpl_vars['category_item']->value['title'])){?>
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
					<?php }?>
					
					<?php }?>
				<?php } ?>
				</span>
				<br/><br/>
				<?php }?>
				
					<div class="share-buttons-blockblog">

				<!-- Place this tag where you want the +1 button to render -->
				<g:plusone size="small" href="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" 
						   count="false"></g:plusone>
				
				<!-- Place this tag after the last plusone tag -->
				
				<script type="text/javascript">
				  (function() {
				    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				    po.src = 'https://apis.google.com/js/plusone.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
				
				
					<a href="http://twitter.com/?status=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
 : http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" rel="nofollow" target="_blank" title="Twitter">
					       <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323517.png" alt="Twitter">
					</a>
					<a href="http://www.facebook.com/share.php?u=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" rel="nofollow" target="_blank" title="Facebook">
					      <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323398.png" alt="Facebook">
					</a>
					<a href="http://www.myspace.com/Modules/PostTo/Pages/?u=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" rel="nofollow" target="_blank" title="MySpace">
					       <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323442.png" alt="MySpace">
					</a>
					<a href="https://www.google.com/bookmarks/mark?op=add&amp;bkmk=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
&amp;title=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
" rel="nofollow" target="_blank" title="Google Bookmarks">
					      <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1293027456.png" alt="Google Bookmarks">
					</a>
					<a href="http://bookmarks.yahoo.com/toolbar/savebm?opener=tb&amp;u=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
&amp;t=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
" rel="nofollow" target="_blank" title="Yahoo! Bookmarks">
					       <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1293094139.png" alt="Yahoo! Bookmarks">
					</a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
&amp;title=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
" rel="nofollow" target="_blank" title="LinkedIn">
					       <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323420.png" alt="LinkedIn">
					</a>
					<a href="http://www.mixx.com/submit?page_url=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" rel="nofollow" target="_blank" title="Mixx">
					       <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323430.png" alt="Mixx">
					</a>
					<a href="http://reddit.com/submit?url=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
&amp;title=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
" rel="nofollow" target="_blank" title="Reddit">
					      <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323468.png" alt="Reddit">
					</a>
					<a href="http://www.stumbleupon.com/submit?url=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
&amp;title=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
" rel="nofollow" target="_blank" title="StumbleUpon">
						   <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323491.png" alt="StumbleUpon">
					</a>
						<a href="http://digg.com/submit?phase=2&amp;url=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" rel="nofollow" target="_blank" title="Digg">
					       <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323357.png" alt="Digg">
					</a>
					<a href="http://del.icio.us/post?url=http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" rel="nofollow" target="_blank" title="Del.icio.us">
					       <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
/i/share/1292323295.png" alt="Del.icio.us">
					</a>
				</div>	
			
			
				
				<span class="foot_center" style="float:left;margin-left:10px" ><?php echo $_smarty_tpl->tpl_vars['post']->value['time_add'];?>
</span>
				<div style="clear:both"></div>
				<br/>
				</p>
			</td>
			</tr>
		</tbody>
	</table>
<?php } ?>


<?php if ($_smarty_tpl->tpl_vars['count_all']->value>0){?> 
<div class="blog-block-comments">

<div class="toolbar-top">
			
	<div style="margin-bottom: 10px;" class="sortTools">
		<ul class="actions">
			<li class="frst">
					<strong><?php echo smartyTranslate(array('s'=>'Comments','mod'=>'blockblog'),$_smarty_tpl);?>
  ( <span style="color: rgb(51, 51, 51);" id="count_items_top"><?php echo $_smarty_tpl->tpl_vars['count_all']->value;?>
</span> )</strong>
			</li>
		</ul>
	</div>

</div>

<div id="blog-list-comments">
<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
<table class="prfb-table-reviews">
	<tr>
		<td class="prfb-left">
			<div class="prfb-name"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['comment']->value['name'], 'htmlall', 'UTF-8');?>
</div>
			<br/>
			<span class="prfb-time"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['comment']->value['time_add'], 'htmlall', 'UTF-8');?>
</span>
			<br/>
		</td>
		<td class="prfb-right">
			<div class="rvTxt">
				<p><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['comment']->value['comment'], 'htmlall', 'UTF-8');?>
</p>
			</div>
		</td>
	</tr>
</table>
<?php } ?>
</div>

<div class="toolbar-bottom">
			
	<div id="show" class="sortTools">
		
		<ul style="margin-left: 38%;">
			<li style="border: medium none; padding: 0pt;">	
			
			<table class="toolbar">
				<tbody>
				<tr class="pager">
					<td class="pages" id="page_nav">
						<?php echo $_smarty_tpl->tpl_vars['paging']->value;?>

					</td>
				</tr>
				</tbody>
			</table>
			</li>
		</ul>
		
	</div>

</div>

</div>

<?php }?>


<?php if ($_smarty_tpl->tpl_vars['post']->value['is_comments']==0){?>
<div style="padding:10px;text-align:center;font-weight:bold">
	<?php echo smartyTranslate(array('s'=>'Comments are Closed for this post','mod'=>'blockblog'),$_smarty_tpl);?>

</div>
<?php }else{ ?>
<div id="succes-review">
<?php echo smartyTranslate(array('s'=>'Your comment  has been sent successfully. Thanks for comment!','mod'=>'blockblog'),$_smarty_tpl);?>
						
</div>

<div id="add-review-form">
	<div class="title-rev" id="idTab666-my">
		<div style="float:left">
		<?php echo smartyTranslate(array('s'=>'Add Comment','mod'=>'blockblog'),$_smarty_tpl);?>

		</div>
		
		<div style="clear:both"></div>
	</div>
	<table>
		<tr>
			<td class="form-left"><?php echo smartyTranslate(array('s'=>'Name:','mod'=>'blockblog'),$_smarty_tpl);?>
<span style="color:#EB340A">*</span></td>
			<td class="form-right">
				<input type="text" name="name-review"
					   id="name-review"  
					   style="margin-left:0px;width:80%" 
					   />
			</td>
		</tr>	
		<tr>
			<td class="form-left"><?php echo smartyTranslate(array('s'=>'Email:','mod'=>'blockblog'),$_smarty_tpl);?>
<span style="color:#EB340A">*</span></td>
			<td class="form-right">
				<input type="text" name="email-review"
					   id="email-review"  
					   style="margin-left:0px;width:80%" 
					   />
			</td>
		</tr>
		<tr>
			<td class="form-left"><?php echo smartyTranslate(array('s'=>'Message:','mod'=>'blockblog'),$_smarty_tpl);?>
<span style="color:#EB340A">*</span></td>
			<td class="form-right">
				<textarea style="margin-left:0px;width:80%;height:120px"
						  id="text-review"
						  name="text-review" cols="42" rows="7"></textarea>
			</td>
		</tr>
		<tr>
			<td class="form-left">&nbsp;</td>
			<td class="form-right">
				<a href="javascript:void(0)" class="greenBtnBig" onclick="add_comment(<?php echo $_smarty_tpl->tpl_vars['post']->value['id'];?>
)"
				   style="margin:5px auto 0;width:180px" >
					<b><?php echo smartyTranslate(array('s'=>'Add Comment','mod'=>'blockblog'),$_smarty_tpl);?>
</b>
				</a>
			</td>
		</tr>
	</table>
</div>

<?php }?>

</div>


</div>



<script type="text/javascript">



function go_page_blog_comments(page,item_id){
	
	$('#blog-list-comments').css('opacity',0.5);
	$.post(baseDir+'modules/blockblog/ajax.php', {
		action:'pagenavcomments',
		page : page,
		item_id : item_id
	}, 
	function (data) {
		if (data.status == 'success') {
		
		$('#blog-list-comments').css('opacity',1);
		
		$('#blog-list-comments').html('');
		$('#blog-list-comments').prepend(data.params.content);
		
		$('#page_nav').html('');
		$('#page_nav').prepend(data.params.page_nav);
		
		
		
	    } else {
			$('#blog-list-comments').css('opacity',1);
			alert(data.message);
		}
		
	}, 'json');

}


function trim(str) {
	   str = str.replace(/(^ *)|( *$)/,"");
	   return str;
	   }

function add_comment(id_post){
	
	
	var _name_review = $('#name-review').val();
	var _email_review = $('#email-review').val();
	var _text_review = $('#text-review').val();

	//clear errors
	$('#name-review').removeClass('error_testimonials_form');
	$('#email-review').removeClass('error_testimonials_form');
	$('#text-review').removeClass('error_testimonials_form');
	
	if(trim(_name_review).length == 0){
		$('#name-review').addClass('error_testimonials_form');
		alert("<?php echo smartyTranslate(array('s'=>'Please, enter the Name.','mod'=>'blockblog'),$_smarty_tpl);?>
");
		return;
	}
	
	if(trim(_email_review).length == 0){
		$('#email-review').addClass('error_testimonials_form');
		alert("<?php echo smartyTranslate(array('s'=>'Please, enter the Email.','mod'=>'blockblog'),$_smarty_tpl);?>
");
		return;
	}

	if(trim(_text_review).length == 0){
		$('#text-review').addClass('error_testimonials_form');
		alert("<?php echo smartyTranslate(array('s'=>'Please, enter the Message.','mod'=>'blockblog'),$_smarty_tpl);?>
");
		return;
	}
		
	$('#add-review-form').css('opacity','0.5');
	$.post(baseDir+'modules/blockblog/ajax.php', 
			{action:'addcomment',
			 name:_name_review,
			 email:_email_review,
			 id_post:id_post,
			 text_review:_text_review
			 }, 
	function (data) {
		if (data.status == 'success') {

				$('#name-review').val('');
				$('#email-review').val('');
				$('#text-review').val('');

				$('#add-review-form').hide();
				$('#succes-review').show();
				
			
			
			$('#add-review-form').css('opacity','1');
			
			
		} else {
			
			var error_type = data.params.error_type;
			
			if(error_type == 1){
				$('#name-review').addClass('error_testimonials_form');
				alert("<?php echo smartyTranslate(array('s'=>'Please, enter the Name.','mod'=>'blockblog'),$_smarty_tpl);?>
");
			} else if(error_type == 2){
				$('#email-review').addClass('error_testimonials_form');
				alert("<?php echo smartyTranslate(array('s'=>'Please enter a valid email address. For example johndoe@domain.com.','mod'=>'blockblog'),$_smarty_tpl);?>
");
			} else if(error_type == 3){
				$('#text-review').addClass('error_testimonials_form');
				alert("<?php echo smartyTranslate(array('s'=>'Please, enter the Message.','mod'=>'blockblog'),$_smarty_tpl);?>
");
			} else {
				alert(data.message);
			}
			$('#add-review-form').css('opacity','1');
			
		}
	}, 'json');
}
</script>
<?php }} ?>
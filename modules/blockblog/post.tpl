{capture name=path}
{$meta_title}
{/capture}

{include file="$tpl_dir./breadcrumb.tpl"}

<h2>{$meta_title}</h2>
<div class="blog-post-item">

<div id="list_reviews" class="productsBox1">
{foreach from=$posts item=post name=myLoop}
	<table cellspacing="0" cellpadding="0" border="0" width="100%" class="productsTable compareTableNew">
		<tbody>
			<tr class="line1">
			<td class="info">
			
			<table width="100%">
				<tr>
				{if strlen($post.img)>0}
					<td style="background:none;border-bottom:none">
					
						    <img src="{$base_dir}upload/blockblog/{$post.img}" alt="{$post.title|escape:'htmlall':'UTF-8'}" title="{$post.title|escape:'htmlall':'UTF-8'}" 
							    style="float:left;width:100px" />
					
					</td>
				{/if}
					<td style="background:none;border-bottom:none;text-align: left;{if strlen($post.img)==0} width:100% {else} width:80%{/if}">
						<h3>
								{$post.title|escape:'htmlall':'UTF-8'}
						</h3>
					</td>
				</tr>
			</table>
			
			
				<p class="commentbody_center">
				{$post.content}
				<br/><br/>
				
				{if $is_active == 1}
				<span class="foot_center">
				{l s='Posted in' mod='blockblog'}
				{foreach from=$category_data item=category_item name=catItemLoop}
					{if isset($category_item.title)}
					{if $blockblogurlrewrite_on == 1}
					<a href="{$base_dir}blog/category/{$category_item.seo_url}"
					   title="{$category_item.title}">{$category_item.title}
					</a>
					{else}
					<a href="{$base_dir}modules/blockblog/blockblog-category.php?category_id={$category_item.id}"
					   title="{$category_item.title}">{$category_item.title}
					</a>
					{/if}
					{if count($post.category_ids)>1}
					{if $smarty.foreach.catItemLoop.first},&nbsp;{elseif $smarty.foreach.catItemLoop.last}&nbsp;{else},&nbsp;{/if}
					{/if}
					
					{/if}
				{/foreach}
				</span>
				<br/><br/>
				{/if}
				
					<div class="share-buttons-blockblog">

				<!-- Place this tag where you want the +1 button to render -->
				<g:plusone size="small" href="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" 
						   count="false"></g:plusone>
				
				<!-- Place this tag after the last plusone tag -->
				{literal}
				<script type="text/javascript">
				  (function() {
				    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				    po.src = 'https://apis.google.com/js/plusone.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
				{/literal}
				
					<a href="http://twitter.com/?status={$meta_title|escape:'htmlall':'UTF-8'} : http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" rel="nofollow" target="_blank" title="Twitter">
					       <img src="{$module_dir}/i/share/1292323517.png" alt="Twitter">
					</a>
					<a href="http://www.facebook.com/share.php?u=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" rel="nofollow" target="_blank" title="Facebook">
					      <img src="{$module_dir}/i/share/1292323398.png" alt="Facebook">
					</a>
					<a href="http://www.myspace.com/Modules/PostTo/Pages/?u=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" rel="nofollow" target="_blank" title="MySpace">
					       <img src="{$module_dir}/i/share/1292323442.png" alt="MySpace">
					</a>
					<a href="https://www.google.com/bookmarks/mark?op=add&amp;bkmk=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}&amp;title={$meta_title|escape:'htmlall':'UTF-8'}" rel="nofollow" target="_blank" title="Google Bookmarks">
					      <img src="{$module_dir}/i/share/1293027456.png" alt="Google Bookmarks">
					</a>
					<a href="http://bookmarks.yahoo.com/toolbar/savebm?opener=tb&amp;u=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}&amp;t={$meta_title|escape:'htmlall':'UTF-8'}" rel="nofollow" target="_blank" title="Yahoo! Bookmarks">
					       <img src="{$module_dir}/i/share/1293094139.png" alt="Yahoo! Bookmarks">
					</a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}&amp;title={$meta_title|escape:'htmlall':'UTF-8'}" rel="nofollow" target="_blank" title="LinkedIn">
					       <img src="{$module_dir}/i/share/1292323420.png" alt="LinkedIn">
					</a>
					<a href="http://www.mixx.com/submit?page_url=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" rel="nofollow" target="_blank" title="Mixx">
					       <img src="{$module_dir}/i/share/1292323430.png" alt="Mixx">
					</a>
					<a href="http://reddit.com/submit?url=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}&amp;title={$meta_title|escape:'htmlall':'UTF-8'}" rel="nofollow" target="_blank" title="Reddit">
					      <img src="{$module_dir}/i/share/1292323468.png" alt="Reddit">
					</a>
					<a href="http://www.stumbleupon.com/submit?url=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}&amp;title={$meta_title|escape:'htmlall':'UTF-8'}" rel="nofollow" target="_blank" title="StumbleUpon">
						   <img src="{$module_dir}/i/share/1292323491.png" alt="StumbleUpon">
					</a>
						<a href="http://digg.com/submit?phase=2&amp;url=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" rel="nofollow" target="_blank" title="Digg">
					       <img src="{$module_dir}/i/share/1292323357.png" alt="Digg">
					</a>
					<a href="http://del.icio.us/post?url=http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" rel="nofollow" target="_blank" title="Del.icio.us">
					       <img src="{$module_dir}/i/share/1292323295.png" alt="Del.icio.us">
					</a>
				</div>	
			
			
				
				<span class="foot_center" style="float:left;margin-left:10px" >{$post.time_add}</span>
				<div style="clear:both"></div>
				<br/>
				</p>
			</td>
			</tr>
		</tbody>
	</table>
{/foreach}


{if $count_all>0} 
<div class="blog-block-comments">

<div class="toolbar-top">
			
	<div style="margin-bottom: 10px;" class="sortTools">
		<ul class="actions">
			<li class="frst">
					<strong>{l s='Comments' mod='blockblog'}  ( <span style="color: rgb(51, 51, 51);" id="count_items_top">{$count_all}</span> )</strong>
			</li>
		</ul>
	</div>

</div>

<div id="blog-list-comments">
{foreach from=$comments item=comment name=myLoop}
<table class="prfb-table-reviews">
	<tr>
		<td class="prfb-left">
			<div class="prfb-name">{$comment.name|escape:'htmlall':'UTF-8'}</div>
			<br/>
			<span class="prfb-time">{$comment.time_add|escape:'htmlall':'UTF-8'}</span>
			<br/>
		</td>
		<td class="prfb-right">
			<div class="rvTxt">
				<p>{$comment.comment|escape:'htmlall':'UTF-8'}</p>
			</div>
		</td>
	</tr>
</table>
{/foreach}
</div>

<div class="toolbar-bottom">
			
	<div id="show" class="sortTools">
		
		<ul style="margin-left: 38%;">
			<li style="border: medium none; padding: 0pt;">	
			
			<table class="toolbar">
				<tbody>
				<tr class="pager">
					<td class="pages" id="page_nav">
						{$paging}
					</td>
				</tr>
				</tbody>
			</table>
			</li>
		</ul>
		
	</div>

</div>

</div>

{/if}


{if $post.is_comments == 0}
<div style="padding:10px;text-align:center;font-weight:bold">
	{l s='Comments are Closed for this post' mod='blockblog'}
</div>
{else}
<div id="succes-review">
{l s='Your comment  has been sent successfully. Thanks for comment!' mod='blockblog'}						
</div>

<div id="add-review-form">
	<div class="title-rev" id="idTab666-my">
		<div style="float:left">
		{l s='Add Comment' mod='blockblog'}
		</div>
		
		<div style="clear:both"></div>
	</div>
	<table>
		<tr>
			<td class="form-left">{l s='Name:' mod='blockblog'}<span style="color:#EB340A">*</span></td>
			<td class="form-right">
				<input type="text" name="name-review"
					   id="name-review"  
					   style="margin-left:0px;width:80%" 
					   />
			</td>
		</tr>	
		<tr>
			<td class="form-left">{l s='Email:' mod='blockblog'}<span style="color:#EB340A">*</span></td>
			<td class="form-right">
				<input type="text" name="email-review"
					   id="email-review"  
					   style="margin-left:0px;width:80%" 
					   />
			</td>
		</tr>
		<tr>
			<td class="form-left">{l s='Message:' mod='blockblog'}<span style="color:#EB340A">*</span></td>
			<td class="form-right">
				<textarea style="margin-left:0px;width:80%;height:120px"
						  id="text-review"
						  name="text-review" cols="42" rows="7"></textarea>
			</td>
		</tr>
		<tr>
			<td class="form-left">&nbsp;</td>
			<td class="form-right">
				<a href="javascript:void(0)" class="greenBtnBig" onclick="add_comment({$post.id})"
				   style="margin:5px auto 0;width:180px" >
					<b>{l s='Add Comment' mod='blockblog'}</b>
				</a>
			</td>
		</tr>
	</table>
</div>

{/if}

</div>


</div>


{literal}
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
		alert("{/literal}{l s='Please, enter the Name.' mod='blockblog'}{literal}");
		return;
	}
	
	if(trim(_email_review).length == 0){
		$('#email-review').addClass('error_testimonials_form');
		alert("{/literal}{l s='Please, enter the Email.' mod='blockblog'}{literal}");
		return;
	}

	if(trim(_text_review).length == 0){
		$('#text-review').addClass('error_testimonials_form');
		alert("{/literal}{l s='Please, enter the Message.' mod='blockblog'}{literal}");
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
				alert("{/literal}{l s='Please, enter the Name.' mod='blockblog'}{literal}");
			} else if(error_type == 2){
				$('#email-review').addClass('error_testimonials_form');
				alert("{/literal}{l s='Please enter a valid email address. For example johndoe@domain.com.' mod='blockblog'}{literal}");
			} else if(error_type == 3){
				$('#text-review').addClass('error_testimonials_form');
				alert("{/literal}{l s='Please, enter the Message.' mod='blockblog'}{literal}");
			} else {
				alert(data.message);
			}
			$('#add-review-form').css('opacity','1');
			
		}
	}, 'json');
}
</script>
{/literal}
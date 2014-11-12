{capture name=path}
{$meta_title}
{/capture}

{include file="$tpl_dir./breadcrumb.tpl"}

<h2>{$meta_title}</h2>


<div style="margin-top:10px;border:1px solid #CCCCCC;padding:5px">
{if $count_all > 0}

<div class="toolbar-top">
			
	<div class="sortTools" style="margin-bottom: 10px;">
		<ul class="actions">
			<li class="frst">
					<strong>{l s='Posts' mod='blockblog'}  ( <span id="count_items_top" style="color: #333;">{$count_all}</span> )</strong>
			</li>
		</ul>
	</div>

</div>


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
						{if $blockblogurlrewrite_on == 1}
							<a href="{$base_dir}blog/post/{$post.seo_url}" 
						   	   title="{$post.title|escape:'htmlall':'UTF-8'}">
						{else}
							<a href="{$base_dir}modules/blockblog/blockblog-post.php?post_id={$post.id}" 
						   	   title="{$post.title|escape:'htmlall':'UTF-8'}">
						{/if}   	   
								<img src="{$base_dir}upload/blockblog/{$post.img}" title="{$post.title|escape:'htmlall':'UTF-8'}" 
									 alt="{$post.title|escape:'htmlall':'UTF-8'}"
							    	 style="float:left;width:100px" />
							</a>
						
						</td>
					{/if}
						<td style="background:none;border-bottom:none;text-align: left;{if strlen($post.img)==0} width:100%{else} width:80%{/if}">
							<h3>
							{if $blockblogurlrewrite_on == 1}
								<a href="{$base_dir}blog/post/{$post.seo_url}" 
						   	  			 title="{$post.title|escape:'htmlall':'UTF-8'}">
										{$post.title|escape:'htmlall':'UTF-8'}
									</a>
							{else}
									<a href="{$base_dir}modules/blockblog/blockblog-post.php?post_id={$post.id}" 
						   	  			 title="{$post.title|escape:'htmlall':'UTF-8'}">
										{$post.title|escape:'htmlall':'UTF-8'}
									</a>
							{/if}
								</h3>
						</td>
					</tr>
				</table>
				
				
				<p class="commentbody_center">
				{$post.content|substr:0:140}
				{if strlen($post.content)>140}...{/if}
				{if $blockblogurlrewrite_on == 1}
				<a href="{$base_dir}blog/post/{$post.seo_url}" 
					   title="{$post.title|escape:'htmlall':'UTF-8'}">
				
				{else}
				<a href="{$base_dir}modules/blockblog/blockblog-post.php?post_id={$post.id}" 
					   title="{$post.title|escape:'htmlall':'UTF-8'}">
				{/if}
						{l s='more' mod='blockblog'}
				</a>
				<br/><br/>
				{if isset($post.category_ids[0].title)}
				<span class="foot_center">
				{l s='Posted in' mod='blockblog'}
				
				{foreach from=$post.category_ids item=category_item name=catItemLoop}
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
					{else}
					
					{/if}
					
				{/foreach}
				</span>
				<br/><br/>
				{/if}
				
				<span class="foot_center">
				{$post.time_add}, &nbsp;
				{if $blockblogurlrewrite_on == 1}
				<a href="{$base_dir}blog/post/{$post.seo_url}" 
					   title="{$post.title|escape:'htmlall':'UTF-8'}">
				
				{else}
				<a href="{$base_dir}modules/blockblog/blockblog-post.php?post_id={$post.id}" 
					   title="{$post.title|escape:'htmlall':'UTF-8'}">
				{/if}	
						{$post.count_comments} {l s='comments' mod='blockblog'}
				</a>
				
				</span>
				<br/>
				</p>
			</td>
			</tr>
		</tbody>
	</table>
{/foreach}
</div>


<div class="toolbar-bottom">
			
	<div class="sortTools" id="show">
		
		<ul style="margin-left: 38%;">
			<li style="border: medium none; padding: 0pt;">	
			
			<table class="toolbar">
			<tbody>
			<tr class="pager">
				<td id="page_nav" class="pages">
					{$paging}
				</td>
			</tr>
			</tbody>
	</table>
</li>
		</ul>
		
			</div>

		</div>
{else}
	<div style="padding:10px;text-align:center;font-weight:bold">
	{l s='There are not posts yet' mod='blockblog'}
	</div>
{/if}

</div>
{literal}
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
{/literal}

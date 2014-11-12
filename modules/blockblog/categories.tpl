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
					<strong>{l s='Categories' mod='blockblog'}  ( <span id="count_items_top" style="color: #333;">{$count_all}</span> )</strong>
			</li>
		</ul>
	</div>

</div>


<div id="list_reviews" class="productsBox1">

{foreach from=$categories item=category name=myLoop}
	<table cellspacing="0" cellpadding="0" border="0" width="100%" class="productsTable compareTableNew">
		<tbody>
			<tr class="line1">
			<td class="info">
				
				<table width="100%">
					<tr>
					
						<td style="background:none;border-bottom:none;text-align: left;width:100%;">
							<h3>
							{if $blockblogurlrewrite_on == 1}
								<a href="{$base_dir}blog/category/{$category.seo_url}" 
						   	  			 title="{$category.title|escape:'htmlall':'UTF-8'}">
										{$category.title|escape:'htmlall':'UTF-8'}
									</a>
							{else}
									<a href="{$base_dir}modules/blockblog/blockblog-category.php?category_id={$category.id}" 
						   	  			 title="{$category.title|escape:'htmlall':'UTF-8'}">
										{$category.title|escape:'htmlall':'UTF-8'}
									</a>
							{/if}
								</h3>
						</td>
					</tr>
				</table>
				
				
				<br/><br/>
				
				
				<span class="foot_center">
				{$category.time_add}, &nbsp;
				{if $blockblogurlrewrite_on == 1}
				<a href="{$base_dir}blog/category/{$category.seo_url}" 
					   title="{$category.title|escape:'htmlall':'UTF-8'}">
						{$category.count_posts} {l s='posts' mod='blockblog'}
				</a>
				{else}
				<a href="{$base_dir}modules/blockblog/blockblog-category.php?category_id={$category.id}" 
					   title="{$category.title|escape:'htmlall':'UTF-8'}">
						{$category.count_posts} {l s='posts' mod='blockblog'}
				</a>
				{/if}
				</span>
				<br/>
				
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
	{l s='There are not category yet' mod='blockblog'}
	</div>
{/if}

</div>

{literal}
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
{/literal}

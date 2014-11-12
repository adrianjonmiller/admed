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
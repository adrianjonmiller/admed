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
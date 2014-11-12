
{if $blockblogposition_cat == "home"}

	<div class="block blockmanufacturer" {if $blockblogis_ps15 == 0}style="margin-top:10px"{/if}>
		<h4 style="text-align:center">
		{if $blockblogurlrewrite_on == 1}
			<a href="{$base_dir}blog"
			   title="{l s='Blog Categories' mod='blockblog'}"
				>{l s='Blog Categories' mod='blockblog'}</a>
		{else}
			<a href="{$module_dir}blockblog-categories.php"
			   title="{l s='Blog Categories' mod='blockblog'}"
				>{l s='Blog Categories' mod='blockblog'}</a>
				
		{/if}
		</h4>
		<div class="block_content">
		{if count($blockblogcategories) > 0}
	    <ul class="bullet">
	    {foreach from=$blockblogcategories item=items name=myLoop1}
	    	{foreach from=$items.data item=blog name=myLoop}
	    	
	    	<li class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
	    		{if $blockblogurlrewrite_on == 1}
	    		<a href="{$base_dir}blog/category/{$blog.seo_url}" 
	    		   title="{$blog.title}">{$blog.title}</a>
	    		{else}
	    		<a href="{$base_dir}modules/blockblog/blockblog-category.php?category_id={$blog.id}" 
	    		   title="{$blog.title}">{$blog.title}</a>
	    		{/if}
	    		
	    	</li>
	    	{/foreach}
	    {/foreach}
	    </ul>
	    
	    {else}
		<div style="padding:10px">
			{l s='There are not Categories yet.' mod='blockblog'}
		</div>
		{/if}
		</div>
	</div>

{/if}


{if $blockblogposition_post == "home"}

	<div class="block blockmanufacturer blockblog-block" {if $blockblogis_ps15 == 0}style="margin-top:10px"{/if}>
		<h4 style="text-align:center;font-size:12px">
			{l s='Blog Posts recents' mod='blockblog'}
		</h4>
		<div class="block_content">
		{if count($blockblogposts) > 0}
	    <ul>
	     {foreach from=$blockblogposts item=items name=myLoop1}
	    	{foreach from=$items.data item=blog name=myLoop}
	    	
	    	<li style="margin-top:5px">
	    		<table width="100%">
	    				<tr>
	    					<td align="center" {if strlen($blog.img)>0}style="width:20%"{/if}>
	    					{if strlen($blog.img)>0}
	    					{if $blockblogurlrewrite_on == 1}
	    						<a href="{$base_dir}blog/post/{$blog.seo_url}" 
	    		  				title="{$blog.title}">
	    					{else}
	    						<a href="{$base_dir}modules/blockblog/blockblog-post.php?post_id={$blog.id}" 
	    		  				title="{$blog.title}">
	    		  			{/if}
	    						<img src="{$base_dir}upload/blockblog/{$blog.img}" title="{$blog.title}" alt="{$blog.title}" style="height:45px" />
	    						</a>
	    					{/if}
	    					</td>
	    					<td>
	    						<table width="100%">
	    							<tr>
	    								<td align="left">
	    								{if $blockblogurlrewrite_on == 1}
	    								<a href="{$base_dir}blog/post/{$blog.seo_url}" 
		    		  						   title="{$blog.title}"><b>{$blog.title}</b></a>
	    								{else}
	    									<a href="{$base_dir}modules/blockblog/blockblog-post.php?post_id={$blog.id}" 
		    		  						   title="{$blog.title}"><b>{$blog.title}</b></a>
		    		  					{/if}
		    		  					<div style="padding:5px">
		    		  					{$blog.content|strip_tags|substr:0:90}{if strlen($blog.content)>90}...{/if}
		    		  					</div>
	    								</td>
	    							</tr>
	    							<tr>
	    								<td align="right">{$blog.time_add|date_format}</td>
	    							</tr>
	    						</table>
		    					
	    					</td>
	    				</tr>
	    		</table>
	    		
	    	</li>
	    	{/foreach}
	    {/foreach}
	    </ul>
	    {else}
		<div style="padding:10px">
			{l s='There are not Posts yet.' mod='blockblog'}
		</div>
		{/if}
		</div>
	</div>

{/if}

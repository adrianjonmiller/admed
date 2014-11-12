{if count($blockblogcategories) > 0}
<div id="idTab999" >
	    <ul class="bullet">
	    {foreach from=$blockblogcategories item=items name=myLoop1}
	    	{foreach from=$items.data item=blog name=myLoop}
	    	
	    	<li class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
	    		<a href="{$base_dir}modules/blockblog/blockblog-category.php?category_id={$blog.id}" 
	    		   title="{$blog.title}">{$blog.title}</a>
	    	</li>
	    	{/foreach}
	    {/foreach}
	    </ul>
</div>

{/if}


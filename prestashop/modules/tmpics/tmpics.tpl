{if $page_name == 'index'}
<div id="tmpics">
<ul>
	{foreach from=$xml->link item=home_link name=links}
	<li>
		<a href="{$home_link->url}">
			<img src="{$this_path_tmpics}{$home_link->img}" alt="" />
		</a>
	</li>
	{/foreach}
</ul>
</div>
{/if}
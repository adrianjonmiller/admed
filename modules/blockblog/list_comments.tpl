{foreach from=$comments item=comment name=myLoop}
<table class="prfb-table-reviews">
	<tr>
		<td class="prfb-left">
			<div class="prfb-name">{$comment.name|escape:'htmlall':'UTF-8'}</div>
			<br>
			<span class="prfb-time">{$comment.time_add|escape:'htmlall':'UTF-8'}</span>
			<br>
		</td>
		<td class="prfb-right">
			<div class="rvTxt">
				<p>{$comment.comment|escape:'htmlall':'UTF-8'}</p>
			</div>
		</td>
	</tr>
</table>
{/foreach}
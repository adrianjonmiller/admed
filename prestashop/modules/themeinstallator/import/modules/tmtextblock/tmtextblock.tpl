<div id="tmtextblock"> 
	{foreach from=$xml->link item=home_link name=links}
	<h2>{$home_link->$field1}</h2>
	<h3>{$home_link->$field2}</h3>
	{/foreach}
</div>
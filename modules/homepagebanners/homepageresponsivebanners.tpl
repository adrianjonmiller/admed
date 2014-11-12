		<!-- Banners -->
		
		<section id="banners">
			
			{if $background != 1}
			<div class="bg-banners"></div>
			{/if}
			
			<div class="banners clearfix">
		
				{foreach from=$images item=image key=i}
				
				<div class="grid-{$image.grid} float-left">{if isset($image.link) AND $image.link}<a href="{$image.link}">{/if}<img src="{$content_dir}modules/homepagebanners/slides/{$image.name}" alt="{$image.name}" style="box-shadow: 0px 0px 1px #aaa;"/>{if isset($image.link) AND $image.link}</a>{/if}</div>
		
				{/foreach}
                  	
			</div>
	
		</section>

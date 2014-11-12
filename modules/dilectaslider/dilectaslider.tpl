
	</div>
	
</section>

	{if $slider_layout_type == '1'}
	
	<div class="slider-fixed">
	
		<div class="rounding-top"></div>
	
	{/if}
	
			<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<ul>
						
						{$i = 1}
						{while $i <= 6}
							
							{if $slider[$i]['status'] == '1'}
							
								<li data-transition="{$slider[$i]['transition_effect']}" data-slotamount="10" data-masterspeed="300"{if $slider[$i]['link'] != ''} data-link="{$slider[$i]['link']}"{/if}><img src="{$slider[$i]['image']}" data-fullwidthcentering="on">
								
								{$nn = 1}
								
								{while $nn <= 6}
								
									{if $slider[$i]['add_elements'][$nn]['status'] == '1'}
									
										{$style = false}
										{if $slider[$i]['add_elements'][$nn]['style'] == 'small_header'}{$style = ' slider-text-1'}{/if}
										{if $slider[$i]['add_elements'][$nn]['style'] == 'small_header_align_right'}{$style = ' slider-text-4'}{/if}
										{if $slider[$i]['add_elements'][$nn]['style'] == 'large_description'}{$style = ' slider-text-2'}{/if}
										{if $slider[$i]['add_elements'][$nn]['style'] == 'medium_description'}{$style = ' slider-text-3'}{/if}
										{if $slider[$i]['add_elements'][$nn]['style'] == 'medium_description_align_right'}{$style = ' slider-text-3 align-right'}{/if}
										
										<div class="caption{$style} lfl stl" data-x="{$slider[$i]['add_elements'][$nn]['x']}" data-y="{$slider[$i]['add_elements'][$nn]['y']}" data-speed="{$slider[$i]['add_elements'][$nn]['speed']}" data-start="{$slider[$i]['add_elements'][$nn]['start']}" data-easing="{$slider[$i]['add_elements'][$nn]['easing']}" data-endspeed="{$slider[$i]['add_elements'][$nn]['speed']}" data-endeasing="{$slider[$i]['add_elements'][$nn]['endeasing']}">{$slider[$i]['add_elements'][$nn]['text']}</div>
																			
									{/if}
									
									{$nn = $nn+1}
									
								{/while}
								
								</li>
								
							{/if}
							{$i = $i+1}
							
						{/while}
						
						</ul>
						
						<div class="tp-bannertimer"></div>
					</div>
				</div>
				
				<style type="text/css">
				
					.fullwidthbanner-container { max-height:{$slider_height}px !important; }
				
				</style>
			
	{if $slider_layout_type == '1'}
		
		<div class="rounding-bottom"></div>
		
	</div>
	
	{/if}
	
<section id="contenthome" class="set-size clearfix">

	<div class="grid-12">

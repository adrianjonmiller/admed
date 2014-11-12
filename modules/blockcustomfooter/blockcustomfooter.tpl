
	</div>

</div>

	{if $contact_status == '1' || $aboutus_status == '1' || $facebook_status == '1' || $twitter_status == '1'}
	
	<!-- Custom Footer -->

	<div id="custom-footer">
	<div class="set-size clearfix">

		{if $aboutus_status == '1' || $contact_status == '1' || $facebook_status == '1' || $twitter_status == '1'}

			{if $aboutus_status == '1'}
		
			<!-- About us -->
			
			<div class="grid-{$grids} float-left"><div>
				
				{if $aboutus_title != ''}
		    	<h3 class="about-us">{$aboutus_title}</h3>
				{/if}
				
				<p>
				
					{html_entity_decode(nl2br($aboutus_text))}
				
				</p>
			
			</div></div>
			
			<!-- End About us -->
			
			{/if}
				
			{if $contact_status == '1'}
		
			<!-- Contact -->
			
			<div class="grid-{$grids} float-left"><div>

				{if $contact_title != ''}
		    	<h3 class="contact">{$contact_title}</h3>
				{/if}
				
					<ul class="list-contact">
						
						{if $contact_phone != '' || $contact_phone2 != ''}
						<li class="phone">
						
							<ul>
								
								{if $contact_phone != ''}
								<li{if $contact_phone2 == ''} style="padding-top:13px"{/if}>{$contact_phone}</li>
								{/if}
								{if $contact_phone2 != ''}
								<li{if $contact_phone == ''} style="padding-top:13px"{/if}>{$contact_phone2}</li>
								{/if}
							
							</ul>
						
						</li>
						{/if}
						{if $contact_email != '' || $contact_email2 != ''}
						<li class="email">
						
							<ul>
							
								{if $contact_email != ''}
								<li{if $contact_email2 == ''} style="padding-top:13px"{/if}>{$contact_email}</li>
								{/if}
								{if $contact_email2 != ''}
								<li{if $contact_email == ''} style="padding-top:13px"{/if}>{$contact_email2}</li>
								{/if}
							
							</ul>
						
						</li>
						{/if}
						{if $contact_skype != '' || $contact_skype2 != ''}
						<li class="skype">
						
							<ul>
							
								{if $contact_skype != ''}
								<li{if $contact_skype2 == ''} style="padding-top:13px"{/if}>{$contact_skype}</li>
								{/if}
								{if $contact_skype2 != ''}
								<li{if $contact_skype == ''} style="padding-top:13px"{/if}>{$contact_skype2}</li>
								{/if}
							
							</ul>
						
						</li>
						{/if}

					</ul>
			
			</div></div>
						
			<!-- End Contact -->
			
			{/if}
			
			{if $twitter_status == '1'}
			
			<!-- Twitter -->
			
			<div class="grid-{$grids} float-left"><div>
			
				<!-- ***** TWITTER API INTEGRATION STARTS HERE ***** -->
				<script type="text/javascript">
					jQuery(function($){
						$(".tweet").tweet({
							username: "{$twitter_profile}",
							join_text: "auto",
							avatar_size: 0,
							count: 2,
							auto_join_text_default: "<b>:</b>",
							auto_join_text_ed: "<b>:</b>",
							auto_join_text_ing: "<b>:</b>",
							auto_join_text_reply: "<b>:</b>",
							auto_join_text_url: "<b>:</b>",
							loading_text: "Loading tweets..."
						});
					});
				</script> 
				<!-- ***** TWITTER API INTEGRATION ENDS HERE ***** -->
				
				{if $twitter_title != ''}
		    	<h3 class="twitter">{$twitter_title}</h3>
				{/if}			
					
				<div id="twitter-updates"><div class="tweet"></div></div>
			
			</div></div>
			
			<!-- End Twitter -->
			
			{/if}
			
			{if $facebook_status == '1'}
			
			<!-- Facebook -->
			
			<div class="grid-{$grids} float-left"><div>
								
				{if $facebook_title != ''}
		    	<h3 class="facebook">{$facebook_title}</h3>
				{/if}			
				 		    	
					<div id="facebook" style="margin-top:0px">
						
						<div style="margin:-7px 0px -5px -7px">
						<div class="fb-like-box fb_iframe_widget" profile_id="{$facebook_id}" data-border-color="transparent" data-connections="8" data-width="260" data-height="210" data-colorscheme="light" data-stream="false" data-header="false" fb-xfbml-state="rendered"></div>
						</div>
						
					</div>

			</div></div>
			
			<!-- End Facebook -->
			
			{/if}
				

		
		{/if}

	</div>
	</div>

	<!-- End Custom Footer -->
	
	{/if}

<div class="set-size clearfix">
	
	<div class="footer-navigation clearfix">

				<!-- Currency -->
				
				<form action="{$request_uri}" method="post" enctype="multipart/form-data" id="form_currencies" class="switcherjs">
				
					<div class="switcher">
						
						{foreach from=$currencies key=k item=f_currency}
						{if $cookie->id_currency == $f_currency.id_currency}
						<p><a href="javascript:setCurrency({$f_currency.id_currency});">{$f_currency.name}</a></p>
						{/if}
						{/foreach}
						<div class="option">
							<div class="option-icon"></div>
							<ul>
								
								{foreach from=$currencies key=k item=f_currency}
								<li><a href="javascript:setCurrency({$f_currency.id_currency});">{$f_currency.name}</a></li>
								{/foreach}
								
							</ul>
						</div>
						
					</div>
					
				</form><!-- End currency form -->
				
				<!-- End currency -->
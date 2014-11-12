{if count($languages) > 1}

				<!-- Language -->
				
				<form action="#" method="post" enctype="multipart/form-data" id="form_languages" class="switcherjs">
				
					<div class="switcher">
						
						{foreach from=$languages key=k item=language name="languages"}
						{if $language.iso_code == $lang_iso}
						<p><a href="#">{$language.name}</a></p>
						{/if}
						{/foreach}
						<div class="option">
							<div class="option-icon"></div>
							<ul>
							
								{foreach from=$languages key=k item=language name="languages"}
								<li>
								
								{if $language.iso_code != $lang_iso}
									{assign var=indice_lang value=$language.id_lang}
									{if isset($lang_rewrite_urls.$indice_lang)}
									<a href="{$lang_rewrite_urls.$indice_lang|escape:htmlall}" title="{$language.name}">
									{else}
									<a href="{$link->getLanguageLink($language.id_lang)|escape:htmlall}" title="{$language.name}">
									{/if}
									
									{$language.name}
									
									{if $language.iso_code != $lang_iso}
									</a>
									{/if}
								{/if}
								
								</li>
								{/foreach}
							
							</ul>
						</div>
						
					</div>
					
				</form><!-- End currency form -->
				
				<!-- End language -->
{/if}

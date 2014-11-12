{if $MENU != ''}

			</div>
			
			<!-- End Top Right -->

		</div>
		
		<!-- End Top -->
		
		<!-- Navigation -->
		
		<div class="navigation_container">
			<div class="set-size clearfix">
						
				<nav>
				
					<ul>
					
						<li><a href="{$base_dir}" class="home"></a></li>
						{$MENU}

					</ul>
				
				</nav>
				
				{if $MENU_SEARCH}
	
				<!-- Search -->
				
				<div class="search">
				
					<form method="get" action="{$base_dir}search.php" id="searchbox">
										
						<input type="hidden" name="controller" value="search" />
						<input type="hidden" value="position" name="orderby"/>
						<input type="hidden" value="desc" name="orderway"/>
						<input type="submit" value="" class="button-search" />
						<input type="text" id="search_query" class="enterkey autoclear" name="search_query"  value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|htmlentities:$ENT_QUOTES:'utf-8'|stripslashes}{else}Search..{/if}" onfocus="if(this.value == 'Search..') { this.value = ''; }" value="value" style="width:130px;float:right;margin-right:10px;"/>
						<p class="hidden" id="more_prod_string">{l s='More products' mod='blocktopmenu'} &#187;</p>
																			
					</form>
				
				</div>
				
				<link href="{$css_dir}jquery/plugins/autocomplete/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	         <script type="text/javascript" src="./js/jquery/plugins/autocomplete/jquery.autocomplete.js"></script>
				         
				{if $page_name == 'search'}
					<script type="text/javascript">
					// <![CDATA[
						function tryToCloseInstantSearch() {
							if ($('#old_center_column').length > 0)
							{
								$('#center_column').remove();
								$('#old_center_column').attr('id', 'center_column');
								$('#center_column').show();
								return false;
							}
						}
						
						instantSearchQueries = new Array();
						function stopInstantSearchQueries(){
							for(i=0;i<instantSearchQueries.length;i++) {
								instantSearchQueries[i].abort();
							}
							instantSearchQueries = new Array();
						}
						
						$("#search_query").keyup(function(){
							if($(this).val().length > 0){
								stopInstantSearchQueries();
								instantSearchQuery = $.ajax({
									url: '{$link->getPageLink('search')}',
									data: {
										instantSearch: 1,
										id_lang: {$cookie->id_lang},
										q: $(this).val()
									},
									dataType: 'html',
									type: 'POST',
									success: function(data){
										if($("#search_query").val().length > 0)
										{
											tryToCloseInstantSearch();
											$('#center_column').attr('id', 'old_center_column');
											$('#old_center_column').after('<div id="center_column" class="' + $('#old_center_column').attr('class') + '">'+data+'</div>');
											$('#old_center_column').hide();
											$("#instant_search_results a.close").click(function() {
												$("#search_query_{$blocksearch_type}").val('');
												return tryToCloseInstantSearch();
											});
											return false;
										}
										else
											tryToCloseInstantSearch();
									}
								});
								instantSearchQueries.push(instantSearchQuery);
							}
							else
								tryToCloseInstantSearch();
						});
					// ]]>
					</script>
				{/if}

				<script type="text/javascript">
				// <![CDATA[
					$('document').ready( function() {
						$("#search_query")
							.autocomplete(
								'{$link->getPageLink('search')}', {
									minChars: 3,
									max: 7,
									width: 382,
									selectFirst: false,
									scroll: false,
									dataType: "json",
									formatItem: function(data, i, max, value, term) {								
										return value;
									},
									parse: function(data) {
										var mytab = new Array();
										for (var i = 0; i < data.length; i++)
										if(i==6){
										
											data[i].pname = 'not_link';
											data[i].product_link = $('#search_query').val();
											mytab[mytab.length] = { data: data[i], value:  $("#more_prod_string").html() };
									
										} else
									  		mytab[mytab.length] = { data: data[i], value: data[i].cname + ' > ' + data[i].pname };
										return mytab;
									}, extraParams: {
										ajaxSearch: 1,
										id_lang: {$cookie->id_lang}
									}
								}
							)
							
							.result(function(event, data, formatted) {
							
								if(data.pname!='not_link'){
								
									$('#search_query').val(data.pname);
									document.location.href = data.product_link;
								
								} else {
								
									$('#search_query').val(data.product_link);
									$("#searchbox").submit();
									
								}
							
							})
					});
					
				// ]]>
				</script>
				
				<!-- End Search -->
				{/if}
				
				<!-- Mobile Navigation -->
				
				<div class="mobile-navigation">
				
					<div class="click-menu">MENU</div>
					
					<div class="categories-mobile-links">
					
						<ul>
						
							{$MENU}

						</ul>
					
					</div>
				
				</div>
				
				<!-- End Mobile Navigation -->
		
{/if}

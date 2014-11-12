<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:02
         compiled from "/home/admedon/public_html/themes/dilecta/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1819042998540a387a3dae29-02449853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99c3759a61dd9b70cadb8229a3b77c682d40cb0d' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1367907315,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1819042998540a387a3dae29-02449853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
    'base_dir' => 0,
    'MENU_SEARCH' => 0,
    'ENT_QUOTES' => 0,
    'css_dir' => 0,
    'page_name' => 0,
    'link' => 0,
    'cookie' => 0,
    'blocksearch_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387a40fc81_75937631',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387a40fc81_75937631')) {function content_540a387a40fc81_75937631($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!=''){?>

			</div>
			
			<!-- End Top Right -->

		</div>
		
		<!-- End Top -->
		
		<!-- Navigation -->
		
		<div class="navigation_container">
			<div class="set-size clearfix">
						
				<nav>
				
					<ul>
					
						<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" class="home"></a></li>
						<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>


					</ul>
				
				</nav>
				
				<?php if ($_smarty_tpl->tpl_vars['MENU_SEARCH']->value){?>
	
				<!-- Search -->
				
				<div class="search">
				
					<form method="get" action="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
search.php" id="searchbox">
										
						<input type="hidden" name="controller" value="search" />
						<input type="hidden" value="position" name="orderby"/>
						<input type="hidden" value="desc" name="orderway"/>
						<input type="submit" value="" class="button-search" />
						<input type="text" id="search_query" class="enterkey autoclear" name="search_query"  value="<?php if (isset($_GET['search_query'])){?><?php echo stripslashes(htmlentities($_GET['search_query'],$_smarty_tpl->tpl_vars['ENT_QUOTES']->value,'utf-8'));?>
<?php }else{ ?>Search..<?php }?>" onfocus="if(this.value == 'Search..') { this.value = ''; }" value="value" style="width:130px;float:right;margin-right:10px;"/>
						<p class="hidden" id="more_prod_string"><?php echo smartyTranslate(array('s'=>'More products','mod'=>'blocktopmenu'),$_smarty_tpl);?>
 &#187;</p>
																			
					</form>
				
				</div>
				
				<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
jquery/plugins/autocomplete/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
	         <script type="text/javascript" src="./js/jquery/plugins/autocomplete/jquery.autocomplete.js"></script>
				         
				<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='search'){?>
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
									url: '<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('search');?>
',
									data: {
										instantSearch: 1,
										id_lang: <?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_lang;?>
,
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
												$("#search_query_<?php echo $_smarty_tpl->tpl_vars['blocksearch_type']->value;?>
").val('');
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
				<?php }?>

				<script type="text/javascript">
				// <![CDATA[
					$('document').ready( function() {
						$("#search_query")
							.autocomplete(
								'<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('search');?>
', {
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
										id_lang: <?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_lang;?>

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
				<?php }?>
				
				<!-- Mobile Navigation -->
				
				<div class="mobile-navigation">
				
					<div class="click-menu">MENU</div>
					
					<div class="categories-mobile-links">
					
						<ul>
						
							<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>


						</ul>
					
					</div>
				
				</div>
				
				<!-- End Mobile Navigation -->
		
<?php }?>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:03
         compiled from "/home/admedon/public_html/modules/blockcustomfooter/blockcustomfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1796969889540a387b035c27-88037411%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1849d1eef4baf1d152a5a7389550c8ee013134e' => 
    array (
      0 => '/home/admedon/public_html/modules/blockcustomfooter/blockcustomfooter.tpl',
      1 => 1367907122,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1796969889540a387b035c27-88037411',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'contact_status' => 0,
    'aboutus_status' => 0,
    'facebook_status' => 0,
    'twitter_status' => 0,
    'grids' => 0,
    'aboutus_title' => 0,
    'aboutus_text' => 0,
    'contact_title' => 0,
    'contact_phone' => 0,
    'contact_phone2' => 0,
    'contact_email' => 0,
    'contact_email2' => 0,
    'contact_skype' => 0,
    'contact_skype2' => 0,
    'twitter_profile' => 0,
    'twitter_title' => 0,
    'facebook_title' => 0,
    'facebook_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387b0b37f2_10816455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387b0b37f2_10816455')) {function content_540a387b0b37f2_10816455($_smarty_tpl) {?>
	</div>

</div>

	<?php if ($_smarty_tpl->tpl_vars['contact_status']->value=='1'||$_smarty_tpl->tpl_vars['aboutus_status']->value=='1'||$_smarty_tpl->tpl_vars['facebook_status']->value=='1'||$_smarty_tpl->tpl_vars['twitter_status']->value=='1'){?>
	
	<!-- Custom Footer -->

	<div id="custom-footer">
	<div class="set-size clearfix">

		<?php if ($_smarty_tpl->tpl_vars['aboutus_status']->value=='1'||$_smarty_tpl->tpl_vars['contact_status']->value=='1'||$_smarty_tpl->tpl_vars['facebook_status']->value=='1'||$_smarty_tpl->tpl_vars['twitter_status']->value=='1'){?>

			<?php if ($_smarty_tpl->tpl_vars['aboutus_status']->value=='1'){?>
		
			<!-- About us -->
			
			<div class="grid-<?php echo $_smarty_tpl->tpl_vars['grids']->value;?>
 float-left"><div>
				
				<?php if ($_smarty_tpl->tpl_vars['aboutus_title']->value!=''){?>
		    	<h3 class="about-us"><?php echo $_smarty_tpl->tpl_vars['aboutus_title']->value;?>
</h3>
				<?php }?>
				
				<p>
				
					<?php echo html_entity_decode(nl2br($_smarty_tpl->tpl_vars['aboutus_text']->value));?>

				
				</p>
			
			</div></div>
			
			<!-- End About us -->
			
			<?php }?>
				
			<?php if ($_smarty_tpl->tpl_vars['contact_status']->value=='1'){?>
		
			<!-- Contact -->
			
			<div class="grid-<?php echo $_smarty_tpl->tpl_vars['grids']->value;?>
 float-left"><div>

				<?php if ($_smarty_tpl->tpl_vars['contact_title']->value!=''){?>
		    	<h3 class="contact"><?php echo $_smarty_tpl->tpl_vars['contact_title']->value;?>
</h3>
				<?php }?>
				
					<ul class="list-contact">
						
						<?php if ($_smarty_tpl->tpl_vars['contact_phone']->value!=''||$_smarty_tpl->tpl_vars['contact_phone2']->value!=''){?>
						<li class="phone">
						
							<ul>
								
								<?php if ($_smarty_tpl->tpl_vars['contact_phone']->value!=''){?>
								<li<?php if ($_smarty_tpl->tpl_vars['contact_phone2']->value==''){?> style="padding-top:13px"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact_phone']->value;?>
</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['contact_phone2']->value!=''){?>
								<li<?php if ($_smarty_tpl->tpl_vars['contact_phone']->value==''){?> style="padding-top:13px"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact_phone2']->value;?>
</li>
								<?php }?>
							
							</ul>
						
						</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['contact_email']->value!=''||$_smarty_tpl->tpl_vars['contact_email2']->value!=''){?>
						<li class="email">
						
							<ul>
							
								<?php if ($_smarty_tpl->tpl_vars['contact_email']->value!=''){?>
								<li<?php if ($_smarty_tpl->tpl_vars['contact_email2']->value==''){?> style="padding-top:13px"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact_email']->value;?>
</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['contact_email2']->value!=''){?>
								<li<?php if ($_smarty_tpl->tpl_vars['contact_email']->value==''){?> style="padding-top:13px"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact_email2']->value;?>
</li>
								<?php }?>
							
							</ul>
						
						</li>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['contact_skype']->value!=''||$_smarty_tpl->tpl_vars['contact_skype2']->value!=''){?>
						<li class="skype">
						
							<ul>
							
								<?php if ($_smarty_tpl->tpl_vars['contact_skype']->value!=''){?>
								<li<?php if ($_smarty_tpl->tpl_vars['contact_skype2']->value==''){?> style="padding-top:13px"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact_skype']->value;?>
</li>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['contact_skype2']->value!=''){?>
								<li<?php if ($_smarty_tpl->tpl_vars['contact_skype']->value==''){?> style="padding-top:13px"<?php }?>><?php echo $_smarty_tpl->tpl_vars['contact_skype2']->value;?>
</li>
								<?php }?>
							
							</ul>
						
						</li>
						<?php }?>

					</ul>
			
			</div></div>
						
			<!-- End Contact -->
			
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['twitter_status']->value=='1'){?>
			
			<!-- Twitter -->
			
			<div class="grid-<?php echo $_smarty_tpl->tpl_vars['grids']->value;?>
 float-left"><div>
			
				<!-- ***** TWITTER API INTEGRATION STARTS HERE ***** -->
				<script type="text/javascript">
					jQuery(function($){
						$(".tweet").tweet({
							username: "<?php echo $_smarty_tpl->tpl_vars['twitter_profile']->value;?>
",
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
				
				<?php if ($_smarty_tpl->tpl_vars['twitter_title']->value!=''){?>
		    	<h3 class="twitter"><?php echo $_smarty_tpl->tpl_vars['twitter_title']->value;?>
</h3>
				<?php }?>			
					
				<div id="twitter-updates"><div class="tweet"></div></div>
			
			</div></div>
			
			<!-- End Twitter -->
			
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['facebook_status']->value=='1'){?>
			
			<!-- Facebook -->
			
			<div class="grid-<?php echo $_smarty_tpl->tpl_vars['grids']->value;?>
 float-left"><div>
								
				<?php if ($_smarty_tpl->tpl_vars['facebook_title']->value!=''){?>
		    	<h3 class="facebook"><?php echo $_smarty_tpl->tpl_vars['facebook_title']->value;?>
</h3>
				<?php }?>			
				 		    	
					<div id="facebook" style="margin-top:0px">
						
						<div style="margin:-7px 0px -5px -7px">
						<div class="fb-like-box fb_iframe_widget" profile_id="<?php echo $_smarty_tpl->tpl_vars['facebook_id']->value;?>
" data-border-color="transparent" data-connections="8" data-width="260" data-height="210" data-colorscheme="light" data-stream="false" data-header="false" fb-xfbml-state="rendered"></div>
						</div>
						
					</div>

			</div></div>
			
			<!-- End Facebook -->
			
			<?php }?>
				

		
		<?php }?>

	</div>
	</div>

	<!-- End Custom Footer -->
	
	<?php }?>

<div class="set-size clearfix">
	
	<div class="footer-navigation clearfix">
<?php }} ?>
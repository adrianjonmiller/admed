<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:23:14
         compiled from "/home/admedon/public_html/modules/dilectaslider/dilectaslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:541371855540a37d2d4c686-06117761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20f622f61db22bf3d5047701d4643256f2e4e850' => 
    array (
      0 => '/home/admedon/public_html/modules/dilectaslider/dilectaslider.tpl',
      1 => 1367907134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '541371855540a37d2d4c686-06117761',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slider_layout_type' => 0,
    'i' => 0,
    'slider' => 0,
    'nn' => 0,
    'style' => 0,
    'slider_height' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a37d2dd6da2_71500205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a37d2dd6da2_71500205')) {function content_540a37d2dd6da2_71500205($_smarty_tpl) {?>
	</div>
	
</section>

	<?php if ($_smarty_tpl->tpl_vars['slider_layout_type']->value=='1'){?>
	
	<div class="slider-fixed">
	
		<div class="rounding-top"></div>
	
	<?php }?>
	
			<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<ul>
						
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
						<?php while ($_smarty_tpl->tpl_vars['i']->value<=6){?>
							
							<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['status']=='1'){?>
							
								<li data-transition="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['transition_effect'];?>
" data-slotamount="10" data-masterspeed="300"<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['link']!=''){?> data-link="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['link'];?>
"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['image'];?>
" data-fullwidthcentering="on">
								
								<?php $_smarty_tpl->tpl_vars['nn'] = new Smarty_variable(1, null, 0);?>
								
								<?php while ($_smarty_tpl->tpl_vars['nn']->value<=6){?>
								
									<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['status']=='1'){?>
									
										<?php $_smarty_tpl->tpl_vars['style'] = new Smarty_variable(false, null, 0);?>
										<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['style']=='small_header'){?><?php $_smarty_tpl->tpl_vars['style'] = new Smarty_variable(' slider-text-1', null, 0);?><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['style']=='small_header_align_right'){?><?php $_smarty_tpl->tpl_vars['style'] = new Smarty_variable(' slider-text-4', null, 0);?><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['style']=='large_description'){?><?php $_smarty_tpl->tpl_vars['style'] = new Smarty_variable(' slider-text-2', null, 0);?><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['style']=='medium_description'){?><?php $_smarty_tpl->tpl_vars['style'] = new Smarty_variable(' slider-text-3', null, 0);?><?php }?>
										<?php if ($_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['style']=='medium_description_align_right'){?><?php $_smarty_tpl->tpl_vars['style'] = new Smarty_variable(' slider-text-3 align-right', null, 0);?><?php }?>
										
										<div class="caption<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
 lfl stl" data-x="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['x'];?>
" data-y="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['y'];?>
" data-speed="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['speed'];?>
" data-start="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['start'];?>
" data-easing="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['easing'];?>
" data-endspeed="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['speed'];?>
" data-endeasing="<?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['endeasing'];?>
"><?php echo $_smarty_tpl->tpl_vars['slider']->value[$_smarty_tpl->tpl_vars['i']->value]['add_elements'][$_smarty_tpl->tpl_vars['nn']->value]['text'];?>
</div>
																			
									<?php }?>
									
									<?php $_smarty_tpl->tpl_vars['nn'] = new Smarty_variable($_smarty_tpl->tpl_vars['nn']->value+1, null, 0);?>
									
								<?php }?>
								
								</li>
								
							<?php }?>
							<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
							
						<?php }?>
						
						</ul>
						
						<div class="tp-bannertimer"></div>
					</div>
				</div>
				
				<style type="text/css">
				
					.fullwidthbanner-container { max-height:<?php echo $_smarty_tpl->tpl_vars['slider_height']->value;?>
px !important; }
				
				</style>
			
	<?php if ($_smarty_tpl->tpl_vars['slider_layout_type']->value=='1'){?>
		
		<div class="rounding-bottom"></div>
		
	</div>
	
	<?php }?>
	
<section id="contenthome" class="set-size clearfix">

	<div class="grid-12">
<?php }} ?>
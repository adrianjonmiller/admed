<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:26:03
         compiled from "/home/admedon/public_html/modules/blockblog/TabContent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1343777368540a387b00c822-25779978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a998a319ceb0ce20c163bb9c48a7f3f1ead3de44' => 
    array (
      0 => '/home/admedon/public_html/modules/blockblog/TabContent.tpl',
      1 => 1367907118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1343777368540a387b00c822-25779978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockblogcategories' => 0,
    'items' => 0,
    'base_dir' => 0,
    'blog' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a387b02f432_40526077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a387b02f432_40526077')) {function content_540a387b02f432_40526077($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['blockblogcategories']->value)>0){?>
<div id="idTab999" >
	    <ul class="bullet">
	    <?php  $_smarty_tpl->tpl_vars['items'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['items']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blockblogcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['items']->key => $_smarty_tpl->tpl_vars['items']->value){
$_smarty_tpl->tpl_vars['items']->_loop = true;
?>
	    	<?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['blog']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['blog']->iteration=0;
 $_smarty_tpl->tpl_vars['blog']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value){
$_smarty_tpl->tpl_vars['blog']->_loop = true;
 $_smarty_tpl->tpl_vars['blog']->iteration++;
 $_smarty_tpl->tpl_vars['blog']->index++;
 $_smarty_tpl->tpl_vars['blog']->first = $_smarty_tpl->tpl_vars['blog']->index === 0;
 $_smarty_tpl->tpl_vars['blog']->last = $_smarty_tpl->tpl_vars['blog']->iteration === $_smarty_tpl->tpl_vars['blog']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['blog']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['blog']->last;
?>
	    	
	    	<li class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']){?>first_item<?php }elseif($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']){?>last_item<?php }else{ ?>item<?php }?>">
	    		<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/blockblog/blockblog-category.php?category_id=<?php echo $_smarty_tpl->tpl_vars['blog']->value['id'];?>
" 
	    		   title="<?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['blog']->value['title'];?>
</a>
	    	</li>
	    	<?php } ?>
	    <?php } ?>
	    </ul>
</div>

<?php }?>

<?php }} ?>
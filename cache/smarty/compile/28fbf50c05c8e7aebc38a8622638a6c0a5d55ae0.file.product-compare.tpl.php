<?php /* Smarty version Smarty-3.1.8, created on 2014-09-05 18:22:29
         compiled from "/home/admedon/public_html/themes/dilecta/product-compare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1090993331540a37a5c81239-76733124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28fbf50c05c8e7aebc38a8622638a6c0a5d55ae0' => 
    array (
      0 => '/home/admedon/public_html/themes/dilecta/product-compare.tpl',
      1 => 1367907287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1090993331540a37a5c81239-76733124',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_540a37a5c8f962_40788185',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_540a37a5c8f962_40788185')) {function content_540a37a5c8f962_40788185($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['comparator_max_item']->value){?>
<script type="text/javascript">
// <![CDATA[
	var min_item = '<?php echo smartyTranslate(array('s'=>'Please select at least one product','js'=>1),$_smarty_tpl);?>
';
	var max_item = "<?php echo smartyTranslate(array('s'=>'You cannot add more than %d product(s) to the product comparison','sprintf'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value,'js'=>1),$_smarty_tpl);?>
";
//]]>
</script>
<div class="product-compare">
	<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison');?>
" onsubmit="true">
		<p>
		<input type="submit" id="bt_compare" class="button" value="<?php echo smartyTranslate(array('s'=>'Compare'),$_smarty_tpl);?>
" />
		<input type="hidden" name="compare_product_list" class="compare_product_list" value="" />
		</p>
	</form>
</div>
<?php }?>

<?php }} ?>
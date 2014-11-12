{*
* 2007-2012 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Block Newsletter module-->

<style type="text/css">

	@media only screen and (min-width: 960px) and (max-width: 1160px) {
	
		.inputNew { width:103px !important; }
	
	}

</style>

<div class="block" id="newsletter">
	<h4 class="title_block">{l s='Newsletter' mod='blocknewsletter_mod'}</h4>
	<div class="block_content">
	{if isset($msg) && $msg}
		<p class="{if $nw_error}warning_inline{else}success_inline{/if}" {if $nw_error}style="color:red"{else}style="color:green"{/if}>{$msg}</p>
	{/if}
		<form action="{$link->getPageLink('index')}#newsletter" method="post" style="padding-top:5px">
			<p>
				{* @todo use jquery (focusin, focusout) instead of onblur and onfocus *}
				<input type="text" name="email" size="18" 
					value="{if isset($value) && $value}{$value}{else}{l s='your e-mail' mod='blocknewsletter_mod'}{/if}" 
					onfocus="javascript:if(this.value=='{l s='your e-mail' mod='blocknewsletter_mod' js=1}')this.value='';" 
					onblur="javascript:if(this.value=='')this.value='{l s='your e-mail' mod='blocknewsletter_mod' js=1}';" 
					class="inputNew" style="width:153px" />
				<!--<select name="action">
					<option value="0"{if isset($action) && $action == 0} selected="selected"{/if}>{l s='Subscribe' mod='blocknewsletter_mod'}</option>
					<option value="1"{if isset($action) && $action == 1} selected="selected"{/if}>{l s='Unsubscribe' mod='blocknewsletter_mod'}</option>
				</select>-->
					<input type="submit" value="ok" class="button_mini" name="submitNewsletter" />
				<input type="hidden" name="action" value="0" />
			</p>
		</form>
		
		<p class="newsletter_info" style="padding-top:15px">{l s='Sign up to newsletter and be on time with our news.' mod='blocknewsletter_mod'}</p>
		
	</div>
</div>
<!-- /Block Newsletter module-->

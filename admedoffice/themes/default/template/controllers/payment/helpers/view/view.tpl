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

{extends file="helpers/view/view.tpl"}
{block name="override_tpl"}
{if !$shop_context}
	<div class="warn">{l s='You have more than one shop. You need to select one to configure payment.'}</div>
{else}
		<h2 class="space">{l s='Payment modules list'}</h2>
		{if isset($url_modules)}
			<input type="button" class="button" onclick="document.location='{$url_modules}'" value="{l s='Click to see the list of payment modules.'}" /><br>
		{/if}
	
		<br />
	
		{if $display_restrictions}
			<br /><h2 class="space">{l s='Payment module restrictions'}</h2>
			{foreach $lists as $list}
				{include file='controllers/payment/restrictions.tpl'}
				<br />
			{/foreach}
		{else}
			<br />
			<div class='warn'>{l s='No payment module installed'}</div>
		{/if}
{/if}
{/block}

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
{include file="$tpl_dir./errors.tpl"}

{if isset($category)}
	{if $category->id AND $category->active}
	
		{if !$products}
			
			<div class="resumecat category-product-count" style="padding-top:18px">
				{include file="$tpl_dir./category-count.tpl"}
			</div>
		
		{/if}
		
		{if $scenes || $category->description || $category->id_image}
		<div class="category-info">
			{if $scenes}
				<!-- Scenes -->
				{include file="$tpl_dir./scenes.tpl" scenes=$scenes}
			{else}
				<!-- Category image -->
				{if $category->id_image}
				<div class="image">
					<img src="{$link->getCatImageLink($category->link_rewrite, $category->id_image, 'category_default')}" alt="{$category->name|escape:'htmlall':'UTF-8'}" title="{$category->name|escape:'htmlall':'UTF-8'}" id="categoryImage" width="{$categorySize.width}" height="{$categorySize.height}" />
				</div>
				{/if}
			{/if}

			{if $category->description}
				{if strlen($category->description) > 120}
					<p id="category_description_short">{$category->description|truncate:120}</p>
					<p id="category_description_full" style="display:none">{$category->description}</p>
					<a href="#" onclick="$('#category_description_short').hide(); $('#category_description_full').show(); $(this).hide(); return false;" class="lnk_more">{l s='More'}</a>
				{else}
					<p>{$category->description}</p>
				{/if}
			{/if}
		</div>
		{/if}
		{if isset($subcategories)}
		
					<!-- <div class="category-list">
						<ul>
							
							{foreach from=$subcategories item=subcategory}
							<li><a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$subcategory.name|escape:'htmlall':'UTF-8'}">						

{if $subcategory.id_image}
	<img src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image, 'medium_default')}" alt="" width="{$mediumSize.width}" height="{$mediumSize.height}" />
{else}
	<img src="{$img_cat_dir}default-medium_default.jpg" alt="" width="{$mediumSize.width}" height="{$mediumSize.height}" />
{/if}

						{$subcategory.name|escape:'htmlall':'UTF-8'}</a>
						
							</li>
							{/foreach}
						
						</ul>				
					</div> -->

		{/if}

		{if $products}
				
		  <div class="product-filter clearfix"	{if $scenes || $category->description || $category->id_image || isset($subcategories)}{else}style="margin-top:-11px"{/if}>
			 <div class="display"><div class="active-display-list" onclick="display('list');"></div><div class="display-grid" onclick="display('grid');"></div></div>
			 
			 {include file="./product-compare.tpl"}
		    {include file="./nbr-product-page.tpl"}
		    {include file="./product-sort.tpl"}
		    
		  </div>
			
			{include file="./product-list.tpl" products=$products}

  			{include file="./pagination.tpl"}


		{/if}
	{elseif $category->id}
		<p class="warning">{l s='This category is currently unavailable.'}</p>
	{/if}
{/if}

<?php
/*
* 2007-2011 PrestaShop 
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
*  @copyright  2007-2011 PrestaShop SA
*  @version  Release: $Revision: 7077 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class BlockLinkFooter extends Module
{
	/* @var boolean error */
	protected $error = false;
	
	public function __construct()
	{
		$this->name = 'blocklinkfooter';
		$this->tab = 'front_office_features';
		$this->version = '1.5';
		$this->author = 'PrestaShop';
		$this->need_instance = 0;

	 	parent::__construct();

		$this->displayName = $this->l('Link block footer');
		$this->description = $this->l('Adds a block with additional links.');
		$this->confirmUninstall = $this->l('Are you sure you want to delete all your links ?');
	}
	
	public function install()
	{
		if (!parent::install() OR
			!$this->registerHook('leftColumn') OR
			!$this->registerHook('footer') OR
			!Db::getInstance()->execute('
			CREATE TABLE '._DB_PREFIX_.'blocklinkfooter (
			`id_blocklinkfooter` int(2) NOT NULL AUTO_INCREMENT, 
			`url` varchar(255) NOT NULL,
			`new_window` TINYINT(1) NOT NULL,
			PRIMARY KEY(`id_blocklinkfooter`))
			ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8') OR
			!Db::getInstance()->execute('
			CREATE TABLE '._DB_PREFIX_.'blocklinkfooter_shop (
			`id_blocklinkfooter` int(2) NOT NULL AUTO_INCREMENT, 
			`id_shop` varchar(255) NOT NULL,
			PRIMARY KEY(`id_blocklinkfooter`, `id_shop`))
			ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8') OR
			!Db::getInstance()->execute('
			CREATE TABLE '._DB_PREFIX_.'blocklinkfooter_lang (
			`id_blocklinkfooter` int(2) NOT NULL,
			`id_lang` int(2) NOT NULL,
			`text` varchar(64) NOT NULL,
			PRIMARY KEY(`id_blocklinkfooter`, `id_lang`))
			ENGINE='._MYSQL_ENGINE_.' default CHARSET=utf8') OR
			!Configuration::updateValue('PS_blocklinkfooter_TITLE', array('1' => 'Information', '2' => 'Bloc lien')))
			return false;
		return true;
	}
	
	public function uninstall()
	{
		if (!parent::uninstall() OR
			!Db::getInstance()->execute('DROP TABLE '._DB_PREFIX_.'blocklinkfooter') OR
			!Db::getInstance()->execute('DROP TABLE '._DB_PREFIX_.'blocklinkfooter_lang') OR
			!Db::getInstance()->execute('DROP TABLE '._DB_PREFIX_.'blocklinkfooter_shop') OR
			!Configuration::deleteByName('PS_blocklinkfooter_TITLE') OR
			!Configuration::deleteByName('PS_blocklinkfooter_URL'))
			return false;
		return true;
	}
	
	public function hookLeftColumn($params)
	{
		$links = $this->getLinks();
		
		$this->smarty->assign(array(
			'blocklinkfooter_links' => $links,
			'title' => Configuration::get('PS_blocklinkfooter_TITLE', $this->context->language->id),
			'url' => Configuration::get('PS_blocklinkfooter_URL'),
			'lang' => 'text_'.$this->context->language->id
		));
		if (!$links)
			return false;
		return $this->display(__FILE__, 'blocklinkfooter.tpl');
	}
	
	public function hookRightColumn($params)
	{
		return $this->hookLeftColumn($params);
	}

	public function hookfooter($params)
	{
		return $this->hookLeftColumn($params);
	}

	public function getLinks()
	{
		$result = array();
		/* Get id and url */
		if (!$links = Db::getInstance()->executeS('SELECT `id_blocklinkfooter`, `url`, `new_window` 
																FROM '._DB_PREFIX_.'blocklinkfooter'.
																((int)Configuration::get('PS_blocklinkfooter_ORDERWAY') == 1 ? ' ORDER BY `id_blocklinkfooter` DESC' : '')))
			return false;
		$i = 0;
		foreach ($links AS $link)
		{
			$result[$i]['id'] = $link['id_blocklinkfooter'];
			$result[$i]['url'] = $link['url'];
			$result[$i]['newWindow'] = $link['new_window'];
			/* Get multilingual text */
			if (!$texts = Db::getInstance()->executeS('SELECT `id_lang`, `text` 
																	FROM '._DB_PREFIX_.'blocklinkfooter_lang 
																	WHERE `id_blocklinkfooter`='.(int)$link['id_blocklinkfooter']))
				return false;
			foreach ($texts AS $text)
				$result[$i]['text_'.$text['id_lang']] = $text['text'];
			$i++;
		}
		return $result;
	}
	
	public function addLink()
	{

		if ($id_link = Tools::getValue('id_link'))
		{
			/* Url registration */
			if (!Db::getInstance()->execute('UPDATE '._DB_PREFIX_.'blocklinkfooter SET `url`=\''.pSQL($_POST['url']).'\', `new_window`='.(isset($_POST['newWindow']) ? 1 : 0).' WHERE `id_blocklinkfooter`='.(int)$id_link))
				return false;
			/* Multilingual text */
			$languages = Language::getLanguages();
			$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
			if (!$languages)
				 return false;
			if (!Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'blocklinkfooter_lang WHERE `id_blocklinkfooter` = '.(int)$id_link))
				return false ;
			foreach ($languages AS $language)
				if (!empty($_POST['text_'.$language['id_lang']]))
		 	 	{
					if (!Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'blocklinkfooter_lang VALUES ('.(int)$id_link.', '.(int)($language['id_lang']).', \''.pSQL($_POST['text_'.$language['id_lang']]).'\')'))
						return false;
		 	 	}
				else
					if (!Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'blocklinkfooter_lang VALUES ('.(int)$id_link.', '.$language['id_lang'].', \''.pSQL($_POST['text_'.$defaultLanguage]).'\')'))
						return false;
		}
		else
		{
			/* Url registration */
			if (!Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'blocklinkfooter 
														VALUES (NULL, \''.pSQL($_POST['url']).'\', '.((isset($_POST['newWindow']) AND $_POST['newWindow']) == 'on' ? 1 : 0).')') OR 
														!$id_link = Db::getInstance()->Insert_ID())
				return false;
			/* Multilingual text */
			$languages = Language::getLanguages();
			$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
			if (!$languages)
				return false;
			foreach ($languages AS $language)
				if (!empty($_POST['text_'.$language['id_lang']]))
				{
					if (!Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'blocklinkfooter_lang 
																VALUES ('.(int)$id_link.', '.(int)$language['id_lang'].', \''.pSQL($_POST['text_'.$language['id_lang']]).'\')'))
						return false;
				}
				else
					if (!Db::getInstance()->execute('INSERT INTO '._DB_PREFIX_.'blocklinkfooter_lang VALUES ('.(int)$id_link.', '.(int)($language['id_lang']).', \''.pSQL($_POST['text_'.$defaultLanguage]).'\')'))
						return false;
		}

		/*$assos_shop = Tools::getValue('checkBoxShopAsso_blocklink');

		Db::getInstance()->Execute('DELETE FROM '._DB_PREFIX_.'blocklinkfooter_shop WHERE id_blocklinkfooter='.(int)$id_link);
		foreach ($assos_shop as $asso)
			foreach ($asso as $id_shop => $row)
				Db::getInstance()->insert('blocklinkfooter_shop', array(
					'id_blocklinkfooter' =>	(int)$id_link,
					'id_shop' => (int)$id_shop,
				));*/
		return true;
	}
		
	public function deleteLink()
	{
		return (Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'blocklinkfooter WHERE `id_blocklinkfooter`='.(int)($_GET['id'])) && 
					Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'blocklinkfooter_shop WHERE `id_blocklinkfooter`='.(int)($_GET['id'])) &&
					Db::getInstance()->execute('DELETE FROM '._DB_PREFIX_.'blocklinkfooter_lang WHERE `id_blocklinkfooter`='.(int)($_GET['id'])));
	}
	
	public function updateTitle()
	{
		$languages = Language::getLanguages();
		$result = array();
		foreach ($languages AS $language)
			$result[$language['id_lang']] = $_POST['title_'.$language['id_lang']];
		if (!Configuration::updateValue('PS_blocklinkfooter_TITLE', $result))
			return false;
		return Configuration::updateValue('PS_blocklinkfooter_URL', $_POST['title_url']);
	}
	
	public function getContent()
    {
		$this->_html = '<h2>'.$this->displayName.'</h2>
		<script type="text/javascript" src="'.$this->_path.'blocklinkfooter.js"></script>';

		/* Add a link */
		if (isset($_POST['submitLinkAdd']))
     	{
			if (empty($_POST['text_'.Configuration::get('PS_LANG_DEFAULT')]) OR empty($_POST['url']))
				$this->_html .= $this->displayError($this->l('You must fill in all fields'));
			elseif (!Validate::isUrl(str_replace('http://', '', $_POST['url'])))
				$this->_html .= $this->displayError($this->l('Bad URL'));
			else
				if ($this->addLink())
	     	  		$this->_html .= $this->displayConfirmation($this->l('The link has been added.'));
				else
					$this->_html .= $this->displayError($this->l('An error occurred during link creation.'));
     	}
		/* Update the block title */
		elseif (isset($_POST['submitTitle']))
		{

			if (empty($_POST['title_'.Configuration::get('PS_LANG_DEFAULT')]))
				$this->_html .= $this->displayError($this->l('"title" field cannot be empty.'));
			elseif (!empty($_POST['title_url']) AND !Validate::isUrl(str_replace('http://', '', $_POST['title_url'])))
				$this->_html .= $this->displayError($this->l('The \'title\' field is invalid'));
			elseif (!Validate::isGenericName($_POST['title_'.Configuration::get('PS_LANG_DEFAULT')]))
				$this->_html .= $this->displayError($this->l('The \'title\' field is invalid'));
			elseif (!$this->updateTitle())
				$this->_html .= $this->displayError($this->l('An error occurred during title updating.'));
			else
				$this->_html .= $this->displayConfirmation($this->l('The block title has been updated.'));
		}

		/* Delete a link*/
		elseif (Tools::getValue('delete_link') && isset($_GET['id']))
		{

			if (!is_numeric($_GET['id']) OR !$this->deleteLink())
			 	$this->_html .= $this->displayError($this->l('An error occurred during link deletion.'));
			else
			 	$this->_html .= $this->displayConfirmation($this->l('The link has been deleted.'));
		}

		if (isset($_POST['submitOrderWay']))
		{
			if (Configuration::updateValue('PS_blocklinkfooter_ORDERWAY', (int)(Tools::getValue('orderWay'))))
				$this->_html .= $this->displayConfirmation($this->l('Sort order updated'));
			else
				$this->_html .= $this->displayError($this->l('An error occurred during sort order set-up.'));
		}

		$this->_displayForm();
		$this->_list();

		return $this->_html;
	}
	
	private function _displayForm()
	{
	 	/* Language */
		$defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
		$languages = Language::getLanguages(false);
		$divLangName = 'text¤title';
		/* Title */
		$title_url = Configuration::get('PS_blocklinkfooter_URL');
		if (!Tools::isSubmit('submitLinkAdd'))
		{
			if ($id_link = (int)Tools::getValue('id_link'))
			{
				$res = Db::getInstance()->executeS('SELECT *
																FROM '._DB_PREFIX_.'blocklinkfooter b
																LEFT JOIN '._DB_PREFIX_.'blocklinkfooter_lang bl ON (b.id_blocklinkfooter = bl.id_blocklinkfooter)
																WHERE b.id_blocklinkfooter='.(int)$id_link);
		
				if ($res)
					foreach ($res as $row)
					{
						$links['text'][(int)$row['id_lang']] = $row['text'];
						$links['url'] = $row['url'];
						$links['new_window'] = $row['new_window'];
					}
			}
		}
		$this->_html .= '
		<script type="text/javascript">
			id_language = Number('.$defaultLanguage.');
		</script>
		<fieldset>
			<legend><img src="'.$this->_path.'add.png" alt="" title="" /> '.$this->l('Add a new link').'</legend>
			<form method="post" action="index.php?controller=adminmodules&configure='.Tools::safeOutput(Tools::getValue('configure')).'&token='.Tools::safeOutput(Tools::getValue('token')).'&tab_module='.Tools::safeOutput(Tools::getValue('tab_module')).'&module_name='.Tools::safeOutput(Tools::getValue('module_name')).'">
				<input type="hidden" name="id_link" value="'.Tools::getValue('id_link').'" />
				<label>'.$this->l('Text:').'</label>
				<div class="margin-form">';
			foreach ($languages as $language)
				$this->_html .= '
					<div id="text_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="text" name="text_'.$language['id_lang'].'" id="textInput_'.$language['id_lang'].'" value="'.((isset($links) && isset($links['text'][$language['id_lang']])) ? $links['text'][$language['id_lang']] : '').'" /><sup> *</sup>
					</div>';
			$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'text', true);
			$this->_html .= '
					<div class="clear"></div>
				</div>
				<label>'.$this->l('URL:').'</label>
				<div class="margin-form"><input type="text" name="url" id="url" value="'.(isset($links) && isset($links['url']) ? $links['url'] : '').'" /><sup> *</sup></div>
				<label>'.$this->l('Open in a new window:').'</label>
				<div class="margin-form"><input type="checkbox" name="newWindow" id="newWindow" '.((isset($links) && $links['new_window']) ? 'checked="checked"' : '').' /></div>';
				if (Shop::isFeatureActive())
				{
					$helper = new Helper();
					$helper->id = (int)Tools::getValue('id_link');
					$helper->table = 'blocklinkfooter';
					$helper->identifier = 'id_blocklinkfooter';
		
					$this->_html .= '<label for="shop_association">'.$this->l('Shop association:').'</label><div id="shop_association" class="margin-form">'.$helper->renderAssoShop().'</div>';
				}
			$this->_html .= '
				<div class="margin-form">
					<input type="submit" class="button" name="submitLinkAdd" value="'.$this->l('Add this link').'" />
				</div>
			</form>
		</fieldset>
		<fieldset class="space">
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" /> '.$this->l('Block title').'</legend>
			<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'">
				<label>'.$this->l('Block title:').'</label>
				<div class="margin-form">';
		foreach ($languages as $language)
			$this->_html .= '
					<div id="title_'.$language['id_lang'].'" style="display: '.($language['id_lang'] == $defaultLanguage ? 'block' : 'none').'; float: left;">
						<input type="text" name="title_'.$language['id_lang'].'" value="'.(($this->error AND isset($_POST['title'])) ? $_POST['title'] : Configuration::get('PS_blocklinkfooter_TITLE', $language['id_lang'])).'" /><sup> *</sup>
					</div>';
		$this->_html .= $this->displayFlags($languages, $defaultLanguage, $divLangName, 'title', true);
		$this->_html .= '
				<div class="clear"></div>
				</div>
				<label>'.$this->l('Block URL:').'</label>
				<div class="margin-form"><input type="text" name="title_url" value="'.(($this->error AND isset($_POST['title_url'])) ? $_POST['title_url'] : $title_url).'" /></div>
				<div class="margin-form"><input type="submit" class="button" name="submitTitle" value="'.$this->l('Update').'" /></div>
			</form>
		</fieldset>
		<fieldset class="space">
			<legend><img src="'.$this->_path.'prefs.gif" alt="" title="" /> '.$this->l('Settings').'</legend>
			<form method="post" action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'">
				<label>'.$this->l('Order list:').'</label>
				<div class="margin-form">
					<select name="orderWay">
						<option value="0"'.(!Configuration::get('PS_blocklinkfooter_ORDERWAY') ? 'selected="selected"' : '').'>'.$this->l('by most recent links').'</option>
						<option value="1"'.(Configuration::get('PS_blocklinkfooter_ORDERWAY') ? 'selected="selected"' : '').'>'.$this->l('by oldest links').'</option>
					</select>
				</div>
				<div class="margin-form"><input type="submit" class="button" name="submitOrderWay" value="'.$this->l('Update').'" /></div>
			</form>
		</fieldset>';
	}
	
	private function _list()
	{
		$links = $this->getLinks();
		$languages = Language::getLanguages();
		if ($links)
	 	{
			$this->_html .= '
			<script type="text/javascript">
				var currentUrl = \''.AdminController::$currentIndex.'&configure='.$this->name.'\';
				var token=\''.Tools::getValue('token').'\';
				var links = new Array();';
			foreach ($links AS $link)
	 		{
				$this->_html .= 'links['.$link['id'].'] = new Array(\''.addslashes($link['url']).'\', '.$link['newWindow'];
				foreach ($languages AS $language)
					if (isset($link['text_'.$language['id_lang']]))
						$this->_html .= ', \''.addslashes($link['text_'.$language['id_lang']]).'\'';
					else
						$this->_html .= ', \'\'';
				$this->_html .= ');';
	 		}
			$this->_html .= '</script>';
	 	}
		$this->_html .= '
		<h3 class="blue space">'.$this->l('Link list').'</h3>
		<table class="table">
			<tr>
				<th>'.$this->l('ID').'</th>
				<th>'.$this->l('Text').'</th>
				<th>'.$this->l('URL').'</th>
				<th>'.$this->l('Actions').'</th>
			</tr>';
			
		if (!$links)
			$this->_html .= '
			<tr>
				<td colspan="3">'.$this->l('There are no links.').'</td>
			</tr>';
		else
			foreach ($links AS $link)
				$this->_html .= '
				<tr>
					<td>'.$link['id'].'</td>
					<td>'.$link['text_'.$this->context->language->id].'</td>
					<td>'.$link['url'].'</td>
					<td>
						<img src="../img/admin/edit.gif" alt="" title="" onclick="linkEdition('.$link['id'].')" style="cursor: pointer" />
						<img src="../img/admin/delete.gif" alt="" title="" onclick="linkDeletion('.$link['id'].')" style="cursor: pointer" />
					</td>
				</tr>';
		$i = 0;
		$nb = count($languages);
		$idLng = 0;
		while($i < $nb)
		{
			if ($languages[$i]['id_lang'] == (int)Configuration::get('PS_LANG_DEFAULT'))
			{
				$idLng = $i;
			}
			$i++;
		}
		$this->_html .= '
		</table>
		<input type="hidden" id="languageFirst" value="'.$languages[0]['id_lang'].'" />
		<input type="hidden" id="languageNb" value="'.sizeof($languages).'" />';
	}
}

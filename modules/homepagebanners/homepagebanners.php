<?php

class Homepagebanners extends Module {
	
	private $_postErrors = array();
	
	function __construct() {
		$this->name = 'homepagebanners';
		$this->tab = 'front_office_features';
		$this->version = 1.5;
		
		parent::__construct();
		$this->displayName = $this->l('Homepage banners');
		$this->description = $this->l('Display banners on homepage');
	}
	
	public function install()
	{
		if (!parent::install() OR !$this->registerHook('home') OR !$this->registerHook('header'))
			return false;
		
		$images = $this->_parseImageDir();
		if (!$images)
			return false;
			
        $langs = '';
        $width = '';
        for($i = 0; $i < count($images); $i++)
            $langs .= 'all;';
            						
		if (!Configuration::updateValue($this->name.'_sync'		, 'true') 	OR
			!Configuration::updateValue($this->name.'_links'	, '')		OR
			!Configuration::updateValue($this->name.'_langs'	, $langs)	OR
			!Configuration::updateValue($this->name.'_background'	, 0)	OR
			!Configuration::updateValue($this->name.'_images'	, implode(";", $images)))
			return false;
		
		return true;
	}
		
	private function _postProcess()
	{
		Configuration::updateValue($this->name.'_images'	,  Tools::getValue('image_data'));
		Configuration::updateValue($this->name.'_links'		,  Tools::getValue('link_data'));
		Configuration::updateValue($this->name.'_langs'		,  Tools::getValue('lang_data'));
		Configuration::updateValue($this->name.'_background'		,  Tools::getValue('background'));
		Configuration::updateValue($this->name.'_sync'		, (Tools::getValue('sync') 	? 'true' : 'false'));

	}

	public function getContent() {
	
		$html = '';
		if (Tools::isSubmit('submit'))
		{			
			echo Tools::getValue('width_data');
			if (!sizeof($this->_postErrors))
				$this->_postProcess();
			else
			{
				foreach ($this->_postErrors as $err)
				{
					$html .= '<div class="alert error">'.$err.'</div>';
				}
			}
		}
			$html .= '<h2>'.$this->displayName.'</h2>';
		//$this->_displayForm();
		
				$dirImages = $this->_parseImageDir();
		$confImages = $this->_getImageArray();
		$nbDirImages = count($dirImages);
		$nbConfImages = count($confImages);
		
	
	
		$html .= '
			<script type="text/javascript" src="../js/jquery/plugins/jquery.tablednd.js"></script>
			<script type="text/javascript" src="../modules/'.$this->name.'/ajaxupload.js"></script>
			<script type="text/javascript" src="../modules/'.$this->name.'/homepagebanners.js"></script>
			
			<table id="hidden-row" style="display:none">' . $this->_getTableRowHTML(0, 2, '') . '</table>
		
			<form action="'.$_SERVER['REQUEST_URI'].'" method="post">

				<fieldset>
				<legend><img src="../img/admin/cog.gif" alt="" class="middle" />'.$this->l('Settings').'</legend>
					
					
					<br />
					
					<input type="hidden" id="hidden_image_data" name="image_data" value="' . Configuration::get($this->name.'_images') . '"/>
					<input type="hidden" id="hidden_link_data" name="link_data" value="'   . Configuration::get($this->name.'_links') . '"/>
					<input type="hidden" id="hidden_lang_data" name="lang_data" value="'   . Configuration::get($this->name.'_langs') . '"/>
										
					<label>Background:</label>
					<div class="margin-form">
						<select name="background" style="width:50px"><option value="0"'.(Configuration::get($this->name.'_background') < 1 ? ' selected="selected"' : '').'>On</option><option value="1"'.(Configuration::get($this->name.'_background') == 1 ? ' selected="selected"' : '').'>Off</option></select>

					</div>
					
					<table cellpadding="0" cellspacing="0" class="table space'.($nbDirImages >= 2 ? ' tableDnD' : '' ).'" id="table_images" style="margin-left: 30px; width: 905px;">
					<caption style="font-weight: bold; margin-bottom: 1em;">' . $this->l('Images') . '</caption>
					<tr class="nodrag nodrop">
						<th width="60" colspan="2">' . $this->l('Position') . '</th>
						
						<th style="padding-left: 10px; display: none">'. $this->l('Image') .' </th>
						<th width="270">'. $this->l('Link') .' </th>
						<th width="80">'. $this->l('Language') .' </th>
						<th width="40">'. $this->l('Enabled') .' </th>
						<th width="40">'. $this->l('Delete') .' </th>
						<th>'. $this->l('Image') .' </th>
					</tr>';
					
				if ($nbDirImages) {
					$i = 1;
					
					foreach ($confImages AS $confImage) {
						if (in_array($confImage['name'], $dirImages)) {
							$html .= $this->_getTableRowHTML($i, $nbDirImages, $confImage['name'], $confImage['link'], true);
							$i++;
						}
					}
					
					if ($nbDirImages > $nbConfImages) {
						foreach ($dirImages AS $dirImage) {
							if (!$this->_isImageInArray($dirImage, $confImages)) {
								$html .= $this->_getTableRowHTML($i, $nbDirImages, $dirImage);
								$i++;
							}
						}
					}
				}
				else {
					$html .= '<tr><td colspan="4">'.$this->l('No image in module directory').'</td></tr>';
				}
					
			$html .= '	</table>
			
			        <br />
			        
			        <a href="#" id="uploadImage" style="margin-left:30px">
			             <img src="../img/admin/add.gif" alt="upload image" />' . $this->l('Add an image') . '
                    </a>
                    <img id="loading_gif" src="'. _MODULE_DIR_ . $this->name . '/ajax-loader.gif" alt="uploading..." style="position:relative; top:2px; display:none;"/>
			
					<br /><br />
					<center>
					<input type="submit" name="submit" value="'.$this->l('Update').'" class="button" style="font-size:1.1em; padding:5px 60px 5px 60px;" />
				    </center>
				</fieldset>
			</form>';
		return $html;
	}
	 
	private function _displayForm() {

	}
	
	function hookHome($params) {
		global $smarty;

        $width = Configuration::get($this->name.'_width');
        $width = ($width == '' || $width == 'auto') ? '100%' : $width . 'px';
        $grid = 4;

		$smarty->assign(array('images'  => $this->_getImageArray(true),
								'background' => Configuration::get($this->name.'_background'),
							  'sync' 	=> Configuration::get($this->name.'_sync')));
							  


		return $this->display(__FILE__, 'homepageresponsivebanners.tpl');
	
	}

	private function _getImageArray($lang_filter = false) {
	    global $cookie;
	    
		$images = explode(";", Configuration::get($this->name.'_images'));
		$links 	= explode(";", Configuration::get($this->name.'_links'));
		$langs 	= $lang_filter ? explode(";", Configuration::get($this->name.'_langs')) : false;
		
		$tab_images = array();
		
		for($i = 0, $length = sizeof($images); $i < $length; $i++) {
			if ($images[$i] != "") {
				if ($lang_filter && isset($langs[$i]) && $langs[$i] != 'all' && $langs[$i] != $cookie->id_lang)
				    continue;
				
				$widths = getimagesize($content_dir.'modules/homepagebanners/slides/'.$images[$i]);
				$grid = 1;
				if($widths[0] > 75) { $grid = 2; }
				if($widths[0] > 170) { $grid = 3; }
				if($widths[0] > 265) { $grid = 4; }
				if($widths[0] > 360) { $grid = 5; }
				if($widths[0] > 455) { $grid = 6; }
				if($widths[0] > 550) { $grid = 7; }
				if($widths[0] > 645) { $grid = 8; }
				if($widths[0] > 740) { $grid = 9; }
				if($widths[0] > 835) { $grid = 10;}
				if($widths[0] > 930) { $grid = 11;}
				if($widths[0] > 1025) { $grid = 12;}
				
				$tab_images[] = array('name' 	=> $images[$i], 
										'grid'   => $grid,
								      'link' 	=> isset($links[$i]) ? $links[$i] : '');
			}
		}
		
		return $tab_images;
	}
	
	private function _isImageInArray($name, $array) {
		if (!is_array($array))
			return false;
		
		foreach ($array as $image) {
			if (isset($image['name'])) {
				if ($image['name'] == $name)
					return true;
			}
		}
		
		return false;
	}
	
	private function _parseImageDir() {
	    $dir = _PS_MODULE_DIR_ . $this->name . '/slides/';
	    $imgs = array();
		$imgmarkup = '';
		
	    if ($dh = opendir($dir)) {
	        while (($file = readdir($dh)) !== false) {
	            if (!is_dir($file) && preg_match("/^[^.].*?\.(jpe?g|gif|png)$/i", $file)) {
	                array_push($imgs, $file);
	            }
	        }
	        closedir($dh);
	    } else {
	        echo 'can\'t open slide directory';
	        return false;
	    }
		
		return $imgs;
	}
	
	private function _getTableRowHTML($i, $nbImages, $imagename, $imagelink = '', $checked = false) {
	   return '<tr id="tr_image_'. $i . '"' . ($i % 2 ? ' class="alt_row"' : '').' style="height: 142px;">
				<td class="positions" width="30" style="padding-left: 20px;">' . $i . '</td>
				<td'.($nbImages >= 2 ? ' class="dragHandle"' : '') . ' id="td_image_'. $i . '" width="30">
					<a' .($i == 1 ? ' style="display: none;"' : '' ).' href="#" class="move-up"><img src="../img/admin/up.gif" alt="'.$this->l('Up').'" title="'.$this->l('Up').'" /></a><br />
					<a '.($i == $nbImages ? ' style="display: none;"' : '' ).'href="#" class="move-down"><img src="../img/admin/down.gif" alt="'.$this->l('Down').'" title="'.$this->l('Down').'" /></a>
				</td>
				
				<td class="imagename" style="padding-left: 10px; display: none;">'. $imagename .'</td>
				<td class="imagelink">
					<input type="text" style="width: 250px" name="image_link_' . $i . '" value="' . $imagelink .'" />
				</td>
				<td class="imagelang">' . $this->_getLanguageSelectHTML($i) . '</td>
				<td class="checkbox_image_enabled" style="padding-left: 25px;" width="40">
					<input type="checkbox" name="image_enable_' . $i . '"' . ($checked ? ' checked="checked"' : '') . ' /> 
				</td>
				<td class="delete_image" style="padding-left: 25px;" width="40">
					<img src="../img/admin/delete.gif" alt="'.$this->l('Delete').'" title="'.$this->l('Delete').'" style="cursor:pointer;" /> 
				</td>
				<td class="image_prev" style="padding-left: 10px;"><img src="'._MODULE_DIR_.$this->name.'/thumbs/'. $imagename .'" alt="'.$imagename.'"></td>
			</tr>';
	}
	
	private function _getLanguageSelectHTML($i) {
        $languages = Language::getLanguages();
        $langs 	   = explode(";", Configuration::get($this->name.'_langs'));
        
        $html =  '<select name="language_' . $i . '" style="width:55px">';
        $html .= '<option value="all">ALL</option>';
        
		foreach ($languages as $language)
		{		
			 $html .= '<option value="' . $language['id_lang'] . '"' . (isset($langs[$i-1]) && $langs[$i-1] == $language['id_lang'] ? 'selected="selected"' : '') . '>' . strtoupper($language['iso_code']) . '</option>';
		     //style="background:url(' . _PS_IMG_.'l/'.$language['id_lang'] . '.jpg) no-repeat 0 0 scroll white; width:16px; height:11px;"		
		}
        
        return $html .= '</select>';
	}

}

?>

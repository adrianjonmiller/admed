<?php
class MassPrice extends Module
{


	private $_html = '';

	private $_postErrors = array();
	
	function __construct()
	{
		$this->name = 'massprice';
			if(_PS_VERSION_ > "1.4.0.0" && _PS_VERSION_ < "1.5.0.0"){
		$this->tab = 'administration';
		$this->author = 'RSI';
		$this->need_instance = 1;
		}
		elseif(_PS_VERSION_ > "1.5.0.0"){
				$this->tab = 'administration';
		$this->author = 'RSI';
			}
		
		else{
		$this->tab = 'Tools';
		}
		$this->version = '1.6';

		parent::__construct();
		
		$this->displayName = $this->l('Mass price update');
		$this->description = $this->l('Mass price update by category - www.catalogo-onlinersi.com.ar');
	

		
	}

	function install()
	{
		if (!Configuration::updateValue('MASSPRICE_NBR', 1) OR !parent::install() OR !$this->registerHook('header'))
			return false;
			
			if (!Configuration::updateValue('MASSPRICE_SKIP_CAT', 1))
			return false;
				if (!Configuration::updateValue('MASSPRICE_REQUIERED1', 0))
			return false;
			if (!Configuration::updateValue('MASSPRICE_SYMBOL', 0))
			return false;
				
				
		return true;
	}
	
	
		public function postProcess()
	{
		global $currentIndex;

		$errors = false;
		
		if ($errors)
			echo $this->displayError($errors);
	}
	 
  
  

 
		public function displayForm()
	{
		
  global  $cookie,$currentIndex;
  
   
  
    $this->_html .= '
	
	 
		
    

  <form action="'.$_SERVER['REQUEST_URI'].'" method="post" enctype="multipart/form-data">
			<fieldset><legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
				<label>'.$this->l('New price increment').'</label>
				<div class="margin-form">
					<input type="text" size="5" name="nbr" value="'.Tools::getValue('nbr', Configuration::get('MASSPRICE_NBR')).'" />
					<p class="clear">'.$this->l('Percentage or amount to increase/decrease/new price').'</p>
					
				
				</div>
				<label>'.$this->l('Increase or decrease').'</label>
				<div class="margin-form">
								    <select name="symbol" >
     
      <option value="1"'.((Configuration::get('MASSPRICE_SYMBOL') == "1") ? 'selected="selected"' : '').'>'.$this->l('+').'</option>
	  <option value="0"'.((Configuration::get('MASSPRICE_SYMBOL') == "0") ? 'selected="selected"' : '').'>'.$this->l('-').'</option>
	  <option value="2"'.((Configuration::get('MASSPRICE_SYMBOL') == "2") ? 'selected="selected"' : '').'>'.$this->l('New value (dont use percentage or amount	)').'</option>
    </select>
				
					
				
		</div>
			<label>'.$this->l('Type of update').'</label>
				<div class="margin-form">
								    <select name="requiered1" >
     
      <option value="1"'.((Configuration::get('MASSPRICE_REQUIERED1') == "1") ? 'selected="selected"' : '').'>'.$this->l('Percentage').'</option>
	  <option value="0"'.((Configuration::get('MASSPRICE_REQUIERED1') == "0") ? 'selected="selected"' : '').'>'.$this->l('Amount').'</option>
    </select>
				
					
				
		</div>
		
		
		
		'
		
					
		;
		$skipcat = Configuration::get('MASSPRICE_SKIP_CAT');
		
		if (!empty($skipcat))
		{
			$skipcat_array = explode(',',$skipcat);
		}
		else
		{
			$skipcat_array = array();
		}
		
		
	$this->_html .= '
				  <label>'.$this->l('Shop category to include in  Homepage').'</label>
				  <div class="margin-form">
						<select name="skipcat[]" multiple="multiple" style="width:200px; height:300px">';
					
		$categories = Category::getCategories(intval($cookie->id_lang));
		ob_start();
		@$this->recurseCategory($categories, $categories[0][1], 1, $skipcat_array);
	$this->_html .= ob_get_contents();
		ob_end_clean();
		$this->_html .= '
					    </select>
							
						<p class="clear">'.$this->l('Select the categories you want to change price').'</p>									
				   				
				   </div>
				
				   
		<center><input type="submit" name="submitMassPrice" value="'.$this->l('Save').'" class="button" /></center>
		
	
  		
  		</fieldset>
  		</form>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<fieldset><legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Contribute').'</legend>
				<p class="clear">'.$this->l('You can contribute with a donation if our free modules and themes are usefull for you. Clic on the link and support us!').'</p>
				<p class="clear">'.$this->l('For more modules & themes visit: www.catalogo-onlinersi.com.ar').'</p>
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="HMBZNQAHN9UMJ">
<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110401-1/en_US/i/scr/pixel.gif" width="1" height="1">
	</fieldset>
</form>
   
';
  	
 return $this->_html;			
	}
	

public function getContent()
{
		

global $cookie,$currentIndex;

if (Tools::isSubmit('submitMassPrice'))
		{
			$nbr = Tools::getValue('nbr');
			
					$requiered1 = Tools::getValue('requiered1');
						$symbol = Tools::getValue('symbol');
				
			
		
				$skipcat = Tools::getValue('skipcat');
				Configuration::updateValue('MASSPRICE_NBR', $nbr);
					Configuration::updateValue('MASSPRICE_SYMBOL', $symbol);
		
			
					Configuration::updateValue('MASSPRICE_REQUIERED1', $requiered1);
				
				
				if (!empty($skipcat))
				Configuration::updateValue('MASSPRICE_SKIP_CAT', implode(',',$skipcat));
				
		
		$skipcategory =Configuration::get('MASSPRICE_SKIP_CAT');
			mysql_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_) or die(mysql_error());
mysql_query("SET NAMES UTF8");//this is needed for UTF 8 characters - multilanguage
mysql_select_db(_DB_NAME_) or die(mysql_error());		
		$sorgudc = mysql_query("
		SELECT p.*
		FROM `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` p 
		WHERE p.`id_category_default`  IN (".$skipcategory .") ".((_PS_VERSION_ > "1.5.0.0") ? "AND p.`id_shop` = ".$this->context->shop->id : '')."
		GROUP BY p.`id_product`");
		
		@$veridc = mysql_fetch_assoc($sorgudc);
		
		do 
		{	
		$sorgudc2 = mysql_query("
		SELECT *
		FROM `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` 
		WHERE `id_product` =  ".@$veridc['id_product']." ".((_PS_VERSION_ > "1.5.0.0") ? "AND p.`id_shop` = ".$this->context->shop->id : '')."
		");	
		@$veridc2 = mysql_fetch_assoc($sorgudc2);
		if($symbol == 1 && $requiered1 == 0)
			{
			$price =$veridc['price']+$nbr;
			 Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` SET `price` = ".@$price." WHERE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."`.`id_product` = ".@$veridc['id_product']." ".((_PS_VERSION_ > "1.5.0.0") ? "AND `"._DB_PREFIX_."product_shop`.`id_shop` = ".$this->context->shop->id : '').";");
			}
			if($symbol == 0 && $requiered1 == 0)
			{
			$price =$veridc['price']-$nbr;
			 Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` SET `price` = ".@$price." WHERE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."`.`id_product` = ".@$veridc['id_product']." ".((_PS_VERSION_ > "1.5.0.0") ? "AND `"._DB_PREFIX_."product_shop`.`id_shop` = ".$this->context->shop->id : '').";");
			}
		
	if($symbol == 1 && $requiered1 == 1)
			{
				$per=$veridc['price']*$nbr/100;
			$price =$veridc['price']+$per;
			 Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` SET `price` = ".@$price." WHERE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."`.`id_product` = ".@$veridc['id_product']." ".((_PS_VERSION_ > "1.5.0.0") ? "AND `"._DB_PREFIX_."product_shop`.`id_shop` = ".$this->context->shop->id : '').";");
			}
			if($symbol == 0 && $requiered1 == 1)
			{
				$per=$veridc['price']*$nbr/100;
			$price =$veridc['price']-$per;
			 Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` SET `price` = ".@$price." WHERE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."`.`id_product` = ".@$veridc['id_product']." ".((_PS_VERSION_ > "1.5.0.0") ? "AND `"._DB_PREFIX_."product_shop`.`id_shop` = ".$this->context->shop->id : '').";");
			}
			if($symbol == 2 && $requiered1 == 1)
			{
				$per=$nbr;
			$price =$per;
			 Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` SET `price` = ".@$price." WHERE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."`.`id_product` = ".@$veridc['id_product']." ".((_PS_VERSION_ > "1.5.0.0") ? "AND `"._DB_PREFIX_."product_shop`.`id_shop` = ".$this->context->shop->id : '').";");
			}
		if($symbol == 2 && $requiered1 == 0)
			{
			$price =$nbr;
			 Db::getInstance()->Execute("UPDATE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."` SET `price` = ".@$price." WHERE `"._DB_PREFIX_."product".((_PS_VERSION_ > "1.5.0.0") ? "_shop" : '')."`.`id_product` = ".@$veridc['id_product']." ".((_PS_VERSION_ > "1.5.0.0") ? "AND `"._DB_PREFIX_."product_shop`.`id_shop` = ".$this->context->shop->id : '').";");
			}
		
		}
		while ($veridc = mysql_fetch_assoc($sorgudc));
	
	
	
			
		
	 	
		
	
	
	
			$this->_html .= @$errors == '' ? $this->displayConfirmation('Settings updated successfully') : @$errors;

					
		}
		/*delete by categorie*/

		/*delete all*/
		return $this->displayForm();

	}
	
public function getProductscath($idcat)
	{
			global $smarty;
		global $cookie;
	mysql_connect(_DB_SERVER_, _DB_USER_, _DB_PASSWD_) or die(mysql_error());
mysql_query("SET NAMES UTF8");//this is needed for UTF 8 characters - multilanguage
mysql_select_db(_DB_NAME_) or die(mysql_error());
		$sql = 'SELECT p.*
		FROM `'._DB_PREFIX_.'product` p 
		WHERE p.`id_category_default` '.((_PS_VERSION_ > "1.5.0.0") ? "AND id_shop_default = ".$this->context->shop->id : '').' IN ('.$idcat.') GROUP BY p.`id_product`';		
		$result = Db::getInstance()->Execute($sql);	
}

function recurseCategory($categories, $current, $id_category = 1, $selectids_array)
	{
		global $currentIndex;		

if(str_repeat('&nbsp;', $current['infos']['level_depth'] * 5) . preg_replace('/^[0-9]+\./', '', stripslashes($current['infos']['name'])) != "Root"){
		if($id_category != NULL && $current['infos']['name'] != NULL)echo '<option value="'.$id_category.'"'.(in_array($id_category,$selectids_array) ? ' selected="selected"' : '').'>'.
		str_repeat('&nbsp;', $current['infos']['level_depth'] * 5) . preg_replace('/^[0-9]+\./', '', stripslashes($current['infos']['name'])) . '</option>';}
		if (isset($categories[$id_category]))
			foreach ($categories[$id_category] AS $key => $row)
				$this->recurseCategory($categories, $categories[$id_category][$key], $key, $selectids_array);
	
	}






	
	

}
?>
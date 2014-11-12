<?php
require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');

include(dirname(__FILE__).'/../../header.php');

$smarty->assign('iso_code', Tools::strtolower(Language::getIsoById($cookie->id_lang ? (int)$cookie->id_lang : Configuration::get('PS_LANG_DEFAULT'))));

echo Module::display(dirname(__FILE__).'/paypalpro', 'about.tpl'); 

include(dirname(__FILE__).'/../../footer.php');